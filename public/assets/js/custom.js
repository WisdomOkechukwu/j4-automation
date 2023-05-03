$(document).ready(function() {
    
    $('.all-users-table').DataTable({
        lengthMenu: [
            [10, 100, 1000, -1],
            [10, 100, 1000, 'All'],
        ],
        paging: false,
        ordering:false,
        order: [
            [0, 'desc']
        ],
    });
});

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

        var status = document.getElementById(statusID);
        if(status.value != 'day'){

            var dayButton = document.getElementById(dayID);
            dayButton.classList.remove("btn-outline-success");
            dayButton.classList.add("btn-success");

            var nightButton = document.getElementById(nightID);
            nightButton.classList.remove("btn-secondary");
            nightButton.classList.add("btn-outline-secondary");

            status.value = 'day';
        } else {
            var dayButton = document.getElementById(dayID);
            dayButton.classList.add("btn-outline-success");
            dayButton.classList.remove("btn-success");

            var nightButton = document.getElementById(nightID);
            nightButton.classList.remove("btn-secondary");
            nightButton.classList.add("btn-outline-secondary");

            status.value = 'off';
        }
    }

    function scheduleNight(day) {
        var dayID = 'day-' + day;
        var nightID = 'night-' + day;
        var statusID = 'status-' + day;

        var status = document.getElementById(statusID);

        if(status.value != 'night'){
            var dayButton = document.getElementById(dayID);
            dayButton.classList.remove("btn-success");
            dayButton.classList.add("btn-outline-success");

            var nightButton = document.getElementById(nightID);
            nightButton.classList.remove("btn-outline-secondary");
            nightButton.classList.add("btn-secondary");

            status.value = 'night';
        } else{
            var dayButton = document.getElementById(dayID);
            dayButton.classList.remove("btn-success");
            dayButton.classList.add("btn-outline-success");

            var nightButton = document.getElementById(nightID);
            nightButton.classList.add("btn-outline-secondary");
            nightButton.classList.remove("btn-secondary");
            
            status.value = 'off';
        }
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
        $('#bulk-subject').val($('#bulk-subject-header').val());
        $('#bulk-message').val($('#bulk-body').val());

        $('#bulk-message-form').submit();
    }

    function sendSingleMessage(user){
        $('#single-user-id').val(JSON.stringify(user));
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

    function scheduleOperator(){
        var monthDropdownValue = $('#month_dropdown').val();
        var yearDropdownValue = $('#year_dropdown').val();

        if(monthDropdownValue != 'noData' && yearDropdownValue != 'noData'){
            var redirect = `/operator/schedule/${monthDropdownValue}/${yearDropdownValue}`;
            window.location.href = redirect;
        }
    }

    function popDate(section)
    {
        if(section === 'day' || section === 'wd'){
            $('#popDateData').val('day');
            $('.btn-custom-outline-success').addClass('btn-custom-outline-success-pop');
        }

        if(section === 'night'){
            $('#popDateData').val('day');
            $('.btn-custom-outline-secondary').addClass('btn-custom-outline-secondary-pop');
        }

        if(section === 'off' || section === 'od'){
            $('#popDateData').val('day');
            $('.btn-custom-outline-danger').addClass('btn-custom-outline-danger-pop');
        }
    }

    function fieldWorkerSchedule(link){
        var monthDropdownValue = $('#month_dropdown').val();
        var yearDropdownValue = $('#year_dropdown').val();

        if(monthDropdownValue != 'noData' && yearDropdownValue != 'noData'){
            var redirect = `/${link}/schedule/${monthDropdownValue}/${yearDropdownValue}`;
            window.location.href = redirect;
        }
    }

    function fieldWorkerScheduleForAdmin(user){
        var monthDropdownValue = $('#month_dropdown').val();
        var yearDropdownValue = $('#year_dropdown').val();

        if(monthDropdownValue != 'noData' && yearDropdownValue != 'noData'){
            var redirect = `/field-admin/field-worker-schedules/${user}/${monthDropdownValue}/${yearDropdownValue}`;
            window.location.href = redirect;
        }
    }

    function bulkAssignLeave(type){
        $('#bulk-leave-type').val(type);
    }

    function LoadSaveButton(id,user){
        $(`#${id}`).on("change keyup paste", function(){
            var annual_leave = $(`#annual-leave-${ user }`).val();
            var casual_leave = $(`#casual-leave-${ user }`).val();
            var leave_taken = $(`#leave-taken-${ user }`).val();
            var remaining = Number(annual_leave) + Number(casual_leave) - Number(leave_taken);
            $(`#remaining-${ user }`).val(remaining);
            
            $(`#saving-button-${ user }`).removeClass('d-none').addClass('d-block');
        });
    }

    function SaveUserLeave(user){
        var annual = $(`#annual-leave-${ user }`).val();
        var casual = $(`#casual-leave-${ user }`).val();
        var taken = $(`#leave-taken-${ user }`).val();

        // .fadeIn()
        // .fadeOut()
        $.get(`/admin/leave-single-tracker/${user}/${annual}/${casual}/${taken}`, function(data){
            $(`#saving-button-${ user }`).removeClass('d-block').addClass('d-none');
            $(`#processing-${ user }`).removeClass('d-none').addClass('d-block').fadeIn();
            if(data.success === true){
                $(`#processing-${ user }`).removeClass('d-block').addClass('d-none').fadeOut();
                $(`#done-${ user }`).removeClass('d-none').addClass('d-block').fadeIn();
            }
          });
    }



