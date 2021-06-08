{{-- MODAL!!! --}}

{{-- <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-2 px-2 pb-20 text-center sm:block sm:p-0"> --}}
      <!--
        Background overlay, show/hide based on modal state.
        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
      {{-- <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div> --}}

      <!-- This element is to trick the browser into centering the modal contents. -->
      {{-- <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span> --}}

      <!--
        Modal panel, show/hide based on modal state.
        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
        {{-- <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form class="w-full max-w-lg">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:items-start">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category">
                        Category
                        </label>
                        <input wire:model="category" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 border-black leading-tight focus:outline-none focus:bg-white" id="category" name="category" type="text" placeholder="Masukan kategori">
                        @error('category')
                            <h1 class="text-red-900">{{ $message }}</h1>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button wire:click.prevent="store()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Save
                </button>
                <button wire:click.prevent="hideModal()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
        </form>
    </div>
</div> --}}

{{-- FORM RAPI!!! --}}

<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h2 class="font-weight-bold mb-3">ADD CATEGORY</h2>
                <div class="w-full mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category">
                    Category
                    </label>
                    <input wire:model="category" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 border-black leading-tight focus:outline-none focus:bg-white" id="category" name="category" type="text" placeholder="Masukan kategori">
                    @error('category')
                        <h1 class="text-red-900">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click.prevent="store()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Save
                    </button>
                    <button wire:click.prevent="hideModal()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
