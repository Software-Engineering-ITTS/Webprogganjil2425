@extends('layouts.app')

@section('title', 'Customers')
@section('content')
    <div class="card">
        <div class="card-header text-white">
            <h1>Customer List</h1>
        </div>
        <div class="card-body">
            <a href="{{ route('customers.create') }}" class="btn btn-success">Add New Customer</a>
            <a href="{{ route('bills.all') }}" class="btn btn-success">Show All Bills</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>
                                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-edit btn-sm">Edit</a>
                                <a href="{{ route('bills.customer', $customer) }}" class="btn btn-view btn-sm">View Bills</a>
                                <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection