<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <h1>Employee</h1>
        <form action="/employee" method="POST" class="employee-form">
            @csrf

            <div class="form-group">
                <label for="first_name123">First Name:</label>
                <input type="text" id="first_name" name="first_name123">
            </div>

            <div class="form-group">
                <label for="last_name123">Last Name:</label>
                <input type="text" id="last_name" name="last_name123">
            </div>

            <div class="form-group">
                <label for="job123">Job:</label>
                <input type="text" id="job" name="job123">
            </div>

             <div class="form-group">
                <label for="phone_number123">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number123">
            </div>

            <div class="form-group">
                <label for="salary123">Salary:</label>
                <input type="text" id="salary" name="salary123">
            </div>

            <button type="submit" class="btn-submit">Save</button>

        </form>
        <hr>
        <table class="employee-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Job</th>
                    <th>Phone Number</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                        <td>{{ $item->job }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>{{ $item->salary }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>