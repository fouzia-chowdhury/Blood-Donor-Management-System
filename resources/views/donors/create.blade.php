<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Donor</title>
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

        .form-box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .form-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ff416c;
        }

        .input-box {
            margin-bottom: 15px;
        }

        .input-box label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .input-box input, .input-box select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
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
            transition: 0.3s;
        }

        .btn:hover {
            background: #ff4b2b;
        }

        .error-list {
            color: red;
            font-size: 13px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="form-box">
        <h2>Register New Donor</h2>

        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/donors') }}" method="POST">
            @csrf <div class="input-box">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Enter donor name" required>
            </div>

            <div class="input-box">
                <label>Blood Group</label>
                <select name="blood_group" required>
                    <option value="">Select Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>

            <div class="input-box">
                <label>Phone Number</label>
                <input type="text" name="phone" placeholder="01XXX-XXXXXX" required>
            </div>

            <div class="input-box">
                <label>Address</label>
                <input type="text" name="address" placeholder="Enter city/area" required>
            </div>

            <button type="submit" class="btn">Add Donor</button>
        </form>
    </div>

</body>
</html>