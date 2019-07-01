/*Get selected item*/
function getTarget(){
    var r = confirm("¿Desea eliminar este producto?");
    if (r == true)
        delTarget();
}
/*Get selected row*/
function delTarget(){
$("#products tr").click(function() {
    var name = null;
    var code = null;
    var price = null;
    var cat = null;
    var provider = null;
    var index = 0;

    $(this).find("td").each(function()  {
        var values = '';
            /* Gather values from the row*/
                if (index == 0){
                name = $(this).html();
                }
                else if (index == 1){
                code = $(this).html();
                }
            
                else if (index == 2){
                price = $(this).html();
                }

                else if (index == 3){
                cat = $(this).html();
                }

                else if (index == 4){
                provider = $(this).html();
                }
                index++;
        });

        $.ajax({
        type:"POST",
        url:"../dbProd/delprod.php",
        async: false,
        data: {code:code},
        success: function(data){
        alert(data);
        window.location = 'manageproducts.php';
        }
        });
        });
        }
