@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Detail Pembayaran</h2>
        <a href="{{ route('payments.edit', $payment) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">
            Edit Pembayaran
        </a>
    </div>

    <div class="grid grid-cols-2 gap-6">
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pembayaran</h3>
            <div class="space-y-3">
                <p class="text-gray-600">
                    <span class="font-medium">Tanggal:</span> 
                    {{ $payment->payment_date->format('d/m/Y') }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Jumlah:</span> 
                    Rp {{ number_format($payment->amount, 0, ',', '.') }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Metode:</span> 
                    {{ ucfirst($payment->payment_method) }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Referensi:</span> 
                    {{ $payment->payment_reference ?? '-' }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Status:</span>
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $payment->status === 'success' ? 'bg-green-100 text-green-800' : 
                           ($payment->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                        {{ ucfirst($payment->status) }}
                    </span>
                </p>
                @if($payment->notes)
                <p class="text-gray-600">
                    <span class="font-medium">Catatan:</span><br>
                    {{ $payment->notes }}
                </p>
                @endif
            </div>
        </div>

        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Invoice</h3>
            <div class="space-y-3">
                <p class="text-gray-600">
                    <span class="font-medium">No Invoice:</span> 
                    {{ $payment->invoice->invoice_number }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Customer:</span> 
                    {{ $payment->invoice->customer->name }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Total Invoice:</span> 
                    Rp {{ number_format($payment->invoice->grand_total, 0, ',', '.') }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Status Invoice:</span>
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $payment->invoice->status === 'paid' ? 'bg-green-100 text-green-800' : 
                           ($payment->invoice->status === 'unpaid' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                        {{ ucfirst($payment->invoice->status) }}
                    </span>
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Total Terbayar:</span>
                    Rp {{ number_format($payment->invoice->payments->where('status', 'success')->sum('amount'), 0, ',', '.') }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Sisa Pembayaran:</span>
                    Rp {{ number_format(
                        $payment->invoice->grand_total - $payment->invoice->payments->where('status', 'success')->sum('amount'),
                        0, ',', '.'
                    ) }}
                </p>
            </div>
        </div>
    </div>

    <!-- Riwayat Pembayaran Invoice -->
    <div class="mt-8">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Riwayat Pembayaran Invoice</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Metode</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Referensi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($payment->invoice->payments as $historyPayment)
                    <tr class="{{ $historyPayment->id === $payment->id ? 'bg-blue-50' : '' }}">
                        <td class="px-6 py-4">{{ $historyPayment->payment_date->format('d/m/Y') }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($historyPayment->amount, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ ucfirst($historyPayment->payment_method) }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $historyPayment->status === 'success' ? 'bg-green-100 text-green-800' : 
                                   ($historyPayment->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($historyPayment->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $historyPayment->payment_reference ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6 flex justify-end">
        <a href="{{ route('payments.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
            Kembali ke Daftar Pembayaran
        </a>
    </div>
</div>
@endsection