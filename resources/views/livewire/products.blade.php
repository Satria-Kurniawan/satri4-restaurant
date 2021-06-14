@push('pagetitle', 'Products')

<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mb-9">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-4 py-4">
            <div class="flex mb-3">
                <div class="flex-auto w-full md:w-1/1 mb-6 md:mb-0 mr-5">
                    <h2 class="font-weight-bold">Products</h2>
                </div>
                <div class="flex-auto w-full md:w-1/1 mb-6 md:mb-0 mr-5">
                    <input wire:model="search" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="search" name="search" type="text" placeholder="Cari...">
                </div>
                <div class="flex-auto w-full md:w-1/4 mb-6 md:mb-0">
                    <button wire:click="showModal()" class="btn btn-sm btn-outline-success hover:bg-green-700 text-green font-bold py-1 px-3 rounded mb-1">
                        <div class="fas fa-plus mr-1"></div>
                        Create
                    </button>
                </div>
            </div>

            @if ($isOpen)
                @include('livewire.create-products', compact('cat'))
            @endif

            @if (session()->has('message'))
                <div class="bg-gradient-to-r from-green-400 to-blue-500 border-l-4 border-black-500 text-white-700 p-1 mb-3 mt-3" role="alert">
                    <h5 class="text-white font-semibold">{{ session('message') }}</h5>
                </div>
            @endif

            @if (session()->has('deletemessage'))
                <div class="bg-gradient-to-r from-green-400 to-blue-500 border-l-4 border-black-500 text-white-700 p-1 mb-3 mt-3" role="alert">
                    <h5 class="text-white font-semibold">{{ session('deletemessage') }}</h5>
                </div>
            @endif

            <table class="table-fixed w-full text-center border-b">
                <thead class="bg-gradient-to-r from-purple-900 via-purple-400 to-pink-400">
                    <tr>
                        {{-- <th class="px-4 py-2 text-white">Id</th> --}}
                        <th class="w-auto px-4 py-2 text-white">Category</th>
                        <th class="w-auto px-4 py-2 text-white">Name</th>
                        <th class="w-auto px-4 py-2 text-white">Price</th>
                        <th class="w-auto px-4 py-2 text-white">Picture</th>
                        <th class="w-auto px-4 py-2 text-white">Qty</th>
                        <th class="w-auto px-4 py-2 text-white">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($products as $product)
                    <tr class="border-b">
                        {{-- <td>{{ $post->id }}</td> --}}
                        <td>{{ $product->category->category }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td class="box">
                            @if (!empty($product->picture))
                                <img src="{{ url('storage/img/'.$product->picture) }}" class="my-3 h-20 w-28">
                            @else
                                No image available
                            @endif
                        </td>
                        <td>{{ $product->qty }}</td>
                        <td class="py-2">
                            <button wire:click="edit({{ $product->id }})" class="w-1/4 bg-blue-500 hover:bg-blue-700 text-white font-bold my-1 py-2 px-2 rounded">
                                <div class="fas fa-edit"></div>
                            </button>
                            <button wire:click="selectItem({{ $product->id }})" class="w-1/4 bg-red-500 hover:bg-red-700 text-white font-bold my-1 py-2 px-2 rounded">
                                <div class="fas fa-trash-alt"></div>
                            </button>
                            {{-- <button type="button" class="w-1/4 bg-red-500 hover:bg-red-700 text-white font-bold my-1 py-2 px-2 rounded" wire:click="delete({{ $product->id }})" onclick="confirm('Are you sure you want to delete?') || event.stopImmediatePropagation()">
                                <div class="fas fa-trash-alt"></div>
                            </button> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $products->links() }}
            </div>

            @if ($deleteOpen)
                @include('livewire.delete-products')
            @endif

        </div>

        <style>
            div.box {
                border: 1px black solid;
                height: 64px;
                width: 64px;
                background: #444;
                display: table-cell;
                vertical-align: middle;
            }

            .box img {
                display:block;
                margin: 10px auto;
            }
        </style>
