@extends('partials.app')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title ">All Users</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        </div>

                        <div class="col-md-3">
                            <fieldset class="form-group shadow">
                                <select class="form-select" id="bulk-action-dropdown" onchange="bulkMessageModal()">
                                    <option value="bulk-action">Bulk Action</option>
                                    <option value="bulk-message">Bulk Message</option>
                                    {{-- <option value="upload-csv">Upload CSV</option> --}}
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-md-3">
                            @if (Auth::user()->role_id == 999)
                                <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
                                    data-bs-target="#add-user">
                                    Add User
                                </button>
                                <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
                                    data-bs-target="#upload-csv">
                                    Upload CSV
                                </button>
                            @endif
                        </div>

                        {{-- <div class="col-md-2">
                            @if (Auth::user()->role_id == 999)
                                <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
                                    data-bs-target="#upload-csv">
                                    Upload CSV
                                </button>
                            @endif
                        </div> --}}

                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#all" role="tab"
                                    aria-controls="home" aria-selected="true">All({{ $users->count() }})</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#admin" role="tab"
                                    aria-controls="profile" aria-selected="false" onclick="generateTable('admin')">
                                    Admins({{ $admins->count() }})</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#operator" role="tab"
                                    aria-controls="profile" aria-selected="false" onclick="generateTable('operator')">
                                    Operators({{ $operators->count() }})</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#field-admin" role="tab"
                                    aria-controls="contact" aria-selected="false" onclick="generateTable('field-admin')">
                                    Field Worker Admin({{ $fieldAdmin->count() }})</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#field" role="tab"
                                    aria-controls="contact" aria-selected="false" onclick="generateTable('field')">
                                    Field Workers({{ $fieldWorker->count() }})</a>
                            </li>
                        </ul>
                        <form action={{ route('admin.bulk-message') }} method="POST" id='bulk-message-form'>
                            @csrf
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active mt-4" id="all" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="row mb-2">


                                        {{-- <div class="col-md-1">
                                        <a href="" class="btn btn-outline-primary">Apply</a>
                                    </div> --}}
                                    </div>

                                    <div class="table-responsive text-center">
                                        <table class="table table-lg all-users-table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        <input type="checkbox"
                                                            class="form-check-input form-check-primary form-check-glow"
                                                            id="check-all"
                                                            onchange="bulkAssignAdmin({{ $users }},'all')">Name
                                                    </th>
                                                    <th class="text-center">Email</th>
                                                    <th class="text-center">Job Role</th>
                                                    <th class="text-center">ID Number</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td class="text-bold-500">
                                                            <input type="checkbox"
                                                                class="form-check-input form-check-primary form-check-glow"
                                                                name="{{ $user->id }}"
                                                                id="checkbox-{{ $user->id }}-all">
                                                            {{ $user->full_name }}
                                                        </td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->role->name }}</td>
                                                        <td class="text-bold-500">{{ $user->id_number }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.staff-profile', ['user' => $user]) }}"
                                                                class="btn btn-primary mb-1">View</a>
                                                            <button type="button" class="btn btn-primary block"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#single-message-modal"
                                                                onclick="sendSingleMessage({{ $user }})">
                                                                Message
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="mt-4">
                                        <div class="row mb-2">


                                            {{-- <div class="col-md-1">
                                            <a href="" class="btn btn-outline-primary">Apply</a>
                                        </div> --}}
                                        </div>
                                        <div class="table-responsive text-center">
                                            <table class="table table-lg all-users-table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            <input type="checkbox"
                                                                class="form-check-input form-check-primary form-check-glow"
                                                                id="check-admin"
                                                                onchange="bulkAssignAdmin({{ $admins }},'admin')">Name
                                                        </th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Job Role</th>
                                                        <th class="text-center">ID Number</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($admins as $admin)
                                                        <tr>
                                                            <td class="text-bold-500">
                                                                <input type="checkbox"
                                                                    class="form-check-input form-check-primary form-check-glow"
                                                                    name="{{ $admin->id }}"
                                                                    id="checkbox-{{ $admin->id }}-admin">
                                                                {{ $admin->full_name }}
                                                            </td>
                                                            <td>{{ $admin->email }}</td>
                                                            <td>{{ $admin->role->name }}</td>
                                                            <td class="text-bold-500">{{ $admin->id_number }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.staff-profile', ['user' => $admin]) }}"
                                                                    class="btn btn-primary mb-1">View</a>
                                                                <button type="button" class="btn btn-primary block"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#single-message-modal"
                                                                    onclick="sendSingleMessage({{ $admin }})">
                                                                    Message
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="operator" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="mt-4">
                                        <div class="row mb-2">


                                            {{-- <div class="col-md-1">
                                            <a href="" class="btn btn-outline-primary">Apply</a>
                                        </div> --}}
                                        </div>
                                        <div class="table-responsive text-center">
                                            <table class="table table-lg all-users-table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            <input type="checkbox"
                                                                class="form-check-input form-check-primary form-check-glow"
                                                                id="check-operator"
                                                                onchange="bulkAssignAdmin({{ $operators }},'operator')">Name
                                                        </th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Job Role</th>
                                                        <th class="text-center">ID Number</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($operators as $operator)
                                                        <tr>
                                                            <td class="text-bold-500">
                                                                <input type="checkbox"
                                                                    class="form-check-input form-check-primary form-check-glow"
                                                                    name="{{ $operator->id }}"
                                                                    id="checkbox-{{ $operator->id }}-operator">
                                                                {{ $operator->full_name }}
                                                            </td>
                                                            <td>{{ $operator->email }}</td>
                                                            <td>{{ $operator->role->name }}</td>
                                                            <td class="text-bold-500">{{ $operator->id_number }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.staff-profile', ['user' => $operator]) }}"
                                                                    class="btn btn-primary mb-1">View</a>
                                                                <button type="button" class="btn btn-primary block"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#single-message-modal"
                                                                    onclick="sendSingleMessage({{ $operator }})">
                                                                    Message
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="field-admin" role="tabpanel"
                                    aria-labelledby="contact-tab">
                                    <div class="mt-4">
                                        <div class="row mb-2">

                                            {{-- <div class="col-md-1">
                                            <a href="" class="btn btn-outline-primary">Apply</a>
                                        </div> --}}
                                        </div>
                                        <div class="table-responsive text-center">
                                            <table class="table table-lg all-users-table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            <input type="checkbox"
                                                                class="form-check-input form-check-primary form-check-glow"
                                                                id="check-field-admin"
                                                                onchange="bulkAssignAdmin({{ $fieldAdmin }},'field-admin')">Name
                                                        </th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Job Role</th>
                                                        <th class="text-center">ID Number</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($fieldAdmin as $user)
                                                        <tr>
                                                            <td class="text-bold-500">
                                                                <input type="checkbox"
                                                                    class="form-check-input form-check-primary form-check-glow"
                                                                    name="{{ $user->id }}"
                                                                    id="checkbox-{{ $user->id }}-field-admin">
                                                                {{ $user->full_name }}
                                                            </td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->role->name }}</td>
                                                            <td class="text-bold-500">{{ $user->id_number }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.staff-profile', ['user' => $user]) }}"
                                                                    class="btn btn-primary mb-1">View</a>
                                                                <button type="button" class="btn btn-primary block"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#single-message-modal"
                                                                    onclick="sendSingleMessage({{ $user }})">
                                                                    Message
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="field" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="mt-4">
                                        <div class="row mb-2">

                                            {{-- <div class="col-md-1">
                                            <a href="" class="btn btn-outline-primary">Apply</a>
                                        </div> --}}
                                        </div>
                                        <div class="table-responsive text-center">
                                            <table class="table table-lg all-users-table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            <input type="checkbox"
                                                                class="form-check-input form-check-primary form-check-glow"
                                                                id="check-field"
                                                                onchange="bulkAssignAdmin({{ $fieldWorker }},'field')">Name
                                                        </th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Job Role</th>
                                                        <th class="text-center">ID Number</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($fieldWorker as $user)
                                                        <tr>
                                                            <td class="text-bold-500">
                                                                <input type="checkbox"
                                                                    class="form-check-input form-check-primary form-check-glow"
                                                                    name="{{ $user->id }}"
                                                                    id="checkbox-{{ $user->id }}-field">
                                                                {{ $user->full_name }}
                                                            </td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->role->name }}</td>
                                                            <td class="text-bold-500">{{ $user->id_number }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.staff-profile', ['user' => $user]) }}"
                                                                    class="btn btn-primary mb-1">View</a>
                                                                <button type="button" class="btn btn-primary block"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#single-message-modal"
                                                                    onclick="sendSingleMessage({{ $user }})">
                                                                    Message
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <input type="hidden" id='bulk-message' name='bulk_message'>
                                            <input type="hidden" id='bulk-subject' name='bulk_subject'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="bulk-assign-modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="exampleModalCenterTitle">
                            Bulk Message
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-12 col-12">
                                        <label class="col-form-label">Subject</label>
                                        <input type="text" id="bulk-subject-header" class="form-control"
                                            placeholder="Enter Subject">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-12 col-12">
                                        <label class="col-form-label">Body</label>
                                        <textarea id="bulk-body" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal"
                            onclick="bulkMessageSendForm()">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Save</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="upload-csv" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="exampleModalCenterTitle">
                            Upload CSV
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" id='user-token' name='_token' value="{{ csrf_token() }}">
                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Upload CSV here
                                </p>
                                <!-- Basic file uploader -->
                                <input type="file" name="csv" class="basic-filepond">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="single-message-modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="single-header">
                            .........Erro Reloading Modal - Reload Page........
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action={{ route('admin.user-message') }} method="POST">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" id='single-user-id' name='user'>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-12 col-12">
                                            <label class="col-form-label">Subject</label>
                                            <input type="text" name="single_subject" id="single-subject"
                                                class="form-control" placeholder="Enter Subject">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-12 col-12">
                                            <label class="col-form-label">Body</label>
                                            <textarea id="single-body" name="single_body" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="single-header">
                            Add New User
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <form action={{ route('admin.add.user') }} method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input class="form-control" type="text" id="firstName" name="firstName"
                                            autofocus required />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input class="form-control" type="text" name="lastName" id="lastName"
                                            required />
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label" for="country">Job role</label>
                                        <select class="select2 form-select" name="role" required>
                                            <option value="">Select Job Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="country">Gender</label>
                                        <select id="country" class="select2 form-select" name='gender' required>
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="country">Marital status</label>
                                        <select class="select2 form-select" name="marital_status" required>
                                            <option value="">Select Marital Status</option>
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="country">ID Numer</label>
                                        <input type="text" class="form-control" name="id_number"
                                            placeholder="Enter ID Number" required />
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="address" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="address" value=""
                                            name="address" placeholder="Enter Address" required />
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="address" class="form-label">Password</label>
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="Enter Password" autocomplete="off" required />
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="modal-footer"> --}}
                    {{-- <button type="submit" class="btn btn-primary ml-1">
                                Add User
                            </button> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- filepond validation -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <!-- image editor -->
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

    <!-- filepond -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="{{ asset('assets/js/csvFilePond.js') }}"></script>
@endsection
