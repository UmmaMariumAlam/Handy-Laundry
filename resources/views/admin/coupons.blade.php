<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Coupons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container { margin-top: 30px; }
        .btn-edit, .btn-delete { padding: 5px 10px; font-size: 0.9rem; }
        .btn-edit { background-color: #007bff; color: white; }
        .btn-edit:hover { background-color: #0056b3; }
        .btn-delete { background-color: #dc3545; color: white; }
        .btn-delete:hover { background-color: #c82333; }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="dashboard-header">Manage Coupons</h2>

    <!-- Coupon Table -->
    <div class="table-container">
        <h4>Existing Coupons</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Coupon Code</th>
                    <th>Expiry Date</th>
                    <th>Discount Rate</th>
                    <th>Min Order Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $coupon->code }}</td>
                        <td>{{ $coupon->expiry_date }}</td>
                        <td>{{ $coupon->discount_rate }}</td>
                        <td>{{ $coupon->min_order_price }}</td>
                        <td>
                            <form action="{{ route('admin.coupon.delete', $coupon->discount_id) }}" method="POST">
                                @csrf
                                @method('DELETE') <!-- This is to simulate the DELETE HTTP method -->
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add New Coupon Form -->
    <div class="mt-5">
        <h4>Add New Coupon</h4>
        <form action="{{ route('admin.coupon.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Coupon Code</label>
                <input type="text" class="form-control" id="code" name="code" required>
            </div>
            <div class="mb-3">
                <label for="expiry_date" class="form-label">Expiry Date</label>
                <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
            </div>
            <div class="mb-3">
                <label for="discount_rate" class="form-label">Discount Rate</label>
                <input type="number" step="0.01" class="form-control" id="discount_rate" name="discount_rate" required>
            </div>
            <div class="mb-3">
                <label for="min_order_price" class="form-label">Minimum Order Price</label>
                <input type="number" class="form-control" id="min_order_price" name="min_order_price" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Coupon</button>
        </form>
    </div>

    <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-danger mt-3">Logout</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
