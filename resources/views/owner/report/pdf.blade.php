<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi Laundry</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Transaksi Laundry</h2>
    <table>
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Customer</th>
                <th>Service</th>
                <th>Weight</th>
                <th>Total Price</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->invoice_code }}</td>
                <td>{{ $order->customer->name ?? '-' }}</td>
                <td>{{ $order->service->name ?? '-' }}</td>
                <td>{{ $order->weight }} kg</td>
                <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                <td>{{ $order->payment_status }}</td>
                <td>{{ $order->laundry_status }}</td>
                <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
