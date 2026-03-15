@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reset Password</h1>
    <form id="resetPasswordForm" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="email" value="{{ old('email', $email ?? '') }}">
        <input type="password" name="password" required placeholder="New Password">
        <input type="password" name="password_confirmation" required placeholder="Confirm New Password">
        <button type="submit">Reset Password</button>
    </form>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#resetPasswordForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    alert(response.message);
                    window.location.href = response.redirect; // Redirect based on role
                },
                error: function (xhr) {
                    alert(xhr.responseJSON.message);
                }
            });
        });
    });
</script>
@endsection
