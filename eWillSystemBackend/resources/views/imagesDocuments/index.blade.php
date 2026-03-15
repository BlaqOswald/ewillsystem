@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="content">
        <div class="d-flex justify-content-around mb-3">
            <div class="form-group">
                <label for="searchUser">Sort out single user</label>
                <select name="search_user" id="searchUser" class="form-control">
                    <option value="">Search and select a user</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="searchUser">Auto scroll to Category</label>
                <select id="categoryDropdown" class="form-control me-2" onchange="searchCategoryByDropdown()">
                    <option value="">-- Select a Category --</option>
                    <option value="spousesHeading">Spouses</option>
                    <option value="dependantsHeading">Dependants</option>
                    <option value="guardiansHeading">Guardians</option>
                    <option value="otherRelativesHeading">Other Relatives</option>
                    <option value="creditorsHeading">Creditors</option>
                    <option value="debtorsHeading">Debtors</option>
                    <option value="landHeading">Land</option>
                    <option value="livestockHeading">Livestock</option>
                    <option value="bankaccountHeading">Bank Account</option>
                    <option value="vehicleHeading">Vehicle</option>
                    <option value="otherpropertyHeading">Other Property</option>
                </select>
            </div>
        </div>

        <div>
            <h2 class="text-center">Relationship Attachments</h2>

            <!-- Accordion for relationship-->
            <div class="accordion mt-4" id="dataAccordion">
                    <!-- Children Section -->
                    <div class="card">
                        <div class="card-header" id="childrenHeading">
                            <h3 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#childrenCollapse" aria-expanded="false" aria-controls="childrenCollapse">
                                    Children
                                </button>
                            </h3>
                        </div>

                        <div id="childrenCollapse" class="collapse" aria-labelledby="childrenHeading" data-parent="#dataAccordion">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if ($children->isEmpty())
                                        <div class="text-center">
                                            <p>No data to display</p>
                                        </div>
                                    @else
                                        <table class="table table-bordered table-striped" id="childrenTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Child Name</th>
                                                    <th>User Email</th>
                                                    <th>Contact</th>
                                                    <th>Address</th>
                                                    <th>Gender</th>
                                                    <th>DOB</th>
                                                    <th>File</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($children as $index => $child)
                                                    <tr data-user-id="{{ $child->ruser->id ?? '' }}">
                                                        <td>{{ $child->id }}</td>
                                                        <td>{{ $child->name }}</td>
                                                        <td>{{ $child->ruser->email ?? 'N/A' }}</td>
                                                        <td>{{ $child->contact }}</td>
                                                        <td>{{ $child->address }}</td>
                                                        <td>{{ $child->gender }}</td>
                                                        <td>{{ $child->date_of_birth ?? 'N/A' }}</td>
                                                        <td>
                                                            @if ($child->file)
                                                                <a href="{{ asset('storage/uploads/files/' . $child->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <!-- Delete Button -->
                                                            @if ($child->file)
                                                            <button
                                                                type="button"
                                                                class="btn btn-sm btn-danger delete-file-btn"
                                                                data-user='{{ json_encode(["id" => $child->id, "file" => $child->file, "user_id" => $child->user_id, "name" => $child->name, "relation" => "Relative"]) }}'
                                                                data-toggle="modal"
                                                                data-target="#deleteModal">
                                                                <i class="fas fa-trash"></i>
                                                            </button>

                                                            @else
                                                            <!-- Add File Button -->
                                                            <button type="button"
                                                                data-user="{{ json_encode([
                                                                    'id' => $child->id ?? 0,
                                                                    'user_id' => $child->user_id ?? 0,
                                                                    'relationships_name' => $child->name ?? 'N/A',
                                                                    'relation' => 'Relative'
                                                                ]) }}"
                                                                class="btn-success btn btn-sm upload-file-button">
                                                                <i class="fas fa-upload"></i>
                                                            </button>

                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Spouses Section -->
                    <div class="card">
                        <div class="card-header" id="spousesHeading">
                            <h3 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#spousesCollapse" aria-expanded="false" aria-controls="spousesCollapse">
                                    Spouses
                                </button>
                            </h3>
                        </div>

                        <div id="spousesCollapse" class="collapse" aria-labelledby="spousesHeading" data-parent="#dataAccordion">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if ($spouses->isEmpty())
                                        <div class="text-center">
                                            <p>No data to display</p>
                                        </div>
                                    @else
                                    <table class="table table-bordered table-striped" id="spousesTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Spouse Name</th>
                                                <th>User Email</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Marriage Date</th>
                                                <th>File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($spouses as $index => $spouse)
                                                <tr data-user-id="{{ $spouse->ruser->id ?? '' }}">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $spouse->name }}</td>
                                                    <td>{{ $spouse->ruser->email ?? 'N/A' }}</td>
                                                    <td>{{ $spouse->contact }}</td>
                                                    <td>{{ $spouse->address }}</td>
                                                    <td>{{ $spouse->mariage ?? 'N/A' }}</td>
                                                    <td>
                                                        @if ($spouse->file)
                                                            <a href="{{ asset('storage/uploads/files/' . $spouse->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <!-- Delete Button -->
                                                        @if ($spouse->file)
                                                        <button
                                                            type="button"
                                                            class="btn btn-sm btn-danger delete-file-btn"
                                                            data-user='{{ json_encode(["id" => $spouse->id, "file" => $spouse->file, "user_id" => $spouse->user_id, "name" => $spouse->name, "relation" => "Relative"]) }}'
                                                            data-toggle="modal"
                                                            data-target="#deleteModal">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        @else
                                                        <!-- Add File Button -->
                                                        <button type="button"
                                                            data-user="{{ json_encode([
                                                                'id' => $spouse->id ?? 0,
                                                                'user_id' => $spouse->user_id ?? 0,
                                                                'relationships_name' => $spouse->name ?? 'N/A',
                                                                'relation' => 'Relative'
                                                            ]) }}"
                                                            class="btn-success btn btn-sm upload-file-button">
                                                            <i class="fas fa-upload"></i>
                                                        </button>

                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dependants Section -->
                    <div class="card">
                        <div class="card-header" id="dependantsHeading">
                            <h3 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#dependantsCollapse" aria-expanded="false" aria-controls="dependantsCollapse">
                                    Dependants
                                </button>
                            </h3>
                        </div>

                        <div id="dependantsCollapse" class="collapse" aria-labelledby="dependantsHeading" data-parent="#dataAccordion">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if ($dependants->isEmpty())
                                        <div class="text-center">
                                            <p>No data to display</p>
                                        </div>
                                    @else
                                    <table class="table table-bordered table-striped" id="dependantsTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Dependant Name</th>
                                                <th>User Email</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dependants as $index => $dependant)
                                                <tr data-user-id="{{ $dependant->ruser->id ?? '' }}">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $dependant->name }}</td>
                                                    <td>{{ $dependant->ruser->email ?? 'N/A' }}</td>
                                                    <td>{{ $dependant->contact }}</td>
                                                    <td>{{ $dependant->address }}</td>
                                                    <td>
                                                        @if ($dependant->file)
                                                            <a href="{{ asset('storage/uploads/files/' . $dependant->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <!-- Delete Button -->
                                                        @if ($dependant->file)
                                                        <button
                                                            type="button"
                                                            class="btn btn-sm btn-danger delete-file-btn"
                                                            data-user='{{ json_encode(["id" => $dependant->id, "file" => $dependant->file, "user_id" => $dependant->user_id, "name" => $dependant->name, "relation" => "Relative"]) }}'
                                                            data-toggle="modal"
                                                            data-target="#deleteModal">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        @else
                                                        <!-- Add File Button -->
                                                        <button type="button"
                                                            data-user="{{ json_encode([
                                                                'id' => $dependant->id ?? 0,
                                                                'user_id' => $dependant->user_id ?? 0,
                                                                'relationships_name' => $dependant->name ?? 'N/A',
                                                                'relation' => 'Relative'
                                                            ]) }}"
                                                            class="btn-success btn btn-sm upload-file-button">
                                                            <i class="fas fa-upload"></i>
                                                        </button>

                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Guardians Section -->
                    <div class="card">
                        <div class="card-header" id="guardiansHeading">
                            <h3 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#guardiansCollapse" aria-expanded="false" aria-controls="guardiansCollapse">
                                    Guardians
                                </button>
                            </h3>
                        </div>

                        <div id="guardiansCollapse" class="collapse" aria-labelledby="guardiansHeading" data-parent="#dataAccordion">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if ($guardians->isEmpty())
                                    <div class="text-center">
                                        <p>No land records available.</p>
                                    </div>
                                    @else
                                    <table class="table table-bordered table-striped" id="guardiansTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Guardian Name</th>
                                                <th>User Email</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($guardians as $index => $guardian)
                                                <tr data-user-id="{{ $guardian->ruser->id ?? '' }}">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $guardian->name }}</td>
                                                    <td>{{ $guardian->ruser->email ?? 'N/A' }}</td>
                                                    <td>{{ $guardian->contact }}</td>
                                                    <td>{{ $guardian->address }}</td>
                                                    <td>
                                                        @if ($guardian->file)
                                                            <a href="{{ asset('storage/uploads/files/' . $guardian->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <!-- Delete Button -->
                                                        @if ($guardian->file)
                                                        <button
                                                            type="button"
                                                            class="btn btn-sm btn-danger delete-file-btn"
                                                            data-user='{{ json_encode(["id" => $guardian->id, "file" => $guardian->file, "user_id" => $guardian->user_id, "name" => $guardian->name, "relation" => "Relative"]) }}'
                                                            data-toggle="modal"
                                                            data-target="#deleteModal">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        @else
                                                        <!-- Add File Button -->
                                                        <button type="button"
                                                            data-user="{{ json_encode([
                                                                'id' => $guardian->id ?? 0,
                                                                'user_id' => $guardian->user_id ?? 0,
                                                                'relationships_name' => $guardian->name ?? 'N/A',
                                                                'relation' => 'Relative'
                                                            ]) }}"
                                                            class="btn-success btn btn-sm upload-file-button">
                                                            <i class="fas fa-upload"></i>
                                                        </button>

                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- OtherRelatives Section -->
                    <div class="card">
                        <div class="card-header" id="otherRelativesHeading">
                            <h3 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#otherRelativesCollapse" aria-expanded="false" aria-controls="otherRelativesCollapse">
                                    OtherRelatives
                                </button>
                            </h3>
                        </div>

                        <div id="otherRelativesCollapse" class="collapse" aria-labelledby="otherRelativesHeading" data-parent="#dataAccordion">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if ($otherrelatives->isEmpty())
                                        <div class="text-center">
                                            <p>No data to display</p>
                                        </div>
                                    @else
                                    <table class="table table-bordered table-striped" id="otherRelativesTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>otherrelative Name</th>
                                                <th>User Email</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Gender</th>
                                                <th>DOB</th>
                                                <th>File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($otherrelatives as $index => $otherrelative)
                                                <tr data-user-id="{{ $otherrelative->ruser->id ?? '' }}">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $otherrelative->name }}</td>
                                                    <td>{{ $otherrelative->ruser->email ?? 'N/A' }}</td>
                                                    <td>{{ $otherrelative->contact }}</td>
                                                    <td>{{ $otherrelative->address }}</td>
                                                    <td>{{ $otherrelative->gender }}</td>
                                                    <td>{{ $otherrelative->date_of_birth ?? 'N/A' }}</td>
                                                    <td>
                                                        @if ($otherrelative->file)
                                                            <a href="{{ asset('storage/uploads/files/' . $otherrelative->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <!-- Delete Button -->
                                                        @if ($otherrelative->file)
                                                        <button
                                                            type="button"
                                                            class="btn btn-sm btn-danger delete-file-btn"
                                                            data-user='{{ json_encode(["id" => $otherrelative->id, "file" => $otherrelative->file, "user_id" => $otherrelative->user_id, "name" => $otherrelative->name, "relation" => "Relative"]) }}'
                                                            data-toggle="modal"
                                                            data-target="#deleteModal">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        @else
                                                        <!-- Add File Button -->
                                                        <button type="button"
                                                            data-user="{{ json_encode([
                                                                'id' => $otherrelative->id ?? 0,
                                                                'user_id' => $otherrelative->user_id ?? 0,
                                                                'relationships_name' => $otherrelative->name ?? 'N/A',
                                                                'relation' => 'Relative'
                                                            ]) }}"
                                                            class="btn-success btn btn-sm upload-file-button">
                                                            <i class="fas fa-upload"></i>
                                                        </button>

                                                        @endif
                                                    </td>                                           </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Creditors Section -->
                    <div class="card">
                        <div class="card-header" id="creditorsHeading">
                            <h3 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#creditorsCollapse" aria-expanded="false" aria-controls="creditorsCollapse">
                                    Creditors
                                </button>
                            </h3>
                        </div>
                        <div id="creditorsCollapse" class="collapse" aria-labelledby="creditorsHeading" data-parent="#dataAccordion">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if ($creditors->isEmpty())
                                        <div class="text-center">
                                            <p>No data to display</p>
                                        </div>
                                    @else
                                    <table class="table table-bordered table-striped" id="creditorsTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Creditor Name</th>
                                                <th>User Email</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Amount</th>
                                                <th>Description</th>
                                                <th>File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($creditors as $index => $creditor)
                                            <tr data-user-id="{{ $creditor->user->id ?? '' }}">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $creditor->name }}</td>
                                                <td>{{ $creditor->user->email ?? 'N/A' }}</td>
                                                <td>{{ $creditor->contact }}</td>
                                                <td>{{ $creditor->address }}</td>
                                                <td>{{ number_format($creditor->amount, 2) }}</td>
                                                <td>{{ $creditor->description }}</td>
                                                <td>
                                                    @if ($creditor->file)
                                                        <a href="{{ asset('storage/uploads/files/' . $creditor->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>

                                                <td>
                                                    <!-- Delete Button -->
                                                    @if ($creditor->file)
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-danger delete-file-btn"
                                                        data-user='{{ json_encode(["id" => $creditor->id, "file" => $creditor->file, "user_id" => $creditor->user_id, "name" => $creditor->name, "relation" => "Creditor"]) }}'
                                                        data-toggle="modal"
                                                        data-target="#deleteModal">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                    @else
                                                    <!-- Add File Button -->
                                                    <button type="button"
                                                        data-user="{{ json_encode([
                                                            'id' => $creditor->id ?? 0,
                                                            'user_id' => $creditor->user_id ?? 0,
                                                            'relationships_name' => $creditor->name ?? 'N/A',
                                                            'relation' => 'Creditor'
                                                        ]) }}"
                                                        class="btn-success btn btn-sm upload-file-button">
                                                        <i class="fas fa-upload"></i>
                                                    </button>

                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Debtors Section -->
                    <div class="card">
                        <div class="card-header" id="debtorsHeading">
                            <h3 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#debtorsCollapse" aria-expanded="false" aria-controls="debtorsCollapse">
                                    Debtors
                                </button>
                            </h3>
                        </div>
                        <div id="debtorsCollapse" class="collapse" aria-labelledby="debtorsHeading" data-parent="#dataAccordion">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if ($debtors->isEmpty())
                                        <div class="text-center">
                                            <p>No data to display</p>
                                        </div>
                                    @else
                                    <table class="table table-bordered table-striped" id="debtorsTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Debtor Name</th>
                                                <th>User Email</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Amount</th>
                                                <th>Description</th>
                                                <th>File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($debtors as $index => $debtor)
                                            <tr data-user-id="{{ $debtor->user->id ?? '' }}">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $debtor->name }}</td>
                                                <td>{{ $debtor->user->email ?? 'N/A' }}</td>
                                                <td>{{ $debtor->contact }}</td>
                                                <td>{{ $debtor->address }}</td>
                                                <td>{{ number_format($debtor->amount, 2) }}</td>
                                                <td>{{ $debtor->description }}</td>
                                                <td>
                                                    @if ($debtor->file)
                                                        <a href="{{ asset('storage/' . $debtor->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- Delete Button -->
                                                    @if ($debtor->file)
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-danger delete-file-btn"
                                                        data-user='{{ json_encode(["id" => $debtor->id, "file" => $debtor->file, "user_id" => $debtor->user_id, "name" => $debtor->name, "relation" => "Debtor"]) }}'
                                                        data-toggle="modal"
                                                        data-target="#deleteModal">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                    @else
                                                    <!-- Add File Button -->
                                                    <button type="button"
                                                        data-user="{{ json_encode([
                                                            'id' => $debtor->id ?? 0,
                                                            'user_id' => $debtor->user_id ?? 0,
                                                            'relationships_name' => $debtor->name ?? 'N/A',
                                                            'relation' => 'Debtor'
                                                        ]) }}"
                                                        class="btn-success btn btn-sm upload-file-button">
                                                        <i class="fas fa-upload"></i>
                                                    </button>

                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-center">Property Attachments</h2>

            <!-- Accordion for relationship-->
            <div class="accordion mt-4" id="dataAccordion">

                <!-- land -->
                <div class="card">
                    <div class="card-header" id="landHeading">
                        <h3 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#landCollapse" aria-expanded="false" aria-controls="landCollapse">
                                Land Files
                            </button>
                        </h3>
                    </div>
                    <div id="landCollapse" class="collapse" aria-labelledby="landHeading" data-parent="#dataAccordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($lands->isEmpty())
                                    <div class="text-center">
                                        <p>No land records available.</p>
                                    </div>
                                @else
                                    <table class="table table-bordered table-striped" id="landTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Owner</th>
                                                <th>District</th>
                                                <th>Village</th>
                                                <th>Size</th>
                                                <th>Custodian</th>
                                                <th>Interest Type</th>
                                                <th>Description</th>
                                                <th>File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lands as $index => $land)
                                                <tr data-user-id="{{ $land->ruser->id ?? '' }}">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $land->ruser->email ?? 'N/A' }}</td>
                                                    <td>{{ $land->district }}</td>
                                                    <td>{{ $land->village }}</td>
                                                    <td>{{ $land->size }}</td>
                                                    <td>{{ $land->custodian }}</td>
                                                    <td>{{ $land->interest_type }}</td>
                                                    <td>{{ $land->description }}</td>
                                                    <td>
                                                    @if ($land->file)
                                                        <a href="{{ asset('storage/uploads/files/' . $land->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                    </td>

                                                    <td>
                                                        <!-- Delete Button -->
                                                        @if ($land->file)
                                                        <button
                                                            type="button"
                                                            class="btn btn-sm btn-danger delete-file-btn"
                                                            data-user='{{ json_encode(["id" => $land->id, "file" => $land->file, "user_id" => $land->user_id, "name" => $land->name, "relation" => "Land"]) }}'
                                                            data-toggle="modal"
                                                            data-target="#deleteModal">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        @else
                                                        <!-- Add File Button -->
                                                        <button type="button"
                                                            data-user="{{ json_encode([
                                                                'id' => $land->id,
                                                                'user_id' => $land->user_id,
                                                                'relationships_name' => $land->name ?? 'N/A',
                                                                'relation' => 'Land'
                                                            ]) }}"
                                                            class="btn-success btn btn-sm upload-file-button">
                                                            <i class="fas fa-upload"></i>
                                                        </button>

                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- livestock -->
                <div class="card">
                    <div class="card-header" id="livestockHeading">
                        <h3 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#livestockCollapse" aria-expanded="false" aria-controls="livestockCollapse">
                                livestock Files
                            </button>
                        </h3>
                    </div>
                    <div id="livestockCollapse" class="collapse" aria-labelledby="livestockHeading" data-parent="#dataAccordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($livestocks->isEmpty())
                                    <div class="text-center">
                                        <p>No livestock records available.</p>
                                    </div>
                                @else
                                    <table class="table table-bordered table-striped" id="livestockTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Owner</th>
                                                <th>Type</th>
                                                <th>Number</th>
                                                <th>Location</th>
                                                <th>File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($livestocks as $index => $livestock)
                                                <tr data-user-id="{{ $livestock->ruser->id ?? '' }}">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $livestock->ruser->email ?? 'N/A' }}</td>
                                                    <td>{{ $livestock->type }}</td>
                                                    <td>{{ $livestock->number }}</td>
                                                    <td>{{ $livestock->location }}</td>
                                                    <td>
                                                    @if ($livestock->file)
                                                        <a href="{{ asset('storage/uploads/files/' . $livestock->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                    </td>

                                                    <td>
                                                        <!-- Delete Button -->
                                                        @if ($livestock->file)
                                                        <button
                                                            type="button"
                                                            class="btn btn-sm btn-danger delete-file-btn"
                                                            data-user='{{ json_encode(["id" => $livestock->id, "file" => $livestock->file, "user_id" => $livestock->user_id, "name" => $livestock->name, "relation" => "Livestock"]) }}'
                                                            data-toggle="modal"
                                                            data-target="#deleteModal">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        @else
                                                        <!-- Add File Button -->
                                                        <button type="button"
                                                            data-user="{{ json_encode([
                                                                'id' => $livestock->id ?? 0,
                                                                'user_id' => $livestock->user_id ?? 0,
                                                                'relationships_name' => $livestock->name ?? 'N/A',
                                                                'relation' => 'Livestock'
                                                            ]) }}"
                                                            class="btn-success btn btn-sm upload-file-button">
                                                            <i class="fas fa-upload"></i>
                                                        </button>

                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- bankAccount -->
                <div class="card">
                    <div class="card-header" id="bankaccountHeading">
                        <h3 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#bankaccountCollapse" aria-expanded="false" aria-controls="bankaccountCollapse">
                                bankaccount Files
                            </button>
                        </h3>
                    </div>
                    <div id="bankaccountCollapse" class="collapse" aria-labelledby="bankaccountHeading" data-parent="#dataAccordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($bankaccounts->isEmpty())
                                    <div class="text-center">
                                        <p>No bankaccount records available.</p>
                                    </div>
                                @else
                                    <table class="table table-bordered table-striped" id="bankaccountTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Owner</th>
                                                <th>Acc Number</th>
                                                <th>Bank</th>
                                                <th>Branch</th>
                                                <th>File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bankaccounts as $index => $bankaccount)
                                                <tr data-user-id="{{ $bankaccount->ruser->id ?? '' }}">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $bankaccount->ruser->email ?? 'N/A' }}</td>
                                                    <td>{{ $bankaccount->account_number }}</td>
                                                    <td>{{ $bankaccount->bank_name }}</td>
                                                    <td>{{ $bankaccount->branch }}</td>
                                                    <td>
                                                    @if ($bankaccount->file)
                                                        <a href="{{ asset('storage/uploads/files/' . $bankaccount->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                    </td>

                                                    <td>
                                                        <!-- Delete Button -->
                                                        @if ($bankaccount->file)
                                                        <button
                                                            type="button"
                                                            class="btn btn-sm btn-danger delete-file-btn"
                                                            data-user='{{ json_encode(["id" => $bankaccount->id, "file" => $bankaccount->file, "user_id" => $bankaccount->user_id, "name" => $bankaccount->name, "relation" => "BankAccount"]) }}'
                                                            data-toggle="modal"
                                                            data-target="#deleteModal">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        @else
                                                        <!-- Add File Button -->
                                                        <button type="button"
                                                            data-user="{{ json_encode([
                                                                'id' => $bankaccount->id ?? 0,
                                                                'user_id' => $bankaccount->user_id ?? 0,
                                                                'relationships_name' => $bankaccount->name ?? 'N/A',
                                                                'relation' => 'BankAccount'
                                                            ]) }}"
                                                            class="btn-success btn btn-sm upload-file-button">
                                                            <i class="fas fa-upload"></i>
                                                        </button>

                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- share -->
                <div class="card">
                    <div class="card-header" id="shareHeading">
                        <h3 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#shareCollapse" aria-expanded="false" aria-controls="shareCollapse">
                                share Files
                            </button>
                        </h3>
                    </div>
                    <div id="shareCollapse" class="collapse" aria-labelledby="shareHeading" data-parent="#dataAccordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($shares->isEmpty())
                                    <div class="text-center">
                                        <p>No share records available.</p>
                                    </div>
                                @else
                                    <table class="table table-bordered table-striped" id="shareTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Owner</th>
                                                <th>Percentage</th>
                                                <th>Organisation</th>
                                                <th>File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($shares as $index => $share)
                                                <tr data-user-id="{{ $share->ruser->id ?? '' }}">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $share->ruser->email ?? 'N/A' }}</td>
                                                    <td>{{ $share->percentage }}</td>
                                                    <td>{{ $share->organisation }}</td>
                                                    <td>
                                                    @if ($share->file)
                                                        <a href="{{ asset('storage/uploads/files/' . $share->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                    </td>

                                                    <td>
                                                        <!-- Delete Button -->
                                                        @if ($share->file)
                                                        <button
                                                            type="button"
                                                            class="btn btn-sm btn-danger delete-file-btn"
                                                            data-user='{{ json_encode(["id" => $share->id, "file" => $share->file, "user_id" => $share->user_id, "name" => $share->name, "relation" => "Share"]) }}'
                                                            data-toggle="modal"
                                                            data-target="#deleteModal">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        @else
                                                        <!-- Add File Button -->
                                                        <button type="button"
                                                            data-user="{{ json_encode([
                                                                'id' => $share->id ?? 0,
                                                                'user_id' => $share->user_id ?? 0,
                                                                'relationships_name' => $share->name ?? 'N/A',
                                                                'relation' => 'Share'
                                                            ]) }}"
                                                            class="btn-success btn btn-sm upload-file-button">
                                                            <i class="fas fa-upload"></i>
                                                        </button>

                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- vehicle -->
                <div class="card">
                    <div class="card-header" id="vehicleHeading">
                        <h3 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#vehicleCollapse" aria-expanded="false" aria-controls="vehicleCollapse">
                                vehicle Files
                            </button>
                        </h3>
                    </div>
                    <div id="vehicleCollapse" class="collapse" aria-labelledby="vehicleHeading" data-parent="#dataAccordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($vehicles->isEmpty())
                                    <div class="text-center">
                                        <p>No vehicle records available.</p>
                                    </div>
                                @else
                                    <table class="table table-bordered table-striped" id="vehicleTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Owner</th>
                                                <th>Model</th>
                                                <th>Number Plate</th>
                                                <th>Type</th>
                                                <th>Color</th>
                                                <th>File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($vehicles as $index => $vehicle)
                                                <tr data-user-id="{{ $vehicle->ruser->id ?? '' }}">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $vehicle->ruser->email ?? 'N/A' }}</td>
                                                    <td>{{ $vehicle->model }}</td>
                                                    <td>{{ $vehicle->number_plate }}</td>
                                                    <td>{{ $vehicle->type }}</td>
                                                    <td>{{ $vehicle->color }}</td>
                                                    <td>
                                                    @if ($vehicle->file)
                                                        <a href="{{ asset('storage/uploads/files/' . $vehicle->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                    </td>

                                                    <td>
                                                        <!-- Delete Button -->
                                                        @if ($vehicle->file)
                                                        <button
                                                            type="button"
                                                            class="btn btn-sm btn-danger delete-file-btn"
                                                            data-user='{{ json_encode(["id" => $vehicle->id, "file" => $vehicle->file, "user_id" => $vehicle->user_id, "name" => $vehicle->name, "relation" => "Vehicle"]) }}'
                                                            data-toggle="modal"
                                                            data-target="#deleteModal">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        @else
                                                        <!-- Add File Button -->
                                                        <button type="button"
                                                            data-user="{{ json_encode([
                                                                'id' => $vehicle->id ?? 0,
                                                                'user_id' => $vehicle->user_id ?? 0,
                                                                'relationships_name' => $vehicle->name ?? 'N/A',
                                                                'relation' => 'Vehicle'
                                                            ]) }}"
                                                            class="btn-success btn btn-sm upload-file-button">
                                                            <i class="fas fa-upload"></i>
                                                        </button>

                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- otherProperty -->
                <div class="card">
                    <div class="card-header" id="otherpropertyHeading">
                        <h3 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#otherpropertyCollapse" aria-expanded="false" aria-controls="otherpropertyCollapse">
                                otherproperty Files
                            </button>
                        </h3>
                    </div>
                    <div id="otherpropertyCollapse" class="collapse" aria-labelledby="otherpropertyHeading" data-parent="#dataAccordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($otherproperties->isEmpty())
                                    <div class="text-center">
                                        <p>No otherproperty records available.</p>
                                    </div>
                                @else
                                    <table class="table table-bordered table-striped" id="otherpropertyTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Owner</th>
                                                <th>Name</th>
                                                <th>Number</th>
                                                <th>Description</th>
                                                <th>File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($otherproperties as $index => $otherproperty)
                                                <tr data-user-id="{{ $otherproperty->ruser->id ?? '' }}">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $otherproperty->ruser->email ?? 'N/A' }}</td>
                                                    <td>{{ $otherproperty->name }}</td>
                                                    <td>{{ $otherproperty->number }}</td>
                                                    <td>{{ $otherproperty->description }}</td>
                                                    <td>
                                                    @if ($otherproperty->file)
                                                        <a href="{{ asset('storage/uploads/files/' . $otherproperty->file) }}" target="_blank" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                    </td>

                                                    <td>
                                                        <!-- Delete Button -->
                                                        @if ($otherproperty->file)
                                                        <button
                                                            type="button"
                                                            class="btn btn-sm btn-danger delete-file-btn"
                                                            data-user='{{ json_encode(["id" => $otherproperty->id, "file" => $otherproperty->file, "user_id" => $otherproperty->user_id, "name" => $otherproperty->name, "relation" => "OtherProperty"]) }}'
                                                            data-toggle="modal"
                                                            data-target="#deleteModal">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        @else
                                                        <!-- Add File Button -->
                                                        <button type="button"
                                                            data-user="{{ json_encode([
                                                                'id' => $otherproperty->id ?? 0,
                                                                'user_id' => $otherproperty->user_id ?? 0,
                                                                'relationships_name' => $otherproperty->name ?? 'N/A',
                                                                'relation' => 'OtherProperty'
                                                            ]) }}"
                                                            class="btn-success btn btn-sm upload-file-button">
                                                            <i class="fas fa-upload"></i>
                                                        </button>

                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">File Preview</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="filePreview" src="" frameborder="0" style="width: 100%; height: 500px;"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- File Upload Modal -->
