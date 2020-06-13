@extends('companies.layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Add New Company</h2>
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
    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Company Name" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter Company Email" name="email">
        </div>
        <div class="form-group">
            <label for="logo">Logo:</label>
            <input type="file" id="logo" name="logo" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" >
            {{-- <input type="image" class="form-control" id="logo" name="logo" placeholder="Enter Logo"></input> --}}
        </div>
        <div class="form-group">
            <label for="website">Website:</label>
            <input class="form-control" id="website" name="website" placeholder="Enter Website"></input>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection