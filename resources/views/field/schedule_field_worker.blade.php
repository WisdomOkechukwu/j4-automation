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
                    <select name class="form-select" id="month_dropdown"
                        onchange="fieldWorkerScheduleForAdmin({{ $user->id }})">
                        <option value="noData">Select Month</option>
                        @foreach ($months as $ms)
                            <option value="{{ $ms['number'] }}">{{ $ms['month'] }}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>

            <div class="col-md-2 mb-4">
                <fieldset class="form-group shadow">
                    <select class="form-select" id="year_dropdown" onchange="fieldWorkerScheduleForAdmin({{ $user->id }})">
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
                <button class='btn btn-success pl-4 pr-4' disabled>WD</button>
                <button class='btn btn-danger pl-4 pr-4' disabled>OD</button>

            </div>
        </div>

        <form action="{{ route('field.admin.schedule.field.worker.action') }}" method="POST">
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
                                                        @if ($d['shift']) value="{{ $d['shift'] }}" 
                                                    @else
                                                    value="" @endif />

                                                    <button type="button" class="btn btn-outline-secondary"
                                                        disabled>{{ $d['day'] }}</button>
                                                    <button id="wd-{{ $d['day'] }}" type="button"
                                                        @if ($d['shift'] == 'wd') class="btn btn-success"
                                                        @else
                                                        class="btn btn-outline-success" @endif
                                                        onclick="scheduleWorkDay({{ $d['day'] }})">WD</button>
                                                    <button id="od-{{ $d['day'] }}" type="button"
                                                        @if ($d['shift'] == 'od') class="btn btn-danger"
                                                        @else
                                                        class="btn btn-outline-danger" @endif
                                                        class="btn btn-outline-danger"
                                                        onclick="scheduleOffDay({{ $d['day'] }})">OD</button>
                                                </div>
                                            @endif
                                        </td>
                                    @endforeach

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <input type="hidden" name="month" value="{{ $month }}" />
                    <input type="hidden" name="year" value="{{ $year }}" />
                    <input type="hidden" name="user" value="{{ $user->id }}" />
                    <input type="hidden" name="days_no" value="{{ $daysInAMonth }}" />
                </div>
            </div>

            <div class="row container">
                <h5 class="mt-4 mb-4 is-valid">Engineering Schedule</h5>
                <div>
                    <div class="container row">
                        <div class="col-md-2 mb-4">
                            <fieldset class="form-group shadow">
                                <select class="form-select" id="weekDropDown" onchange="hideAndShowWeekModal()">
                                    @foreach ($noOfWeeks as $key => $nw)
                                        <option value="{{ $key + 1 }}">
                                            {{ $nw['name'] }}
                                        </option>
                                    @endforeach

                                    {{-- <a class="nav-link" data-bs-toggle="tab" href="#week-{{ $key }}"
                                                role="tab" aria-controls="operators-tab" aria-selected="true"></a> --}}
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-md-8 mb-4">
                        </div>

                        <div class="col-md-2">
                            <button class='btn btn-success pl-4 pr-4' disabled>ON</button>
                            <button class='btn btn-danger pl-4 pr-4' disabled>OFF</button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row container mb-4">
                @if ($days[0])
                    <div class="d-block mt-4" id="week-1">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-dark">
                                    <tr>
                                        @foreach ($days[0] as $d)
                                            <th>
                                                @if ($d != null)
                                                    {{ $d['weekday'] }}<br>{{ $d['date'] }}
                                                @endif
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($days[0] as $d)
                                            <td class="text-bold-500">
                                                @if ($d != null)
                                                    <input type='hidden' id="engineering-status-{{ $d['day'] }}"
                                                        name="engineering_status_{{ $d['day'] }}"
                                                        @if ($d['is_meal']) value="{{ $d['is_meal'] }}" 
                                                        @else
                                                        value="" @endif />

                                                    <textarea class="form-control mb-2" name="meal_data_{{ $d['day'] }}" rows="3">@if ($d['meal_name']) {{ trim($d['meal_name']) }} @endif </textarea>

                                                    <button type='button'
                                                        @if ($d['is_meal'] == 'on') class="btn btn-success pl-4 pr-4"
                                                        @else
                                                        class=" btn btn-outline-success pl-4 pr-4" @endif
                                                        id="on-{{ $d['day'] }}"
                                                        onclick="selectOnEngineeringSchedule({{ $d['day'] }})">ON</button>
                                                    <button type='button'
                                                        @if ($d['is_meal'] == 'off') class="btn btn-danger pl-4 pr-4"
                                                        @else
                                                        class=" btn btn-outline-danger pl-4 pr-4" @endif
                                                        id="off-{{ $d['day'] }}"
                                                        onclick="selectOffEngineeringSchedule({{ $d['day'] }})">OFF</button>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                @if ($days[1])
                    <div class="d-none  mt-4" id="week-2">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-dark">
                                    <tr>
                                        @foreach ($days[1] as $d)
                                            <th>
                                                @if ($d != null)
                                                    {{ $d['weekday'] }}<br>{{ $d['date'] }}
                                                @endif
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($days[1] as $d)
                                            <td class="text-bold-500">
                                                @if ($d != null)
                                                    <input type='hidden' id="engineering-status-{{ $d['day'] }}"
                                                        name="engineering_status_{{ $d['day'] }}"
                                                        @if ($d['is_meal']) value="{{ $d['is_meal'] }}" 
                                                        @else
                                                        value="" @endif />

                                                    <textarea class="form-control mb-2" name="meal_data_{{ $d['day'] }}" rows="3">@if ($d['meal_name']) {{ trim($d['meal_name']) }} @endif </textarea>

                                                    <button type='button'
                                                        @if ($d['is_meal'] == 'on') class="btn btn-success pl-4 pr-4"
                                                        @else
                                                        class=" btn btn-outline-success pl-4 pr-4" @endif
                                                        id="on-{{ $d['day'] }}"
                                                        onclick="selectOnEngineeringSchedule({{ $d['day'] }})">ON</button>
                                                    <button type='button'
                                                        @if ($d['is_meal'] == 'off') class="btn btn-danger pl-4 pr-4"
                                                        @else
                                                        class=" btn btn-outline-danger pl-4 pr-4" @endif
                                                        id="off-{{ $d['day'] }}"
                                                        onclick="selectOffEngineeringSchedule({{ $d['day'] }})">OFF</button>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif


                @if ($days[2])
                    <div class="d-none mt-4" id="week-3">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-dark">
                                    <tr>
                                        @foreach ($days[2] as $d)
                                            <th>
                                                @if ($d != null)
                                                    {{ $d['weekday'] }}<br>{{ $d['date'] }}
                                                @endif
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($days[2] as $d)
                                            <td class="text-bold-500">
                                                @if ($d != null)
                                                    <input type='hidden' id="engineering-status-{{ $d['day'] }}"
                                                        name="engineering_status_{{ $d['day'] }}"
                                                        @if ($d['is_meal']) value="{{ $d['is_meal'] }}" 
                                                        @else
                                                        value="" @endif />

                                                    <textarea class="form-control mb-2" name="meal_data_{{ $d['day'] }}" rows="3">@if ($d['meal_name']) {{ trim($d['meal_name']) }} @endif </textarea>

                                                    <button type='button'
                                                        @if ($d['is_meal'] == 'on') class="btn btn-success pl-4 pr-4"
                                                        @else
                                                        class=" btn btn-outline-success pl-4 pr-4" @endif
                                                        id="on-{{ $d['day'] }}"
                                                        onclick="selectOnEngineeringSchedule({{ $d['day'] }})">ON</button>
                                                    <button type='button'
                                                        @if ($d['is_meal'] == 'off') class="btn btn-danger pl-4 pr-4"
                                                        @else
                                                        class=" btn btn-outline-danger pl-4 pr-4" @endif
                                                        id="off-{{ $d['day'] }}"
                                                        onclick="selectOffEngineeringSchedule({{ $d['day'] }})">OFF</button>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                @if ($days[3])
                    <div class="d-none mt-4" id="week-4">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-dark">
                                    <tr>
                                        @foreach ($days[3] as $d)
                                            <th>
                                                @if ($d != null)
                                                    {{ $d['weekday'] }}<br>{{ $d['date'] }}
                                                @endif
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($days[3] as $d)
                                            <td class="text-bold-500">
                                                @if ($d != null)
                                                    <input type='hidden' id="engineering-status-{{ $d['day'] }}"
                                                        name="engineering_status_{{ $d['day'] }}"
                                                        @if ($d['is_meal']) value="{{ $d['is_meal'] }}" 
                                                        @else
                                                        value="" @endif />

                                                    <textarea class="form-control mb-2" name="meal_data_{{ $d['day'] }}" rows="3">@if ($d['meal_name']) {{ trim($d['meal_name']) }} @endif </textarea>

                                                    <button type='button'
                                                        @if ($d['is_meal'] == 'on') class="btn btn-success pl-4 pr-4"
                                                        @else
                                                        class=" btn btn-outline-success pl-4 pr-4" @endif
                                                        id="on-{{ $d['day'] }}"
                                                        onclick="selectOnEngineeringSchedule({{ $d['day'] }})">ON</button>
                                                    <button type='button'
                                                        @if ($d['is_meal'] == 'off') class="btn btn-danger pl-4 pr-4"
                                                        @else
                                                        class=" btn btn-outline-danger pl-4 pr-4" @endif
                                                        id="off-{{ $d['day'] }}"
                                                        onclick="selectOffEngineeringSchedule({{ $d['day'] }})">OFF</button>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                @if ($days[4])
                    <div class="d-none mt-4" id="week-5">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-dark">
                                    <tr>
                                        @foreach ($days[4] as $d)
                                            <th>
                                                @if ($d != null)
                                                    {{ $d['weekday'] }}<br>{{ $d['date'] }}
                                                @endif
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($days[4] as $d)
                                            <td class="text-bold-500">
                                                @if ($d != null)
                                                    <input type='hidden' id="engineering-status-{{ $d['day'] }}"
                                                        name="engineering_status_{{ $d['day'] }}"
                                                        @if ($d['is_meal']) value="{{ $d['is_meal'] }}" 
                                                        @else
                                                        value="" @endif />

                                                    <textarea class="form-control mb-2" name="meal_data_{{ $d['day'] }}" rows="3">@if ($d['meal_name']) {{ trim($d['meal_name']) }} @endif </textarea>

                                                    <button type='button'
                                                        @if ($d['is_meal'] == 'on') class="btn btn-success pl-4 pr-4"
                                                        @else
                                                        class=" btn btn-outline-success pl-4 pr-4" @endif
                                                        id="on-{{ $d['day'] }}"
                                                        onclick="selectOnEngineeringSchedule({{ $d['day'] }})">ON</button>
                                                    <button type='button'
                                                        @if ($d['is_meal'] == 'off') class="btn btn-danger pl-4 pr-4"
                                                        @else
                                                        class=" btn btn-outline-danger pl-4 pr-4" @endif
                                                        id="off-{{ $d['day'] }}"
                                                        onclick="selectOffEngineeringSchedule({{ $d['day'] }})">OFF</button>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif



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
        </form>

    </section>
@endsection