<div class="modal fade" id="uploadFileModal" tabindex="-1" aria-labelledby="uploadFileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadFileModalLabel">Upload New File</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="userDetailsContent"></div> <!-- Dynamic Content Here -->

                <form id="uploadFileForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="type" name="type" value="">
                    <input type="hidden" id="userId" name="user_id" value="">
                    <input type="hidden" id="Id" name="id" value="">

                    <div class="form-group">
                        <label for="fileInput">Upload File</label>
                        <div id="dropZone" class="drop-zone border border-primary rounded text-center p-3">
                            <p class="text-muted">Drag and drop your file here, or click to select</p>
                            <input type="file" class="form-control d-none" id="fileInput" name="file" accept="image/*,application/pdf" required>
                            <label for="fileInput" class="btn btn-primary">Upload File</label>
                        </div>
                        <p id="fileNameDisplay" class="mt-2 text-success" style="display: none;"></p>
                    </div>

                    <div id="filePreviewContainer" class="mt-3" style="display: none;">
                        <h6>Preview:</h6>
                        <div id="filePreviewWrapper" class="border border-secondary rounded p-2"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="uploadFileButton">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form id="deleteFileForm" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="deleteConfirmationText"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
  </div>
</div>

<style>
    .drop-zone {
        cursor: pointer;
        background-color: #f9f9f9;
        transition: background-color 0.3s ease;
    }

    .drop-zone.dragover {
        background-color: #e9f5ff;
        border-color: #007bff;
    }
