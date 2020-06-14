@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <h1 style='text-align: center; padding-top: 150px; width: 150%;'>Welcome to CoderSea Laravel Task</h1>
                    </br>
                    <h3 style='text-align: center; padding-top: 50px; width: 150%;'>Speak Friend And Enter</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
