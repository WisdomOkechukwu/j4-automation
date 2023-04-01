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
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                    role="tab" aria-controls="home" aria-selected="true">All(24)</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile"
                                    role="tab" aria-controls="profile" aria-selected="false">Operators(10)</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact"
                                    role="tab" aria-controls="contact" aria-selected="false">Field Workers(10)</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active mt-4" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="table-responsive">
                                    <table class="table table-lg users-table">
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

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="mt-4">
                                    <div class="table-responsive">
                                        <table class="table table-lg users-table">
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
                            
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                               <div class="mt-4">
                                    <div class="table-responsive">
                                            <table class="table table-lg users-table">
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
            </div>
        </div>
    </section>
@endsection