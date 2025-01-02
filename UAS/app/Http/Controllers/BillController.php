<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Customer;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::with('customer')->get();
        return view('bills.index', compact('bills'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('bills.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'description' => 'required',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
            'status' => 'required',
        ]);

        $bill = Bill::create($request->all());
        return redirect()->route('bills.customer', $bill->customer)->with('success', 'Bill created successfully.');
    }


    public function edit(Bill $bill)
    {
        $customers = Customer::all();
        return view('bills.edit', compact('bill', 'customers'));
    }

    public function update(Request $request, Bill $bill)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'description' => 'required',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
            'status' => 'required',
        ]);
    
        $bill->update($request->only(['customer_id', 'description', 'amount', 'due_date', 'status']));
    
        return redirect()->route('bills.customer', $bill->customer)->with('success', 'Bill updated successfully.');
    }


    public function showCustomerBills(Customer $customer, Request $request)
    {
        $query = Bill::where('customer_id', $customer->id);
    
        if ($request->has('year') && $request->year) {
            $query->whereYear('due_date', $request->year);
        }
    
        if ($request->has('month') && $request->month) {
            $query->whereMonth('due_date', $request->month);
        }
    
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
    
        $bills = $query->get();
    
        return view('bills.index', compact('bills', 'customer'));
    }

    public function showAllBills(Request $request)
    {
        $query = Bill::query();
        if ($request->has('year') && $request->year) {
            $query->whereYear('due_date', $request->year);
        }
    
        if ($request->has('month') && $request->month) {
            $query->whereMonth('due_date', $request->month);
        }
    
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
        $bills = $query->get();
    
        return view('bills.index', compact('bills'));
    }

    public function destroy(Bill $bill)
    {
        $bill->delete();
        return redirect()->route('bills.customer', $bill->customer)->with('success', 'Bill created successfully.');
    }
}
