@extends('partials.app')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Training Schedule this week</h3>
                    <!-- <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p> -->
                </div>
            </div>
        </div>
        <section class="section">
            <div class="table-responsive">
                <table class="table table-lg">
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
                            <td class="text-bold-500">WD</td>
                            <td>OD</td>
                            <td class="text-bold-500">WD</td>
                            <td>OD</td>
                            <td class="text-bold-500">WD</td>
                            <td>OD</td>
                            <td class="text-bold-500">WD</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Engineering Schedule this week</h3>
                    <!-- <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p> -->
                </div>
            </div>
        </div>
        <section class="section">
            <div class="table-responsive">
                <table class="table table-lg">
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
                            <td class="text-bold-500">ON</td>
                            <td>OF</td>
                            <td class="text-bold-500">ON</td>
                            <td>OF</td>
                            <td class="text-bold-500">ON</td>
                            <td>OF</td>
                            <td class="text-bold-500">ON</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Leave Tracker</h3>
                    <!-- <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p> -->
                </div>
            </div>
        </div>
        <section class="section">
            <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th>Annual Leave</th>
                            <th>Casual Leave</th>
                            <th>Leave Taken</th>
                            <th>Leave Remaining</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-bold-500">15</td>
                            <td class="text-bold-500">15</td>
                            <td class="text-bold-500">15</td>
                            <td class="text-bold-500">15</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
