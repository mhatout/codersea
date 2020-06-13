@extends('companies.layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2>Codersea Company</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('companies') }}"> Back</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Company Name:</th>
            <td>{{ $company->name }}</td>
        </tr>
        <tr>
            <th>Company Email:</th>
            <td>{{ $company->email }}</td>
        </tr>
        <tr>
            <th>Logo:</th>
            <td>{{ $company->logo }}</td>
        </tr>
        <tr>
            <th>Website:</th>
            <td>{{ $company->website }}</td>
        </tr>
 
    </table>
@endsection