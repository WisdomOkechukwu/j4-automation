    function generateTable(value){
        var table = document.querySelector('.users-table-'+value);
        let dataTable = new simpleDatatables.DataTable(table);
    } 

    function generateScheduleTable(value){
        generateTable(value);
    } 

    //operator schedule
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

    function sortOperatorSchedule(user){
        var monthDropdownValue = $('#month_dropdown').val();
        var yearDropdownValue = $('#year_dropdown').val();

        if(monthDropdownValue != 'noData' && yearDropdownValue != 'noData'){
            var redirect = `/admin/operator-schedules/${user}/${monthDropdownValue}/${yearDropdownValue}`;
            window.location.href = redirect;
        }
    }

    function scheduleWorkDay(day) {
        var workID = 'wd-' + day;
        var offID = 'od-' + day;
        var statusID = 'status-' + day;

        var workButton = document.getElementById(workID);
        workButton.classList.remove("btn-outline-success");
        workButton.classList.add("btn-success");

        var offButton = document.getElementById(offID);
        offButton.classList.remove("btn-danger");
        offButton.classList.add("btn-outline-danger");


        var status = document.getElementById(statusID);
        status.value = 'wd';
    }

    function scheduleOffDay(day) {
        var workID = 'wd-' + day;
        var offID = 'od-' + day;
        var statusID = 'status-' + day;

        var workButton = document.getElementById(workID);
        workButton.classList.remove("btn-success");
        workButton.classList.add("btn-outline-success");

        var offButton = document.getElementById(offID);
        offButton.classList.remove("btn-outline-danger");
        offButton.classList.add("btn-danger");

        var status = document.getElementById(statusID);
        status.value = 'od';
    }

    function sortFieldWorkerSchedule(user){
        var monthDropdownValue = $('#month_dropdown').val();
        var yearDropdownValue = $('#year_dropdown').val();

        if(monthDropdownValue != 'noData' && yearDropdownValue != 'noData'){
            var redirect = `/admin/field-worker-schedules/${user}/${monthDropdownValue}/${yearDropdownValue}`;
            window.location.href = redirect;
        }
    }

    function selectOnEngineeringSchedule(day){
        var onID = 'on-' + day;
        var offID = 'off-' + day;
        var statusID = 'engineering-status-' + day;

        var onButton = document.getElementById(onID);
        onButton.classList.remove("btn-outline-success");
        onButton.classList.add("btn-success");

        var offButton = document.getElementById(offID);
        offButton.classList.remove("btn-danger");
        offButton.classList.add("btn-outline-danger");

        var status = document.getElementById(statusID);
        status.value = 'on';
    }

    function selectOffEngineeringSchedule(day){
        var onID = 'on-' + day;
        var offID = 'off-' + day;
        var statusID = 'engineering-status-' + day;

        var onButton = document.getElementById(onID);
        onButton.classList.remove("btn-success");
        onButton.classList.add("btn-outline-success");

        var offButton = document.getElementById(offID);
        offButton.classList.remove("btn-outline-danger");
        offButton.classList.add("btn-danger");

        var status = document.getElementById(statusID);
        status.value = 'off';
    }

    function hideAndShowWeekModal(){
        var  weekArray = [1,2,3,4,5];
        var dropdownValue = $('#weekDropDown').val();

        weekArray.map( arrayData => {
            if(dropdownValue != arrayData){
                $('#week-'+arrayData).removeClass('d-block').addClass('d-none');
            }
        })

        $('#week-'+dropdownValue).removeClass('d-none').addClass('d-block');

    }

    function bulkAssignTasks(users){
        if($('#check-all').is(':checked')){
            users.map( user => {
                $(`#checkbox-${user.id}`).click();
            })
        } else {
            users.map( user => {
                $(`#checkbox-${user.id}`).click();
            })
        }
    }

    function bulkAssignMealTicket(){
        $('#bulk-month').val($('#bulk-assign-month').val());
        $('#bulk-ticket-no').val($('#bulk-assign-ticket-no').val());
        $('#bulk-amount').val($('#bulk-assign-amount').val());

        $('#bulk-assign-form').submit();
    }

    function loadSingleAssignModal(user){
        $('#single-user-id').val(JSON.stringify(user));
        // $('#single-user-id').val(user);
        $('#user-modal-title').html(`${user.first_name} ${user.last_name} Meal Ticket Information`)
    }

    function bulkAssignAdmin(users, option){
        users = Object.values(users);

        if($(`#check-${option}`).is(':checked')){
            users.map( user => {
                $(`#checkbox-${user.id}-${option}`).click();
            })
        } else {
            users.map( user => {
                $(`#checkbox-${user.id}-${option}`).click();
            })
        }
    }

    function bulkMessageModal(){
        var dropdownValue = $('#bulk-action-dropdown').val();
        if(dropdownValue == "bulk-message"){
            $('#bulk-assign-modal').modal('show');
        }
        
    }

    function bulkMessageSendForm(){
        // console.log($('#bulk-subject-header').val(),  $('#bulk-body').val());
        $('#bulk-subject').val($('#bulk-subject-header').val());
        $('#bulk-message').val($('#bulk-body').val());

        $('#bulk-message-form').submit();
    }

    function sendSingleMessage(user){
        $('#single-user-id').val(JSON.stringify(user));
        // $('#single-user-id').val(user);
        $('#single-header').html(`send message to${user.first_name} ${user.last_name}`);
    }

    function setReadMessageData(id){
        var messageCount = $(`#message-list-count`).text();

        $.get(`/admin/read-message/${id}`, function(data){
            if(data.success === true){
                $(`#new-message-tag-${id}`).addClass('d-none');

                var totalMessages = messageCount - 1;
                if(totalMessages == 0){
                    $(`#message-list-count`).addClass('d-none');
                }
                $(`#message-list-count`).text(totalMessages);
            }
          });
    }
    // $(selector).submit(function)  

    // document.getElementById("myForm").submit();


    // $( "form" ).submit(function( event ) {  
    //     if ( $( "input:first" ).val() === "javatpoint" ) {  
    //       $( "span" ).text( "Submitted Successfully." ).show();  
    //       return;  
    //     }  
    //     $( "span" ).text( "Not valid!" ).show().fadeOut( 2000 );  
    //     event.preventDefault();  
    //   });  


