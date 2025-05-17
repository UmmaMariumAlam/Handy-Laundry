{{-- filepath: resources/views/orders/show.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
    <style>
        body { background: linear-gradient(135deg, #f0f4f8 0%, #e0e7ff 100%); min-height: 100vh; }
        .details-container { max-width: 500px; margin: 60px auto; background: #fff; border-radius: 18px; box-shadow: 0 6px 32px rgba(60,72,88,0.10); padding: 2.5rem; }
        .details-title { font-size: 2rem; font-weight: 700; color: #2563eb; margin-bottom: 1.5rem; text-align: center; }
        .detail-row { margin-bottom: 1.2rem; font-size: 1.1rem; color: #374151; display: flex; justify-content: space-between; }
        .detail-label { font-weight: 600; color: #1e293b; }
        .detail-value { color: #374151; }
        .back-btn { display: inline-block; background: #2563eb; color: #fff; padding: 0.6rem 1.8rem; border-radius: 8px; font-weight: 600; text-decoration: none; margin-top: 2rem; transition: background 0.2s; }
        .back-btn:hover { background: #1d4ed8; }
    </style>
</head>
<body>
    <div class="details-container">
        <div class="details-title">Order Details</div>
        <div class="detail-row"><span class="detail-label">Order ID:</span> <span class="detail-value">{{ $order->order_id }}</span></div>
        <div class="detail-row"><span class="detail-label">Laundromat:</span> <span class="detail-value">{{ $order->laundromat_name }}</span></div>
        <div class="detail-row"><span class="detail-label">Status:</span> <span class="detail-value">{{ ucfirst($order->order_status) }}</span></div>
        <div class="detail-row"><span class="detail-label">Service Type:</span> <span class="detail-value">{{ ucfirst(str_replace('_', ' ', $order->service_type)) }}</span></div>
        <div class="detail-row"><span class="detail-label">Cloth Type:</span> <span class="detail-value">{{ ucfirst(str_replace('_', ' ', $order->cloth_type)) }}</span></div>
        <div class="detail-row"><span class="detail-label">Quantity:</span> <span class="detail-value">{{ $order->cloth_qty }}</span></div>
        <div class="detail-row"><span class="detail-label">Pickup Method:</span> <span class="detail-value">{{ ucfirst(str_replace('_', ' ', $order->pickup_method)) }}</span></div>
        <div class="detail-row"><span class="detail-label">Special Instructions:</span> <span class="detail-value">{{ $order->special_instructions ?? '-' }}</span></div>
        <div class="detail-row"><span class="detail-label">Total Amount:</span> <span class="detail-value">{{ $order->total_amount }} BDT</span></div>
        <div class="detail-row"><span class="detail-label">Order Date:</span> <span class="detail-value">{{ $order->created_at->format('d M Y, h:i A') }}</span></div>
        <a href="{{ route('customer.dashboard') }}" class="back-btn">&larr; Back to Dashboard</a>
    </div>
</body>
</html>