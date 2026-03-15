<!-- will Table -->
<div class="table-responsive mt-2">
    <table id="datatable" class="table table-hover table-lg dt-responsive nowrap"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>D.o.B/Gender</th>
                    <th>Contact</th>
                    <th>NIN</th>
                    <th>Current Address</th>
                    <th>Payment Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
        <tbody>
            @forelse ($users as $user)
            <tr class="col-md-2 col-6 mt-2 text-capitalize">
                <td>{{$loop->iteration}}</td>
                <td>{{$user->first_name}} {{$user->last_name}}</td>
                <td>{{$user->date_of_birth}}<br><p class="text-primary mb-0">{{$user->gender}}</p></td>
                <td>{{$user->contact}}</td>
                <td>{{$user->nin}}</td>
                <td>{{$user->current_address}}</td>
                <td>
                    @if($user->paystatus == 1)
                    <span class="badge bg-success">Paid</span>
                    @else
                    <span class="badge bg-danger">Not Paid</span>
                    @endif
                </td>
                <td style="display:flex; justify:space-between; gap:5px; text-align:center;align-items:center;">
                    <div class="btn-group">
                        @can('print wills')
                        <button type="button" data-will_id="{{$user->will_id}}" data-user_id="{{$user->id}}" class="btn btn-sm will_button btn-primary" >
                            <i class="fas fa-print"></i>
                        </button>
                        @endcan
                        <button type="button" data-user="{{ json_encode($user) }}" class=" btn btn-sm view_details_button" style="background-color:rgb(34, 43, 74); color:white">
                            <i class="fas fa-eye"></i>
                        </button>
                        @if($user->status == 1)
                            <button class="btn btn-danger deactivate-user" data-id="{{ $user->id }}">Deactivate</button>
                        @else
                            <button class="btn btn-success reactivate-user" data-id="{{ $user->id }}">Reactivate</button>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No users for range</td>
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
