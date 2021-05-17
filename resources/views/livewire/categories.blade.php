<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-4 py-4">
            <div class="flex">
                <div class="w-full md:w-1/2 mb-6 md:mb-0">
                    <button wire:click="showModal()" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded mb-1">
                        Create
                    </button>
                </div>
                <div class="w-full md:w-1/2 mb-6 md:mb-0">
                    <input wire:model="search" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 border-black leading-tight focus:outline-none focus:bg-white" id="search" name="search" type="text" placeholder="Cari...">
                </div>
            </div>

            @if ($isOpen)
                @include('livewire.create-categories')
            @endif

            @if (session()->has('message'))
                <div class="bg-gradient-to-r from-green-400 to-blue-500 border-l-4 border-black-500 text-white-700 p-4 mb-3 mt-3" role="alert">
                    <h1 class="text-white font-semibold">{{ session('message') }}</h1>
                </div>
            @endif

            @if (session()->has('deletemessage'))
                <div class="bg-gradient-to-r from-green-400 to-blue-500 border-l-4 border-black-500 text-white-700 p-4 mb-3 mt-3" role="alert">
                    <h1 class="text-white font-semibold">{{ session('deletemessage') }}</h1>
                </div>
            @endif

            <table class="table-fixed w-full text-center">
                <thead class="bg-gradient-to-r from-purple-900 via-purple-400 to-pink-400">
                    <tr>
                        <th class="w-40 px-4 py-2 text-white">Category</th>
                        <th class="w-20 px-4 py-2 text-white">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->category }}</td>
                        <td class="py-2">
                            <button wire:click="edit({{ $category->id }})" class="w-1/6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                                <div class="fas fa-edit"></div>
                            </button>
                            <button wire:click="delShowModal()" class="w-1/6 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">
                                <div class="fas fa-trash-alt"></div>
                            </button>
                            {{-- <button wire:click="delete({{ $post->id }})" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                delete
                            </button> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($deleteOpen)
                @include('livewire.delete-categories')
            @endif

        </div>
