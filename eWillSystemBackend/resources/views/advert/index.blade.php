@extends('layouts.app')

@section('content')

<div class="content-page">
<div class="content">
<div class="card">
  <div class="card-body">
  <div class="d-flex justify-content-between">
      <h4>Advert</h4>
      @can('add adverts')
      <span class="mt-2"><button data-target="#newAdvertModal" data-toggle="modal" class="btn btn-dark text-capitalize addadvert">New Advert</button></span>
      @endcan
  </div>
  @can('view adverts')
  <div id="advertList"></div>
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

    <!-- Add Advert Modal -->
    <div class="modal fade" id="newAdvertModal" tabindex="-1" aria-labelledby="newAdvertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @can('add adverts')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Advert</h5>
                    <button type="button" class="btn-secondary" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>

                <form action="/add_adverts" id="addadvert" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Status Switch -->
                        <div class="form-group d-flex justify-content-evenly align-items-center">
                            <label for="statusSwitch" class="me-3">Status</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="statusSwitch" role="switch">
                            </div>
                            <input type="hidden" id="statusInput" name="status" value="0"> <!-- Hidden field for form submission -->
                        </div>

                        <!-- Topic -->
                        <div class="form-group">
                            <label for="topic">Topic</label>
                            <input type="text" id="topic" name="topic" class="form-control" placeholder="Enter advert topic" required>
                        </div>

                        <!-- Advert Text -->
                        <div class="form-group">
                            <label for="summernote">Advert (Text)</label>
                            <textarea id="summernote" name="advert" class="form-control" placeholder="Enter advert text"></textarea>
                        </div>

                        <!-- File Upload -->
                        <div class="form-group">
                            <label for="fileInput">Upload File (Image/PDF)</label>
                            <input type="file" class="form-control" id="fileInput" name="file" accept="image/*,application/pdf">
                            <p id="fileNameDisplay" class="mt-2 text-success" style="display: none;"></p>
                        </div>

                        <!-- Error Message -->
                        <div id="error-message" class="text-danger mt-2" style="display: none;"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            @endcan
        </div>
    </div>

  <!-- Edit Advert Modal -->
  <div class="modal fade" id="editAdvertModal">
      <div class="modal-dialog">
          @can('manage adverts')
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Edit Advert</h5>
                  <button type="button" class="btn-secondary" data-bs-dismiss="modal" aria-label="Close">X</button>
              </div>
              <form action="{{ URL::to('edit_adverts') }}" id="editAdvertForm" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                      <input type="hidden" id="editAdvertId" name="id">

                      <!-- Status Switch -->
                      <div class="form-group d-flex justify-content-between align-items-center">
                          <label for="editStatusSwitch">Status</label>
                          <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="editStatusSwitch" role="switch">
                            </div>
                            <input type="hidden" id="editStatusInput" name="status" value="0"> <!-- Hidden field for form submission -->
                      </div>

                      <!-- Topic -->
                      <div class="form-group">
                          <label for="editAdverttopic">Topic</label>
                          <input type="text" class="form-control" id="editAdverttopic" name="topic" >
                      </div>

                      <!-- Advert Text -->
                      <div class="form-group">
                          <label for="editAdvertContent">Advert</label>
                          <textarea id="editAdvertContent" name="advert" class="summernote form-control"></textarea>
                      </div>

                      <!-- File Upload -->
                      <div class="form-group">
                          <label for="editFileInput">Upload New File (Optional)</label>
                          <input type="file" class="form-control" id="editFileInput" name="file">
                          <p id="editFileNameDisplay" class="mt-2 text-success" style="display: none;"></p>
                          <!-- File Preview -->
                          <div id="editPreview" class="mt-3" style="display: none;">
                              <a id="editFileLink" href="#" target="_blank" class="btn btn-primary btn-sm">View File</a>
                          </div>
                      </div>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
              </form>
          </div>
          @endcan
      </div>
  </div>

  <!-- Delete Advert Modal -->
  <div class="modal fade" id="deleteAdvertModal">
      <div class="modal-dialog">
          @can('manage adverts')
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Confirm Deletion</h5>
                  <button type="button" class="btn-secondary" data-bs-dismiss="modal" aria-label="Close">X</button>
              </div>
              <form action="{{ URL::to('delete_adverts') }}" id="deleteAdvertForm">
                  @csrf
                  <input type="hidden" id="deleteAdvertId" name="id">
                  <div class="modal-body">
                      <p>You can edit instead. Are you sure about deleting this advert?</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger">OK</button>
                  </div>
              </form>
          </div>
          @endcan
      </div>
  </div>
