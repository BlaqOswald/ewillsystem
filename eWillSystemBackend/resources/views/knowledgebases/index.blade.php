@extends('layouts.app')

@section('content')

<div class="content-page">
<div class="content">
<div class="card">
  <div class="card-body">
  <div class="d-flex justify-content-between">
      <h4>Knowledgebase</h4>
      @can('add knowledgebase')
      <span class="mt-2">
          <button data-target="#newknowledgebase" data-toggle="modal" class="btn btn-dark text-capitalize addknowledgebase">New Knowledgebase</button>
      </span>
      @endcan
  </div>
  @can('view knowledgebase')
  <div id="knowledgebaseList"></div>
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

<div class="modal fade" id="newknowledgebase">
    <div class="modal-dialog">
        @can('add knowledgebase')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New knowledgebase</h5>
          <button type="button" class="btn-secondary" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <form action="{{URL::to('addknowledgebases')}}" id="addknowledgebase">
            @csrf
        <div class="modal-body">
            <div class="form-group"><label>Title</label><input type="text" required class="form-control" name="title"></div>
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

  <div class="modal fade" id="editknowledgebase">
    <div class="modal-dialog">
        @can('manage knowledgebase')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Knowledgebase</h5>
          <button type="button" class="btn-secondary" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <form action="{{URL::to('edit_knowledgebases')}}" id="edit_knowledgebase">
            @csrf
        <div class="modal-body">
          <input type="text" hidden id="edit_id" name="id">
            <div class="form-group"><label for="">Title</label><input type="text" class="form-control" id="edit_title" name="title"></div>
            <div class="form-group"><label for="">Description </label>
                <textarea id="edit_description" class="summernote" name="description"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Save changes</button>
        </div>
        </form>
      </div>
      @endcan
    </div>
  </div>

  <div class="modal fade" id="deleteknowledgebase">
    <div class="modal-dialog">
        @can('manage knowledgebase')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Click OK to Delete Knowledgebase</h5>
          <button type="button" class="btn-secondary" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <form action="{{URL::to('delete_knowledgebases')}}" id="delete_knowledgebase">
            @csrf
          <input type="text" hidden id="delete_id" name="id">
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
            getKnowledgebase();

        $('#addknowledgebase').on('submit', function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        var form = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: url, // Ensure this URL is correctly set
            data: form, // Ensure this form data is correctly serialized
            success: function(response) {
                $('#addknowledgebase')[0].reset(); // Reset the form
                $('#newknowledgebase').modal('hide'); // Hide the modal
                Swal.fire({
                    icon: 'success',
                    title: response.message || 'Knowledge base entry added successfully',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: true,
                }).then(() => {
                    getKnowledgebase(); // Reload to see the updated data
                });
            },
            error: function(xhr) {
                const errorResponse = xhr.responseJSON || {};
                Swal.fire({
                    icon: 'error',
                    title: errorResponse.message || 'Failed to add the knowledge base entry.',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 5000 // Auto-close after 5 seconds
                });
            }
        });
      });

      $('#edit_knowledgebase').on('submit', function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        var form = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: url, // Ensure this URL is correctly set
            data: form, // Ensure this form data is correctly serialized
            success: function(response) {
                $('#editknowledgebase').modal('hide'); // Hide the modal
                Swal.fire({
                    icon: 'success',
                    title: response.message || 'Knowledge base entry updated successfully',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: true,
                }).then(() => {
                    getKnowledgebase(); // Reload to see the updated data
                });
            },
            error: function(xhr) {
                const errorResponse = xhr.responseJSON || {};
                Swal.fire({
                    icon: 'error',
                    title: errorResponse.message || 'Failed to update the knowledge base entry.',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 5000 // Auto-close after 5 seconds
                });
            }
        });
      });

      $('#delete_knowledgebase').on('submit', function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        var form = $(this).serialize();
        $.ajax({
          type: 'POST',
          url: url,
          data: form,
          success:function(){
            $('#deleteknowledgebase').modal('hide');
            getKnowledgebase();
          }
        });
        });
        });

        function getKnowledgebase() {
            $.get("{{URL::to('showknowledgebases')}}", function (data) {
                $('#knowledgebaseList').html(data);
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
