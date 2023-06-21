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
    {{-- End Font --}}

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/accordion.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/button.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">

    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.21/fh-3.1.7/r-2.2.5/datatables.min.css" />
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img class="w-24" src="{{ asset('assets/images/J4logo.png') }}"
                                    style="height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; width: 200px; border-style: none; border-width: 0;"
                                    width="200">
                            </a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                {{-- sidbar for Admins --}}
                @switch(auth()->user()->role_id)
                    @case(9999)
                        @include('partials.sidebar.admin')
                    @break

                    @case(999)
                        @include('partials.sidebar.admin')
                    @break

                    @case(889)
                        @include('partials.sidebar.operator')
                    @break

                    @case(779)
                        @include('partials.sidebar.field-admin')
                    @break

                    @case(777)
                        @include('partials.sidebar.field-worker')
                    @break

                    @default
                        {{-- @include('partials.sidebar.field-worker') --}}
                @endswitch
                {{-- @include('partials.sidebar.field-worker') --}}
                {{-- end sidebar for Admin --}}
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{ Auth::user()->full_name }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">{{ Auth::user()->role->name }}</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                @if (Auth::user()->dp)
                                                    <img src="{{ asset('storage/upload/' . Auth::user()->dp) }}"
                                                        id="user-avatar" alt="user-avatar" class="d-block rounded"
                                                        height="100" width="100" id="uploadedAvatar" />
                                                @else
                                                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->full_name }}"
                                                        id="user-avatar" alt="user-avatar" class="d-block rounded"
                                                        height="100" width="100" id="uploadedAvatar" />
                                                @endif
                                                {{-- <img src="{{ asset('assets/images/faces/1.jpg') }}"> --}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{ auth()->user()->full_name }}!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="
                                    @switch(auth()->user()->role_id)
                                        @case(9999)
                                            {{ route('admin.user-profile') }}
                                            @break
                                        @case(999)
                                            {{ route('admin.user-profile') }}
                                            @break
                                        @case(889)
                                            {{ route('operator.profile') }}
                                            @break
                                        @case(779)
                                            {{ route('field.admin.profile') }}
                                            @break
                                        @case(777)
                                            {{ route('field.worker.profile') }}
                                            @break
                                    
                                        @default
                                            {{ route('home') }}
                                    @endswitch"
                                    
                                    ><i
                                                class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">

                @yield('content')

            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }} "></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/extensions/sweetalert2.js') }}"></script> --}}
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/fh-3.1.7/r-2.2.5/datatables.min.js">
        < script >
            // Simple Datatable
            let table = document.querySelector('.users-table');
        let dataTable = new simpleDatatables.DataTable(table);
    </script>

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
