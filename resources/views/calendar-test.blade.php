<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <form>
            <table class="table table-borderless .table-responsive2">
                <thead>
                    <tr>
                        <th scope="col">Monday</th>
                        <th scope="col">Tuesday</th>
                        <th scope="col">Wednesday</th>
                        <th scope="col">Thursday</th>
                        <th scope="col">Friday</th>
                        <th scope="col">Saturday</th>
                        <th scope="col">Saturday</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($days as $key => $day)
                        <tr>

                            @foreach ($day as $d)
                                <td>
                                    @if ($d != null)
                                        <div class="btn-group-vertical mr-2">
                                            <input type="hidden" id="status-{{ $d }}"
                                                name="{{ $month }}-{{ $d }}" value="" />
                                            <button type="button" class="btn btn-outline-secondary"
                                                disabled>{{ $d }}</button>
                                            <button id="day-{{ $d }}" type="button"
                                                class="btn btn-outline-success"
                                                onclick="scheduleDay({{ $d }})">Day</button>
                                            <button id="night-{{ $d }}" type="button"
                                                class="btn btn-outline-secondary"
                                                onclick="scheduleNight({{ $d }})">Night</button>
                                        </div>
                                    @endif
                                </td>
                            @endforeach

                        </tr>
                    @endforeach

                </tbody>
            </table>
            <button class="btn btn-outline-warning" type='submit'>Save</button>
            <form>
    </div>

    <script>
        function scheduleDay(day) {
            var dayID = 'day-' + day;
            var nightID = 'night-' + day;
            var statusID = 'status-' + day;

            var dayButton = document.getElementById(dayID);
            dayButton.classList.remove("btn-outline-success");
            dayButton.classList.add("btn-success");

            var nightButton = document.getElementById(nightID);
            nightButton.classList.remove("btn-secondary");
            nightButton.classList.add("btn-outline-secondary");


            var status = document.getElementById(statusID);
            status.value = 'day';
        }

        function scheduleNight(day) {
            var dayID = 'day-' + day;
            var nightID = 'night-' + day;
            var statusID = 'status-' + day;

            var dayButton = document.getElementById(dayID);
            dayButton.classList.remove("btn-success");
            dayButton.classList.add("btn-outline-success");

            var nightButton = document.getElementById(nightID);
            nightButton.classList.remove("btn-outline-secondary");
            nightButton.classList.add("btn-secondary");

            var status = document.getElementById(statusID);
            status.value = 'night';
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
