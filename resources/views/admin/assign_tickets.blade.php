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
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">All({{ $users->count() }})</a>
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
                                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                            data-bs-target="#bulk-assign-modal">
                                            Bulk Assign
                                        </button>
                                    </div>
                                </div>

                                <div class="table-responsive text-center">
                                    <form action={{ route('admin.assign.multiple.tickets') }} method="POST" id='bulk-assign-form'>
                                        @csrf
                                        <table class="table table-lg users-table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        <input type="checkbox"
                                                            class="form-check-input form-check-primary form-check-glow"
                                                            id="check-all"
                                                            onchange="bulkAssignTasks({{ $users }})">Name
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
                                                                id="checkbox-{{ $user->id }}">
                                                            {{ $user->full_name }}
                                                        </td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->role->name }}</td>
                                                        <td class="text-bold-500">{{ $user->id_number }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary block"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModalCenter" onclick="loadSingleAssignModal({{ $user }})">
                                                                Assign
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                </div>
                                <input type="hidden" id='bulk-month' name='bulk_month'>
                                <input type="hidden" id='bulk-ticket-no' name='bulk_ticket_no'>
                                <input type="hidden" id='bulk-amount' name='bulk_amount'>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="user-modal-title">
                        ..........Error Reload page(No User Selected).........
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action={{ route('admin.assign.single.tickets') }} method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id='single-user-id' name='user_id'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-4 col-3">
                                    <label class="col-form-label">Select Month</label>
                                </div>
                                <div class="col-lg-8 col-9">
                                    <fieldset class="form-group">
                                        <select name="single_assign_month" class="form-select">
                                            <option value="noData">Select Month</option>
                                            @foreach ($months as $ms)
                                                <option value="{{ $ms['number'] }}">{{ $ms['month'] }}</option>
                                            @endforeach
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
                                    <input type="text" class="form-control" name="single_ticket_no"
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
                                    <input type="text" id="first-name" class="form-control" name="single_amount"
                                        placeholder="Enter Value">
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
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="bulk-assign-modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        Bulk Assign Meal Ticket
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                                        <select id="bulk-assign-month" class="form-select">
                                            <option value="noData">Select Month</option>
                                            @foreach ($months as $ms)
                                                <option value="{{ $ms['number'] }}">{{ $ms['month'] }}</option>
                                            @endforeach
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
                                    <input type="text" id="bulk-assign-ticket-no" class="form-control" name="fname"
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
                                    <input type="text" id="bulk-assign-amount" class="form-control" name="fname"
                                        placeholder="Enter Value">
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
                        onclick="bulkAssignMealTicket()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
