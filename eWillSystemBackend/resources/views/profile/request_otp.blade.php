<!-- resources/views/profile/request_otp.blade.php -->

<form id="requestOtpForm" action="{{ route('send-password-otp') }}" method="POST" tabindex="-1" role="dialog">
    @csrf
    <div style="padding:5px 4px; text-align:center; background:">
        <div>An OTP will be sent to the email: <strong>{{ Auth::user()->email }}</strong></div>
        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
        <button type="submit" class="btn btn-primary mt-3">Request OTP</button>
    </div>
</form>
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
                <form id="verifyOtpForm" method="POST" action="{{ route('verify-password-otp') }}">
                    @csrf
                    <input type="hidden" id="email" name="email" value="{{ Auth::user()->email }}">
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

@section('script')
    <script>
    $(document).ready(function () {
        // Toggle OTP Request Section
        $('#requestOtpBtn').on('click', function (e) {
            e.preventDefault();
            $('#otpRequestSection').toggle();
        });

        // OTP Request Form Submission
        $('#requestOtpForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.message || 'OTP sent successfully.',
                        timer: 3000,
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                    });
                    $('#verifyOtpModal').modal('show');
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to send OTP.',
                        text: xhr.responseJSON?.message || 'Try again.',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: true,
                    });
                },
            });
        });

        // Handle OTP verification
        $('#verifyOtpForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.message || 'OTP verified. Redirecting...',
                        timer: 2000,
                        toast: true,
                        position: 'top-right',
                    }).then(() => {
                        window.location.href = response.redirect;
                    });
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid OTP.',
                        text: xhr.responseJSON?.message || 'Please try again.',
                    });
                },
            });
        });
    });

    </script>
@endsection
