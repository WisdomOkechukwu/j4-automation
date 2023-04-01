@extends('partials.app')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title ">Assign Tickets</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                    role="tab" aria-controls="home" aria-selected="true">All(24)</a>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile"
                                    role="tab" aria-controls="profile" aria-selected="false" onclick="generateTable('operator')">
                                    Operators(10)</a>
                            </li> --}}
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active mt-4" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row mb-2">
                                    <div class="col-md-10">
                                    </div>

                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-outline-primary block"
                                        data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                        Bulk Assign
                                        </button>
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
                                                    <button type="button" class="btn btn-primary block"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                                    Assign
                                                    </button>
                                                </td>

                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        Meal Ticket Information
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-4 col-3">
                                    <label class="col-form-label">Select Month</label>
                                </div>
                                <div class="col-lg-8 col-9">
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect">
                                            <option>Select Week</option>
                                            <option>First Week</option>
                                            <option>Second Week</option>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-4 col-3">
                                    <label class="col-form-label">No. Of Tickets</label>
                                </div>
                                <div class="col-lg-8 col-9">
                                    <input type="text" id="first-name" class="form-control" name="fname"
                                        placeholder="Enter Value">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-4 col-3">
                                    <label class="col-form-label">Amount</label>
                                </div>
                                <div class="col-lg-8 col-9">
                                    <input type="text" id="first-name" class="form-control" name="fname"
                                        placeholder="Enter Value">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1"
                        data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection