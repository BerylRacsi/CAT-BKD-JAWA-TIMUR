// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({

  	columnDefs: [ {
      targets: 1,
      render: $.fn.dataTable.render.ellipsis( 10 )
    } ]


  });
});
