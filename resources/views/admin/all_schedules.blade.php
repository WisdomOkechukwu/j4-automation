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
                                    onclick="generateScheduleTable('all-users')">All(24)</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="operators-tab" data-bs-toggle="tab" href="#operators"
                                    role="tab" aria-controls="operators-tab" aria-selected="true"
                                    onclick="generateScheduleTable('operators')">Operators(24)</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="field-admin-tab" data-bs-toggle="tab" href="#field-admin"
                                    role="tab" aria-controls="field-admin-tab" aria-selected="true"
                                    onclick="generateScheduleTable('field-admin')">Field Admin(24)</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="field-worker-tab" data-bs-toggle="tab" href="#field-worker"
                                    role="tab" aria-controls="field-worker-tab" aria-selected="true"
                                    onclick="generateScheduleTable('field-worker')">Field Worker(24)</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active mt-4" id="all-users" role="tabpanel" aria-labelledby="all-users">
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
                                            <tr>
                                                <td class="text-bold-500">Daniel Craig</td>
                                                <td>007</td>
                                                <td class="text-bold-500">007Agent</td>
                                                <td><a href="" class="btn btn-primary">Schedule</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade active mt-4 d-none" id="operators" role="tabpanel" aria-labelledby="operators">
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
                                            <tr>
                                                <td class="text-bold-500">Daniel Craig</td>
                                                <td>007</td>
                                                <td class="text-bold-500">007Agent</td>
                                                <td><a href="" class="btn btn-primary">Schedule</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade active mt-4 d-none" id="field-admin" role="tabpanel" aria-labelledby="field-admin">
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
                                            <tr>
                                                <td class="text-bold-500">Daniel Craig</td>
                                                <td>007</td>
                                                <td class="text-bold-500">007Agent</td>
                                                <td><a href="" class="btn btn-primary">Schedule</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade active mt-4 d-none" id="field-worker" role="tabpanel" aria-labelledby="field-worker">
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
                                            <tr>
                                                <td class="text-bold-500">Daniel Craig</td>
                                                <td>007</td>
                                                <td class="text-bold-500">007Agent</td>
                                                <td><a href="" class="btn btn-primary">Schedule</a></td>
                                            </tr>
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