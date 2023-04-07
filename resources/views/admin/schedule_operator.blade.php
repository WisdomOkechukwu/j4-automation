@extends('partials.app')
@section('content')
    <section class="card text-center">
        <h5 class="mt-4">{{ $user->full_name }} Schedule
            <br>
            <h6>{{ $segment }}</h6>
        </h5>

        <div class="container row">

            <div class="col-md-2 mb-4">
                <fieldset class="form-group shadow">
                    <select name class="form-select" id="month_dropdown" onchange="sortOperatorSchedule({{ $user->id }})">
                        <option value="noData">Select Month</option>
                        @foreach ($months as $ms)
                            <option value="{{ $ms['number'] }}">{{ $ms['month'] }}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>

            <div class="col-md-2 mb-4">
                <fieldset class="form-group shadow">
                    <select class="form-select" id="year_dropdown" onchange="sortOperatorSchedule({{ $user->id }})">
                        <option value="noData">Select Year</option>
                        @foreach ($years as $ys)
                            <option value="{{ $ys }}">{{ $ys }}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>

            <div class="col-md-6">
                {{-- space inbetween --}}
            </div>

            <div class="col-md-2">
                <button type="button" class='btn btn-success pl-4 pr-4'>Day</button>
                <button type="buttton" class='btn btn-secondary pl-4 pr-4'>Night</button>

            </div>
        </div>
        <form action="{{ route('admin.user.schedule.operator.action') }}" method="POST">
            @csrf
            <div class="border rounded m-4">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead>
                            <tr>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Fri</th>
                                <th>Sat</th>
                                <th>Sun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($days as $key => $day)
                                <tr>

                                    @foreach ($day as $d)
                                        <td>
                                            @if ($d != null)
                                                <div class="btn-group-vertical mr-2">
                                                    <input type="hidden" id="status-{{ $d['day'] }}"
                                                        name="{{ $month }}-{{ $d['day'] }}"
                                                        @if ($d['schedule']) value="{{ $d['schedule'] }}" 
                                                    @else
                                                    value="" @endif />

                                                    <button type="button" class="btn btn-outline-secondary"
                                                        disabled>{{ $d['day'] }}</button>
                                                    <button id="day-{{ $d['day'] }}" type="button"
                                                        @if ($d['schedule'] == 'day') class="btn btn-success"
                                                        @else
                                                        class="btn btn-outline-success" @endif
                                                        onclick="scheduleDay({{ $d['day'] }})">Day</button>
                                                    <button id="night-{{ $d['day'] }}" type="button"
                                                        @if ($d['schedule'] == 'night') class="btn btn-secondary"
                                                        @else
                                                        class="btn btn-outline-secondary" @endif
                                                        class="btn btn-outline-secondary"
                                                        onclick="scheduleNight({{ $d['day'] }})">Night</button>
                                                </div>
                                            @endif
                                        </td>
                                    @endforeach

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row container ">
                <h5 class="mt-4 mb-4 is-valid">Meal Ticket Information</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row align-items-center">
                            <div class="col-lg-4 col-3">
                                <label class="col-form-label">No. Of Tickets</label>
                            </div>
                            <input type="hidden" name="month" value="{{ $month }}" />
                            <input type="hidden" name="year" value="{{ $year }}" />
                            <input type="hidden" name="user" value="{{ $user->id }}" />
                            <div class="col-lg-8 col-9">
                                @if ($mealTicket)
                                    <input type="text" id="first-name" class="form-control" name="meal_ticket_number"
                                        value="{{ $mealTicket->number }}">
                                @else
                                    <input type="text" id="first-name" class="form-control" name="meal_ticket_number"
                                        value="0">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row align-items-center">
                            <div class="col-lg-4 col-3">
                                <label class="col-form-label">Amount</label>
                            </div>
                            <div class="col-lg-8 col-9">
                                @if ($mealTicket)
                                    <input type="text" id="first-name" class="form-control" name="meal_ticket_amount"
                                        value="{{ $mealTicket->amount }}">
                                @else
                                    <input type="text" id="first-name" class="form-control" name="meal_ticket_amount"
                                        value="0">
                                @endif
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
                                <button class='btn btn-success pl-4 pr-4'>Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
