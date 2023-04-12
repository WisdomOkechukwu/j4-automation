@extends('partials.app')
@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Profile</h5>
        <!-- Account -->
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                @if ($user->dp)
                    <img src="{{ asset('storage/upload/' . $user->dp) }}" id="user-avatar-profile" alt="user-avatar"
                        class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                @else
                    <img src="https://ui-avatars.com/api/?name={{ $user->full_name }}" id="user-avatar-profile"
                        alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                @endif

                <div class="button-wrapper">
                    <button type="button" class="btn btn-primary me-2 mb-4" data-bs-toggle="modal"
                        data-bs-target="#upload-image">
                        Edit Profile image
                    </button>

                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 2MB</p>
                </div>
            </div>
        </div>
        <hr class="mb-4" />
        <div class="card-body">
            <form action={{ route('admin.staff-profile.update') }} method="POST">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input class="form-control" type="text" id="firstName" name="firstName"
                            value="{{ $user->first_name }}" autofocus />
                        @error('firstName')
                            <label style="color:red;">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input class="form-control" type="text" name="lastName" id="lastName"
                            value="{{ $user->last_name }}" />
                        @error('lastName')
                            <label style="color:red;">{{ $message }}</label>
                        @enderror
                    </div>

                    <h5 class="card-header">Profile Information</h5>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="country">Job role</label>
                        <select class="select2 form-select" name="role">
                            <option value="{{ $user->role_id }}">{{ $user->role->name }}</option>
                            @foreach ($role as $r)
                                <option value="{{ $r->id }}">{{ $r->name }}</option>
                            @endforeach
                        </select>
                        {{-- <label for="email" class="form-label">E-mail</label>
                        <input class="form-control" type="text" id="email" name="email"
                            value="john.doe@example.com" placeholder="john.doe@example.com" /> --}}
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="country">Gender</label>
                        <select id="country" class="select2 form-select" name='gender'>
                            @if ($user->gender == 'male')
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            @elseif($user->gender == 'female')
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            @else
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            @endif
                        </select>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" value="{{ $user->address }}"
                            name="address" placeholder="Enter Address" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="country">Marital status</label>
                        <select class="select2 form-select" name="marital_status">
                            @if ($user->marital_status == 'single')
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                            @elseif($user->marital_status == 'married')
                                <option value="married">Married</option>
                                <option value="single">Single</option>
                            @else
                                <option value="">Select Marital Status</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                            @endif
                        </select>
                        {{-- <label for="email" class="form-label">E-mail</label>
                        <input class="form-control" type="text" id="email" name="email"
                            value="john.doe@example.com" placeholder="john.doe@example.com" /> --}}
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="country">ID Numer</label>
                        <input type="text" class="form-control" name="id_number" value="{{ $user->id_number }}"
                            placeholder="Enter ID Number" />
                        @error('id_number')
                            <label style="color:red;">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="country">Leave Status</label>
                        <select class="select2 form-select" name='leave_status'>
                            @if ($user->leave_status == 0)
                                <option value="0">Not Eligible</option>
                                <option value="1">Eligible</option>
                            @elseif($user->leave_status == 1)
                                <option value="1">Eligible</option>
                                <option value="0">Not Eligible</option>
                            @else
                                <option value="">Select Leave Status</option>
                                <option value="0">Not Eligible</option>
                                <option value="1">Eligible</option>
                            @endif
                        </select>
                        {{-- <label for="email" class="form-label">E-mail</label>
                        <input class="form-control" type="text" id="email" name="email"
                            value="john.doe@example.com" placeholder="john.doe@example.com" /> --}}
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="country">HMO Details</label>
                        <input type="text" class="form-control" name="hmo" value="{{ $user->hmo }}"
                            placeholder="Enter HMO Details" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="language" class="form-label">Loan Eligibility</label>
                        <select class="select2 form-select" name="loan_eligibility">
                            @if ($user->loan_eligibility == 0)
                                <option value="0">Not Eligible</option>
                                <option value="1">Eligible</option>
                            @elseif($user->loan_eligibility == 1)
                                <option value="1">Eligible</option>
                                <option value="0">Not Eligible</option>
                            @else
                                <option value="">Select Leave Status</option>
                                <option value="0">Not Eligible</option>
                                <option value="1">Eligible</option>
                            @endif
                        </select>
                    </div>

                    <input type="hidden" name='user_id' value="{{ $user->id }}">
                    <h5 class="card-header">Change Password</h5>
                    <div class="mb-3 col-md-12">
                        <label for="address" class="form-label">New Password</label>
                        <input type="password" id="password" class="form-control" name="password"
                            placeholder="Enter New Password" autocomplete="off" />
                        @error('password')
                            <label style="color:red;">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="address" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm-password" class="form-control" name="password_confirmation"
                            placeholder="Confirm New Password" autocomplete="off" />
                        @error('password_confirmation')
                            <label style="color:red;">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary mb-2">Save changes</button>

            </form>
            @if(Auth::user()->id != $user->id)
            <form action={{ route('admin.staff-profile.delete') }} method="POST">
            @csrf
                <input type="hidden" name='user' value="{{ $user->id }}">
                <button type="submit" class="btn btn-outline-danger">Delete User</button>
            </form>
            @endif
        </div>
    </div>



    <div class="modal fade" id="upload-image" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="single-header">
                        upload {{ $user->full_name }} profile picture
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id='user-token' name='_token' value="{{ csrf_token() }}">
                    <input type="hidden" id='user-id' name='user' value="{{ $user->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Upload Image Here</h5>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <input type="file" name="dp_image" class="filepond-profile-image-upload"
                                                required data-max-file-size="2MB">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- filepond validation -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <!-- image editor -->
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

    <!-- filepond -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="{{ asset('assets/js/customFilePond.js') }}"></script>
    </div>
@endsection
