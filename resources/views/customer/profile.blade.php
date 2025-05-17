{{-- filepath: e:\xampp\htdocs\dashboard\470_laundry_project\resources\views\customer\profile.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <style>
        body { background: linear-gradient(135deg, #f0f4f8 0%, #e0e7ff 100%); min-height: 100vh; }
        .profile-container { 
            max-width: 500px; 
            margin: 60px auto; 
            background: #fff; 
            border-radius: 18px; 
            box-shadow: 0 6px 32px rgba(60,72,88,0.10); 
            padding: 2.5rem; 
            position: relative;
        }
        .profile-title { font-size: 2rem; font-weight: 700; color: #2563eb; margin-bottom: 1.5rem; text-align: center; }
        .profile-detail { margin-bottom: 1.2rem; font-size: 1.1rem; color: #374151; display: flex; justify-content: space-between; align-items: center; }
        .profile-label { font-weight: 600; color: #1e293b; }
        .profile-value { color: #374151; }
        .back-btn { 
            display: inline-block; 
            background: #2563eb; 
            color: #fff; 
            padding: 0.6rem 1.8rem; 
            border-radius: 8px; 
            font-weight: 600; 
            text-decoration: none; 
            margin-top: 2rem; 
            transition: background 0.2s; 
        }
        .back-btn:hover { background: #1d4ed8; }
        .edit-btn {
            position: absolute;
            right: 2.5rem;
            bottom: 2.5rem;
            background: #059669;
            color: #fff;
            padding: 0.6rem 1.8rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
            border: none;
        }
        .edit-btn:hover {
            background: #047857;
        }
        @media (max-width: 600px) {
            .profile-container { padding: 1.2rem; }
            .edit-btn, .back-btn { right: 1.2rem; bottom: 1.2rem; }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-title">My Profile</div>
        <div class="profile-detail">
            <span class="profile-label">Name:</span>
            <span class="profile-value">{{ $customer->name }}</span>
        </div>
        <div class="profile-detail">
            <span class="profile-label">Email:</span>
            <span class="profile-value">{{ $customer->email }}</span>
        </div>
        <div class="profile-detail">
            <span class="profile-label">Phone:</span>
            <span class="profile-value">{{ $customer->phone }}</span>
        </div>
        <div class="profile-detail">
            <span class="profile-label">Address:</span>
            <span class="profile-value">{{ $customer->address }}</span>
        </div>
        <a href="{{ route('customer.dashboard') }}" class="back-btn">Back to Dashboard</a>
        <a href="{{ route('customer.edit', ['customer' => $customer->customer_id]) }}" class="edit-btn">Edit Profile</a>
    </div>
</body>
</html>