$.fn.dataTable.ext.errMode = 'throw'; //Disable Error Alert Popup
$(document).ready( function () {
    $('.datatable').DataTable({
        paging: false,
    });
} );
