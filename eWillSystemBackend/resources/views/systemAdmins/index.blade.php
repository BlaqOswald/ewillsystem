@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            @can('view system administrators details')
            <div class="card mt-5">
                <div class="card-body">
                    <div class="d-flex gap-4 justify-content-between">
                        <h4>system Administrators</h4>
                        <!-- add user Button -->
                        <button type="button"
                            class="btn btn-sm btn-primary add_user_button"
                            data-toggle="modal">
                            Add Admin
                        </button>
                    </div>
                    <!-- for usersWithRolesAndPermissions details -->
                    <div class="table-responsive mt-2">
                        <table id="datatable" class="table table-hover table-sm dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th hidden>ID</th>
                                    <th>Name</th>
                                    <th>Username/NIN</th>
                                    <th>Role</th>
                                    <th>Gender/D.O.B</th>
                                    <th>Current Address/Contact</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($usersWithRolesAndPermissions as $user)
                                    <tr style="width:fit-content; align-items:center;">
                                        <td>{{ $loop->iteration }}</td>
                                        <td hidden>{{ $user->user_id }}</td>
                                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                        <td>{{ $user->username }}<p class="mb-0 text-primary">{{ $user->nin }}</p></td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        </td>
                                        <td >{{ $user->gender }}<p class="mb-0 text-primary">{{ $user->date_of_birth }}</p></td>
                                        <td>{{ $user->current_address }}<p class="mb-0 text-primary">{{ $user->contact }}</p></td>
                                        <!-- <td style="display:flex; justify-content: space-between; gap:5px"> -->
                                        <td>
                                            <div class="btn-group">
                                                @can('manage system administrators details')
                                                    <button type="button"
                                                        data-user="{{ json_encode([
                                                            'id' => $user->id ?? 0,
                                                            'first_name' => $user->first_name ?? 'N/A',
                                                            'username' => $user->username ?? 'N/A',
                                                            'last_name' => $user->last_name ?? 'N/A',
                                                            'date_of_birth' => $user->date_of_birth ?? 'N/A',
                                                            'contact' => $user->contact ?? 'N/A',
                                                            'nin' => $user->nin ?? 'N/A',
                                                            'current_address' => $user->current_address ?? 'N/A',
                                                        ]) }}"
                                                        class="btn btn-sm btn-primary view_details_button" style="height:100%">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center text-muted">
                                            <strong>No administrators found.</strong>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
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
                                <p>If you believe this is a mistake, please contact the system useristrator.</p>
                                <a href="{{ route('home') }}" class="btn btn-primary">Return to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </div>
    @can('manage system administrators details')
    <!--add an user -->
    <div class="modal fade" id="registerAdminModal" tabindex="-1" aria-labelledby="registerAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register New Administrator</h5>
                    <button type="button" class="btn-secondary" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>

                <form id="userRegisterForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="d-flex gap-4">
                            <!-- First Name -->
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="firstNameInput" name="first_name" value="" required>
                            </div>

                            <!-- Last Name -->
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="lastNameInput" name="last_name" value="" required>
                            </div>
                        </div>

                        <div class="d-flex gap-4">
                            <!-- User Name -->
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control" id="UserNameInput" name="username" value="" required>
                            </div>

                            <!-- Contact -->
                            <div class="form-group">
                                <label>Contact</label>
                                <input type="text" class="form-control" id="contactInput" name="contact" value="" required>
                            </div>
                        </div>

                        <div class="d-flex gap-4">
                            <!-- Email -->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="emailInput" name="email" value="" required>
                            </div>

                            <!-- NIN -->
                            <div class="form-group">
                                <label>NIN</label>
                                <input type="text" class="form-control" id="ninInput" name="nin" value="">
                            </div>
                        </div>

                        <div class="d-flex gap-4">
                            <!-- Current Address -->
                            <div class="form-group">
                                <label>Current Address</label>
                                <input type="text" class="form-control" id="addressInput" name="current_address" value="">
                            </div>

                            <!-- Original Address -->
                            <div class="form-group">
                                <label>Original Address</label>
                                <input type="text" class="form-control" id="originalAddressInput" name="original_address" value="">
                            </div>
                        </div>

                        <div class="d-flex gap-4">
                            <!-- Gender -->
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" id="genderInput" name="gender" required>
                                    <option value="">-- Select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <!-- Marital Status -->
                            <div class="form-group">
                                <label>Marital Status</label>
                                <select class="form-control" id="maritalStatusInput" name="marital_status" required>
                                    <option value="">-- Select Status --</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role">Select Role:</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">None</option> <!-- Optional unassigned -->
                                    @foreach ($allRoles as $role)
                                        <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="registerAdminButton" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- edit User Details Modal -->
    <div class="modal fade" id="userDetailsModal" tabindex="-1" role="dialog" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userDetailsModalLabel">Edit Admin Details</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Form for Editing Admin Details -->
                    <form id="userEditForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden"  id="userId" name="id">

                        <div class="d-flex gap-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="firstNameInput" name="first_name"  required>
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="lastNameInput" name="last_name"  required>
                            </div>
                        </div>

                        <div class="d-flex gap-4">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control" id="userNameInput" name="username"  required>
                            </div>

                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" id="dobInput" name="date_of_birth"  required>
                            </div>
                        </div>

                        <div class="d-flex gap-4">
                            <div class="form-group">
                                <label>Contact</label>
                                <input type="text" class="form-control" id="contactInput" name="contact"  required>
                            </div>

                            <div class="form-group">
                                <label>NIN</label>
                                <input type="text" class="form-control" id="ninInput" name="nin" >
                            </div>

                            <div class="form-group">
                                <label>Current Address</label>
                                <input type="text" class="form-control" id="addressInput" name="current_address" >
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="uploadUserChanges" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endcan
@endsection

