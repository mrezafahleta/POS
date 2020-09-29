$(document).ready(function () {
    // datatable
    $(function () {
        $('#myTable').DataTable({
	    "server-side" : true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });



    $("#tanggal").datetimepicker({
        timepicker: true,
        datepicker: true,
        format: "d-m-Y H:i",
        value: "dd/mm/yy",
    });

    $("#from").datetimepicker({
        timepicker: true,
        datepicker: true,
        format: "d-m-Y",

        onClose: function (selectedDate) {
            $("#to").datepicker("option", "maxDate", selectedDate);
        }
    });
    $("#to").datetimepicker({
        timepicker: true,
        datepicker: true,
        format: "d-m-Y",

        onClose: function (selectedDate) {
            $("#from").datepicker("option", "maxDate", selectedDate);
        }
    });



});