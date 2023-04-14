@extends('partials.app')
@section('content')
    <section class="card text-center">
        <h5 class="mt-4">Schedule
            <br>
            <h6>{{ $segment }}</h6>
        </h5>

        <div class="container row">

            <div class="col-md-2 mb-4">
                <fieldset class="form-group shadow">
                    <select name class="form-select" id="month_dropdown" onchange="scheduleOperator()">
                        <option value="noData">Select Month</option>
                        @foreach ($months as $ms)
                            <option value="{{ $ms['number'] }}">{{ $ms['month'] }}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>

            <div class="col-md-2 mb-4">
                <fieldset class="form-group shadow">
                    <select class="form-select" id="year_dropdown" onchange="scheduleOperator()">
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
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class='btn btn-success pl-4 pr-4' onclick='popDate("day")'>Day</button>
                    <button type="buttton" class='btn btn-secondary pl-4 pr-4 ml-2'
                        onclick='popDate("night")'>Night</button>
                    <button type="buttton" class='btn btn-danger pl-4 pr-4 ml-2' onclick='popDate("off")'>Off</button>
                </div>


            </div>
        </div>
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
                                            <button
                                                class='btn
                                                @switch($d['schedule'])
                                                        @case('day')
                                                            btn btn-custom-outline-success
                                                            @break
                                                        @case('night')
                                                            btn btn-custom-outline-secondary
                                                            @break
                                                        @case('off')
                                                        btn btn-custom-outline-danger
                                                            @break
                                                        @case(null)
                                                            btn btn-custom-outline-danger
                                                            @break
                                                    
                                                        @default
                                                            btn btn-outline-warning
                                                    @endswitch  
                                                p-4'><b>{{ $d['day'] }}</b>
                                            </button>
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
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th style="text-align: left; flex: 1;">No. Of Tickets</th>
                                    <th style="text-align: right; flex: 1;">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if ($mealTicket)
                                        <td style="text-align: left; flex: 1;">{{ number_format($mealTicket->number) }}</td>
                                        <td style="text-align: right; flex: 1;">₦{{ number_format($mealTicket->amount) }}
                                        </td>
                                    @else
                                        <td style="text-align: left; flex: 1;">0</td>
                                        <td style="text-align: right; flex: 1;">₦0</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
