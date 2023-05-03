@extends('partials.app')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title ">Leave Tracker</h5>
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

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active mt-4" id="all" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
                                            data-bs-target="#bulk-leave-assign" onclick="bulkAssignLeave('All')">
                                            Bulk Assign
                                        </button>
                                    </div>
                                </div>

                                <div class="table-responsive text-center">
                                    <table class="table table-lg users-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Annual Leave</th>
                                                <th class="text-center">Casual Leave</th>
                                                <th class="text-center">Leave Taken</th>
                                                <th class="text-center">Remaining</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td class="col-md-2">
                                                        {{ $user->full_name }}
                                                    </td>
                                                    <td class="col-md-2">{{ $user->role->name }}</td>
                                                    <td class="col-md-2">
                                                        <input class="form-control" name="annual-leave-{{ $user->id }}"
                                                            id="annual-leave-{{ $user->id }}"
                                                            onclick="LoadSaveButton('annual-leave-{{ $user->id }}',{{ $user->id }})"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->annual_leave }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control" name="casual-leave-{{ $user->id }}"
                                                            id="casual-leave-{{ $user->id }}"
                                                            onclick="LoadSaveButton('casual-leave-{{ $user->id }}',{{ $user->id }})"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->casual_leave }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control" name="leave-taken-{{ $user->id }}"
                                                            id="leave-taken-{{ $user->id }}"
                                                            onclick="LoadSaveButton('leave-taken-{{ $user->id }}',{{ $user->id }})"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->leave_taken }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control" name="remaining-{{ $user->id }}"
                                                            id="remaining-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->remaining }}"
                                                    @else
                                                    value="0" @endif
                                                            readonly />
                                                    </td>

                                                    <td class="d-none col-md-2" id="saving-button-{{ $user->id }}">
                                                        <button type="button" class="btn btn-primary block"
                                                            id="btn-{{ $user->id }}"
                                                            onclick="SaveUserLeave({{ $user->id }})">
                                                            Save
                                                        </button>

                                                    </td>

                                                    <td class="d-none col-md-2" id="processing-{{ $user->id }}">
                                                        <button class="btn btn-primary" type="button" disabled>
                                                            <span class="spinner-grow spinner-grow-sm" role="status"
                                                                aria-hidden="true"></span>
                                                            Processing
                                                        </button>
                                                    </td>

                                                    <td class="d-none col-md-2" id="done-{{ $user->id }}">
                                                        <button class="btn btn-success" type="button" disabled>
                                                            <i class="bi bi-check-all"></i>
                                                            Done
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade mt-4" id="admin" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
                                            data-bs-target="#bulk-leave-assign" onclick="bulkAssignLeave('Admin')">
                                            Bulk Assign
                                        </button>
                                    </div>
                                </div>

                                <div class="table-responsive text-center">
                                    <table class="table table-lg users-table-admin">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Annual Leave</th>
                                                <th class="text-center">Casual Leave</th>
                                                <th class="text-center">Leave Taken</th>
                                                <th class="text-center">Remaining</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($admins as $user)
                                                <tr>
                                                    <td class="col-md-2">
                                                        {{ $user->full_name }}
                                                    </td>
                                                    <td class="col-md-2">{{ $user->role->name }}</td>
                                                    <td class="col-md-2">
                                                        <input class="form-control"
                                                            name="annual-leave-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->annual_leave }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control"
                                                            name="casual-leave-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->casual_leave }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control"
                                                            name="leave-taken-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->leave_taken }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control" name="remaining-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->remaining }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>

                                                    <td class="col-md-2">
                                                        <input class="form-control" type="hidden"
                                                            name="id-{{ $user->id }}" value="{{ $user->id }}" />
                                                        <button type="button" class="btn btn-primary block"
                                                            data-bs-toggle="modal" data-bs-target="#bulk-leave-assign"
                                                            onclick="bulkAssignLeave({{ $user->id }})">
                                                            Save
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade mt-4" id="operator" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
                                            data-bs-target="#bulk-leave-assign" onclick="bulkAssignLeave('Operator')">
                                            Bulk Assign
                                        </button>
                                    </div>
                                </div>

                                <div class="table-responsive text-center">
                                    <table class="table table-lg users-table-operator">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Annual Leave</th>
                                                <th class="text-center">Casual Leave</th>
                                                <th class="text-center">Leave Taken</th>
                                                <th class="text-center">Remaining</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($operators as $user)
                                                <tr>
                                                    <td class="col-md-2">
                                                        {{ $user->full_name }}
                                                    </td>
                                                    <td class="col-md-2">{{ $user->role->name }}</td>
                                                    <td class="col-md-2">
                                                        <input class="form-control"
                                                            name="annual-leave-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->annual_leave }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control"
                                                            name="casual-leave-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->casual_leave }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control"
                                                            name="leave-taken-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->leave_taken }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control" name="remaining-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->remaining }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>

                                                    <td class="col-md-2">
                                                        <input class="form-control" type="hidden"
                                                            name="id-{{ $user->id }}" value="{{ $user->id }}" />
                                                        <button type="button" class="btn btn-primary block"
                                                            data-bs-toggle="modal" data-bs-target="#bulk-leave-assign"
                                                            onclick="bulkAssignLeave({{ $user->id }})">
                                                            Save
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade mt-4" id="field-admin" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
                                            data-bs-target="#bulk-leave-assign" onclick="bulkAssignLeave('FieldAdmin')">
                                            Bulk Assign
                                        </button>
                                    </div>
                                </div>

                                <div class="table-responsive text-center">
                                    <table class="table table-lg users-table-field-admin">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Annual Leave</th>
                                                <th class="text-center">Casual Leave</th>
                                                <th class="text-center">Leave Taken</th>
                                                <th class="text-center">Remaining</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fieldAdmin as $user)
                                                <tr>
                                                    <td class="col-md-2">
                                                        {{ $user->full_name }}
                                                    </td>
                                                    <td class="col-md-2">{{ $user->role->name }}</td>
                                                    <td class="col-md-2">
                                                        <input class="form-control"
                                                            name="annual-leave-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->annual_leave }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control"
                                                            name="casual-leave-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->casual_leave }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control"
                                                            name="leave-taken-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->leave_taken }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control" name="remaining-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->remaining }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>

                                                    <td class="col-md-2">
                                                        <input class="form-control" type="hidden"
                                                            name="id-{{ $user->id }}" value="{{ $user->id }}" />
                                                        <button type="button" class="btn btn-primary block"
                                                            data-bs-toggle="modal" data-bs-target="#bulk-leave-assign"
                                                            onclick="bulkAssignLeave({{ $user->id }})">
                                                            Save
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade mt-4" id="field" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
                                            data-bs-target="#bulk-leave-assign" onclick="bulkAssignLeave('FieldWorker')">
                                            Bulk Assign
                                        </button>
                                    </div>
                                </div>

                                <div class="table-responsive text-center">
                                    <table class="table table-lg users-table-field">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Annual Leave</th>
                                                <th class="text-center">Casual Leave</th>
                                                <th class="text-center">Leave Taken</th>
                                                <th class="text-center">Remaining</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fieldWorker as $user)
                                                <tr>
                                                    <td class="col-md-2">
                                                        {{ $user->full_name }}
                                                    </td>
                                                    <td class="col-md-2">{{ $user->role->name }}</td>
                                                    <td class="col-md-2">
                                                        <input class="form-control"
                                                            name="annual-leave-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->annual_leave }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control"
                                                            name="casual-leave-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->casual_leave }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control"
                                                            name="leave-taken-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->leave_taken }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control" name="remaining-{{ $user->id }}"
                                                            @if ($user->leave_tracker) value="{{ $user->leave_tracker->remaining }}"
                                                    @else
                                                    value="0" @endif />
                                                    </td>

                                                    <td class="col-md-2">
                                                        <input class="form-control" type="hidden"
                                                            name="id-{{ $user->id }}" value="{{ $user->id }}" />
                                                        <button type="button" class="btn btn-primary block"
                                                            data-bs-toggle="modal" data-bs-target="#bulk-leave-assign"
                                                            onclick="bulkAssignLeave({{ $user->id }})">
                                                            Save
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>

                        {{-- <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-10 col-10">
                                    </div>
                                    <div class="col-lg-2 col-2">
                                        <button class='btn btn-outline-primary pl-4 pr-4'>Save</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="bulk-leave-assign" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="bulk-leave">
                        Add New User
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <form action={{ route('admin.leave.bulk.tracker') }} method="POST">
                            @csrf
                            <input class="form-control" type="hidden" name="type" id="bulk-leave-type" />

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="annual_leave" class="form-label">Annual Leave</label>
                                    <input class="form-control" type="number" name="annual_leave" autofocus required />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="casual_leave" class="form-label">Casual Leave</label>
                                    <input class="form-control" type="number" name="casual_leave" />
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
@endsection
