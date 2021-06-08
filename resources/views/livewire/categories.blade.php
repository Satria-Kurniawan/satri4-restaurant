@push('pagetitle', 'Categories')

<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-4 py-4">
            <div class="flex mb-3">
                <div class="flex-auto w-full md:w-1/1 mb-6 md:mb-0 mr-5">
                    <h2 class="font-weight-bold">Categories</h2>
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
                @include('livewire.create-categories')
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

            <table class="table-fixed w-full text-center">
                <thead class="bg-gradient-to-r from-purple-900 via-purple-400 to-pink-400">
                    <tr>
                        <th class="w-40 px-4 py-2 text-white">Category</th>
                        <th class="w-20 px-4 py-2 text-white">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center border-b">
                    @foreach ($categories as $category)
                    <tr class="border-b">
                        <td>{{ $category->category }}</td>
                        <td class="py-2">
                            <button wire:click="edit({{ $category->id }})" class="w-1/6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                                <div class="fas fa-edit"></div>
                            </button>
                            {{-- <button wire:click="delete({{ $product->id }})" class="w-1/6 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">
                                <div class="fas fa-trash-alt"></div>
                            </button> --}}
                            <button type="button" class="w-1/6 bg-red-500 hover:bg-red-700 text-white font-bold my-1 py-2 px-2 rounded" wire:click="delete({{ $category->id }})" onclick="confirm('Are you sure you want to delete?') || event.stopImmediatePropagation()">
                                <div class="fas fa-trash-alt"></div>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- @if ($deleteOpen)
                @include('livewire.delete-categories')
            @endif --}}

        </div>
