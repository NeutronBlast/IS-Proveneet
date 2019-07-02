/*Get selected item*/
function getTarget(){
    var r = confirm("¿Desea eliminar esta orden de compra?");
    if (r == true)
        delTarget();
}

function delTarget(){
    $("#orders tr").click(function(){
    cont = 0;
    var stats = null;
    var code = null;
    var next = false;
        $(this).find("td").each(function(){
            if (cont == 1){
                values = $(this).html();
                code = values;
            }

            if (cont == 4){
                values = $(this).html();
                start = values.indexOf("y")+2;
                aux = values.slice(start+1,length.values);
                end = aux.indexOf("<");
                stats = aux.slice(0,end);
                next = true;
            }
            cont++;
        });

       
        if (next){
            $.ajax({
            type:"POST",
            url:"../dbOC/delOC.php",
            async: false,
            data: {code:code},
            success: function(data){
            alert(data);
                if (data == "Orden de compra anulada exitosamente")
                    window.location = 'pendingorders.php';
                else
                window.location = 'processedorders.php';
            }
            }); //End of submit modify
        }
    });
     
}