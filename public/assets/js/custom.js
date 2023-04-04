    function generateTable(value){
        var table = document.querySelector('.users-table-'+value);
        let dataTable = new simpleDatatables.DataTable(table);
    } 

    function disableScheduleDiv(value, scheduleArray){
        scheduleArray.map( arrayData => {
            if(value != arrayData){
                $('#'+arrayData).removeClass('d-block').addClass('d-none');
            }
        })

        $('#'+value).removeClass('d-none').addClass('d-block');

    }

    function generateScheduleTable(value){
        var scheduleArray = ['all-users','operators','field-admin','field-worker'];
        generateTable(value);
        disableScheduleDiv(value, scheduleArray)
    } 
