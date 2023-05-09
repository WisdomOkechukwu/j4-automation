<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>403</title>
    <link rel="icon" href="{{ asset('assets/images/J4.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/J4.png') }}" type="image/x-icon">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet"> -->

    <!-- Custom stlylesheet -->
    <!-- <link type="text/css" rel="stylesheet" href="css/style.css" /> -->
    <link rel="stylesheet" href="{{ asset('assets/css/error.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>

    <div id="notfound">
        <div class="notfound">
            <img class="w-24" src="{{ asset('assets/images/J4logo.png') }}"
                style="height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; width: 200px; border-style: none; border-width: 0;"
                width="200">
            <div class="notfound-404">
                <h1>403</h1>
            </div>
            <h2>We are sorry, Your session has expired please login to continue</h2>
            {{-- <p>Sorry, your session has expired please login to continue</p> --}}
            <a href="{{ route('home') }}">Back To Homepage</a>
        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
