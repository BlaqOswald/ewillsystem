<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name')}}</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css')}}">

</head>
<body style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">

    <!-- Include SweetAlert Component -->
    @include('components.alert')
    @yield('content')
</body>
    <script src="{{ asset('assets/js/app.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script> <!-- Your custom script -->
    <script src="{{ asset('assets/js/vendor.min.js')}}"></script>

    @yield('script')
</html>
