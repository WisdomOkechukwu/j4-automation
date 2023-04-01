@extends('partials.app')
@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Profile</h5>
        <hr class="mb-4" />
        <div class="card-body">
            <form id="formAccountSettings" method="POST" onsubmit="return false">
            <div class="row">
                <div class="mb-3 col-md-2">
                <img
                    src="{{ asset('assets/images/faces/1.jpg') }}"
                    alt="user-avatar"
                    class="d-block rounded"
                    height="100"
                    width="100"
                    id="uploadedAvatar"
                />
                </div>
                <div class="mb-3 col-md-10">
                    <label for="firstName" class="form-label ">First Name</label>
                    <input
                        class="form-control"
                        type="text"
                        id="firstName"
                        name="firstName"
                        value="John"
                        autofocus
                    />
                    <label for="lastName" class="form-label mt-3">Last Name</label>
                    <input class="form-control" type="text" name="lastName" id="lastName" value="Doe" />
                    </div>
                <h5 class="card-header">Message User</h5>
                <div class="mb-3 col-md-12">
                <label for="email" class="form-label">Message</label>
                <input
                    class="form-control"
                    type="text"
                    id="email"
                    name="email"
                    {{-- value="john.doe@example.com" --}}
                    placeholder="Message Subject"
                />
                </div>
                <div class="mb-3 col-md-12">
                <textarea class="form-control" name="" id="" rows="6"></textarea>
                </div>
            </div>
            <div class="mt-2 ">
                <button type="submit" class="btn btn-primary me-2">Send Message</button>
            </div>
            </form>
        </div>
        <!-- /Account -->
    </div>
@endsection