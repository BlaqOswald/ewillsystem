 <div class="table-responsive mt-2" >
    <table id="datatable" class="table table-hover table-sm dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead><tr><th>#</th><th>Title</th><th>Description 	</th><th>Actions</th></tr></thead>
    @foreach ($knowledgebases as $knowledgebase)
    <tr class="col-md-2 col-6 mt-2">
        <td>{{$loop->iteration}}</td>
        <td>{{ Str::limit($knowledgebase->title, 40)}} </td>
        <td>{{ strip_tags(Str::limit($knowledgebase->description, 70 ))}} </td>
        <td>
            <div class="btn-group">
                @can('manage knowledgebase')
                <button type="button" data-id="{{$knowledgebase->id}}" data-title="{{$knowledgebase->title}}" data-description="{{$knowledgebase->description}}" class="btn btn-sm btn-primary edit_knowledgebase"><i class="fas fa-edit"></i></button>
                @endcan
                @can('manage knowledgebase')
                <button type="button" data-id="{{$knowledgebase->id}}" class="btn-danger btn btn-sm del_knowledgebase"><i class="fas fa-trash"></i></button>
                @endcan
            </div>
        </td>
    </tr>
    @endforeach
    </table>
    </div>

    <script>
        $(document).ready(function () {
        $('.edit_knowledgebase').on('click', function () {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var description = $(this).data('description');

            // Open the edit modal
            $('#editknowledgebase').modal('show');

            // Set values in the form fields
            $('#edit_id').val(id);
            $('#edit_title').val(title);

            // Set description in Summernote editor
            $('#edit_description').summernote('code', description);
        });
    });
      </script>

    <script>
        $(document).ready(function (){
        $('.del_knowledgebase').on('click', function(){
            var id = $(this).data('id');
            $('#deleteknowledgebase').modal('show');
            $('#delete_id').val(id);
            })
        });
    </script>

    <script src="../assets\js\pages\datatables.init.js"></script>
