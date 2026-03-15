@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Change Password</h2>
    <form id="resetPasswordForm" action="{{ route('reset.password') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ Auth::user()->email }}">

        <!-- Current Password -->
        <div class="form-group">
            <label for="current_password">Current Password:</label>
            <div class="input-group">
                <input type="password" id="current_password" name="current_password" class="form-control" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-secondary toggle-password" data-target="#current_password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- New Password -->
        <div class="form-group">
            <label for="new_password">New Password:</label>
            <div class="input-group">
                <input type="password" id="new_password" name="new_password" class="form-control" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-secondary toggle-password" data-target="#new_password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <div class="input-group">
                <input type="password" id="confirm_password" name="new_password_confirmation" class="form-control" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-secondary toggle-password" data-target="#confirm_password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Password</button>
    </form>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        // Toggle Password Visibility
        $('.toggle-password').on('click', function () {
            const target = $(this).data('target');
            const input = $(target);
            const icon = $(this).find('i');

            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                input.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });

        // Handle Password Reset Form Submission
        $('#resetPasswordForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.message || 'Password updated successfully.',
                        timer: 2000,
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                    }).then(() => {
                        window.location.href = response.redirect;
                    });
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Password update failed.',
                        text: xhr.responseJSON?.message || 'Please try again.',
                    });
                },
            });
        });
    });
</script>
@endsection
