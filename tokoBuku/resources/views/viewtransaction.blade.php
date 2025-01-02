@extends('layout.app')
@section('title', 'View-Transaction')

@section('content')
<body>
    <div class="justify-center items-center flex flex-col mt-10 gap-10">
        <h1 class="font-bold text-3xl">
            View <span class="text-yellow-500">Transaction</span> 
        </h1>    

        <table border="1" class="text-xl ">
            <thead class="border">
                <tr>
                    <th>Title Buku</th>
                    <th>Tanggal Transaksi</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr class="border">
                        <td class="border">
                            {{ $transaction->book_id }}
                        </td>
                        <td class="border">
                            {{ $transaction->tanggal_beli }}
                        </td>
                        <td class="border">
                            {{ $transaction->status }}
                        </td>

                        <td class="border" class="flex items-center rounded-lg text-center ">
                            <a href="{{ route('Transaction.edit' , $transaction->id) }} " class="px-6 py-3 bg-blue-500">Edit</a>
                            <form action="{{  route('Transaction.destroy', $transaction->id) }}"  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-2 bg-red-500">Delete</button>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
    </div>
    

</body>
@endsection
