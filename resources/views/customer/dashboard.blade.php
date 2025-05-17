{{-- filepath: e:\xampp\htdocs\dashboard\470_laundry_project\resources\views\customer\dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Dashboard</title>
    <style>
        body {
            background: #f8fafc;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .dashboard-wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 22%;
            min-width: 200px;
            background: #bae6fd;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 2.5rem 1.2rem 2.5rem 2.2rem;
            box-shadow: 2px 0 12px #e0e7ff;
        }
        .sidebar .nav-link {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 0.8rem 1.2rem;
            margin-bottom: 1.1rem;
            border-radius: 8px;
            color: #0369a1;
            font-weight: 600;
            text-decoration: none;
            font-size: 1.08rem;
            transition: background 0.2s, color 0.2s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: #38bdf8;
            color: #fff;
        }
        .sidebar .logout-link {
            margin-top: auto;
            color: #dc2626;
            background: #fff;
            border: 1px solid #dc2626;
        }
        .sidebar .logout-link:hover {
            background: #dc2626;
            color: #fff;
        }
        .main-content {
            flex: 1;
            background: #fff;
            padding: 2.5rem 3.5rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .welcome-section {
            margin-bottom: 2.2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #e0e7ef;
        }
        .welcome-title {
            font-size: 2.1rem;
            font-weight: 700;
            color: #0369a1;
            margin-bottom: 0.5rem;
        }
        .customer-info {
            font-size: 1.1rem;
            color: #334155;
            margin-bottom: 0.2rem;
        }
        .orders-section {
            margin-top: 1.5rem;
            background: #f1f5f9;
            border-radius: 14px;
            box-shadow: 0 2px 12px #e0e7ff;
            padding: 2rem 2.2rem;
        }
        .orders-header {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2563eb;
            margin-bottom: 1.2rem;
        }
        .order-list {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }
        .order-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px #e0e7ff;
            padding: 1.2rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-width: 250px;
        }
        .order-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .order-status {
            display: inline-block;
            background: #dbeafe;
            color: #2563eb;
            font-weight: 600;
            padding: 0.2rem 0.8rem;
            border-radius: 6px;
            font-size: 1rem;
            margin-bottom: 0.3rem;
        }
        .order-laundromat {
            font-size: 1.1rem;
            font-weight: 600;
            color: #0369a1;
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
        .success-message {
            color: #15803d;
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            padding: 10px 16px;
            border-radius: 6px;
            margin-bottom: 18px;
            display: inline-block;
        }
        @media (max-width: 900px) {
            .dashboard-wrapper { flex-direction: column; }
            .sidebar { width: 100%; flex-direction: row; padding: 1rem; }
            .main-content { padding: 1.2rem; }
        }
    </style>
</head>
<body>
    <div class="dashboard-wrapper">
        <div class="sidebar">
            <a href="{{ route('customer.dashboard') }}" class="nav-link{{ request()->routeIs('customer.dashboard') ? ' active' : '' }}">Home</a>
            <a href="{{ route('customer.profile') }}" class="nav-link{{ request()->routeIs('customer.profile') ? ' active' : '' }}">Profile Details</a>
            <a href="{{ route('orders.index') }}" class="nav-link{{ request()->routeIs('orders.index') ? ' active' : '' }}">Order History</a>
            <a href="{{ route('orders.create') }}" class="nav-link{{ request()->routeIs('orders.create') ? ' active' : '' }}">Order</a>
            <a href="{{ route('customer.logout') }}" class="nav-link logout-link">Logout</a>
        </div>
        <div class="main-content">
            @if(session('success'))
                <div id="status-message" class="success-message">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        var msg = document.getElementById('status-message');
                        if(msg) msg.style.display = 'none';
                    }, 3000);
                </script>
            @endif
            <div class="welcome-section">
                <div class="welcome-title">Welcome, {{ session('customer')->name ?? 'Customer' }}!</div>
                <div class="customer-info"><strong>Email:</strong> {{ session('customer')->email ?? '-' }}</div>
                <div class="customer-info"><strong>Phone:</strong> {{ session('customer')->phone ?? '-' }}</div>
                <div class="customer-info"><strong>Address:</strong> {{ session('customer')->address ?? '-' }}</div>
            </div>
            <div class="orders-section">
                <div class="orders-header">My Orders</div>
                <div class="order-list">
                    @forelse($orders as $order)
                        <div class="order-card">
                            <div class="order-info">
                                <span class="order-status">{{ ucfirst($order->order_status) }}</span>
                                <span class="order-laundromat">{{ $order->laundromat_name }}</span>
                            </div>
                            <a href="{{ route('orders.show', $order->order_id) }}" class="view-details-btn">View Details</a>
                        </div>
                    @empty
                        <p class="text-gray-500 text-left">No orders found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</body>
</html>