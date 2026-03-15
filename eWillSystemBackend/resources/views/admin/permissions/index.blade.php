
@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <div class='d-flex justify-content-around mb-3'>
                        <h4>Assign Permissions to Roles</h4>
                        <!-- Display a form for adding a new permission -->
                        <button id="togglePermissionForm" class="btn btn-primary ">Add New Permission</button>
                    </div>
                    <div id="permissionForm" style="display: none;" class="mb-3">
                        <form id="addPermissionForm">
                            @csrf
                            <div class="form-group">
                                <label for="permission_name">Permission Name</label>
                                <input type="text" id="permission_name" name="permission_name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Permission</button>
                        </form>
                    </div>
                    @can('view permissions')
                    <!-- Permissions Table -->
                    <?php
                    // Group permissions by their first title word
                    $groupedPermissions = [];
                    foreach ($permissions as $permission) {
                        // Get the first word of the permission name
                        $firstWord = explode(" ", $permission->name)[0];
                        // Initialize the group if it doesn't exist
                        if (!isset($groupedPermissions[$firstWord])) {
                            $groupedPermissions[$firstWord] = [];
                        }
                        // Add the permission to the corresponding group
                        $groupedPermissions[$firstWord][] = $permission;
                    }
                    ?>
                    <div>
                        <label for="permissionDropdown">Auto Scroll to Permission Category</label>
                        <select id="permissionDropdown" class="form-control me-2" onchange="searchPermissionByDropdown()">
                            <option value="">-- Select a Permission Category --</option>
                            @foreach ($groupedPermissions as $firstWord => $permissionsGroup)
                                <option value="collapse{{ ucfirst($firstWord) }}">{{ ucfirst($firstWord) }} Permissions</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="accordion mt-4" id="dataAccordion">
                        @foreach ($groupedPermissions as $firstWord => $permissionsGroup)
                            <div class="card">
                                <div class="card-header" id="heading{{ ucfirst($firstWord) }}">
                                    <h3 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapse{{ ucfirst($firstWord) }}"
                                                aria-expanded="false" aria-controls="collapse{{ ucfirst($firstWord) }}">
                                            {{ ucfirst($firstWord) }} Permissions
                                        </button>
                                    </h3>
                                </div>
                                <div id="collapse{{ ucfirst($firstWord) }}" class="collapse"
                                     aria-labelledby="heading{{ ucfirst($firstWord) }}"
                                     data-parent="#dataAccordion">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Permission</th>
                                                    @foreach ($roles as $role)
                                                        <th>{{ ucfirst($role->name) }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($permissionsGroup as $permission)
                                                    <tr>
                                                        <td>
                                                            <!-- Delete Button -->
                                                            <button type="button" class="btn btn-danger btn-sm del_permission"
                                                                    data-permission-id="{{ $permission->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                            {{ ucfirst($permission->name) }}
                                                        </td>
                                                        @foreach ($roles as $role)
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <div class="form-check form-switch">
                                                                        <input type="checkbox" class="form-check-input permission-checkbox"
                                                                               role="switch"
                                                                               id="flexSwitchCheck{{ $role->id }}{{ $permission->id }}"
                                                                               data-role-id="{{ $role->id }}"
                                                                               data-permission-id="{{ $permission->id }}"
                                                                               {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
@endsection

@section('script')
<script>
function searchPermissionByDropdown() {
    let selectedPermissionGroup = document.getElementById("permissionDropdown").value;

    if (selectedPermissionGroup) {
        // ✅ Collapse all permission groups
        document.querySelectorAll(".collapse").forEach(section => {
            section.classList.remove("show");
        });

        // ✅ Expand the selected permission group
        let selectedSection = document.getElementById(selectedPermissionGroup);
        if (selectedSection) {
            selectedSection.classList.add("show");

            // ✅ Ensure accordion expands
            let button = document.querySelector(`[data-target="#${selectedPermissionGroup}"]`);
            if (button) button.classList.remove("collapsed");

            // ✅ Smooth Scrolling
            let elementPosition = selectedSection.getBoundingClientRect().top + window.scrollY;

            // ✅ Scroll 10px from the top
            let offsetTop = elementPosition - 100;

            // ✅ Prevent negative scroll positions
            window.scrollTo({
                top: Math.max(offsetTop, 10),
                behavior: "smooth"
            });
        }
    }
}

    $(document).ready(function() {
        // Toggle permission form visibility
        $('#togglePermissionForm').on('click', function() {
            $('#permissionForm').toggle();
        });

        // Handle new permission submission
        $('#addPermissionForm').on('submit', function(e) {
            e.preventDefault();
            let permissionName = $('#permission_name').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('permissions.store') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    permission_name: permissionName
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.message || 'added new permission.',
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: true,
                    }).then(() => {
                      location.reload(); // Reload to update permissions table after the alert
                    });
                },
                error: function(xhr) {
                    const errorResponse = xhr.responseJSON || {};
                Swal.fire({
                    icon: 'error',
                    title: errorResponse.message || 'Seems you added an existing option.',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 5000 // Auto-close after 5 seconds
                });
                }
            });
        });

        // Handle permission assignment
        $('.permission-checkbox').on('change', function() {
            let roleId = $(this).data('role-id');
            let permissionId = $(this).data('permission-id');
            let isChecked = $(this).is(':checked');

            $.ajax({
                type: 'POST',
                url: "{{ route('permissions.assign') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    role_id: roleId,
                    permission_id: permissionId,
                    value: isChecked ? 1 : 0
                },
                success: function(response) {
                    Swal.fire({
                    icon: 'success',
                    title: response.message || 'Permission updated successfully.',
                    toast: true,
                    position: 'top-right',
                    timer: 2000 // Auto-close after 5 seconds
                })
                },
                error: function(xhr) {
                    const errorResponse = xhr.responseJSON || {};
                Swal.fire({
                    icon: 'error',
                    title: errorResponse.message || 'Permission assignment problem.',
                    toast: true,
                    position: 'top-right',
                    timer: 3000 // Auto-close after 5 seconds
                });
                }
            });
        });

        // Delete permission functionality
        $(document).on('click', '.del_permission', function() {
            const permissionId = $(this).data('permission-id'); // Get permission ID from the button
            const permissionRow = $(this).closest('tr'); // Assuming the permission is in a table row

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: `/permissions/${permissionId}`, // Use RESTful URL pattern
                        data: {_token: '{{ csrf_token() }}'}, // CSRF token for authentication
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: response.message || 'Permission deleted.',
                                toast: true,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 2000 // Auto-close after 2 seconds
                            });

                            // Remove the permission row from the table
                            permissionRow.remove(); // Remove the row from the DOM
                        },
                        error: function(xhr) {
                            const errorResponse = xhr.responseJSON || {};
                            Swal.fire({
                                icon: 'error',
                                title: errorResponse.message || 'Failed deleting.',
                                toast: true,
                                position: 'top-right',
                                showConfirmButton: true,
                            });
                        },
                    });
                }
            });
        });
    });
</script>
@endsection
