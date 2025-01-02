@extends('layouts.app')

@section('title', 'Add Bill')
@section('content')
    <div class="card">
        <div class="card-header text-white">
            <h1>Add New Bill</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('bills.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="customer_id" class="form-label">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-select" required>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" id="description" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input type="date" name="due_date" id="due_date" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="lunas" {{ old('status') == '???' ? 'selected' : '' }}>=PILIH SALAH SATU=</option>
                        <option value="Lunas" {{ old('status') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                        <option value="Belum Lunas" {{ old('status') == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection