@push('pagetitle', 'Order')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="card-header bg-white mb-4">
                    <div class="row mb-0">
                        @if (session()->has('OrderS'))
                        <div class="bg-gradient-to-r from-green-400 to-blue-500 border-l-4 border-black-500 text-white-700 p-1 mb-3 mt-3" role="alert">
                            <h5 class="text-white font-semibold">{{ session('OrderS') }}</h5>
                        </div>
                        @endif
                        <div class="col-md-4">
                            <h2 class="font-weight-bold">Products List</h2>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control bg-black-100" wire:model="selectedCategory">
                                <option value="">All Category</option>
                                 @foreach (App\Models\Category::pluck('category', 'id') as $cate_id => $cate_name)
                                     <option value="{{ $cate_id }}">{{ $cate_name }}</option>
                                 @endforeach
                             </select>
                        </div>
                        <div class="col-md-5">
                            <input wire:model="search" class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="search" name="search" type="text" placeholder="Search...">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    @forelse ($products as $product)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ url('storage/img/'.$product->picture) }}" alt="product" class="w-48 h-32">
                                    <button wire:click="addItem({{$product->id}})" class="btn btn-primary btn-sm m-1" style="position: absolute;top:0;right:0">
                                        <i class="fas fa-cart-plus fa-lg"></i>
                                    </button>
                                </div>
                                <div class="card-footer">
                                    <h6 class="text-center mb-2">{{ $product->name }}</h6>
                                    <h6 class="text-center mb-2">Rp. {{ number_format($product['price'],2,',','.') }}</h6>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-sm-12">
                            <h1 class="font-weight-bold text-center">Products not found!</h1>
                        </div>
                    @endforelse
                </div>
                <div style="display:flex; float: right;">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-header bg-white mb-4">
                    <h2 class="font-weight-bold mb-3">Cart</h2>
                </div>
                <table class="table table-sm border-b table-hovered mt-3">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody class="m-0">
                        @forelse ($carts as $cart)
                            <tr>
                                <td>
                                    {{ $cart['name'] }}
                                    {{-- Rp. {{ number_format($cart['pricesingle'],2,',','.') }} --}}
                                </td>
                                <td>Rp. {{ number_format($cart['price'],2,',','.') }}</td>
                                <td class="text-center">
                                    <button wire:click="decreaseItem('{{$cart['rowId']}}')" class="mr-1 btn-sm rounded text-white p-1 hover: bg-warning">
                                        <div class="fas fa-minus"></div>
                                    </button>
                                    {{ $cart['qty'] }}
                                    <button wire:click="increaseItem('{{$cart['rowId']}}')" class="ml-1 btn-sm rounded text-white p-1 hover: bg-primary">
                                        <div class="fas fa-plus"></div>
                                    </button>
                                    <button wire:click="removeItem('{{$cart['rowId']}}')" class="m-2 btn-sm rounded text-white p-1 hover: bg-danger">
                                        <div class="fas fa-trash-alt"></div>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <td colspan="3"><h6 class="text-center">Empty Cart</h6></td>
                        @endforelse
                    </tbody>
                </table>

                @if (session()->has('error'))
                <div class="bg-gradient-to-r from-red-700 to-orange-700 border-l-4 border-black-500 text-white-700 p-1 mb-3 mt-3" role="alert">
                    <h5 class="text-white font-semibold">{{ session('error') }}</h5>
                </div>
                @endif

                @if ($isOpen)
                    @include('livewire.order-detail')
                @endif

                <div class="card">
                    <div class="card-footer border-white">
                        <h4 class="font-weight-bold">Cart Summary</h4>
                        {{-- <h5>Sub Total : {{$summary['sub_total']}}</h5> --}}
                        {{-- <h5>Tax : {{$summary['pajak']}}</h5> --}}
                        <h5>Total Harga : Rp. {{ number_format($summary['total'],2,',','.') }}</h5>

                        {{-- <div class="form-group mt-4">
                            <input type="number" wire:model="payment" class="form-control" id="payment" placeholder="Input customer payment amount">
                            <input type="hidden" id="total" value="{{$summary['total']}}">
                        </div> --}}

                        {{-- <form wire:submit.prevent="handleSubmit"> --}}
                            {{-- <div>
                                <label>Bayar</label>
                                <h1 id="paymentText" wire:ignore>Rp. 0</h1>
                            </div>

                            <div>
                                <label>Kembali</label>
                                <h1 id="kembalianText" wire:ignore>Rp. 0</h1>
                            </div> --}}

                            {{-- <div class="mt-4">
                                <button wire:ignore type="submit" id="saveButton" class="btn btn-success btn-block">Order<i class="ml-2 fas fa-shopping-cart"></i></button>
                            </div> --}}
                        {{-- </form> --}}
                        <div class="mt-4">
                            <button wire:click="showModal()" class="btn btn-success btn-block">
                                Order<i class="ml-2 fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @push('script-custom')
    <script>
        payment.oninput = () => {
            const paymentAmount = document.getElementById("payment").value
            const totalAmount = document.getElementById("total").value
            const kembalian = paymentAmount - totalAmount
            document.getElementById("kembalianText").innerHTML = `Rp ${rupiah(kembalian)} ,00`
            document.getElementById("paymentText").innerHTML = `Rp ${rupiah(paymentAmount)} ,00`
            const saveButton =  document.getElementById("saveButton")
            if(kembalian < 0){
                saveButton.disabled = true
            }else{
                saveButton.disabled = false
            }
        }
        const rupiah = (angka) => {
            const numberString = angka.toString()
            const split = numberString.split(',')
            const sisa = split[0].length % 3
            let rupiah = split[0].substr(0, sisa)
            const ribuan = split[0].substr(sisa).match(/\d{1,3}/gi)
            if(ribuan){
                const separator = sisa ? '.' : ''
                rupiah += separator + ribuan.join('.')
            }
            return split[1] != undefined ? rupiah + ',' + split[1] : rupiah
        }
    </script>
@endpush --}}
