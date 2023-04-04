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
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group-vertical mr-2">
                                    <input type="hidden" id="status" name="" value="" />
                                    <button type="button" class="btn btn-outline-secondary" disabled>1</button>
                                    <button id="day" type="button" class="btn btn-outline-success"
                                        {{-- onclick="scheduleDay({{ $d }})" --}}>WD</button>
                                    <button id="night" type="button" class="btn btn-outline-danger"
                                        {{-- onclick="scheduleNight({{ $d }})" --}}>OD</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row container">
            <h5 class="mt-4 mb-4 is-valid">Enginnering Schedule</h5>
            <div>
                <div class="container row">
                    <div class="col-md-2 mb-4">
                        <fieldset class="form-group shadow">
                            <select class="form-select" id="basicSelect">
                                <option>Select Week</option>
                                <option>First Week</option>
                                <option>Second Week</option>
                            </select>
                        </fieldset>
                    </div>

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

                    <div class="col-md-4">
                        {{-- space inbetween --}}
                    </div>

                    <div class="col-md-2">
                        <button class='btn btn-success pl-4 pr-4' disabled>ON</button>
                        <button class='btn btn-danger pl-4 pr-4' disabled>OFF</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="row container mb-4">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mon<br>3rd Jan</th>
                            <th>Tue<br>3rd Jan</th>
                            <th>Wed<br>3rd Jan</th>
                            <th>Thu<br>3rd Jan</th>
                            <th>Fri<br>3rd Jan</th>
                            <th>Sat<br>3rd Jan</th>
                            <th>Sun<br>3rd Jan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-bold-500">
                                <textarea class="form-control mb-2" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <button class='btn btn-outline-success pl-4 pr-4'>ON</button>
                                <button class='btn btn-outline-danger pl-4 pr-4'>OFF</button>
                            </td>
                            <td class="text-bold-500">
                                <textarea class="form-control mb-2" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <button class='btn btn-outline-success pl-4 pr-4'>ON</button>
                                <button class='btn btn-outline-danger pl-4 pr-4'>OFF</button>
                            </td>
                            <td class="text-bold-500">
                                <textarea class="form-control mb-2" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <button class='btn btn-outline-success pl-4 pr-4'>ON</button>
                                <button class='btn btn-outline-danger pl-4 pr-4'>OFF</button>
                            </td>
                            <td class="text-bold-500">
                                <textarea class="form-control mb-2" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <button class='btn btn-outline-success pl-4 pr-4'>ON</button>
                                <button class='btn btn-outline-danger pl-4 pr-4'>OFF</button>
                            </td>
                            <td class="text-bold-500">
                                <textarea class="form-control mb-2" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <button class='btn btn-outline-success pl-4 pr-4'>ON</button>
                                <button class='btn btn-outline-danger pl-4 pr-4'>OFF</button>
                            </td>
                            <td class="text-bold-500">
                                <textarea class="form-control mb-2" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <button class='btn btn-outline-success pl-4 pr-4'>ON</button>
                                <button class='btn btn-outline-danger pl-4 pr-4'>OFF</button>
                            </td>
                            <td class="text-bold-500">
                                <textarea class="form-control mb-2" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <button class='btn btn-outline-success pl-4 pr-4'>ON</button>
                                <button class='btn btn-outline-danger pl-4 pr-4'>OFF</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
