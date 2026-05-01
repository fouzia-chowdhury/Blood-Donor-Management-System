<!DOCTYPE html>
<html>
<head>
    <title>Donor List</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        .container { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #ff416c; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #ff416c; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .add-btn { text-decoration: none; background: #28a745; color: white; padding: 10px 15px; border-radius: 5px; display: inline-block; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="container">
    <h2>All Blood Donors</h2>
    <a href="{{ url('/donors/create') }}" class="add-btn">+ Add New Donor</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Blood Group</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th> </tr>
        </thead>
        <tbody>
            @foreach($donors as $donor)
            <tr>
                <td>{{ $donor->id }}</td>
                <td>{{ $donor->name }}</td>
                <td>{{ $donor->blood_group }}</td>
                <td>{{ $donor->phone }}</td>
                <td>{{ $donor->address }}</td>
                
                <td>
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ url('/donors/'.$donor->id.'/edit') }}" style="color: blue; text-decoration: none;">Edit</a>
                        
                        <form action="{{ url('/donors/'.$donor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this donor?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red; border: none; background: none; cursor: pointer; padding: 0;">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
