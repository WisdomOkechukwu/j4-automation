@extends('partials.app')
@section('content')
    <h5>J4 Insight</h5>
    <div class="row">
        <div class="col-xl-4 col-md-4 col-sm-12">
            <div class="card text-center shadow">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Staff Strenght</h4>
                        <h2 class="card-text">
                            {{ $staffStrength }}
                        </h2>
                    </div>
                </div>
                <div>
                    <h6>All Staff</h6>
                </div>
                {{-- <div class="card-footer">
                    <h6>All Staff</h6>
                </div> --}}
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-12">
            <div class="card text-center shadow">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Issued Tickets</h4>
                        <h2 class="card-text">
                            {{ $issuedTicketsNo }}
                        </h2>
                    </div>
                </div>
                <div>
                    <h6>This Month</h6>
                </div>
                {{-- <div class="card-footer">
                    <h6>All Staff</h6>
                </div> --}}
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-12">
            <div class="card text-center shadow">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Total Ticket Cost</h4>
                        <h2 class="card-text">
                            ₦{{ $issuedTicketsCost }}
                        </h2>
                    </div>
                </div>
                <div>
                    <h6>This Month</h6>
                </div>
                {{-- <div class="card-footer">
                    <h6>All Staff</h6>
                </div> --}}
            </div>
        </div>
    </div>


    <div class="row">
        <h5>Operator Insight</h5>
        <div class="col-xl-4 col-md-4 col-sm-12">
            <div class="card text-center shadow">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Days Shift</h4>
                        <h2 class="card-text">
                            {{ $dayShift }}
                        </h2>
                    </div>
                </div>
                <div>
                    <h6>This Month</h6>
                </div>
                {{-- <div class="card-footer">
                    <h6>All Staff</h6>
                </div> --}}
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-12">
            <div class="card text-center shadow">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Night Shift</h4>
                        <h2 class="card-text">
                            {{ $nightShift }}
                        </h2>
                    </div>
                </div>
                <div>
                    <h6>This Month</h6>
                </div>
                {{-- <div class="card-footer">
                    <h6>All Staff</h6>
                </div> --}}
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-12">
            <div class="card text-center shadow">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Off Shifts</h4>
                        <h2 class="card-text">
                            {{ $offShift }}
                        </h2>
                    </div>
                </div>
                <div>
                    <h6>This Month</h6>
                </div>
                {{-- <div class="card-footer">
                    <h6>All Staff</h6>
                </div> --}}
            </div>
        </div>
    </div>


    <div class="row">
        <h5>Field Worker Insight</h5>
        <div class="col-xl-4 col-md-4 col-sm-12">
            <div class="card text-center shadow">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Work Days</h4>
                        <h2 class="card-text">
                            {{ $workDays }}
                        </h2>
                    </div>
                </div>
                <div>
                    <h6>This Month</h6>
                </div>
                {{-- <div class="card-footer">
                    <h6>All Staff</h6>
                </div> --}}
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-12">
            <div class="card text-center shadow">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Off Days</h4>
                        <h2 class="card-text">
                            {{ $offDays }}
                        </h2>
                    </div>
                </div>
                <div>
                    <h6>This Month</h6>
                </div>
                {{-- <div class="card-footer">
                    <h6>All Staff</h6>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
