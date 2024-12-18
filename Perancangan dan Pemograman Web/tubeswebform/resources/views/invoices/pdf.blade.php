<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.4;
            color: #333;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-info {
            margin-bottom: 20px;
        }
        .invoice-info table {
            width: 100%;
        }
        .invoice-items {
            margin-bottom: 20px;
        }
        .invoice-items table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-items th, .invoice-items td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .invoice-total {
            text-align: right;
        }
        .invoice-total table {
            width: 300px;
            margin-left: auto;
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <h1>INVOICE</h1>
        <h2>#{{ $invoice->invoice_number }}</h2>
    </div>

    <div class="invoice-info">
        <table>
            <tr>
                <td width="50%">
                    <strong>Dari:</strong><br>
                    Nama Perusahaan Anda<br>
                    Alamat Perusahaan<br>
                    Telepon: xxx-xxx-xxx<br>
                    Email: info@perusahaan.com
                </td>
                <td width="50%">
                    <strong>Kepada:</strong><br>
                    {{ $invoice->customer->name }}<br>
                    {{ $invoice->customer->address }}<br>
                    Telepon: {{ $invoice->customer->phone }}<br>
                    Email: {{ $invoice->customer->email }}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <strong>Tanggal Invoice:</strong> {{ $invoice->invoice_date->format('d/m/Y') }}<br>
                    <strong>Jatuh Tempo:</strong> {{ $invoice->due_date->format('d/m/Y') }}
                </td>
            </tr>
        </table>
    </div>

    <div class="invoice-items">
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->items as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="invoice-total">
        <table>
            <tr>
                <td><strong>Subtotal:</strong></td>
                <td>Rp {{ number_format($invoice->total_amount, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td><strong>Pajak:</strong></td>
                <td>Rp {{ number_format($invoice->tax, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td><strong>Total:</strong></td>
                <td>Rp {{ number_format($invoice->grand_total, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    @if($invoice->notes)
    <div class="invoice-notes">
        <strong>Catatan:</strong><br>
        {{ $invoice->notes }}
    </div>
    @endif
</body>
</html>