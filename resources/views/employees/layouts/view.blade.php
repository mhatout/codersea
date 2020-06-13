@extends('employees.layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2>Codersea Employee</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('employees') }}"> Back</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>First Name:</th>
            <td>{{ $employee->f_name }}</td>
        </tr>
        <tr>
            <th>Last Name:</th>
            <td>{{ $employee->l_name }}</td>
        </tr>
        <tr>
            <th>Company:</th>
            <td>{{ $company->name }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $employee->email }}</td>
        </tr>
        <tr>
            <th>phone:</th>
            <td>{{ $employee->phone }}</td>
        </tr>
    </table>
@endsection