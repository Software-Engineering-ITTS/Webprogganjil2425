@extends('layouts.app')
@section('title', isset($customer) ? 'Bills ' . $customer->name : 'All Bills')
@section('content')
    <div class="card">
        <div class="card-header text-white">
            <h1>{{ isset($customer) ? 'Tagihan Customer: ' . $customer->name : 'All Customer Bills' }}</h1>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ isset($customer) ? route('bills.customer', $customer) : route('bills.all') }}" class="mb-3">
                <a href="{{ route('bills.create') }}" class="btn btn-success">Add New Bill</a>
                <div class="row">
                    <div class="col-md-5">
                        <select name="year" class="form-control">
                            <option value="">ALL</option>
                            @foreach(range(now()->year, now()->year - 5) as $year)
                                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <select name="month" class="form-control">
                            <option value="">ALL</option>
                            @foreach(range(1, 12) as $month)
                                <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>{{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5 mt-3" >
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>

            <table class="table table table-striped">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bills as $bill)
                        <tr>
                            <td>{{ $bill->customer->name }}</td>
                            <td>{{ $bill->description }}</td>
                            <td>{{ $bill->amount }}</td>
                            <td>{{ $bill->due_date }}</td>
                            <td>{{ $bill->status }}</td>
                            <td>
                                <a href="{{ route('bills.edit', $bill) }}" class="btn btn-edit btn-sm">Edit</a>
                                <form action="{{ route('bills.destroy', $bill) }}" method="POST" style="display:inline;">
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
