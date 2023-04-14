@extends('partials.app')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title ">All Schedules</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-lg users-table-all-users users-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Job Role</th>
                                        <th>ID Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $u)
                                        <tr>
                                            <td class="text-bold-500">{{ $u->full_name }}</td>
                                            <td>{{ $u->role->name }}</td>
                                            <td class="text-bold-500">{{ $u->id_number }}</td>
                                            @if ($u->role_id == 889)
                                                <td><a href="{{ route('field.admin.schedule.field.worker', [$u]) }}"
                                                        class="btn btn-primary">Schedule</a></td>
                                            @else
                                                <td><a href="{{ route('field.admin.schedule.field.worker', [$u]) }}"
                                                        class="btn btn-primary">Schedule</a></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
