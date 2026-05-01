<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #d68f9f;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 20px; 
        }

        .input-box {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-box label {
            font-size: 14px;
        }

        .input-box input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background: #ff416c;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background: #ff4b2b;
        }

        .footer-text {
            margin-top: 15px;
            font-size: 13px;
        }

        .footer-text a {
            color: #ff416c;
            text-decoration: none;
        }

    </style>
</head>

<body>

    <div class="login-box">
        <h2>Blood Donor Login</h2>

        <form method="POST" action="/login">
            @csrf

            <div class="input-box">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="footer-text">
                Don't have an account? <a href="#">Register</a>
            </div>
        </form>
    </div>

</body>
</html>  