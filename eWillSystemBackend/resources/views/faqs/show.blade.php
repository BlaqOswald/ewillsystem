<div class="table-responsive mt-2" >
    <table id="datatable" class="table table-hover table-sm dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead><tr><th>#</th><th>Title</th><th>Description 	</th><th>Actions</th></tr></thead>
    @foreach ($faqs as $faq)
    <tr class="col-md-2 col-6 mt-2">
        <td>{{$loop->iteration}}</td>
        <td>{{ Str::limit($faq->title, 40)}} </td>
        <td>{{ strip_tags(Str::limit($faq->description, 70 ))}} </td>
        <td>
            <div class="btn-group">
                @can('manage faqs')
                <button type="button" data-id="{{$faq->id}}" data-title="{{$faq->title}}" data-description="{{$faq->description}}" class="btn btn-sm edit_faq btn-primary" ><i class="fas fa-edit"></i></button>

                {{-- <button type="button" title="Delete" data-id="{{$blog->id}}" class="btn btn-danger btn-sm del_blog"><i class="fas fa-trash"></i></button> --}}

                <button type="button" data-id="{{$faq->id}}" class="btn-danger btn btn-sm del_faq"><i class="fas fa-trash"></i></button>
                @endcan
            </div>
        </td>
    </tr>
    @endforeach
    </table>
    </div>

    <script>
        $(document).ready(function (){
                $('.edit_faq').on('click', function () {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var description = $(this).data('description');

            // Open the edit modal
            $('#editfaq').modal('show');

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
        $('.del_faq').on('click', function(){
            var id = $(this).data('id');
            $('#deletefaq').modal('show');
            $('#delete_id').val(id);
            })
        });
    </script>

    <script src="../assets\js\pages\datatables.init.js"></script>
