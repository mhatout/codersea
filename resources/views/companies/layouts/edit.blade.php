@extends('companies.layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Update Company</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('companies') }}"> Back</a>
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
    <form method="post" action="{{ route('companies.update',$company->id) }}" >
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Company Name" name="name" value="{{$company->name}}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter Company Email" name="email" value="{{$company->email}}">
        </div>
        <div class="form-group">
            <label for="logo">Logo:</label>
            <input class="form-control" id="logo" name="logo" placeholder="Enter Logo" value="{{$company->logo}}"></input>
        </div>
        <div class="form-group">
            <label for="website">Logo:</label>
            <input class="form-control" id="website" name="website" placeholder="Enter Website" value="{{$company->website}}"></input>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection