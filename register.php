
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #222;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .signup-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
            text-align: center;
        }

        .signup-container h2 {
            margin-bottom: 20px;
            color: #4a4a4a;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 20px;
            box-sizing: border-box;
        }

        .signup-btn {
            background: #4caf50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 20px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .login-link {
            margin-top: 20px;
            color: #4a4a4a;
        }

        .login-link a {
            color: #4caf50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Signup Form</h2>
        <form action="./backend/register.php" method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm" placeholder="Confirm Password" required>
            <button type="submit" class="signup-btn">Signup</button>
        </form>
        <div class="login-link">
            Already a member? <a href="index.php">Login now</a>
        </div>
    </div>
</body>
</html>
