<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    
    <title>Handy Laundry</title>
    <style>
        :root {
            --primary-blue: #3498db;
            --dark-blue: #2980b9;
            --light-gray: #f5f7fa;
            --medium-gray: #e1e5eb;
            --dark-gray: #2c3e50;
            --white: #ffffff;
            --green: #2ecc71;
            --dark-green: #27ae60;
            --red: #e74c3c;
            --dark-red: #c0392b;
        }
        
        body {
            font-family: 'Montserrat', 'Arial', sans-serif;
            background-color: var(--light-gray);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--dark-gray);
            background-image: linear-gradient(135deg, #f5f7fa 0%, #e6f2ff 100%);
        }
        
        .welcome-container {
            text-align: center;
            background-color: var(--white);
            padding: 3rem;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 90%;
            border: 1px solid var(--medium-gray);
        }
        
        .logo {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
        }
        
        .tagline {
            font-size: 1.2rem;
            color: var(--dark-gray);
            margin-bottom: 3rem;
            opacity: 0.8;
        }
        
        .login-options {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            align-items: center;
        }
        
        .login-btn {
            display: inline-block;
            padding: 1rem 2rem;
            min-width: 250px;
            text-align: center;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        
        .admin-btn {
            background-color: var(--dark-gray);
            color: var(--white);
            border-color: var(--dark-gray);
        }
        
        .admin-btn:hover {
            background-color: var(--white);
            color: var(--dark-gray);
        }
        
        .customer-btn {
            background-color: var(--primary-blue);
            color: var(--white);
            border-color: var(--primary-blue);
        }
        
        .customer-btn:hover {
            background-color: var(--white);
            color: var(--primary-blue);
        }
        
        .laundromat-btn {
            background-color: var(--green);
            color: var(--white);
            border-color: var(--green);
        }
        
        .laundromat-btn:hover {
            background-color: var(--white);
            color: var(--green);
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: var(--medium-gray);
        }
        
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid var(--medium-gray);
        }
        
        .divider::before {
            margin-right: 1rem;
        }
        
        .divider::after {
            margin-left: 1rem;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="logo">Handy Laundry</div>
        <div class="tagline">Your laundry, delivered fresh and folded to perfection</div>
        
        <div class="login-options">
            <a href="{{ route('admin.login') }}" class="login-btn admin-btn">
                Admin Login
            </a>
            
            <div class="divider">or</div>
            
            <a href="{{ route('customer.login') }}" class="login-btn customer-btn">
                Customer Login
            </a>
            
            <div class="divider">or</div>
            
            <a href="{{ route('laundromat.login') }}" class="login-btn laundromat-btn">
                Laundromat Login
            </a>
        </div>
    </div>
</body>
</html>
