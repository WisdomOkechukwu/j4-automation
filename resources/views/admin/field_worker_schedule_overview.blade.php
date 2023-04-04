@extends('partials.app')
@section('content')
    <section class="card text-center">
        <h5 class="mt-4">Field Worker Tracking Overview</h5>

        <div class="container row mt-2">
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

            <div class="col-md-2 ">
                <button class='btn btn-success' disabled>WD</button>
                <button class='btn btn-danger' disabled>OD</button>
            </div>
        </div>

        <div class="m-4">
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
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-danger pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-secondary pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-danger pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                            <td class="text-bold-500">
                                <button class='btn btn-success pl-4 pr-4' disabled>Daniel Kolenda</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
