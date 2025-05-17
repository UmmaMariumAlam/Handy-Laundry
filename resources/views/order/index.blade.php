{{-- filepath: resources/views/orders/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order History</title>
    <style>
        body {
            background: #f8fafc;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .history-container {
            max-width: 800px;
            margin: 48px auto;
            background: #f1f5f9;
            border-radius: 16px;
            box-shadow: 0 4px 24px #e0e7ff;
            padding: 2.5rem 2.5rem 2rem 2.5rem;
        }
        .history-title {
            font-size: 2rem;
            font-weight: 700;
            color: #0369a1;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .order-history-list {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }
        .order-history-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px #e0e7ff;
            padding: 1.2rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-width: 250px;
        }
        .order-history-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .order-history-laundromat {
            font-size: 1.1rem;
            font-weight: 600;
            color: #0369a1;
        }
        .order-history-status {
            display: inline-block;
            background: #dbeafe;
            color: #2563eb;
            font-weight: 600;
            padding: 0.2rem 0.8rem;
            border-radius: 6px;
            font-size: 1rem;
            margin-bottom: 0.3rem;
        }
        .order-history-price {
            color: #0d9488;
            font-weight: 600;
            margin-top: 0.2rem;
        }
        .order-history-date {
            color: #64748b;
            font-size: 0.98rem;
            margin-top: 0.2rem;
        }
        .view-details-btn {
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 7px;
            padding: 0.5rem 1.3rem;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
            margin-left: 1.2rem;
        }
        .view-details-btn:hover {
            background: #1d4ed8;
        }
        .no-orders {
            color: #64748b;
            text-align: center;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="history-container">
        <div class="history-title">Order History</div>
        <div class="order-history-list">
            @forelse($orders as $order)
                <div class="order-history-card">
                    <div class="order-history-info">
                        <span class="order-history-laundromat">{{ $order->laundromat_name }}</span>
                        <span class="order-history-status">{{ ucfirst($order->order_status) }}</span>
                        <span class="order-history-price">Total: {{ $order->total_amount ?? $order->item_price }} BDT</span>
                        <span class="order-history-date">
                            {{ $order->created_at ? $order->created_at->format('d M Y, h:i A') : '-' }}
                        </span>
                    </div>
                    <a href="{{ route('orders.show', $order->order_id) }}" class="view-details-btn">View Details</a>
                </div>
            @empty
                <div class="no-orders">No orders found.</div>
            @endforelse
        </div>
    </div>
</body>
</html>