<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <!-- Display success message if registration was successful -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Display validation errors -->
    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Registration Form -->
    <form method="POST" action="/register">
        @csrf
        
        <!-- Name Input -->
        <label for="name">Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required><br><br>

        <!-- Email Input -->
        <label for="email">Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <!-- Password Input -->
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br><br>

        <!-- Confirm Password Input -->
        <label for="password_confirmation">Confirm Password:</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="/login">Login here</a></p>
</body>
</html>
