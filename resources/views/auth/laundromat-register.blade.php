<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundromat Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-top: 50px;
            color: #333;
        }
        form {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input.is-invalid {
            border-color: red;
        }
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-bottom: 15px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .form-footer {
            text-align: center;
            margin-top: 20px;
        }
        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h2>Laundromat Registration</h2>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('laundromat.register') }}" method="POST">
        @csrf

        <label for="laundromat_name">Laundromat Name:</label>
        <input type="text" id="laundromat_name" name="laundromat_name" value="{{ old('laundromat_name') }}" class="@error('laundromat_name') is-invalid @enderror" required>
        @error('laundromat_name')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="representative_name">Representative Name:</label>
        <input type="text" id="representative_name" name="representative_name" value="{{ old('representative_name') }}" class="@error('representative_name') is-invalid @enderror" required>
        @error('representative_name')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="business_email">Business Email:</label>
        <input type="email" id="business_email" name="business_email" value="{{ old('business_email') }}" class="@error('business_email') is-invalid @enderror" required>
        @error('business_email')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="area">Area (Optional):</label>
        <input type="text" id="area" name="area" value="{{ old('area') }}" class="@error('area') is-invalid @enderror">
        @error('area')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="price_per_item">Price Per Item :</label>
        <input type="number" id="price_per_item" name="price_per_item" value="{{ old('price_per_item') }}" class="@error('price_per_item') is-invalid @enderror">
        @error('price_per_item')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="avg_ratings">Average Ratings:</label>
        <input type="number" id="avg_ratings" name="avg_ratings" value="{{ old('avg_ratings') }}" step="any" class="@error('avg_ratings') is-invalid @enderror">
        @error('avg_ratings')
            <div class="error-message">{{ $message }}</div>
        @enderror
        
        <label for="operating_hours">Operating Hours:</label>
        <input type="text" id="operating_hours" name="operating_hours" value="{{ old('operating_hours') }}" class="@error('operating_hours') is-invalid @enderror">
        @error('operating_hours')
            <div class="error-message">{{ $message }}</div>
        @enderror
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror" required>
        @error('phone')
            <div class="error-message">{{ $message }}</div>
        @enderror
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ old('address') }}" class="@error('address') is-invalid @enderror" required>
        @error('address')
            <div class="error-message">{{ $message }}</div>
        @enderror


        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror" required>
        @error('password')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror" required>
        @error('password_confirmation')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <button type="submit">Register</button>
    </form>

    <div class="form-footer">
        <p>Already registered? <a href="{{ route('laundromat.login') }}">Login here</a></p>
    </div>

</body>
</html>
