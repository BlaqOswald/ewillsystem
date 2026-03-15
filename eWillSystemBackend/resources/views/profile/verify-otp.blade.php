<!-- resources/views/profile/verify-otp.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Verify OTP</h2>
    <form id="verifyOtpModal" action="{{ route('verify.otp') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="otp">OTP:</label>
            <input type="text" id="otp" name="otp" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Verify OTP</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    $('#verifyOtpModal').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                alert('OTP Verified. Proceeding to password reset.');
                window.location.href = response.redirect; // Redirect to password reset form
            },
            error: function(xhr) {
                alert(xhr.responseJSON.message || 'Invalid OTP. Please try again.');
            }
        });
    });
</script>
@endsection
