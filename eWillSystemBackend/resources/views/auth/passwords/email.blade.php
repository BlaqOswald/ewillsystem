@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Forgot Password</h1>
    <form id="forgotPasswordForm">
        @csrf
        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" required autofocus>
            <span class="invalid-feedback" role="alert" style="display: none;"></span>
        </div>
        <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
    </form>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#forgotPasswordForm').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        const emailInput = form.find('#email');
        const feedback = form.find('.invalid-feedback');

        $.ajax({
            type: 'POST',
            url: '{{ route('password.email') }}',
            data: form.serialize(),
            success: function(response) {
                alert(response.message || 'Password reset link sent!');
                emailInput.removeClass('is-invalid');
                feedback.hide();
            },
            error: function(xhr) {
                const errors = xhr.responseJSON.errors;
                if (errors && errors.email) {
                    emailInput.addClass('is-invalid');
                    feedback.text(errors.email[0]).show();
                }
            }
        });
    });
});
</script>
@endsection
