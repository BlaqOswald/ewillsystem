@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="content">
        <div class="card">
            <div class="card-body">
                @can('view business details')
                <div class="d-flex justify-content-between">
                    <h4>Business Details</h4>
                    @can('manage business details')
                    @foreach ($details as $detail)
                    <span class="mt-2">
                        <button type="button" class="btn btn-primary edit_detail"
                            data-id="{{ $detail->id }}"
                            data-name="{{ $detail->name }}"
                            data-email="{{ $detail->email }}"
                            data-website="{{ $detail->website }}"
                            data-contact="{{ $detail->contact }}"
                            data-address="{{ $detail->address }}">
                            <i class="fas fa-edit"></i>
                        </button>
                    </span>
                    @endforeach
                    @endcan
                </div>


                <div id="businessList">
                    @foreach ($details as $detail)
                    <table class="table table-borderless">
                        <tbody>
                            <tr><th>Business Name:</th><td>{{ $detail->name }}</td></tr>
                            <tr><th>Email:</th><td>{{ $detail->email }}</td></tr>
                            <tr><th>Website:</th><td>{{ $detail->website ?? 'No website' }}</td></tr>
                            <tr><th>Contact:</th><td>{{ $detail->contact }}</td></tr>
                            <tr><th>Address:</th><td>{{ $detail->address ?? 'No address' }}</td></tr>
                        </tbody>
                    </table>
                    @endforeach
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

<!-- Edit Business Modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Business</h5>
                <button type="button" class="close" data-bs-dismiss="modal">×</button>
            </div>

            <form id="editForm">
                @csrf
                <input type="hidden" id="businessId" name="id" value="">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Business Name</label>
                        <input type="text" class="form-control" id="businessNameInput" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="emailInput" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" class="form-control" id="websiteInput" name="website">
                    </div>
                    <div class="form-group">
                        <label>Contact</label>
                        <input type="text" class="form-control" id="contactInput" name="contact" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" id="addressInput" name="address">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection





@section('script')

<script src="../assets\js\pages\datatables.init.js"></script>
<script>
$(document).ready(function () {
    // ✅ Open Edit Modal & Populate Data
    $('.edit_detail').on('click', function () {
        let businessData = $(this).data();
        $('#businessId').val(businessData.id);
        $('#businessNameInput').val(businessData.name);
        $('#emailInput').val(businessData.email);
        $('#websiteInput').val(businessData.website);
        $('#contactInput').val(businessData.contact);
        $('#addressInput').val(businessData.address);

        $('#editModal').modal('show');
    });

    // ✅ Handle Business Edit Form Submission
    $('#editForm').on('submit', function (e) {
        e.preventDefault();

        let formData = $(this).serialize();
        let url = `/business/${$('#businessId').val()}`;

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: response.message || 'Business updated successfully!',
                    toast: true,
                    position: 'top-right',
                    timer: 3000
                }).then(() => {
                    $('#editModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    location.reload();
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: xhr.responseJSON?.message || 'Failed to update business!',
                    toast: true,
                    position: 'top-right'
                });
            }
        });
    });
});

</script>

@endsection
