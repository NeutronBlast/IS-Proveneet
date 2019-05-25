$(document).ready(function(){
    $('.dataTables-example').DataTable({
    pageLength: 10,
    responsive: true,
    dom: '<"html5buttons"B>lTfgitp',
    buttons: [        
        {
        customize: function (win){
        $(win.document.body).addClass('white-bg');
        $(win.document.body).css('font-size', '10px');
        
        $(win.document.body).find('table')
        .addClass('compact')
        .css('font-size', 'inherit');
        }
        }
        ]
    });    
     });