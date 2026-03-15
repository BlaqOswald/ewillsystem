@extends('layouts.app')

@section('content')

<div class="content-page">
<div class="content">
<div class="card">
    <div class="card-body ">
        <div class="d-flex ">
            <h4>Audit Trail</h4>
            @can('view audit trail')
            <div class="d-flex gap-2 justify-content-between px-5">
                <input type="date" id="startDate" class="form-control" placeholder="Start Date">
                <input type="date" id="endDate" class="form-control" placeholder="End Date">
                <button id="filterButton" class="btn btn-primary">Filter</button>
            </div>
        </div>

    <div id="Auditlist"></div>
    <div class="modal fade" id="filtered" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filtered List</h5>
                    <button type="button" class="btn-secondary" data-bs-dismiss="modal">X</button>
                </div>
                <div class="modal-body">
                    <div id="FilteredAuditList"></div>
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
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            getAudit();

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
                $('#FilteredAuditList').html('<p class="text-center">Loading data...</p>');

                $.ajax({
                    url: "/filtered-data",  // Backend route for filtering
                    type: "GET",
                    data: { start_date: startDate, end_date: endDate },
                    success: function (data) {
                        if (data.trim() !== '') { // Show modal only when data is found
                            $('#FilteredAuditList').html(data);
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
        });

        // $('#resetButton').on('click', function () {
        //     $.get("/filtered-data", function (data) {
        //         $('#FilteredAuditList').html(data);
        //     });
        // });

        function getAudit() {
            $.get("{{URL::to('showaudit')}}", function (data) {
                $('#Auditlist').html(data);
            });
        }

        function getFilteredAudits() {
            $.get("/filtered-data", function (data) {
                $('#FilteredAuditList').html(data);
            });
        }
    </script>
@endsection
