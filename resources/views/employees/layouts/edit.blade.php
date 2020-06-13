@extends('employees.layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Update Employee</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('employees') }}"> Back</a>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('employees.update',$employee->id) }}" >
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="f_name">First Name:</label>
            <input type="text" class="form-control" id="f_name" placeholder="Enter Employee First Name" name="f_name" value="{{$employee->f_name}}">
        </div>
        <div class="form-group">
            <label for="l_name">Last Name:</label>
            <input type="text" class="form-control" id="l_name" placeholder="Enter Employee Last Name" name="l_name" value="{{$employee->l_name}}">
        </div>
        <div class="form-group">
            <label for="company">Company:</label>
            {{-- <input type="text" id="company" name="company" class="form-control" placeholder="Choose Employee Company" value="{{$employee->company}}"> --}}
            <select id="company" name="company">
                <option value="">Select Company</option>
                @foreach($companies as $company)
                    @if($company->id == $employee->company)
                        <option value="{{$company->id}}" selected>{{$company->name}}</option>
                    @else    
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{$employee->email}}">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="{{$employee->phone}}">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection