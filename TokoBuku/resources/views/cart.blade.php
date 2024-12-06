@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Shopping Cart</h2>

    @if(session('cart'))
        <table class="table">
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $id => $details)
                <tr>
                    <td><img src="{{ $details['cover'] }}" width="50"></td>
                    <td>{{ $details['nama'] }}</td>
                    <td>
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="form-control">
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                        </form>
                    </td>
                    <td>Rp. {{ $details['harga'] }}</td>
                    <td>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $id }}" name="id">
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3>Your cart is empty!</h3>
    @endif
</div>
@endsection
@foreach($books as $book)
<div class="book">
    <h3>{{ $book->title }}</h3>
    <p>{{ $book->synopsis }}</p>
    <p>Rp. {{ $book->price }}</p>

    <form action="{{ route('cart.add', $book->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">+ Keranjang</button>
    </form>
</div>
@endforeach