@endsection

@section('script')
<script>
$(document).ready(function () {
    getAdvert(); // Fetch adverts on page load

    // Toggle Status Switch for Add Advert
    $("#statusSwitch").on("change", function () {
        $("#statusInput").val(this.checked ? "1" : "0");
    });

    // Toggle Status Switch for Edit Advert
    $("#editStatusSwitch").on("change", function () {
        $("#editStatusInput").val(this.checked ? "1" : "0");
    });


    $('#addadvert').on('submit', function (e) {
        e.preventDefault();

        let advertText = $("#summernote").val().trim();
        let fileInput = $("#fileInput").val();

        // Validate: Ensure at least one input is provided
        if (!advertText && !fileInput) {
            $("#error-message").text("Please provide either a text advert or a file.").show();
            return;
        } else {
            $("#error-message").hide();
        }

        var url = $(this).attr('action');
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: response.message || 'Added an advert successfully',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: true,
                }).then(() => {
                    resetForm('#addadvert'); // Clear form fields
                    location.reload(); // Reload page
                    // $('#newAdvertModal').modal('hide'); // Close modal/
                    // removeModalOverlay(); // Fix lingering blur effect
                    // getAdvert(); // Refresh data
                });
            },
            error: function (xhr) {
                const errorResponse = xhr.responseJSON || {};
                Swal.fire({
                    icon: 'error',
                    title: errorResponse.message || 'Failed to add new advert',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 5000,
                });
            }
        });
    });

    // Ensure only one input is used (Text OR File)
    $("#fileInput").on("change", function () {
        if ($(this).val()) {
            $("#summernote").prop("disabled", true).val(""); // Disable text input
        } else {
            $("#summernote").prop("disabled", false);
        }
    });

    $("#summernote").on("input", function () {
        if ($(this).val().trim() !== "") {
            $("#fileInput").prop("disabled", true).val(""); // Disable file upload
        } else {
            $("#fileInput").prop("disabled", false);
        }
    });


    //  Handle Edit Advert Form Submission
    $('#editAdvertForm').on('submit', function (e) {
        e.preventDefault();

        let id = $("#editAdvertId").val();  // Ensure ID is retrieved correctly
        let url = `/edit_adverts/${id}`;  // Correct URL with ID

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',  // Laravel will handle PUT requests with method spoofing
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: response.message || 'Advert updated successfully',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: true
                }).then(() => {
                  location.reload();
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed to update advert',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 5000
                });
            }
        });
    });



    //  Handle Delete Advert Form Submission
    $('#deleteAdvertForm').on('submit', function (e) {
        e.preventDefault();

        let id = $("#deleteAdvertId").val();  // Ensure ID is retrieved correctly
        let url = `/delete_adverts/${id}`;  // Correct URL with ID

        $.ajax({
            type: 'POST',  // Laravel will handle DELETE requests with method spoofing
            url: url,
            data: $(this).serialize(),  // Serialize form data
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: response.message || 'Advert deleted successfully',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: true
                }).then(() => {
                  location.reload();
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed to delete advert',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 5000
                });
            }
        });
    });



    //  Fetch & Display Adverts
    function getAdvert() {
        $.get("{{ URL::to('showadverts') }}", function (data) {
            $('#advertList').html(data);
        });
    }



    //  Reset Form Fields (Text, File, Summernote)
    function resetForm(formSelector) {
        $(formSelector)[0].reset();
        $('#summernote').summernote('code', ''); // Reset summernote text editor
        $('#fileInput').val(''); // Reset file input
        $('#editFileInput').val('');
        $('#fileNameDisplay, #editFileNameDisplay').hide();
        $('#imagePreview, #editImagePreview').hide();
        $('#filePreviewText, #editFilePreviewText').hide();
    }

    //  Fix Blurry Background Issue After Modal Closes
    function removeModalOverlay() {
        $('body').removeClass('modal-open'); // Remove modal-open class
        $('.modal-backdrop').remove(); // Remove overlay
    }

    //  Initialize Summernote
    $('#summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', []], // Remove media uploads
            ['view', ['fullscreen', 'help']]
        ]
    });
});

</script>


<script type="text/javascript">

    $(document).ready(function () {

        $('#summernote').summernote({

            height: 300,
        });
        $('.summernote').summernote({
            height: 300,
        });
    });
</script>

@endsection
