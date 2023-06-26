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
                                        @if ($fieldWorkerSchedule->count() > 1)
                                            @foreach ($fieldWorkerSchedule as $schedule)
                                                <td class="text-center">{{ strtoupper($schedule->shift) }}</td>
                                            @endforeach
                                        @else
                                            <td class="text-center">OD</td>
                                            <td class="text-center">OD</td>
                                            <td class="text-center">OD</td>
                                            <td class="text-center">OD</td>
                                            <td class="text-center">OD</td>
                                            <td class="text-center">OD</td>
                                            <td class="text-center">OD</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <h4 class="card-title mt-3">Engineering Schedule</h4>
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
                                        @if ($EngineeringSchedule->count() > 1)
                                            @foreach ($EngineeringSchedule as $schedule)
                                                <td class="text-center">{{ ucwords($schedule->is_meal) }}</td>
                                            @endforeach
                                        @else
                                            <td class="text-center">OFF</td>
                                            <td class="text-center">OFF</td>
                                            <td class="text-center">OFF</td>
                                            <td class="text-center">OFF</td>
                                            <td class="text-center">OFF</td>
                                            <td class="text-center">OFF</td>
                                            <td class="text-center">OFF</td>
                                        @endif
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
