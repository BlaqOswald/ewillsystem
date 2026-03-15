@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h4>Access Denied</h4>
                </div>
                <div class="card-body">
                    <p class="lead">You do not have permission to access this page or perform this action.</p>
                    <p>If you believe this is a mistake, please contact the system administrator.</p>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Go Back</a>
                    <a href="{{ route('home') }}" class="btn btn-primary">Return to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
