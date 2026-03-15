@extends('layouts.app') <!-- Assuming you have a layout file -->
@section('content')
<div class="content-page">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4>Manage User Feedback</h4>
                </div>

                @can('view feedback')
                <!-- Feedback List -->
                <div id="feedbackList" class="mt-3">
                    <div class="table-responsive mt-2">
                        <table id="datatable" class="table table-hover table-sm dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Full Name</th>
                                    <th>Message</th>
                                    <th>Replied</th>
                                    <th>Submitted On</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($feedbacks as $feedback)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $feedback->email }}</td>
                                        <td>{{ $feedback->fullname }}</td>
                                        <td>{{ Str::limit($feedback->message, 50) }}</td>
                                        <td>
                                            @if ($feedback->replied)
                                                <span class="badge bg-success">Yes</span>
                                            @else
                                                <span class="badge bg-danger">No</span>
                                            @endif
                                        </td>
                                        <td>{{ $feedback->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            @can('manage feedback')
                                            <div class="btn-group">
                                                <!-- Preview Button -->
                                                <button type="button" data-id="{{ $feedback->id }}"
                                                        class="btn btn-sm btn-primary preview_feedback"
                                                        data-bs-toggle="modal" data-bs-target="#feedbackModal">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <!-- Delete Button -->
                                                <button type="button" data-id="{{ $feedback->id }}"
                                                        class="btn btn-sm btn-danger del_feedback">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No feedback submitted</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @endcan
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <p><span class="text-primary">Note:</span> The send reply button will share the feedback and message in FAQ's section</p>
            </div>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<!-- Feedback Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedbackModalLabel">Feedback Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="replyFeedbackForm">
                <div class="modal-body">
                    <!-- Feedback Details (View Only) -->
                    <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                    <p><strong>Full Name:</strong> <span id="modalFullName"></span></p>
                    <p><strong>Message:</strong> <span id="modalMessage" class="border p-3 bg-light" style="overflow-y: auto; word-wrap: break-word;"></span></p>

                    <!-- Hidden Input for Feedback ID -->
                    <input type="hidden" id="feedback_id" name="feedback_id">

                    <!-- Reply Input (Summernote) -->
                    <div class="form-group mt-3">
                        <label for="replyContent">Reply</label>
                        <textarea id="replyContent" name="replyContent" class="form-control summernote" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- Submit Reply -->
                    <button type="submit" class="btn btn-primary">Send Reply</button>
                    <!-- Close Modal -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
$(document).ready(function () {
    // Set up CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });

    // Preview Feedback
    $('.preview_feedback').on('click', function () {
        const feedbackId = $(this).data('id');

        // Fetch feedback details via AJAX
        $.ajax({
            url: `/feedback/${feedbackId}`, // Update route as necessary
            type: 'GET',
            success: function (data) {
                // Populate modal with feedback details
                $('#feedback_id').val(feedbackId);
                $('#modalEmail').text(data.email);
                $('#modalFullName').text(data.fullname);
                $('#modalMessage').text(data.message);

                // Clear Summernote on modal open
                $('#replyContent').summernote('code', '');
            },
            error: function () {
                alert('Error fetching feedback details.');
            }
        });
    });

    // Share Feedback
    $('#replyFeedbackForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        let formData = {
            feedback_id: $('#feedback_id').val(),
            title: 'Reply to Feedback', // Default title for stored replies
            description: $('#replyContent').summernote('code'), // Get Summernote content
            _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
        };

        $.ajax({
            type: 'POST',
            url: '/store-feedback-reply', // Adjust route as needed
            data: formData,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: response.message || 'Reply sent successfully!',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: true,
                }).then(() => {
                    $('#feedbackModal').modal('hide'); // Close modal
                    location.reload(); // Refresh to update replies
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed to send reply!',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 5000
                });
            }
        });
    });
    // Delete Feedback
    $(document).on('click', '.del_feedback', function () {
        const feedbackId = $(this).data('id'); // Get feedback ID from button

        // Show SweetAlert confirmation dialog
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to undo this action!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading state
                Swal.fire({
                    title: "Deleting...",
                    text: "Please wait while we delete the feedback.",
                    icon: "info",
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Send AJAX request to delete the feedback
                $.ajax({
                    url: `/feedback/delete/${feedbackId}`, // Adjust route as needed
                    type: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: response.message || "Feedback deleted successfully!",
                            toast: true,
                            position: "top-right",
                            showConfirmButton: false,
                            timer: 3000
                        });

                        // Remove the corresponding row from the table
                        $(`button[data-id="${feedbackId}"]`).closest('tr').remove();
                    },
                    error: function () {
                        Swal.fire({
                            icon: "error",
                            title: "Error deleting feedback",
                            text: "Please try again.",
                            toast: true,
                            position: "top-right",
                            showConfirmButton: false,
                            timer: 5000
                        });
                    }
                });
            }
        });
    });

});

</script>
@endsection
