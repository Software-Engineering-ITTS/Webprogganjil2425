@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-blue-500 to-teal-500 min-h-screen p-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
        </div>

        <!-- Teks Selamat Datang -->
        <div class="mb-5">
            <h3 class="text-lg font-semibold text-gray-800">Selamat datang di SisTag (Sistem Tagihan)</h3>
            <p class="text-gray-600">
                Pengelolaan tagihan Anda menjadi lebih mudah di sini. Sistem tagihan kami dirancang untuk membantu Anda mengelola, memantau, dan mengatur semua transaksi pembayaran dengan lebih efisien.
            </p>
        </div>
        <!-- Recent Activity Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-5">
            <!-- Recent Customers -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-center mb-4 bg-white-100 p-2 rounded">
                    <h2 class="text-xl font-semibold text-gray-800">Recent Customers</h2>
                    <a href="{{ route('customers.index') }}" class="text-blue-600 hover:text-blue-800">View All</a>
                </div>
                <!-- List of recent customers -->
            </div>
            <!-- Recent Invoices -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-center mb-4 bg-white-100 p-2 rounded">
                    <h2 class="text-xl font-semibold text-gray-800">Recent Invoices</h2>
                    <a href="{{ route('invoices.index') }}" class="text-blue-600 hover:text-blue-800">View All</a>
                </div>
                <!-- List of recent invoices -->
            </div>
            <!-- Recent Payments -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-center mb-4 bg-white-100 p-2 rounded">
                    <h2 class="text-xl font-semibold text-gray-800">Recent Payments</h2>
                    <a href="{{ route('payments.index') }}" class="text-blue-600 hover:text-blue-800">View All</a>
                </div>
                <!-- List of recent payments -->
            </div>
        </div>
    </div>
</div>
@endsection