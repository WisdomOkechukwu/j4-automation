@extends('partials.app')
@section('content')
    <section class="card text-center">
        <h5 class="mt-4">Operator Schedule Overview</h5>
        <p>{{ $segment }}</p>

        <div class="container row">
            <div class="col-md-2 mb-4">
                <fieldset class="form-group shadow">
                    <select class="form-select" id="weekDropDown" onchange="fieldWorkerOverviewWeeks()">
                        @foreach ($noOfWeeks as $key => $nw)
                            <option value="{{ $key + 1 }}">
                                {{ $nw['name'] }}
                            </option>
                        @endforeach
                    </select>
                </fieldset>
            </div>

            <div class="col-md-2 mb-4">
                <fieldset class="form-group shadow">
                    <select name class="form-select" id="month_dropdown" onchange="sortOperatorOverview()">
                        <option value="noData">Select Month</option>
                        @foreach ($months as $ms)
                            <option value="{{ $ms['number'] }}">{{ $ms['month'] }}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>

            <div class="col-md-2 mb-4">
                <fieldset class="form-group shadow">
                    <select class="form-select" id="year_dropdown" onchange="sortOperatorOverview()">
                        <option value="noData">Select Year</option>
                        @foreach ($years as $ys)
                            <option value="{{ $ys }}">{{ $ys }}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>

            <div class="col-md-3">
                {{-- space inbetween --}}
            </div>

            <div class="col-md-3 ">
                <button class='btn btn-success' disabled>DAY</button>
                <button class='btn btn-secondary' disabled>NIGHT</button>
                <button class='btn btn-danger' disabled>OFF</button>
            </div>
        </div>

        @foreach ($currentMonth as $weekNo => $weeks)
            <div class="m-4
            @if ($weekNo > 0) d-none @endif 
            "
                id="week-no-{{ $weekNo + 1 }}">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Monday</th>
                                <th>Tueday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($weeks as $daysNo => $days)
                                    @if ($days['day'] == 0)
                                        <td class="text-bold-500"></td>
                                    @else
                                        <td class="text-bold-500">
                                            <div class="btn-group-vertical">
                                                @foreach ($days['users'] as $d)
                                                    <button
                                                        class=' btn 
                                                @switch($d->shift)
                                                    @case('day')
                                                        btn-success 
                                                        @break
                                                    @case('night')
                                                        btn-secondary 
                                                        @break
                                                    @case('off')
                                                        btn-danger 
                                                        @break
                                                    @case(null)
                                                        btn-danger 
                                                        @break
                                                
                                                    @default
                                                        
                                                @endswitch
                                                
                                                pl-4 pr-4 mb-4'
                                                        disabled>{{ $d->user->full_name }}</button>
                                                @endforeach
                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach

    </section>
@endsection
