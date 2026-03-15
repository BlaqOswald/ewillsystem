@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="card">
                @can('view roles')

                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <h4>Manage Roles</h4>
                        <span >
                            @can('manage role model')
                            <button id="showAddRoleForm" class="btn btn-primary">Add New Role</button>
                            @endcan
                            @can('assign roles')
                            <button id="showAssignRoleForm" class="btn btn-primary" >Assign a Role to User</button>
                            @endcan
                        </span>
                    </div>
                    <!-- Success/Error message display -->
                    <div id="alertMessage" style="display:none;" class="alert mt-3"></div>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <!-- Assign Role to User Form (Hidden initially) -->
                    <div id="assignRoleForm" class="mb-3" style="display: none;">
                        <form id="assignRoleFormAjax">
                            @csrf
                            <div class="form-group">
                                <label for="user">Select User:</label>
                                <select name="user_id" id="user" class="form-control">
                                    <option value="">Search and select a user</option>
                                    @foreach ($users as $user)
                                        @if ($user->user_type == 1)
                                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role">Select Role:</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">None</option> <!-- Optional unassigned -->
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" >Assign Role</button>
                        </form>
                    </div>


                    <!-- Add Role Form -->
                    <div id="addRoleForm" class="mb-3 d-none">
                        <form id="addRoleFormAjax">
                            @csrf
                            <div class="form-group">
                                <label>Role Name:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Role</button>
                            <!-- <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button> -->
                        </form>
                    </div>

                    <!-- Display Users Grouped by Roles -->
                    <div>
                        <label for="roleDropdown">Auto Scroll to Role</label>
                        <select id="roleDropdown" class="form-control me-2" onchange="searchRoleByDropdown()">
                            <option value="">-- Select a Role --</option>
                            @foreach ($roles as $role)
                                <option value="heading{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="accordion mt-4" id="dataAccordion">
                        @foreach ($roles as $role)
                            <div class="card">
                                <div class="card-header" id="heading{{ $role->id }}">
                                    <h3 class="mb-0 d-flex justify-content-between">
                                        <button class="btn btn-link collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapse{{ $role->id }}"
                                                aria-expanded="false" aria-controls="collapse{{ $role->id }}">
                                            {{ ucfirst($role->name) }} role
                                        </button>
                                        <div class="btn-group">
                                            <button type="button" data-id="{{ $role->id }}"
                                                    data-name="{{ $role->name }}"
                                                    class="btn btn-sm btn-primary edit_role">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" data-id="{{ $role->id }}"
                                                    class="btn btn-danger btn-sm delete_role">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </h3>
                                </div>
                                <div id="collapse{{ $role->id }}" class="collapse" aria-labelledby="heading{{ $role->id }}" data-parent="#dataAccordion">
                                    <div class="card-body">
                                        @can('view users role')
                                            @if ($role->users->isEmpty())
                                                <div class="text-center">
                                                    <p>No users to display</p>
                                                </div>
                                            @else
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>UserName</th>
                                                                <th>Contact</th>
                                                                <th>Email</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($role->users as $user)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $user->username }}</td>
                                                                    <td>{{ $user->contact }}</td>
                                                                    <td>{{ $user->email }}</td>
                                                                    <td>
                                                                        <button data-id="{{ $user->id }}"
                                                                                data-name="{{ $user->name }}"
                                                                                class="btn btn-primary btn-sm edit_user_role">
                                                                            Edit Role
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        @endforeach
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

    <!-- Edit user Role Modal -->
    <div class="modal fade" id="editUserRoleModal">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
                </div>
                <form id="editUserRoleFormAjax">
                    @csrf
                    <input type="hidden" id="edit_user_id" name="user_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>User</label>
                            <input type="text" id="edit_user_name" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Assign Role</label>
                            <select name="role" id="edit_role" class="form-control">
                                <option value="">None</option>
                                @foreach ($allRoles as $role)
                                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Role</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Edit Role Modal -->
    <div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoleModalLabel">Edit Role</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editRoleFormAjax">
                        @csrf
                        <input type="hidden" id="edit_role_id" name="role_id">
                        <label for="edit_role_name">Role Name</label>
                        <input type="text" id="edit_role_name" name="role_name" class="form-control" required>
                        <button type="submit" class="btn btn-primary mt-2">Save Changes</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Delete Role Modal -->
    <div class="modal fade" id="deleteRoleModal" tabindex="-1" role="dialog" aria-labelledby="deleteRoleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteRoleModalLabel">Delete Role</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this role?</p>
                    <form id="deleteRoleFormAjax">
                        @csrf
                        <input type="hidden" id="delete_role_id" name="role_id">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
    function searchRoleByDropdown() {
        let selectedRole = document.getElementById("roleDropdown").value;

        if (selectedRole) {
            // Collapse all sections first
            document.querySelectorAll(".collapse").forEach(section => {
                section.classList.remove("show");
            });

            // Expand the selected role section
            let roleSection = document.getElementById(selectedRole).nextElementSibling; // Get the collapse div
            if (roleSection) {
                roleSection.classList.add("show");

                // Smooth Scrolling
                let elementPosition = roleSection.getBoundingClientRect().top + window.scrollY;

                // Option 1: Scroll to 10px from the top
                let offsetTop = elementPosition - 100;

                // Option 2: Scroll to center of the page
                let windowHeight = window.innerHeight;
                let elementHeight = roleSection.offsetHeight;
                let centerPosition = elementPosition - (windowHeight / 2) + (elementHeight / 2);

                // Adjust scrolling behavior (ensures it doesn't go negative)
                window.scrollTo({
                    top: Math.max(offsetTop, 10),
                    behavior: "smooth"
                });
            }
        }
    }

        $(document).ready(function() {
            // Utility function to show alert messages
        function showAlertMessage(type, message) {
            const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
            $('#alertMessage').removeClass('alert-success alert-danger').addClass(alertClass).text(message).show();
            setTimeout(() => $('#alertMessage').fadeOut(), 3000);
        }


        // Initialize Select2 on the user dropdown
        $('#user').select2({
            placeholder: "Search and select a user",
            allowClear: true, // Optional: Allows clearing the selection
            width: '100%' // Ensures it matches the container's width
        });



        // Toggle Assign Role Form visibility
        $('#showAssignRoleForm').click(function() {
            $('#assignRoleForm').toggle();
        });

        // Handle Assign Role to User AJAX
        $('#assignRoleFormAjax').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{ route('users.assignRole') }}',
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.message || 'assigned role to user.',
                        toast: true,
                        position: 'top-right',
                        // showConfirmButton: true,
                        timer: 3000 // Auto-close after 5 seconds
                    }).then(() => {
                      location.reload(); // Reload to update permissions table after the alert
                    });
                },
                error: function(xhr) {
                    const errorResponse = xhr.responseJSON || {};
                Swal.fire({
                    icon: 'error',
                    title: errorResponse.message || "Couldn't assign role.",
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 3000 // Auto-close after 5 seconds
                });
                }
            });
        });

        // Show Edit user Role Modal with User Info
        $('.edit_user_role').click(function() {
            const userId = $(this).data('id');
            const userName = $(this).data('name');
            $('#edit_user_id').val(userId);
            $('#edit_user_name').val(userName);
            $('#editUserRoleModal').modal('show');
        });

        // Handle Edit Role AJAX
        $('#editUserRoleFormAjax').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{ route('users.assignRole') }}', // Ensure this matches your update route
                data: $(this).serialize(),

                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.message || 'Edited user role.',
                        toast: true,
                        position: 'top-right',
                        // showConfirmButton: true,
                        timer: 3000 // Auto-close after 5 seconds
                    }).then(() => {
                      location.reload(); // Reload to update permissions table after the alert
                    });
                },
                error: function(xhr) {
                    const errorResponse = xhr.responseJSON || {};
                Swal.fire({
                    icon: 'error',
                    title: errorResponse.message || "Couldn't edit user role.",
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 3000 // Auto-close after 5 seconds
                });
                }
            });
        });


        // Show add role form
        $('#showAddRoleForm').click(function() {
            $('#addRoleForm').toggleClass('d-none');
        });

        // Add new role via AJAX
        $('#addRoleFormAjax').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{ route('roles.store') }}',
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.message || 'created new role model.',
                        toast: true,
                        position: 'top-right',
                        // showConfirmButton: true,
                        timer: 3000 // Auto-close after 5 seconds
                    }).then(() => {
                      location.reload(); // Reload to update permissions table after the alert
                    });
                },
                error: function(xhr) {
                    const errorResponse = xhr.responseJSON || {};
                Swal.fire({
                    icon: 'error',
                    title: errorResponse.message || "Couldn't create role model.",
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 3000 // Auto-close after 5 seconds
                });
                }
            });
        });

        // Show Edit Role Modal with Role Info
        $('.edit_role').click(function() {
            const roleId = $(this).data('id');
            const roleName = $(this).data('name');
            $('#edit_role_id').val(roleId);
            $('#edit_role_name').val(roleName);
            $('#editRoleModal').modal('show');
        });


        // Update role via AJAX
        $('#editRoleFormAjax').submit(function(e) {
            e.preventDefault();
            const roleId = $('#edit_role_id').val();
            $.ajax({
                type: 'POST',
                url: `/roles/update/${roleId}`,
                data: $(this).serialize(),

                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.message || 'updated role model.',
                        toast: true,
                        position: 'top-right',
                        // showConfirmButton: true,
                        timer: 3000 // Auto-close after 5 seconds
                    }).then(() => {
                      location.reload(); // Reload to update permissions table after the alert
                    });
                },
                error: function(xhr) {
                    const errorResponse = xhr.responseJSON || {};
                Swal.fire({
                    icon: 'error',
                    title: errorResponse.message || "Couldn't updated role model.",
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 3000 // Auto-close after 5 seconds
                });
                }
            });
        });

        // Show Delete Role Modal
        $('.delete_role').click(function() {
            const roleId = $(this).data('id');
            $('#delete_role_id').val(roleId);
            $('#deleteRoleModal').modal('show');
        });

        // Handle Delete Role via AJAX
        $('#deleteRoleFormAjax').submit(function(e) {
            e.preventDefault();
            const roleId = $('#delete_role_id').val();
            $.ajax({
                type: 'DELETE',
                url: `/roles/delete/${roleId}`,
                data: {
                    _token: '{{ csrf_token() }}',
                    role_id: roleId
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.message || 'deleted role model.',
                        toast: true,
                        position: 'top-right',
                        // showConfirmButton: true,
                        timer: 3000 // Auto-close after 5 seconds
                    }).then(() => {
                      location.reload(); // Reload to update permissions table after the alert
                    });
                },
                error: function(xhr) {
                    const errorResponse = xhr.responseJSON || {};
                Swal.fire({
                    icon: 'error',
                    title: errorResponse.message || "Couldn't delete role model.",
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 3000 // Auto-close after 5 seconds
                });
                }
            });
        });
        });
    </script>
@endsection
