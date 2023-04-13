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
                <button type="button" class='btn btn-success pl-4 pr-4'>Day</button>
                <button type="buttton" class='btn btn-secondary pl-4 pr-4 ml-2'>Night</button>
                <button type="buttton" class='btn btn-danger pl-4 pr-4 ml-2'>Off</button>
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
                                                        btn btn-outline-success
                                                        @break
                                                    @case('night')
                                                        btn btn-outline-secondary
                                                        @break
                                                    @case('off')
                                                       btn btn-outline-danger
                                                        @break
                                                    @case(null)
                                                        btn btn-outline-danger
                                                        @break
                                                
                                                    @default
                                                        btn btn-outline-warning
                                                @endswitch  
                                             p-4 rounded'><b>{{ $d['day'] }}</b></button>
                                            {{-- <div style="text-align: center;
                                                        padding: 40px;
                                                        display:flex;
                                                        width:70%;
                                                        border-radius: 10px;
                                                @switch($d['schedule'])
                                                    @case('day')
                                                        border: 3px solid greenyellow;
                                                        @break
                                                    @case('night')
                                                        border: 3px solid gray;
                                                        @break
                                                    @case('off')
                                                        border: 3px solid red;
                                                        @break
                                                    @case(null)
                                                        border: 3px solid red;
                                                        @break
                                                
                                                    @default
                                                        border: 1px solid greenyellow;
                                                @endswitch ">
                                                <h5>{{ $d['day'] }}</h5></div> --}}
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
                                    @if($mealTicket)
                                    <td style="text-align: left; flex: 1;">{{ number_format($mealTicket->number) }}</td>
                                    <td style="text-align: right; flex: 1;">₦{{ number_format($mealTicket->amount) }}</td>
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
