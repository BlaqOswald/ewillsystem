<div class="table-responsive mt-2">
    <table id="datatable" class="table table-hover table-sm dt-responsive nowrap"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Option</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($options as $option)
                <tr class="col-md-2 col-6 mt-2">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Str::limit($option->category, 40) }}</td>
                    <td>{{ strip_tags(Str::limit($option->value, 70)) }}</td>
                    <td>
                        <div class="btn-group">
                            @can('manage options')
                            <button type="button" data-id="{{ $option->id }}"
                                data-category="{{ $option->category }}" data-value="{{ $option->value }}"
                                class="btn btn-sm btn-primary edit_option">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" data-id="{{ $option->id }}"
                                class="btn btn-danger btn-sm del_option">
                                <i class="fas fa-trash"></i>
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No options available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>



<!-- Edit Option Modal -->
@can('manage options')
<div class="modal fade" id="editOption" tabindex="-1" role="dialog" aria-labelledby="editOptionLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editOptionLabel">Edit Option</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit_id">
                <div class="form-group">
                    <label for="edit_category">Category</label>
                    <input type="text" class="form-control" id="edit_category">
                </div>
                <div class="form-group">
                    <label for="edit_value">Value</label>
                    <input type="text" class="form-control" id="edit_value">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="update_option">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Option Modal -->
<div class="modal fade" id="deleteOptionModal" tabindex="-1" role="dialog" aria-labelledby="deleteOptionLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteOptionLabel">Delete Option</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this option?</p>
                <input type="hidden" id="delete_option_id"> <!-- Hidden input for the option ID -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirm_delete_option">Delete</button>
            </div>
        </div>
    </div>
</div>
@endcan



<script>
    $(document).ready(function() {
        // Edit option functionality
        $('.edit_option').on('click', function() {
            var id = $(this).data('id');
            var category = $(this).data('category');
            var value = $(this).data('value');

            // Open the edit modal and set the values
            $('#editOption').modal('show');
            $('#edit_id').val(id);
            $('#edit_category').val(category);
            $('#edit_value').val(value);
        });

        // Update option functionality
        $('#update_option').on('click', function() {
            var id = $('#edit_id').val();
            var category = $('#edit_category').val();
            var value = $('#edit_value').val();

            $.ajax({
                url: '/edit_options', // Adjust the URL as needed
                type: 'POST',
                data: {
                    id: id,
                    category: category,
                    value: value,
                    _token: '{{ csrf_token() }}' // Include CSRF token for authentication
                },
                success: function(response) {
                    $('#editOption').modal('hide'); // Hide the modal
                    Swal.fire({
                        icon: 'success',
                        title: response.message || 'Option updated successfully',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: true,
                    }).then(() => {
                        location.reload(); // Reload to see the updated data
                    });
                },
                error: function(xhr) {
                    const errorResponse = xhr.responseJSON || {};
                    Swal.fire({
                        icon: 'error',
                        title: errorResponse.message || 'Failed to update the option.',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 5000 // Auto-close after 5 seconds
                    });
                }
            });
        });

        // Trigger delete modal with option ID
        $('.del_option').on('click', function() {
            const optionId = $(this).data('id'); // Get the option ID from the clicked button
            $('#delete_option_id').val(optionId); // Set the option ID in the hidden input of the modal
            $('#deleteOptionModal').modal('show'); // Show the delete confirmation modal
        });

        // Confirm delete action
        $('#confirm_delete_option').on('click', function() {
            const optionId = $('#delete_option_id').val(); // Get the option ID to delete
            $.ajax({
                url: `/options/${optionId}`, // RESTful URL pattern for delete
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}' // Include CSRF token for authentication
                },
                success: function(response) {
                    if (response.code === 200) {
                        $('#deleteOptionModal').modal('hide'); // Hide the modal on success
                        Swal.fire({
                            icon: 'success',
                            title: response.message || 'Option deleted successfully',
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: true,
                        }).then(() => {
                            location.reload(); // Reload to see the updated data
                        });
                    } else {
                        console.error('Failed to delete:', response.message);
                        Swal.fire({
                            icon: 'error',
                            title: response.message || 'Failed to delete the option.',
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 5000 // Auto-close after 5 seconds
                        });
                    }
                },
                error: function(xhr) {
                    console.error('Error occurred:', xhr.responseText); // Log error if request fails
                    Swal.fire({
                        icon: 'error',
                        title: 'An error occurred while deleting the option.',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 5000 // Auto-close after 5 seconds
                    });
                }
            });
        });
    });
</script>

<script src="../assets\js\pages\datatables.init.js"></script>
