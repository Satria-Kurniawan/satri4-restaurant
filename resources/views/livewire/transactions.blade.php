@push('pagetitle', 'Transactions')

<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mb-9">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-4 py-4">
            <div class="flex mb-3">
                <div class="flex-auto w-full md:w-1/1 mb-6 md:mb-0 mr-5">
                    <h2 class="font-weight-bold">Transactions</h2>
                </div>
            </div>

            <table class="table-fixed w-full text-center border-b">
                <thead class="bg-gradient-to-r from-purple-900 via-purple-400 to-pink-400">
                    <tr>
                        <th class="w-auto px-4 py-2 text-white">Invoice</th>
                        <th class="w-auto px-4 py-2 text-white">User Id</th>
                        <th class="w-auto px-4 py-2 text-white">User Name</th>
                        {{-- <th class="w-auto px-4 py-2 text-white">Pay</th> --}}
                        <th class="w-auto px-4 py-2 text-white">Total Price</th>
                        <th class="w-auto px-4 py-2 text-white">Date</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($transactions as $tr)
                    <tr class="border-b">
                        <td>{{ $tr->invoice_number }}</td>
                        <td>{{ $tr->user_id }}</td>
                        <td>{{ $tr->user->name }}</td>
                        {{-- <td>{{ $tr->pay }}</td> --}}
                        <td>{{ $tr->total }}</td>
                        <td>{{ $tr->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
