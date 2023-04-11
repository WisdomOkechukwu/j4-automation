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
                        <div class="col-md-9">
                        </div>

                        <div class="col-md-3">
                            <fieldset class="form-group shadow">
                                <select class="form-select" id="bulk-action-dropdown" onchange="bulkMessageModal()">
                                    <option value="bulk-action">Bulk Action</option>
                                    <option value="bulk-message">Bulk Message</option>
                                </select>
                            </fieldset>
                        </div>
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
                                        <table class="table table-lg users-table">
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
                                                            <a href="{{ route('admin.staff-profile',['user'=>$user]) }}" class="btn btn-primary">View</a>
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
                                            <table class="table table-lg users-table-admin">
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
                                                                <a href="{{ route('admin.staff-profile',['user'=>$admin]) }}" class="btn btn-primary">View</a>
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
                                            <table class="table table-lg users-table-operator">
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
                                                                <a href="{{ route('admin.staff-profile',['user'=>$operator]) }}" class="btn btn-primary">View</a>
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
                                            <table class="table table-lg users-table-field-admin">
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
                                                                <a href="{{ route('admin.staff-profile',['user'=>$user]) }}" class="btn btn-primary">View</a>
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
                                            <table class="table table-lg users-table-field">
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
                                                                <a href="{{ route('admin.staff-profile',['user'=>$user]) }}" class="btn btn-primary">View</a>
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
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
