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
                        <h4 class="mb-2 text-center">Enter Your New Password Below</h4>

                        <form id="formAuthentication" class="mb-3" action="{{ route('forgot.reset') }}" method="POST">
                            @csrf
                            <input type="hidden" name='email' value="{{ $email }}" />

                            <div class="mb-3">
                                <label for="password" class="form-label">Enter Password</label>
                                @error('password')
                                    <div id="defaultFormControlHelp" class="form-text">
                                        <span style="color:red;">{{ $message }}</span>
                                    </div>
                                @enderror
                                <input type="password" class="form-control" name="password"
                                    placeholder="Enter your Password" autofocus
                                    @error('password')
                                      style="border-color: red"
                                    @enderror />
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Confirm Password</label>
                                    {{-- <a href="auth-forgot-password-basic.html">
                                        <small>Forgot Password?</small>
                                      </a> --}}
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Enter your Password Again"
                                        @error('password')
                        style="border-color: red"
                      @enderror />
                                    {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
                                </div>
                            </div>
                            <div class="mb-3">
                                {{-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div> --}}
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Reset</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Login</span>
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


    <script src="{{ asset('assets/login/main.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    

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
