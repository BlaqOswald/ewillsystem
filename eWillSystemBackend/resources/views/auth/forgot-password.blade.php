@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Forgot Password</h1>
    <form id="sendOtpForm" method="POST" action="{{ route('sendOtp') }}">
        @csrf
        <input type="email" name="email" required placeholder="Email Address">
        <button type="submit">Send OTP</button>
    </form>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#sendOtpForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    alert(response.message);
                    // Show OTP verification form here if needed
                },
                error: function(xhr) {
                    alert(xhr.responseJSON.message);
                }
            });
        });
    });
</script>
@endsection
