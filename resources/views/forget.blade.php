<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>J4 Automation Dashboard</title>
    {{-- working on this later TAKE NOTE --}}
    <link rel="icon" href="{{ asset('assets/images/J4.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/J4.png') }}" type="image/x-icon">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">


    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/login/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/login/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/login/page-auth.css') }}" />
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img class="w-24" src="{{ asset('assets/images/J4logo.png') }}"
                                        style="height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; width: 200px; border-style: none; border-width: 0;"
                                        width="200">
                                </span>
                                {{-- <h3 class="app-brand-text demo text-body fw-bolder">J4 Automations</h3> --}}
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2 text-center">Forgot Password</h4>

                        <div class="mb-3">
                            <label for="email" class="form-label">ID Number</label>
                            @error('email')
                                <div id="defaultFormControlHelp" class="form-text">
                                    <span style="color:red;">{{ $message }}</span>
                                </div>
                            @enderror
                            <input type="text" class="form-control" name="id_number"
                                placeholder="Enter your ID Number" autofocus id="id_number"
                                @error('email')
                                      style="border-color: red"
                                    @enderror />
                        </div>
                        <div class="mb-3">
                            {{-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div> --}}
                        </div>
                        <div class="mb-3">
                            <div class='d-block' id="no-loading-spinner">
                                <button class="btn btn-primary d-grid w-100" onclick="showUserData()">
                                    Proceed
                                </button>
                            </div>
                            <div class='d-none' id="loading-spinner">
                                <button class="btn btn-primary w-100" disabled>
                                    <span class="spinner-border spinner-border-sm"></span>
                                    Loading..
                                </button>
                            </div>
                        </div>

                        <p class="text-center">
                            <span>Log In</span>
                            <a href="{{ route('login') }}">
                                <span>Click Here !</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>


    <div class="modal fade" id="confirm-user-email" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="bulk-leave">
                        Confirm Email
                    </h5>
                    <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x">x</i>
                    </button>
                </div>
                @csrf
                <div class="modal-body">
                    <div>
                        <form action={{ route('forgot.token') }} method="POST">
                            @csrf
                            <input class="form-control" type="hidden" name="email" id="forgot-email" />

                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <h4 id="forgot-email-text">Is this your Email ......</h4>
                                </div>
                            </div>
                            <div class="mt-2 d-none" id="forgot-email-button">
                                <button type="submit" class="btn btn-primary me-2">Send Mail</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- <div class="modal-footer"> --}}
                {{-- <button type="submit" class="btn btn-primary ml-1">
                                Add User
                            </button> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/login/main.js') }}"></script>
    <script src="{{ asset('assets/login/forget.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }} "></script>


    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ session()->get('success') }}"
            })
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "{{ session()->get('error') }}"
            })
        </script>
    @endif

</body>

</html>
