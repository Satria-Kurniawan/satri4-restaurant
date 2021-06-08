<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\ProductTransaction;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Cart extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $tax = "0%";
    public $payment = 0;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%'.$this->search.'%')
                            ->orWhere('price', 'like', '%'.$this->search.'%')
                            ->orderBy('created_at', 'DESC')->paginate(8);

        $condition = new \Darryldecode\Cart\CartCondition([
            'name' => 'pajak',
            'type' => 'tax',
            'target' => 'total',
            'value' => $this->tax,
            'order' => 1
        ]);

        \Cart::session(Auth()->id())->condition($condition);
        $items = \Cart::session(Auth()->id())->getContent()->sortBy(function ($cart){
            return $cart->attributes->get('added_at');
        });

        if(\Cart::isEmpty()){
            $cartData = [];
        }else{
            foreach($items as $item){
                $cart[] = [
                    'rowId' => $item->id,
                    'name' => $item->name,
                    'pricesingle' => $item->price,
                    'price' => $item->getPriceSum(),
                    'qty' => $item->quantity,
                ];
            }

            $cartData = collect($cart);
        }

        $sub_total = \Cart::session(Auth()->id())->getSubTotal();
        $total = \Cart::session(Auth()->id())->getTotal();

        $newCondition = \Cart::session(Auth()->id())->getCondition('pajak');
        $pajak = $newCondition->getCalculatedValue($sub_total);

        $summary = [
            'sub_total' => $sub_total,
            'pajak' => $pajak,
            'total' => $total
        ];

        return view('livewire.cart', [
            'products' => $products,
            'carts' => $cartData,
            'summary' => $summary
        ]);
    }

    public function addItem($id){
        $rowId = "Cart".$id;
        $cart = \Cart::session(Auth()->id())->getContent();
        $checkItem = $cart->whereIn('id', $rowId);

        $idProduct = (substr($rowId, 4, 5));
        $product = Product::find($idProduct);

        if($checkItem->isNotEmpty()){
            if($product->qty == $checkItem[$rowId]->quantity){
                session()->flash('error', 'Produk habis');
            }else{
                \Cart::session(Auth()->id())->update($rowId, [
                    'quantity' => [
                        'relative' => true,
                        'value' => 1
                    ]
                ]);
            }
        }else{
            if($product->qty == 0){
                session()->flash('error', 'Produk habis');
            }else{
                \Cart::session(Auth()->id())->add([
                    'id' => "Cart".$product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'attributes' => [
                        'added_at' => Carbon::now()
                    ],
                ]);
            }
        }
    }

    public function increaseItem($rowId){

        $idProduct = (substr($rowId, 4, 5));
        $product = Product::find($idProduct);
        $cart = \Cart::session(Auth()->id())->getContent();
        $checkItem = $cart->whereIn('id', $rowId);

        if($product->qty == $checkItem[$rowId]->quantity){
            session()->flash('error', 'Produk habis');
        }else{
            if($product->qty == 0){
                session()->flash('error', 'Produk habis');
            }else{
                \Cart::session(Auth()->id())->update($rowId, [
                    'quantity' =>[
                        'relative' => true,
                        'value' => 1
                    ]
                ]);
            }
        }
    }

    public function decreaseItem($rowId){

        $idProduct = (substr($rowId, 4, 5));
        $product = Product::find($idProduct);
        $cart = \Cart::session(Auth()->id())->getContent();
        $checkItem = $cart->whereIn('id', $rowId);

        if($checkItem[$rowId]->quantity == 1){
            $this->removeItem($rowId);
        }else{
            \Cart::session(Auth()->id())->update($rowId, [
                'quantity' =>[
                    'relative' => true,
                    'value' => -1
                ]
            ]);
        }
    }

    public function removeItem($rowId){
        \Cart::session(Auth()->id())->remove($rowId);
    }

    public function handleSubmit() {
        $cartTotal = \Cart::session(Auth()->id())->getTotal();
        $bayar = $this->payment;
        $kembalian = (int) $bayar - (int) $cartTotal;

        if($kembalian >= 0){
            DB::beginTransaction();

            try {
                $allCart = \Cart::session(Auth()->id())->getContent();

                $filterCart = $allCart->map(function ($item) {
                    return [
                        'id' => substr($item->id, 4,5 ),
                        'quantity' => $item->quantity
                    ];
                });

                foreach ($filterCart as $cart) {
                    $product = Product::find($cart['id']);

                    if($product->qty === 0){
                        return session()->flash('error', 'Jumlah item kurang');
                    }

                    $product->decrement('qty', $cart['quantity']);
                }

                $id = IdGenerator::generate([
                    'table' => 'transactions',
                    'length' => 10,
                    'prefix' => 'INV-',
                    'field' => 'invoice_number'
                ]);

                Transaction::create([
                    'invoice_number' => $id,
                    'user_id' => Auth()->id(),
                    'pay' => $bayar,
                    'total' => $cartTotal
                ]);

                foreach ($filterCart as $cart) {
                    ProductTransaction::create([
                        'product_id' => $cart['id'],
                        'invoice_number' => $id,
                        'qty' => $cart['quantity']
                    ]);
                }

                \Cart::session(Auth()->id())->clear();
                $this->payment = 0;

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
                return session()->flash('error', $th);
            }
        }
    }
}
