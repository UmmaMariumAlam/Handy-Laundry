{{-- filepath: e:\xampp\htdocs\dashboard\470_laundry_project\resources\views\customer\edit.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f0f4f8 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .edit-container {
            max-width: 520px;
            margin: 60px auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(60,72,88,0.10);
            padding: 2.5rem 2.5rem 2rem 2.5rem;
        }
        .edit-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2563eb;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .form-group {
            margin-bottom: 1.3rem;
        }
        label {
            display: block;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 1rem;
            background: #f8fafc;
            color: #374151;
            transition: border 0.2s;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border: 1.5px solid #2563eb;
            outline: none;
            background: #fff;
        }
        .update-btn {
            background: #059669;
            color: #fff;
            padding: 0.7rem 2.2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1rem;
            border: none;
            transition: background 0.2s;
            cursor: pointer;
            margin-top: 0.5rem;
            display: block;
            width: 100%;
        }
        .update-btn:hover {
            background: #047857;
        }
        .back-link {
            display: inline-block;
            margin-top: 1.5rem;
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }
        .back-link:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }
        .error-message {
            color: #dc2626;
            background: #fee2e2;
            border: 1px solid #fecaca;
            padding: 0.7rem 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <div class="edit-title">Edit Profile</div>
        @if ($errors->any())
            <div class="error-message">
                <ul style="margin:0; padding-left:1.2rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('customer.update', ['customer' => $customer->customer_id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $customer->name) }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email (cannot edit)</label>
                <input type="email" id="email" name="email" value="{{ $customer->email }}" disabled>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="{{ old('address', $customer->address) }}" required>
            </div>
            <div class="form-group">
                <label for="password">New Password <span style="color:#64748b;font-weight:400;">(leave blank to keep current)</span></label>
                <input type="password" id="password" name="password" autocomplete="new-password" placeholder="New Password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password" placeholder="Confirm New Password">
            </div>
            <button type="submit" class="update-btn">Update Profile</button>
        </form>
        <a href="{{ route('customer.profile') }}" class="back-link">&larr; Back to Profile</a>
    </div>
</body>
</html>