    <!-- Packages Table -->
    <div class="table-responsive mt-2">
        <table id="datatable" class="table table-hover table-sm dt-responsive nowrap" style="width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name/Price</th>
                    <th>Description</th>
                    <th>Storage Limit (years)</th>
                    <th>Support Level</th>
                    <th>Consultation Included</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($packages as $package)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $package->name }}<br><p class="mb-0 text-primary">{{$package->price}}</p></td>
                        <td>{{ $package->description }}</td>
                        <td>{{ $package->storage_limit }}</td>
                        <td>{{ $package->support_level }}</td>
                        <td>{{ $package->consultation_included ? 'Yes' : 'No' }}</td>
                        <td>
                            <div class="btn-group">
                                @can('manage packages')
                                <button type="button" class="btn btn-sm btn-primary edit_package"

                                    data-id="{{ $package->id }}" data-name="{{ $package->name }}"
                                    data-price="{{ $package->price }}" data-description="{{ $package->description }}"
                                    data-storage_limit="{{ $package->storage_limit }}"
                                    data-support_level="{{ $package->support_level }}"
                                    data-consultation_included="{{ $package->consultation_included }}">
                                    Edit
                                </button>

                                <button type="button" class="btn btn-sm btn-danger del_package"
                                    data-id="{{ $package->id }}">
                                    Delete
                                </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No packages available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Edit Package Modal -->
    <div class="modal fade" id="editPackage" tabindex="-1" role="dialog" aria-labelledby="editPackageLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            @can('manage packages')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPackageLabel">Edit Package</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editPackageForm">
                    <div class="modal-body">
                        <input type="hidden" id="edit_id">
                        <div class="form-group">
                            <label for="edit_name">Name</label>
                            <input type="text" class="form-control" id="edit_name" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price (UGX)</label>
                            <input class="form-control" type="number" id="price" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_description">Description</label>
                            <textarea class="form-control" id="edit_description"></textarea>
                        </div>
                        <!-- Storage Limit -->
                        <div class="form-group">
                            <label>Storage Limit in years</label>
                            <div class="form-group">
                                <input class="form-control" type="number" id="edit_storage_limit" style="width: 100%; -moz-appearance: textfield; -webkit-appearance: none;">
                            </div>
                        </div>
                        <!-- Support Level -->
                        <div class="form-group">
                            <label>Support Level</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="edit_support_level" value="Basic">
                                <label class="form-check-label">Basic Support</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="edit_support_level" value="Standard">
                                <label class="form-check-label">Standard Support</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="edit_support_level" value="Premium">
                                <label class="form-check-label">Premium Support</label>
                            </div>
                        </div>
                        <!-- Consultation Included -->
                        <div class="form-group">
                            <label>Consultation Included</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="edit_consultation_included" value="1">
                                <label class="form-check-label">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="edit_consultation_included" value="0">
                                <label class="form-check-label">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            @endcan
        </div>
    </div>

    <!-- Delete Package Modal -->
    <div class="modal fade" id="deletePackage" tabindex="-1" role="dialog" aria-labelledby="deletePackageLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletePackageLabel">Delete Package</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete_id">
                    <p>Are you sure you want to delete this package?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete_package">Delete</button>
                </div>
            </div>
        </div>
    </div>



    <script>
    $(document).ready(function () {
        // Bind click event for editing packages dynamically
        $(document).on('click', '.edit_package', function () {
            $('#edit_id').val($(this).data('id'));
            $('#edit_name').val($(this).data('name'));
            $('#price').val($(this).data('price'));
            $('#edit_storage_limit').val($(this).data('storage_limit'));
            $('#edit_description').val($(this).data('description'));

            $(`input[name="edit_support_level"][value="${$(this).data('support_level')}"]`).prop('checked', true);
            $(`input[name="edit_consultation_included"][value="${$(this).data('consultation_included')}"]`).prop('checked', true);

            $('#editPackage').modal('show');
        });

        // Submit: Update Package
        $('#editPackageForm').on('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            let id = $('#edit_id').val();
            let data = {
                name: $('#edit_name').val(),
                price: $('#price').val(),
                description: $('#edit_description').val(),
                storage_limit: $('#edit_storage_limit').val(),
                support_level: $('input[name="edit_support_level"]:checked').val(),
                consultation_included: $('input[name="edit_consultation_included"]:checked').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            };

            $.ajax({
                type: 'PUT',
                url: `/packages/${id}`,
                data: data,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated package successfully!',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: true,
                    }).then(() => {
                        $('#editPackage').modal('hide');
                        location.reload();
                    });
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to update package!',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 5000
                    });
                }
            });
        });

        // Delete package
        $('#confirm_delete_package').on('click', function () {
            let packageId = $('#delete_id').val();

            $.ajax({
                url: `/packages/${packageId}`,
                type: 'POST',
                data: { _method: 'POST', _token: $('meta[name="csrf-token"]').attr('content') },
                success: function () {
                    $('#deletePackage').modal('hide');
                    location.reload();
                }
            });
        });
    });
</script>

    <script src="../assets/js/pages/datatables.init.js"></script>
</div>
