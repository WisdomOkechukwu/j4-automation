@extends('partials.app')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title ">All Users</h5>
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
                                <div class="row mb-2">
                                    <div class="col-md-9">
                                    </div>

                                    <div class="col-md-2">
                                        <fieldset class="form-group shadow">
                                            <select class="form-select" id="basicSelect">
                                                <option>Bulk Action</option>
                                                <option>Bulk Message</option>
                                            </select>
                                        </fieldset>
                                    </div>  

                                    <div class="col-md-1">
                                        <a href="" class="btn btn-outline-primary">Apply</a>
                                    </div>    
                                </div>

                                <div class="table-responsive text-center">
                                    <table class="table table-lg users-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Job Role</th>
                                                <th class="text-center">ID Number</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-bold-500">
                                                <input type="checkbox"
                                                    class="form-check-input form-check-primary form-check-glow"
                                                    name="customCheck" id="customColorCheck1">
                                                    Daniel Craig
                                                </td>
                                                <td>TheDanielCraig@gmail.com</td>
                                                <td>007</td>
                                                <td class="text-bold-500">007Agent</td>
                                                <td>
                                                    <a href="" class="btn btn-primary">View</a>
                                                    <a href="" class="btn btn-primary">Message</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="mt-4">
                                    <div class="row mb-2">
                                        <div class="col-md-9">
                                        </div>

                                        <div class="col-md-2">
                                            <fieldset class="form-group shadow">
                                                <select class="form-select" id="basicSelect">
                                                    <option>Bulk Action</option>
                                                    <option>Bulk Message</option>
                                                </select>
                                            </fieldset>
                                        </div>  

                                        <div class="col-md-1">
                                            <a href="" class="btn btn-outline-primary">Apply</a>
                                        </div>    
                                    </div>
                                    <div class="table-responsive text-center">
                                        <table class="table table-lg users-table-operator">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Email</th>
                                                    <th class="text-center">Job Role</th>
                                                    <th class="text-center">ID Number</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-bold-500">
                                                    <input type="checkbox"
                                                        class="form-check-input form-check-primary form-check-glow"
                                                        name="customCheck" id="customColorCheck1">
                                                        Daniel Craig
                                                    </td>
                                                    <td>TheDanielCraig@gmail.com</td>
                                                    <td>007</td>
                                                    <td class="text-bold-500">007Agent</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary">View</a>
                                                        <a href="" class="btn btn-primary">Message</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                               <div class="mt-4">
                                    <div class="row mb-2">
                                        <div class="col-md-9">
                                        </div>

                                        <div class="col-md-2">
                                            <fieldset class="form-group shadow">
                                                <select class="form-select" id="basicSelect">
                                                    <option>Bulk Action</option>
                                                    <option>Bulk Message</option>
                                                </select>
                                            </fieldset>
                                        </div>  

                                        <div class="col-md-1">
                                            <a href="" class="btn btn-outline-primary">Apply</a>
                                        </div>    
                                    </div>
                                    <div class="table-responsive text-center">
                                        <table class="table table-lg users-table-field">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Email</th>
                                                    <th class="text-center">Job Role</th>
                                                    <th class="text-center">ID Number</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-bold-500">
                                                    <input type="checkbox"
                                                        class="form-check-input form-check-primary form-check-glow"
                                                        name="customCheck" id="customColorCheck1">
                                                        Daniel Craig
                                                    </td>
                                                    <td>TheDanielCraig@gmail.com</td>
                                                    <td>007</td>
                                                    <td class="text-bold-500">007Agent</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary">View</a>
                                                        <a href="" class="btn btn-primary">Message</a>
                                                    </td>
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
    </section>
@endsection