@section('script')
<script>
//for usersWithRolesAndPermissions data edit
$(document).ready(function () {
    // Utility function for SweetAlert notifications
    function showAlert(type, message) {
        Swal.fire({
            icon: type, // success, error, warning, info
            title: message,
            toast: true,
            position: 'top-right',
            timer: 3000,
            showConfirmButton: false,
        });
    }
    // Open Add User Modal and Clear Fields
    $('.add_user_button').on('click', function () {
        const modal = $('#registerAdminModal');
        if (modal.length > 0) {
            // Reset form fields to empty before showing modal
            $('#userRegisterForm')[0].reset();
            modal.modal('show');
        } else {
            console.error('Modal #registerAdminModal not found.');
        }
    });
    $("#userRegisterForm").on("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        let email = $("#emailInput").val();

        //Step 1: Check if Email Exists
        $.ajax({
            type: "POST",
            url: "/check-email",
            data: {
              email: email,
              _token: $('meta[name="csrf-token"]').attr('content') //  Include CSRF Token
            },
            success: function (response) {
                if (response.exists) {
                    Swal.fire({
                        icon: "error",
                        title: "Email Already Registered",
                        text: "The email is already in use. Please use another email.",
                        showConfirmButton: true
                    });
                } else {
                    //Step 2: Proceed with Registration
                    registerAdmin(formData);
                }
            },
            error: function () {
                Swal.fire({
                    icon: "error",
                    title: "Error Checking Email",
                    text: "An error occurred while checking the email. Please try again.",
                    showConfirmButton: true
                });
            }
        });
    });

    function registerAdmin(formData) {
        for (let [key, value] of formData.entries()) {
            console.log(key, value); // Log each key-value pair
        }

        $.ajax({
            type: "POST",
            url: "/register-admin",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Registration Successful",
                    text: `Admin Email: ${response.email}\nTemporary Password: ${response.default_password}`,
                    showConfirmButton: true
                }).then(() => {
                    $("#registerAdminModal").modal("hide"); // Close modal
                    $("#userRegisterForm")[0].reset(); // Reset form fields
                    location.reload(); // Refresh the page
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Registration Failed",
                    text: xhr.responseJSON.message || "Please check your inputs and try again.",
                    showConfirmButton: true
                });
            }
        });
    }

    // Handle Opening Edit Modal & Populating User Details
    $('.view_details_button').on('click', function () {
        // Parse the data-user attribute
        const userData = JSON.parse($(this).attr('data-user'));

        // Populate form fields in the modal
        $('#userId').val(userData.id);
        $('#firstNameInput').val(userData.first_name);
        $('#lastNameInput').val(userData.last_name);
        $('#userNameInput').val(userData.username);
        $('#dobInput').val(userData.date_of_birth);
        $('#contactInput').val(userData.contact);
        $('#ninInput').val(userData.nin);
        $('#addressInput').val(userData.current_address);

        // Show the edit modal
        $('#userDetailsModal').modal('show');
    });


    // Handle form submission
    $('#userEditForm').on('submit', function (e) {
        e.preventDefault();

        var id = $('#userId').val();
        var url = `/update_admin/${id}`;
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: response.message || 'User updated successfully!',
                    toast: true,
                    position: 'top-right',
                    timer: 3000
                }).then(() => {
                    $('#userDetailsModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    location.reload();
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: xhr.responseJSON?.message || 'Failed to update user!',
                    toast: true,
                    position: 'top-right',
                });
            }
        });
    });

});
</script>
@endsection
