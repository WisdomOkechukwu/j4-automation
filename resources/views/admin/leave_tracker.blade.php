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
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                    role="tab" aria-controls="home" aria-selected="true">All(24)</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile"
                                    role="tab" aria-controls="profile" aria-selected="false" onclick="generateTable('operator')">
                                    Operators(10)</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact"
                                    role="tab" aria-controls="contact" aria-selected="false" onclick="generateTable('field')">
                                    Field Workers(10)</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active mt-4" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row align-items-center">
                                            <div class="col-lg-5 col-3">
                                                <label class="col-form-label">Annual Leave</label>
                                            </div>
                                            <div class="col-lg-7 col-9">
                                                <input type="text" id="first-name" class="form-control" name="fname"
                                                    placeholder="Enter Value">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row align-items-center">
                                            <div class="col-lg-5 col-3">
                                                <label class="col-form-label">Casual Leave</label>
                                            </div>
                                            <div class="col-lg-7 col-9">
                                                <input type="text" id="first-name" class="form-control" name="fname"
                                                    placeholder="Enter Value">
                                            </div>
                                        </div>
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
                                            <tr>
                                                <td class="col-md-2">
                                                    Daniel Craig
                                                </td>
                                                <td class="col-md-2">Field</td>
                                                <td class="col-md-2">
                                                    <input class="form-control" value = "4"/>
                                                </td>
                                                <td class="col-md-2">
                                                    <input class="form-control" value = "4"/>
                                                </td>
                                                <td class="col-md-2">
                                                    <input class="form-control" value = "4"/>
                                                </td>
                                                <td class="col-md-2">
                                                    20
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row align-items-center">
                                                <div class="col-lg-5 col-3">
                                                    <label class="col-form-label">Annual Leave</label>
                                                </div>
                                                <div class="col-lg-7 col-9">
                                                    <input type="text" id="first-name" class="form-control" name="fname"
                                                        placeholder="Enter Value">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row align-items-center">
                                                <div class="col-lg-5 col-3">
                                                    <label class="col-form-label">Casual Leave</label>
                                                </div>
                                                <div class="col-lg-7 col-9">
                                                    <input type="text" id="first-name" class="form-control" name="fname"
                                                        placeholder="Enter Value">
                                                </div>
                                            </div>
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
                                                <tr>
                                                    <td class="col-md-2">
                                                        Daniel Craig
                                                    </td>
                                                    <td class="col-md-2">Field</td>
                                                    <td class="col-md-2">
                                                        <input class="form-control" value = "4"/>
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control" value = "4"/>
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control" value = "4"/>
                                                    </td>
                                                    <td class="col-md-2">
                                                        20
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                               <div class="mt-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row align-items-center">
                                                <div class="col-lg-5 col-3">
                                                    <label class="col-form-label">Annual Leave</label>
                                                </div>
                                                <div class="col-lg-7 col-9">
                                                    <input type="text" id="first-name" class="form-control" name="fname"
                                                        placeholder="Enter Value">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row align-items-center">
                                                <div class="col-lg-5 col-3">
                                                    <label class="col-form-label">Casual Leave</label>
                                                </div>
                                                <div class="col-lg-7 col-9">
                                                    <input type="text" id="first-name" class="form-control" name="fname"
                                                        placeholder="Enter Value">
                                                </div>
                                            </div>
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
                                                <tr>
                                                    <td class="col-md-2">
                                                        Daniel Craig
                                                    </td>
                                                    <td class="col-md-2">Field</td>
                                                    <td class="col-md-2">
                                                        <input class="form-control" value = "4"/>
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control" value = "4"/>
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input class="form-control" value = "4"/>
                                                    </td>
                                                    <td class="col-md-2">
                                                        20
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-10 col-10">
                                    </div>
                                    <div class="col-lg-2 col-2">
                                        <button class='btn btn-outline-primary pl-4 pr-4'>Save</button>
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