</style>
@endsection

@section('script')
<script>
function searchCategoryByDropdown() {
    let selectedCategory = document.getElementById("categoryDropdown").value;

    if (selectedCategory) {
        // Collapse all sections first
        document.querySelectorAll(".collapse").forEach(section => {
            section.classList.remove("show");
        });

        // Expand the selected category
        let categorySection = document.getElementById(selectedCategory);
        if (categorySection) {
            categorySection.classList.add("show");

            // Get the element's position relative to the document
            let elementPosition = categorySection.getBoundingClientRect().top + window.scrollY;

            // Option 1: Scroll to 10px from the top
            let offsetTop = elementPosition - 100;

            // Option 2: Scroll to center of the page
            let windowHeight = window.innerHeight;
            let elementHeight = categorySection.offsetHeight;
            let centerPosition = elementPosition - (windowHeight / 2) + (elementHeight / 2);

            // Adjust scrolling behavior (choose one)
            window.scrollTo({
                top: Math.max(offsetTop, 10), // Ensures it doesn't go negative
                behavior: "smooth"
            });
        }
    }
}

    $(document).ready(function () {
        // Utility function for SweetAlert notifications
        function showAlert(type, message) {
            Swal.fire({
                icon: type, // success, error, warning, info
                title: message,
                toast: true,
                position: 'top-right',
                timer: 3000,
                showConfirmButton: false,
            });
        }
      // Event listener for the button to trigger the modal
      $('.upload-file-button').on('click', function () {
        // Parse the data-user attribute
        const userData = JSON.parse(this.getAttribute('data-user'));

        // Extract values from userData
        const type = userData.relation;
        const userId = userData.user_id;
        const Id = userData.id;
        const relationshipsName = userData.relationships_name;

        // Set values for the hidden input fields
        $('#type').val(type); // Relation type
        $('#userId').val(userId); // User ID
        $('#Id').val(Id); // Relator ID

        // Construct the user details content
        const userDetails = `<p>Person's Name: <strong>${relationshipsName}</strong></p><p>Relation: <strong>${type}</strong></p>`;
        $('#userDetailsContent').html(userDetails);

        // Verify and show the modal
        const modal = $('#uploadFileModal');
        if (modal.length > 0) {
            modal.modal('show');
        } else {
            console.error('Modal #uploadFileModal not found.');
        }
      });

        // Handle form submission
        $('#uploadFileButton').on('click', function (event) {
            event.preventDefault(); // Prevent the default form submission

            const type = $('#type').val();
            const userId = $('#userId').val();
            const Id = $('#Id').val();
            const fileUpload = $('#fileInput')[0].files[0]; // Get the file from the input field

            if (!fileUpload) {
              Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please select a file to upload.',
                });
                return;
            }

            // Prepare form data
            const formData = new FormData();
            formData.append('type', type);
            formData.append('userId', userId);
            formData.append('id', Id);
            formData.append('fileUpload', fileUpload);

            // Add CSRF token
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            // Show loading state
            $('#uploadFileButton').prop('disabled', true).text('Uploading...');

            // Perform file upload using Fetch API
            fetch('/files', {
                method: 'POST',
                body: formData,
            })
                .then((response) => {
                    $('#uploadFileButton').prop('disabled', false).text('Save');

                    if (response.ok) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'File uploaded successfully!',
                        }).then(() => {
                            $('#uploadFileModal').modal('hide');
                            $('#uploadFileForm')[0].reset(); // Reset the form
                            $('body').removeClass('modal-open'); // Remove modal-open class
                            $('.modal-backdrop').remove(); // Remove backdrop overlay
                            location.reload(); // Refresh the page
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Upload Failed',
                            text: 'File upload failed. Please try again.',
                        });
                    }
                })
                .catch((error) => {
                    $('#uploadFileButton').prop('disabled', false).text('Save');
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while uploading the file. Please try again.',
                    });
                    console.error(error);
                });
        });

      // File preview logic
          const dropZone = document.getElementById('dropZone');
          const fileInput = document.getElementById('fileInput');
          const filePreviewContainer = document.getElementById('filePreviewContainer');
          const filePreviewWrapper = document.getElementById('filePreviewWrapper');
          const fileNameDisplay = document.getElementById('fileNameDisplay');

          // Function to handle file preview
          function handleFilePreview(file) {
              fileNameDisplay.textContent = `Selected file: ${file.name}`;
              fileNameDisplay.style.display = 'block';
              dropZone.style.display = 'none';

              // Clear previous preview
              filePreviewWrapper.innerHTML = '';

              // Generate preview based on file type
              const fileType = file.type;
              if (fileType.startsWith('image/')) {
                  const img = document.createElement('img');
                  img.src = URL.createObjectURL(file);
                  img.classList.add('img-fluid');
                  img.style.maxHeight = '200px';
                  filePreviewWrapper.appendChild(img);
              } else if (fileType === 'application/pdf') {
                  const iframe = document.createElement('iframe');
                  iframe.src = URL.createObjectURL(file);
                  iframe.style.width = '100%';
                  iframe.style.height = '200px';
                  iframe.frameBorder = '0';
                  filePreviewWrapper.appendChild(iframe);
              } else {
                  filePreviewWrapper.innerHTML = `<p class="text-danger">File type not supported for preview.</p>`;
              }

              // Show the preview container
              filePreviewContainer.style.display = 'block';
          }

          // Handle drag-and-drop events
          dropZone.addEventListener('dragover', (e) => {
              e.preventDefault();
              dropZone.classList.add('dragover');
          });

          dropZone.addEventListener('dragleave', () => {
              dropZone.classList.remove('dragover');
          });

          dropZone.addEventListener('drop', (e) => {
              e.preventDefault();
              dropZone.classList.remove('dragover');
              if (e.dataTransfer.files.length > 0) {
                  fileInput.files = e.dataTransfer.files;
                  handleFilePreview(e.dataTransfer.files[0]);
              }
          });

          // Update file preview when selected via input
          fileInput.addEventListener('change', () => {
              if (fileInput.files.length > 0) {
                  handleFilePreview(fileInput.files[0]);
              }
          });

      // Handle preview button click
        $('.preview-btn').on('click', function () {
            const url = $(this).data('url');
            $('#filePreview').attr('src', url);
        });

        // Handle delete file button click
        // $('.delete-file-btn').on('click', function () {
        //     const id = $(this).data('id');
        //     const deleteFileUrl = `/relatives/${id}/file`;
        //     $('#deleteFileForm').attr('action', deleteFileUrl);
        // });

        // Open the delete modal and set the form action dynamically
        $('.delete-file-btn').on('click', function () {
            // Parse the data-user attribute
            const userData = JSON.parse(this.getAttribute('data-user'));

            // Extract values from userData
            const id = userData.id;
            const userId = userData.user_id;
            const file = userData.file;
            const name = userData.name;
            const relation = userData.relation;

            // Construct the delete URL
            const deleteFileUrl = `/files/{id}`;

            // Set the form's action dynamically
            $('#deleteFileForm').attr('action', deleteFileUrl);

            // Include hidden fields for relation and file
            $('#deleteFileForm').find('input[name="relation"]');
            $('#deleteFileForm').find('input[userId="userId"]');
            $('#deleteFileForm').find('input[id="id"]');
            $('#deleteFileForm').find('input[name="file"]').remove();
            $('#deleteFileForm').append(`<input type="hidden" name="relation" value="${relation}">`);
            $('#deleteFileForm').append(`<input type="hidden" name="file" value="${file}">`);
            $('#deleteFileForm').append(`<input type="hidden" name="id" value="${id}">`);
            $('#deleteFileForm').append(`<input type="hidden" name="userId" value="${userId}">`);

            // Update the confirmation text dynamically
            $('#deleteConfirmationText').text(`Are you sure you want to delete the file "${file}" for "${name}" who is a (${relation})?`);

            // Open the modal
            $('#deleteModal').modal('show');
        });

        // Handle form submission via AJAX
        $('#deleteFileForm').on('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            const form = $(this);
            const actionUrl = form.attr('action'); // Get the action URL
            const formData = form.serialize(); // Serialize the form data

            $.ajax({
                url: actionUrl,
                type: 'POST',
                data: formData,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: response.message || 'The item has been deleted successfully.',
                    }).then(() => {
                        $('#deleteModal').modal('hide'); // Close the modal
                        $('body').removeClass('modal-open'); // Remove modal-open class
                        $('.modal-backdrop').remove(); // Remove backdrop overlay
                        location.reload(); // Refresh the page to see the updated data
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON.message || 'An error occurred while deleting the item.',
                    });
                },
            });
        });

        // Initialize Select2 for the user dropdown
        $('#searchUser').select2();

        // Add event listener for filtering
        $('#searchUser').on('change', function () {
            const userId = $(this).val();

            // Filter children table
            $('#childrenTable tbody tr').each(function () {
                const rowUserId = $(this).data('user-id');
                if (userId === "" || rowUserId == userId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            // Filter spouses table
            $('#spousesTable tbody tr').each(function () {
                const rowUserId = $(this).data('user-id');
                if (userId === "" || rowUserId == userId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            // Filter dependants table
            $('#dependantsTable tbody tr').each(function () {
                const rowUserId = $(this).data('user-id');
                if (userId === "" || rowUserId == userId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            // Filter guardians table
            $('#guardiansTable tbody tr').each(function () {
                const rowUserId = $(this).data('user-id');
                if (userId === "" || rowUserId == userId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            // Filter otherRelatives table
            $('#otherRelativesTable tbody tr').each(function () {
                const rowUserId = $(this).data('user-id');
                if (userId === "" || rowUserId == userId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            // Filter creditors table
            $('#creditorsTable tbody tr').each(function () {
                const rowUserId = $(this).data('user-id');
                if (userId === "" || rowUserId == userId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            // Filter debtors table
            $('#debtorsTable tbody tr').each(function () {
                const rowUserId = $(this).data('user-id');
                if (userId === "" || rowUserId == userId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            // Filter lands table
            $('#landsTable tbody tr').each(function () {
                const rowUserId = $(this).data('user-id');
                if (userId === "" || rowUserId == userId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            // Filter livestocks table
            $('#livestocksTable tbody tr').each(function () {
                const rowUserId = $(this).data('user-id');
                if (userId === "" || rowUserId == userId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            // Filter bankaccounts table
            $('#bankaccountsTable tbody tr').each(function () {
                const rowUserId = $(this).data('user-id');
                if (userId === "" || rowUserId == userId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            // Filter shares table
            $('#sharesTable tbody tr').each(function () {
                const rowUserId = $(this).data('user-id');
                if (userId === "" || rowUserId == userId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            // Filter vehicles table
            $('#vehiclesTable tbody tr').each(function () {
                const rowUserId = $(this).data('user-id');
                if (userId === "" || rowUserId == userId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            // Filter otherpropertys table
            $('#otherpropertysTable tbody tr').each(function () {
                const rowUserId = $(this).data('user-id');
                if (userId === "" || rowUserId == userId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });


        // Initialize DataTables for advanced table features with pagination limit
        $('#childrenTable').DataTable({
            paging: true,
            ordering: true,
            pageLength: 20, // Show 20 rows per page
        });

        $('#spousesTable').DataTable({
            paging: true,
            ordering: true,
            pageLength: 20, // Show 20 rows per page
        });

        $('#dependantsTable').DataTable({
            paging: true,
            ordering: true,
            pageLength: 20, // Show 20 rows per page
        });

        $('#guardiansTable').DataTable({
            paging: true,
            ordering: true,
            pageLength: 20, // Show 20 rows per page
        });

        $('#otherRelativesTable').DataTable({
            paging: true,
            ordering: true,
            pageLength: 20, // Show 20 rows per page
        });

        // Initialize DataTable
        $('#creditorsTable').DataTable({
            paging: true,
            ordering: true,
            pageLength: 20, // Show 20 rows per page
        });

        // Initialize DataTable
        $('#debtorsTable').DataTable({
            paging: true,
            ordering: true,
            pageLength: 20, // Show 20 rows per page
        });
    });
</script>
@endsection
