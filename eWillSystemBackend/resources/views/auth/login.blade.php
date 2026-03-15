@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-4 col-lg-4 col-10">
                <div class="card mt-5">
                    <div class="card-header p-4" style="background-color: rgb(34, 43, 74);">
                        <h5 class="text-white text-center mb-0 mt-0">eWillSystem Admin</h5>
                    </div>
                    <div class="card-body pt-1">
                        <span class="d-flex justify-content-center">
                            <img src="assets/img/logo.png" height="50px">
                        </span>
                        <!-- Login Form -->
                        <form method="POST" action="{{ route('send-otp-mail') }}" id="loginForm">
                            @csrf
                            <label for="username" class="col-form-label text-md-end">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>

                            <button type="submit" class="btn btn-block my-3" style="color: #fff;background:rgb(34, 43, 74)">
                                {{ __('Login') }}
                            </button>
                            <!-- Forgot Password Link -->
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>

            <!-- OTP Modal -->
            <div class="col-md-4 col-lg-4 col-xl-4"
                style="border-radius:5px;box-shadow:0 0 10px #0b225f;background-image: url('assets/img/bana.jpg');background-size:cover;background-repeat:no-repeat;background-position:center">
            </div>
        </div>
    </div>

    <!-- OTP Verification Modal -->
    <div class="modal fade" id="verifyOtpModal" tabindex="-1" role="dialog" aria-labelledby="verifyOtpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="verifyOtpModalLabel">Verify OTP</h2>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="verifyOtpForm" method="POST" action="{{ route('verify-login-otp') }}">
                        @csrf
                        <div class="form-group">
                            <label for="otp">Enter OTP:</label>
                            <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter the OTP" required>
                        </div>
                        <button type="submit" class="btn btn-warning mt-3">Verify OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
<script>
$(document).ready(function () {
  // Handle login form submission
  $('#loginForm').on('submit', function (e) {
    e.preventDefault();

    // Change button text to "Processing"
    const loginButton = $(this).find('button[type="submit"]');
    const originalText = loginButton.text();
    loginButton.text('Processing...').prop('disabled', true);

    $.ajax({
      type: 'POST',
      url: '{{ route("send-otp-mail") }}',
      data: $(this).serialize(),
      success: function (response) {
        // Restore button text
        loginButton.text(originalText).prop('disabled', false);

        Swal.fire({
          icon: 'success',
          title: response.message || 'OTP sent to your email. Please verify.',
          toast: true,
          position: 'top-right',
          showConfirmButton: true,
        }).then(() => {
          $('#verifyOtpModal').modal('show'); // Show OTP modal
        });
      },
      error: function (xhr) {
        // Restore button text
        loginButton.text(originalText).prop('disabled', false);

        const errorResponse = xhr.responseJSON || {};
        Swal.fire({
          icon: 'error',
          title: errorResponse.message || 'Failed to send OTP. Please try again.',
          toast: true,
          position: 'top-right',
          showConfirmButton: true,
        });
      },
    });
  });

  // Handle OTP verification form submission
  $('#verifyOtpForm').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: '{{ route("verify-login-otp") }}',
      data: $(this).serialize(),
      success: function (response) {
        Swal.fire({
          icon: 'success',
          title: response.message,
          toast: true,
          position: 'top-right',
          showConfirmButton: false,
          timer: 3000,
        }).then(() => {
          window.location.href = response.redirect; // Redirect on success
        });
      },
      error: function (xhr) {
        const errorResponse = xhr.responseJSON || {};
        Swal.fire({
          icon: 'error',
          title: errorResponse.message || 'Invalid or expired OTP.',
          toast: true,
          position: 'top-right',
          showConfirmButton: true,
        });
      },
    });
  });
});
</script>
@endsection
