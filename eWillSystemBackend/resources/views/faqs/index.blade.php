@extends('layouts.app')

@section('content')

<div class="content-page">
<div class="content">
<div class="card">
  <div class="card-body">
  <div class="d-flex justify-content-between">
      <h4>FAQ</h4>
      @can('add faqs')
      <span class="mt-2"><button data-target="#newfaq" data-toggle="modal" class="btn btn-dark text-capitalize addfaq">New FAQ</button></span>
      @endcan
  </div>
  @can('view faqs')
  <div id="faqList"></div>
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

<div class="modal fade" id="newfaq">
    <div class="modal-dialog">
      @can('add faqs')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New FAQ</h5>
          <button type="button" class="btn-secondary" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <form action="{{URL::to('addfaqs')}}" id="addfaq">
            @csrf
        <div class="modal-body">
            <div class="form-group"><label>Title</label><input type="text" required class="form-control" name="title"></div>
            {{-- <div class="form-group"><label>Description </label><input type="text" class="form-control" name="description"></div> --}}
            <div class="form-group"><label>Description </label> <textarea id="summernote" name="description"></textarea></div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Save</button>
        </div>
        </form>
      </div>
      @endcan
    </div>
  </div>

  <div class="modal fade" id="editfaq">
    <div class="modal-dialog">
        @can('manage faqs')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit FAQ</h5>
          <button type="button" class="btn-secondary" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <form action="{{URL::to('edit_faqs')}}" id="edit_faq">
            @csrf
        <div class="modal-body">
          <input type="text" hidden id="edit_id" name="id">
            <div class="form-group"><label for="">Title</label><input type="text" class="form-control" id="edit_title" name="title"></div>
            <div class="form-group"><label for="">Description </label>
              {{-- <input type="text" class="form-control" id="edit_description" name="description"> --}}
              <textarea id="edit_description" class="summernote" name="description"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn" >Save changes</button>
        </div>
        </form>
      </div>
      @endcan
    </div>
  </div>

  <div class="modal fade" id="deletefaq">
    <div class="modal-dialog">
        @can('manage faqs')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Click OK to Delete blog</h5>
          <button type="button" class="btn-secondary" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <form action="{{URL::to('delete_faqs')}}" id="delete_faq">
            @csrf
          <input type="text" hidden id="delete_id" name="id">
          <div>You can edit instead. Are you sure about deleting?</div>
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
        $(document).ready(function(){
            getFAQ();

        $('#addfaq').on('submit', function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        var form = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: url, // Ensure this URL is correctly set
            data: form, // Ensure this form data is correctly serialized
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: response.message || 'Added a faq successfully',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: true,
                }).then(() => {
                    $('#newfaq').modal('hide'); // Hide the modal
                    $('body').removeClass('modal-open'); // Remove modal-open class
                    $('.modal-backdrop').remove(); // Remove backdrop overlay
                    getFAQ();
                });
            },
            error: function(xhr) {
                const errorResponse = xhr.responseJSON || {};
                Swal.fire({
                    icon: 'error',
                    title: errorResponse.message || 'Failed to add new faq',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 5000 // Auto-close after 5 seconds
                });
            }
        });

      });

      $('#edit_faq').on('submit', function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        var form = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: url, // Ensure this URL is correctly set
            data: form, // Ensure this form data is correctly serialized
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: response.message || 'faq updated successfully',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: true,
                }).then(() => {
                    $('#editfaq').modal('hide'); // Hide the modal
                    $('body').removeClass('modal-open'); // Remove modal-open class
                    $('.modal-backdrop').remove(); // Remove backdrop overlay
                    getFAQ();
                });
            },
            error: function(xhr) {
                const errorResponse = xhr.responseJSON || {};
                Swal.fire({
                    icon: 'error',
                    title: errorResponse.message || 'Failed to update faq',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 5000 // Auto-close after 5 seconds
                });
            }
        });

      });

      $('#delete_faq').on('submit', function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        var form = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: url, // Ensure this URL is correctly set
            data: form, // Ensure this form data is correctly serialized
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: response.message || 'faq updated successfully',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: true,
                }).then(() => {
                    $('#deletefaq').modal('hide'); // Hide the modal
                    $('body').removeClass('modal-open'); // Remove modal-open class
                    $('.modal-backdrop').remove(); // Remove backdrop overlay
                    getFAQ();
                });
            },
            error: function(xhr) {
                const errorResponse = xhr.responseJSON || {};
                Swal.fire({
                    icon: 'error',
                    title: errorResponse.message || 'Failed to update faq',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 5000 // Auto-close after 5 seconds
                });
            }
        });

        });
        });

        function getFAQ() {
            $.get("{{URL::to('showfaqs')}}", function (data) {
                $('#faqList').html(data);
            });
        }

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
