<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundromat Dashboard</title>
    <style>
        /* Global styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
            font-size: 2rem;
        }

        .dashboard-container {
            width: 60%;
            margin: 40px auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dashboard-container p {
            font-size: 1.1rem;
            color: #555;
            margin: 10px 0;
        }

        .dashboard-container p strong {
            color: #333;
        }

        /* Logout button */
        .logout-button {
            display: block;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 1.1rem;
            cursor: pointer;
            margin-top: 30px;
            text-align: center;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #45a049;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-container {
                width: 90%;
            }
            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <h2>Welcome, {{ Auth::user()->laundromat_name }}!</h2>

        <p><strong>Representative Name:</strong> {{ Auth::user()->representative_name }}</p>
        <p><strong>Business Email:</strong> {{ Auth::user()->business_email }}</p>
        <p><strong>Area:</strong> {{ Auth::user()->area }}</p>
        <p><strong>Operating Hours:</strong> {{ Auth::user()->operating_hours }}</p>
        <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
        <p><strong>Address:</strong> {{ Auth::user()->address }}</p>
        <p><strong>Price Per Item:</strong> {{ Auth::user()->price_per_item }}</p>
        <p><strong>Average Ratings:</strong> {{ Auth::user()->avg_ratings }}</p>

        <!-- Logout Button -->
        <form method="POST" action="{{ route('laundromat.logout') }}">
            @csrf
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>

</body>
</html>
