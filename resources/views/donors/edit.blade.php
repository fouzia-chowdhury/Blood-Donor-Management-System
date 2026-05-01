<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donor Information</title>
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
    </style>
</head>
<body>

    <div class="form-box">
        <h2>Update Donor Info</h2>

        <form action="{{ url('/donors/'.$donor->id) }}" method="POST">
            @csrf
            @method('PUT') <div class="input-box">
                <label>Full Name</label>
                <input type="text" name="name" value="{{ $donor->name }}" required>
            </div>

            <div class="input-box">
                <label>Blood Group</label>
                <select name="blood_group" required>
                    <option value="A+" {{ $donor->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{ $donor->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{ $donor->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{ $donor->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="O+" {{ $donor->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{ $donor->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                    <option value="AB+" {{ $donor->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{ $donor->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                </select>
            </div>

            <div class="input-box">
                <label>Phone Number</label>
                <input type="text" name="phone" value="{{ $donor->phone }}" required>
            </div>

            <div class="input-box">
                <label>Address</label>
                <input type="text" name="address" value="{{ $donor->address }}" required>
            </div>

            <button type="submit" class="btn">Update Information</button>
            <br><br>
            <a href="{{ url('/donors') }}" style="display:block; text-align:center; color:#555; text-decoration:none;">Cancel</a>
        </form>
    </div>

</body>
</html>