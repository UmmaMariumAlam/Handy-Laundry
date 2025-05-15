<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styling for table */
        .table-container {
            margin-top: 30px;
        }
        .btn-edit, .btn-delete {
            padding: 5px 10px;
            font-size: 0.9rem;
        }
        .btn-edit {
            background-color: #007bff;
            color: white;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2 class="dashboard-header">Admin Dashboard</h2>
        <h3>Welcome, {{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name : 'Guest' }}!</h3>

        <p>Here you can manage the application, view statistics, and more.</p>

        <!-- Users Table -->
        <div class="table-container">
            <h4>Users List</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th> <!-- Added Actions column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->created_at ? $user->created_at->format('d-m-Y') : 'N/A' }}
                            </td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-edit">Edit</a>

                              
                                <!-- Delete Button -->
                                <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Delete</button>
                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Logout</button>
        </form>
          <a href="{{route('admin.coupons')}}" style="display:inline" > Discount </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
