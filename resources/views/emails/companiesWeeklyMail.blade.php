<!DOCTYPE html>
<html>
<head>
    <title>New Employees</title>
</head>
<body>
    @foreach($employees as $employee)
        <h3>- {{ $employee->f_name }} {{ $employee->l_name }}</h3>
    @endforeach
    <p>Thank you</p>
</body>
</html>