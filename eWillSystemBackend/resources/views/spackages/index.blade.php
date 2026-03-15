@extends('layouts.app')

@section('content')
<div>
    <div class="content-page">
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Manage Subscription Packages</h4>
                        @can('add packages')
                        <span class="mt-2">
                            <button data-target="#newPackageModal" data-toggle="modal"
                                class="btn btn-dark text-capitalize">Create New Package</button>
                        </span>
                        @endcan
                    </div>

                    <!-- Packages List -->
                    @can('view packages')
                    <div id="packagesList" class="mt-3">
                        <!-- Packages will be loaded here dynamically -->
                    </div>
                    @else
                    <div class="container mt-5 text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header bg-danger text-white">
                                        <h4>Access Denied</h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="lead">You do not have permission to access this page or perform this action.</p>
                                        <p>If you believe this is a mistake, please contact the system administrator.</p>
                                        <a href="{{ route('home') }}" class="btn btn-primary">Return to Home</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding New Package -->
    <div class="modal fade" id="newPackageModal">
        <div class="modal-dialog">
            @can('add packages')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Package</h5>
                    <button type="button" class="btn-secondary" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form action="{{ route('packages.store') }}" method="POST" id="createPackageForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Package Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price (UGX)</label><br>
                                <input class="form-control" type="number" name="price" id="price" value="" style="width: 100%; -moz-appearance: textfield; -webkit-appearance: none;" >
                        </div>


                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="storage_limit">Storage Limit in years</label><br>
                                <input class="form-control" type="number" name="storage_limit" id="storage_limit" value="" style="width: 100%; -moz-appearance: textfield; -webkit-appearance: none;" >
                        </div>

                        <div class="form-group">
                            <label for="support_level">Support Level</label><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="support_level" value="Basic" required>
                                <label class="form-check-label">Basic Support</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="support_level" value="Standard">
                                <label class="form-check-label">Standard Support</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="support_level" value="Premium">
                                <label class="form-check-label">Premium Support</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="consultation_included">Consultation Included</label><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="consultation_included" value="1" required>
                                <label class="form-check-label">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="consultation_included" value="0">
                                <label class="form-check-label">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Save</button>
                    </div>
                </form>
            </div>
            @endcan
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            loadPackages();

            $('#createPackageForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#createPackageForm')[0].reset(); // Reset the form

                        Swal.fire({
                            icon: 'success',
                            title: response.message || 'Created new package',
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: true,
                        }).then(() => {
                            loadPackages(); // Reload the packages
                            location.reload(); // Refresh the page
                            $('#newPackageModal').modal('hide'); // Hide the modal

                        });
                    },
                    error: function(xhr) {
                        const errorResponse = xhr.responseJSON || {};
                        Swal.fire({
                            icon: 'error',
                            title: errorResponse.message || 'Seems you added an existing package name.',
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 5000 // Auto-close after 5 seconds
                        });
                    }
                });
            });

            $('#deletePackageForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#deletePackage').modal('hide'); // Hide the modal
                        Swal.fire({
                            icon: 'success',
                            title: response.message || 'Package deleted successfully',
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: true,
                        }).then(() => {
                            loadPackages(); // Reload the packages
                            location.reload(); // Refresh the page
                        });
                    },
                    error: function(xhr) {
                        const errorResponse = xhr.responseJSON || {};
                        Swal.fire({
                            icon: 'error',
                            title: errorResponse.message || 'Failed to delete the package.',
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 5000 // Auto-close after 5 seconds
                        });
                    }
                });
            });
        });

        // Function to load packages dynamically
        function loadPackages() {
            $.get("{{ URL::to('/showpackages') }}", function (data) {
                $('#packagesList').html(data);
            }).done(function () {
                // Rebind click events after loading new data
                bindPackageEvents();
            });
        }

        // Function to rebind edit & delete event listeners
        function bindPackageEvents() {
            $('.edit_package').on('click', function () {
                $('#edit_id').val($(this).data('id'));
                $('#edit_name').val($(this).data('name'));
                $('#edit_price').val($(this).data('price'));
                $('#edit_storage_limit').val($(this).data('storage_limit'));
                $('#edit_description').val($(this).data('description'));

                $(`input[name="edit_support_level"][value="${$(this).data('support_level')}"]`).prop('checked', true);
                $(`input[name="edit_consultation_included"][value="${$(this).data('consultation_included')}"]`).prop('checked', true);

                $('#editPackage').modal('show');
            });

            $('.del_package').on('click', function () {
                $('#delete_id').val($(this).data('id'));
                $('#deletePackage').modal('show');
            });
        }
    </script>
@endsection
