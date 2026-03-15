<div class="table-responsive mt-2" >
    <table id="datatable" class="table table-hover table-sm dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>topic</th>
                <th>Advert</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Date Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adverts as $advert)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $advert->topic ?? 'Not Filled' }}</td>
                <td>{{ Str::limit($advert->advert, 40) ?? 'Not Filled' }}</td>
                <td>{{ $advert->status == 1 ? 'Active' : 'Inactive' }}</td>
                <td>{{ $advert->created_at->format('Y-m-d H:i') }}</td>
                <td>{{ $advert->updated_at->format('Y-m-d H:i') }}</td>
                <td>
                    <div class="btn-group">
                        @can('manage adverts')
                            @if ($advert->file)
                                <a href="{{ asset($advert->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            @endif
                            <button type="button"
                                class="btn btn-primary editAdvertBtn"
                                data-bs-toggle="modal"
                                data-bs-target="#editAdvertModal"
                                data-id="{{ $advert->id }}"
                                data-topic="{{ $advert->topic }}"
                                data-advert="{{ $advert->advert }}"
                                data-status="{{ $advert->status }}">
                                <i class="fas fa-edit"></i>
                            </button>

                            <button type="button"
                                class="btn btn-danger deleteAdvertBtn"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteAdvertModal"
                                data-id="{{ $advert->id }}">
                                <i class="fas fa-trash"></i>
                            </button>

                        @endcan
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </div>

    <script>
    $(document).on("click", ".editAdvertBtn", function () {
      let id = $(this).data("id");
          let topic = $(this).data("topic");
          let advert = $(this).data("advert");
          let status = $(this).data("status");

          $("#editAdvertId").val(id);
          $("#editAdverttopic").val(topic);
          $("#editAdvertContent").val(advert);

          if (status == "1") {
              $("#editStatusSwitch").prop("checked", true);
          } else {
              $("#editStatusSwitch").prop("checked", false);
          }
          $("#editStatusInput").val(status);

          $("#editAdvertModal").modal("show");
    });

    </script>

    <script>
    $(document).on("click", ".deleteAdvertBtn", function () {
        let id = $(this).data("id");

        console.log("Deleting Advert - ID:", id); // Debugging log

        $("#deleteAdvertId").val(id);  // Set ID in hidden input

        $("#deleteAdvertModal").modal("show");
    });

    </script>

    <script src="../assets\js\pages\datatables.init.js"></script>
