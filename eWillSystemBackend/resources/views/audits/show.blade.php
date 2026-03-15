<!-- Audit Table -->
<div class="table-responsive mt-2">
    <table id="datatable" class="table table-hover table-sm dt-responsive nowrap"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Activity</th>
                    <th>Created On</th>
                </tr>
            </thead>
        <tbody>
            @forelse ($audits as $audit)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $audit->ruser->email ?? ""}}</td>
                    <td>{{ $audit->activity }}</td>
                    <td>{{ $audit->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No audits available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
$(document).ready(function () {
    $('#datatable').DataTable({
        paging: true,  // Enable pagination
        searching: true,  // Enable search functionality
        ordering: true,  // Enable column ordering
    });
});
</script>
