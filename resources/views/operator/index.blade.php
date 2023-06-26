@extends('partials.app')
@section('content')
    <h3>Welcome Back</h3>

    <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12">
            <div class="card shadow">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Work Schedule (this week)</h4>
                        <div class="table-responsive text-center">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th class="text-center">Mon</th>
                                        <th class="text-center">Tue</th>
                                        <th class="text-center">Wed</th>
                                        <th class="text-center">Thu</th>
                                        <th class="text-center">Fri</th>
                                        <th class="text-center">Sat</th>
                                        <th class="text-center">Sun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @if ($operatorSchedule->count() > 1)
                                            @foreach ($operatorSchedule as $schedule)
                                                <td class="text-center">{{ ucwords($schedule->shift) }}</td>
                                            @endforeach
                                        @else
                                            <td class="text-center">Off</td>
                                            <td class="text-center">Off</td>
                                            <td class="text-center">Off</td>
                                            <td class="text-center">Off</td>
                                            <td class="text-center">Off</td>
                                            <td class="text-center">Off</td>
                                            <td class="text-center">Off</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <h4 class="card-title mt-3">Meal Ticket Information</h4>
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>No. Of Tickets</th>
                                        <th style="text-align: right; flex: 1;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $mealTicket ? number_format($mealTicket->number) : 0 }}</td>
                                        <td style="text-align: right; flex: 1;">
                                            {{ $mealTicket ? number_format($mealTicket->amount) : 0 }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h4 class="card-title mt-3">Leave Tracker</h4>
                        <div class="table-responsive text-center">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th class="text-center">Annual Leave</th>
                                        <th class="text-center">Casual Leave</th>
                                        <th class="text-center">Leave taken</th>
                                        <th class="text-center">Leave Remaining</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">{{ Auth::user()->leave_tracker->annual_leave }}</td>
                                        <td class="text-center">{{ Auth::user()->leave_tracker->casual_leave }}</td>
                                        <td class="text-center">{{ Auth::user()->leave_tracker->leave_taken }}</td>
                                        <td class="text-center">{{ Auth::user()->leave_tracker->remaining }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
