@extends('employees.layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Add New Employee</h2>
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
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="f_name">First Name:</label>
            <input type="text" class="form-control" id="f_name" placeholder="Enter Employee First Name" name="f_name">
        </div>
        <div class="form-group">
            <label for="l_name">Last Name:</label>
            <input type="text" class="form-control" id="l_name" placeholder="Enter Employee Last Name" name="l_name">
        </div>
        <div class="form-group">
            <label for="company">Company:</label>
            {{-- <input type="text" id="company" name="company" class="form-control" placeholder="Choose Employee Company"> --}}
            <select id="company" name="company">
                <option value="">Select Company</option>
                @foreach($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address"></input>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number"></input>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection