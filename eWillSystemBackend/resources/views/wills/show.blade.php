
<div class="table-responsive mt-2">
    <table id="datatable" class="table table-hover table-sm dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>Name/Subscription</th>
                <th>D.o.B/Gender</th>
                <th>NIN</th>
                <th>Current Address</th>
                <th>Payment Status/Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="col-md-2 col-6 mt-2 text-capitalize">
                <td>{{$loop->iteration}}</td>
                <td>{{$user->first_name}} {{$user->last_name}}<br><p class="mb-0 text-primary">{{$user->subpackage->name ?? 'No' }} Package</p></td>
                <td>{{$user->date_of_birth}}<br><p class="mb-0 text-primary">{{$user->gender}}</p></td>
                <td>{{$user->nin}}</td>
                <td>{{$user->current_address}}</td>
                <td>
                    @if($user->paystatus == 1)
                    <span class="badge bg-success">Paid</span>
                    @else
                    <span class="badge bg-danger">Not Paid</span>
                    @endif
                    <br><p class="mb-0 text-primary">{{$user->contact}}</p></
                </td>
                <!-- <td style="display:flex; justify:space-between; gap:5px; text-align:center;align-items:center;"> -->
                <td>
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
                            <button class="btn btn-sm btn-danger deactivate-user" data-id="{{ $user->id }}">Deactivate</button>
                        @else
                            <button class="btn btn-sm btn-success reactivate-user" data-id="{{ $user->id }}">Reactivate</button>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- User Details Modal -->
<div class="modal fade" id="userDetailsModal" tabindex="-1" role="dialog" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userDetailsModalLabel">User  Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="userDetailsContent">
                    <!-- User details will be populated here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="../assets\js\pages\datatables.init.js"></script>

<script>
    $(document).ready(function (){
      $('.will_button').on('click', function(){
          var will_id = $(this).data('will_id');
          var user_id = $(this).data('user_id');
          $('#will_modal').modal('show');
          $('#will_id').val(will_id);
          $('#user_id').html('<a href="/print/'+user_id+'"><button type="button" id="print_btn" disabled class="btn btn-primary">Print</button></a>');
        })
      $(document).ready(function () {
          $('.view_details_button').on('click', function () {
              var user = $(this).data('user');

              // Create a formatted string for user details
              var userDetails = `
                  <p>First Name: <b>${user.first_name}</b></p>
                  <p>Last Name: <b>${user.last_name}</b></p>
                  <p>Gender: <b>${user.gender}</b></p>
                  <p>Date of Birth: <b>${user.date_of_birth}</b></p>
                  <p>Contact: <b>${user.contact}</b></p>
                  <p>NIN: <b>${user.nin}</b></p>
                  <p>Current Address: <b>${user.current_address}</b></p>
                  <p>Payment Status: <b>${user.paystatus == 1 ? 'Paid' : 'Not Paid'}</b></p>
              `;

              // Populate the modal with user details
              $('#userDetailsContent').html(userDetails);

              // Show the modal
              $('#userDetailsModal').modal('show');
          });
      });
    });
</script>
