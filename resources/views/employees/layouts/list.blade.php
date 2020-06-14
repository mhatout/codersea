@extends('employees.layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2>Employees List</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ route('employees.create') }}">Create New Employee</a>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company</th>
            <th>Email</th>
            <th>Phone</th>
            <th width="280px">Action</th>
        </tr>
        @php
            $i = 0;
        @endphp
        @foreach ($employees as $employee)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $employee->f_name }}</td>
                <td>{{ $employee->l_name }}</td>
                <td>{{ $editedCompanies[$employee->company]->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>
                    <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('employees.show',$employee->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        {{ $employees->links() }}
    </table>
@endsection