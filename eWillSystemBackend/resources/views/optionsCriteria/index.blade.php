@extends('layouts.app')

@section('content')
    <div>
        <div class="content-page">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4>Manage Options Criterias</h4>
                            @can('add options')
                            <span class="mt-2">
                                <button data-target="#newOptionModal" data-toggle="modal"
                                    class="btn btn-dark text-capitalize">Add New Option</button>
                            </span>
                            @endcan
                        </div>

                        <!-- Options List -->
                        @can('view options')
                        <div id="optionsList" class="mt-3">
                            <!-- Options will be loaded here dynamically -->
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


        <!-- Modal for Adding New Option -->
        <div class="modal fade" id="newOptionModal">
            <div class="modal-dialog">
                @can('add options')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Option</h5>
                        <button type="button" class="btn-secondary" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <form action="{{ route('optionsCriteria.addoptions') }}" id="addOptionForm" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="category-select">Category</label>
                                <select id="category-select" class="form-control" name="category" required>
                                    <option value="Gender">Gender</option>
                                    <option value="marital_status">Marital Status</option>
                                    <option value="life_status">Life Status</option>
                                    <option value="marriage_type">Marriage Type</option>
                                    <option value="interest_type">Interest Type</option>
                                    <option value="house_type">House Type</option>
                                    <option value="vehicle_type">Vehicle Type</option>
                                    <option value="house_category">House Category</option>
                                    <option value="livestock_type">Livestock Type</option>
                                    <option value="vehicle_model">Vehicle Model</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="value">Option Value</label>
                                <input type="text" class="form-control" id="value" name="value" required>
                            </div>
                            <!-- <div class="form-group">
                                <label for="file">Upload File (Optional)</label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark " data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Save</button>
                        </div>
                    </form>
                </div>
                @endcan
            </div>
        </div>

        <!-- Modal for Deleting Option -->
        <div class="modal fade" id="deleteOptionModal">
            <div class="modal-dialog">
                 @can('manage options')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Delete Option</h5>
                        <button type="button" class="btn-secondary" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <form action="{{ URL::to('deleteOption') }}" id="deleteOptionForm">
                        @csrf
                        <input type="hidden" id="delete_option_id" name="id">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">OK</button>
                        </div>
                    </form>
                </div>
                @endcan
            </div>
        </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            loadOptions();

            $('#addOptionForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#addOptionForm')[0].reset(); // Reset the form
                        $('#newOptionModal').modal('hide'); // Hide the modal
                        Swal.fire({
                            icon: 'success',
                            title: response.message || 'Option added successfully',
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: true,
                        }).then(() => {
                            loadOptions(); // Reload to see the updated data
                        });
                    },
                    error: function(xhr) {
                        const errorResponse = xhr.responseJSON || {};
                        Swal.fire({
                            icon: 'error',
                            title: errorResponse.message || 'Failed to add the option.',
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 5000 // Auto-close after 5 seconds
                        });
                    }
                });
            });

            $('#deleteOptionForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#deleteOptionModal').modal('hide'); // Hide the modal
                        Swal.fire({
                            icon: 'success',
                            title: response.message || 'Option deleted successfully',
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: true,
                        }).then(() => {
                            loadOptions(); // Reload to see the updated data
                        });
                    },
                    error: function(xhr) {
                        const errorResponse = xhr.responseJSON || {};
                        Swal.fire({
                            icon: 'error',
                            title: errorResponse.message || 'Failed to delete the option.',
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 5000 // Auto-close after 5 seconds
                        });
                    }
                });
            });
        });

        function loadOptions() {
            $.get("{{ URL::to('/showoptions') }}", function(data) {
                $('#optionsList').html(data);
            });
        }

        // function deleteOption(id) {
        //     $('#delete_option_id').val(id);
        //     $('#deleteOptionModal').modal('show');
        // }


    </script>
@endsection
