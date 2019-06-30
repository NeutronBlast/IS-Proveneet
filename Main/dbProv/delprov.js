/*Get selected item*/
function getTarget(){
    var r = confirm("¿Desea eliminar este proveedor?");
    if (r == true)
        delTarget();
}

function delTarget(){
$("#providers tr").click(function() {
var name = null;
var dir = null;
var phone = null;
var rif = null;
var index = 0;

$(this).find("td").each(function() {
    var values = '';

        /* Gather values from the row*/
            if (index == 0){
                values = $(this).html();
                start = values.indexOf(":");
                end = values.indexOf("<");

                name = values.slice(start+1,end);
                values = "";
            }
            else if (index == 1){
                values = $(this).html();
                start = values.indexOf(":");
                end = values.indexOf("<");

                dir = values.slice(start+1,end);
                values = "";
            }
        
            else if (index == 2){
                values = $(this).html();
                start = values.indexOf(":");
                end = values.indexOf("<");

                phone = values.slice(start+1,end);
                values = "";
            }

            else if (index == 3){
                values = $(this).html();
                rif = values;
                values = "";
            }
            index++;
});



    $.ajax({
    type:"POST",
    url:"../dbProv/delprov.php",
    async: false,
    data: {rif:rif},
    success: function(data){
    alert(data);
    window.location = 'providers.php';
    }
    });
    }); 
}