@extends('layouts.app')

@section('content')

<div class="content-page">
<div class="content">
<div class="card">
  <div class="card-body">
    @can('view wills')
  <div class="d-flex justify-content-between">
      <h4>Wills</h4>
      <div class="d-flex gap-2 justify-content-between w-1/3">
         From: <input type="date" id="startDate" class="form-control" placeholder="Start Date">
             To: <input type="date" id="endDate" class="form-control" placeholder="End Date">
          <button class="btn btn-primary" id="filterButton">Filter</button>
      </div>
      @can('export wills')
      <a href="{{ url('/export-users') }}" class="btn btn-primary" >Export</a>
      @endcan
  </div>

  <div id="willList"></div>
  <div class="modal fade" id="filtered" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" style="max-width: 80%;">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Filtered List</h5>
                  <button type="button" class="btn-secondary" data-bs-dismiss="modal">X</button>
              </div>
              <div class="modal-body">
                  <div id="FilteredWillList"></div>
                  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
              </div>
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


<div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
                <ul>
                    @foreach ($users as $user)
                        <li>
                            <a href="{{ route('show', ['id' => $user->id]) }}">{{ $user->username }}</a>
                        </li>
                    @endforeach
                </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="will_modal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="printModalLabel">Enter Will ID</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="willId">Will ID:</label>
                        <input type="text" class="form-control" name="willId" id="willId" required>
                        <input type="hidden" id="will_id" readonly>
                        <span class="text-danger" id="print_error"></span>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <span id='user_id'><button type="button" id="print_btn" disabled class="btn btn-primary">Print</button></span>

            </div>
        </div>
    </div>
</div>


@endsection

  @section('script')
    <script>
        $(document).ready(function(){
            getWills();
            $('#willId').blur(function(){
                var will_id = $(this).val();
                var id = $("#will_id").val();
                if (will_id===id) {
                    $('#print_btn').removeAttr('disabled')
                    $('#print_error').html("")
                }else{
                    $('#print_btn').attr('disabled',true)
                    $('#print_error').html("Wrong Will ID")
                }
            });

          } );

         function getWills() {
            $.get("{{URL::to('showwills')}}", function (data) {
                $('#willList').html(data);
            });

            //  Handle Date Range Filtering
            $('#filterButton').on('click', function () {
                var startDate = $('#startDate').val();
                var endDate = $('#endDate').val();

                // Ensure both dates are selected
                if (!startDate || !endDate) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Select both dates!',
                        toast: true,
                        position: 'top-right',
                        timer: 3000,
                        showConfirmButton: false
                    });
                    return;
                }

                // Convert to Date objects for validation
                var start = new Date(startDate);
                var end = new Date(endDate);
                var today = new Date();

                // Ensure the start date is in the past
                if (start >= today) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Start date must be in the past!',
                        toast: true,
                        position: 'top-right',
                        timer: 3000,
                        showConfirmButton: false
                    });
                    return;
                }

                // Ensure the end date is after the start date
                if (end <= start) {
                    Swal.fire({
                        icon: 'error',
                        title: 'End date must be after start date!',
                        toast: true,
                        position: 'top-right',
                        timer: 3000,
                        showConfirmButton: false
                    });
                    return;
                }

                // Show loading indicator
                $('#FilteredWillList').html('<p class="text-center">Loading data...</p>');

                $.ajax({
                    url: "/filtered-users",  // Backend route for filtering
                    type: "GET",
                    data: { start_date: startDate, end_date: endDate },
                    success: function (data) {
                        if (data.trim() !== '') { // Show modal only when data is found
                            $('#FilteredWillList').html(data);
                            $('#filtered').modal('show'); // Open the modal dynamically
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'No records found!',
                                toast: true,
                                position: 'top-right',
                                timer: 3000,
                                showConfirmButton: false
                            });
                        }
                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to fetch data!',
                            toast: true,
                            position: 'top-right',
                            timer: 3000,
                            showConfirmButton: false
                        });
                    }
                });
            });
        }

        $(document).ready(function (){
        // Click event handler for the print buttons
        $(document).on('click', '.will_button', function(){
            var will_id = $(this).data('will_id');
            var user_id = $(this).data('user_id');
            $('#will_modal').modal('show');
            $('#will_id').val(will_id);
            $('#user_id').html('<a href="/print/'+user_id+'"><button type="button" id="print_btn" disabled class="btn btn-primary">Print</button></a>');
        });
    });

    </script>

 @endsection
