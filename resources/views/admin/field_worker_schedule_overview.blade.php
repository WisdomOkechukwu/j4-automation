@extends('partials.app')
@section('content')
    <section class="card text-center">
        <h5 class="mt-4">Field Worker Tracking Overview</h5>
        <p>{{ $segment }}</p>

        <div class="container row mt-2">
            <div class="col-md-2 mb-4">
                <fieldset class="form-group shadow">
                    <select class="form-select" id="weekDropDown" onchange="fieldWorkerOverviewWeeks()">
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

            <div class="col-md-2 mb-4">
                <fieldset class="form-group shadow">
                    <select name class="form-select" id="month_dropdown" onchange="sortFieldWorkerOverview()">
                        <option value="noData">Select Month</option>
                        @foreach ($months as $ms)
                            <option value="{{ $ms['number'] }}">{{ $ms['month'] }}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>

            <div class="col-md-2 mb-4">
                <fieldset class="form-group shadow">
                    <select class="form-select" id="year_dropdown" onchange="sortFieldWorkerOverview()">
                        <option value="noData">Select Year</option>
                        @foreach ($years as $ys)
                            <option value="{{ $ys }}">{{ $ys }}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>

            <div class="col-md-4">
                {{-- space inbetween --}}
            </div>

            <div class="col-md-2 ">
                <button class='btn btn-success' disabled>WD</button>
                <button class='btn btn-danger' disabled>OD</button>
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
                                                    @case('wd')
                                                        btn-success 
                                                        @break
                                                    @case('od')
                                                        btn-danger 
                                                        @break
                                                    {{-- @case(null)
                                                        btn-danger 
                                                        @break --}}
                                                
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
    <script>
        function fieldWorkerOverviewWeeks() {
            var weekArray = [1, 2, 3, 4, 5];
            var dropdownValue = $('#weekDropDown').val();

            weekArray.map(arrayData => {
                if (dropdownValue != arrayData) {
                    $('#week-no-' + arrayData).removeClass('d-block').addClass('d-none');
                }
            })

            $('#week-no-' + dropdownValue).removeClass('d-none').addClass('d-block');

        }

        function sortFieldWorkerOverview() {
            var monthDropdownValue = $('#month_dropdown').val();
            var yearDropdownValue = $('#year_dropdown').val();

            if (monthDropdownValue != 'noData' && yearDropdownValue != 'noData') {
                var redirect = `/admin/field-worker-overview/${monthDropdownValue}/${yearDropdownValue}`;
                window.location.href = redirect;
            }
        }
    </script>
@endsection
