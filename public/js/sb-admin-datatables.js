// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({

  	columnDefs: [ 
      { targets: [1,6],render: $.fn.dataTable.render.ellipsis( 10 )} 

    ]

  });
});
