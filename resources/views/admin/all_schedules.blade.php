@extends('partials.app')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title ">All Schedules</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="all-users-tab" data-bs-toggle="tab" href="#all-users"
                                    role="tab" aria-controls="all-users-tab" aria-selected="true"
                                    onclick="generateScheduleTable('all-users')">All({{ $users->count() }})</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="operators-tab" data-bs-toggle="tab" href="#operators" role="tab"
                                    aria-controls="operators-tab" aria-selected="true"
                                    onclick="generateScheduleTable('operators')">Operators({{ $operators->count() }})</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="field-admin-tab" data-bs-toggle="tab" href="#field-admin"
                                    role="tab" aria-controls="field-admin-tab" aria-selected="true"
                                    onclick="generateScheduleTable('field-admin')">Field Worker Admin({{ $fieldAdmin->count() }})</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="field-worker-tab" data-bs-toggle="tab" href="#field-worker"
                                    role="tab" aria-controls="field-worker-tab" aria-selected="true"
                                    onclick="generateScheduleTable('field-worker')">Field Worker({{ $fieldWorker->count() }})</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active mt-4" id="all-users" role="tabpanel"
                                aria-labelledby="all-users">
                                <div class="table-responsive">
                                    <table class="table table-lg users-table-all-users users-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Job Role</th>
                                                <th>ID Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $u)
                                            <tr>
                                                <td class="text-bold-500">{{ $u->full_name }}</td>
                                                <td>{{ $u->role->name }}</td>
                                                <td class="text-bold-500">{{ $u->id_number }}</td>
                                                @if($u->role_id == 889)
                                                <td><a href="{{ route('admin.user.schedule.operator', [$u]) }}" class="btn btn-primary">Schedule</a></td>
                                                @else
                                                <td><a href="{{ route('admin.user.schedule.field.worker', [$u]) }}" class="btn btn-primary">Schedule</a></td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade mt-4" id="operators" role="tabpanel"
                                aria-labelledby="operators">
                                <div class="table-responsive">
                                    <table class="table table-lg users-table-operators">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Job Role</th>
                                                <th>ID Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($operators as $u)
                                            <tr>
                                                <td class="text-bold-500">{{ $u->full_name }}</td>
                                                <td>{{ $u->role->name }}</td>
                                                <td class="text-bold-500">{{ $u->id_number }}</td>
                                                <td><a href="{{ route('admin.user.schedule.operator', [$u]) }}" class="btn btn-primary">Schedule</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade mt-4" id="field-admin" role="tabpanel"
                                aria-labelledby="field-admin">
                                <div class="table-responsive">
                                    <table class="table table-lg users-table-field-admin">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Job Role</th>
                                                <th>ID Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fieldAdmin as $u)
                                            <tr>
                                                <td class="text-bold-500">{{ $u->full_name }}</td>
                                                <td>{{ $u->role->name }}</td>
                                                <td class="text-bold-500">{{ $u->id_number }}</td>
                                                <td><a href="{{ route('admin.user.schedule.field.worker', [$u]) }}" class="btn btn-primary">Schedule</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade mt-4" id="field-worker" role="tabpanel"
                                aria-labelledby="field-worker">
                                <div class="table-responsive">
                                    <table class="table table-lg users-table-field-worker">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Job Role</th>
                                                <th>ID Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fieldWorker as $u)
                                            <tr>
                                                <td class="text-bold-500">{{ $u->full_name }}</td>
                                                <td>{{ $u->role->name }}</td>
                                                <td class="text-bold-500">{{ $u->id_number }}</td>
                                                <td><a href="{{ route('admin.user.schedule.field.worker', [$u]) }}" class="btn btn-primary">Schedule</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
