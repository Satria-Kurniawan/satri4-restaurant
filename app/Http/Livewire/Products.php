<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search;
    // public $products;
    public $productId, $name, $price, $picture,$qty, $category;
    public $isOpen = 0;
    public $deleteOpen = 0;
    public $selectedItem;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $cat = Category::all();
        $this->products = Product::with('category');
        // $this->products = Product::all();
        $searchParams = '%'.$this->search.'%';
        // $this->products = Product::where('name', 'like', $searchParams)
        //                     ->orWhere('price', 'like', $searchParams)->get();

        return view('livewire.products', [
            'products' => Product::where('name', 'like', $searchParams)
                                ->orWhere('price', 'like', $searchParams)->latest()->paginate(4)
        ], compact('cat'));
    }

    public function showModal(){
        $this->isOpen = true;
    }

    public function hideModal(){
        $this->isOpen = false;
    }

    // public function delShowModal(){
    //     $this->deleteOpen = true;
    // }

    public function delHideModal(){
        $this->deleteOpen = false;
    }

    public function store(){
        $this->validate(
            [
                'category' => 'required',
                'name' => 'required',
                'price' => 'required',
                'picture' => 'required|max:1024',
                'qty' => 'required',
            ]
        );

        if (!empty($this->picture)){
            $this->picture->store('public/img');
        }

        Product::updateOrCreate(['id' => $this->productId], [
            'category_id' => $this->category,
            'name' => $this->name,
            'price' => $this->price,
            'picture' => $this->picture->hashName(),
            'qty' => $this->qty,
        ]);

        $this->hideModal();

        session()->flash('message', $this->productId ? 'Updated Successfully' : 'Created Successfully');

        $this->productId = '';
        $this->category = '';
        $this->name = '';
        $this->price = '';
        $this->picture = '';
        $this->qty = '';
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $this->productId = $id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->qty = $product->qty;

        $this->showModal();
    }

    public function delete($id){
        // Product::find($id)->delete();
        // $this->delHideModal();
        Product::destroy($this->selectedItem);
        $this->deleteOpen = false;
        session()->flash('deletemessage', 'Deleted Successfully');
    }

    public function selectItem($productId){
        $this->selectedItem = $productId;
        $this->deleteOpen = true;
    }
}
