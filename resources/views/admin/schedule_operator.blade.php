@extends('partials.app')
@section('content')
    <section class="card text-center">
        <h5 class="mt-4">John Wick Schedule</h5>

        <div class="container row">
            <div class="col-md-2 mb-4">
                <fieldset class="form-group shadow">
                    <select class="form-select" id="basicSelect">
                        <option>January</option>
                        <option>Febuary</option>
                        <option>March</option>
                    </select>
                </fieldset>
            </div>

            <div class="col-md-2 mb-4">
                <fieldset class="form-group shadow">
                    <select class="form-select" id="basicSelect">
                        <option>2021</option>
                        <option>2022</option>
                        <option>2023</option>
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
                        <tr>
                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>


                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>Day</button>
                                    <button id="night" type="button" class="btn btn-outline-secondary"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>Night</button>
                                </div>
                            </td>
                        </tr>
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
                        <div class="col-lg-8 col-9">
                            <input type="text" id="first-name" class="form-control" name="fname"
                                placeholder="Enter Value">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row align-items-center">
                        <div class="col-lg-4 col-3">
                            <label class="col-form-label">Amount</label>
                        </div>
                        <div class="col-lg-8 col-9">
                            <input type="text" id="first-name" class="form-control" name="fname"
                                placeholder="Enter Amount">
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
        </div>
    </section>
@endsection
