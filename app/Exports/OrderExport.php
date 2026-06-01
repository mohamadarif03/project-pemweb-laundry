<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Order::with(['customer', 'service'])->get();
    }

    public function headings(): array
    {
        return [
            'Invoice Code',
            'Customer Name',
            'Service',
            'Weight',
            'Total Price',
            'Payment Status',
            'Laundry Status',
            'Order Date'
        ];
    }

    public function map($order): array
    {
        return [
            $order->invoice_code,
            $order->customer->name ?? '-',
            $order->service->name ?? '-',
            $order->weight . ' kg',
            $order->total_price,
            $order->payment_status,
            $order->laundry_status,
            $order->created_at->format('Y-m-d H:i:s')
        ];
    }
}
