/*Add provider*/
$('#submitprod').click(function(event){ 
    var next = true;
    var name = document.getElementById("produname").value;
    var code = document.getElementById("code").value;
    var price = document.getElementById("price").value;
    var cat = document.getElementById("cat").value;
    var provider = document.getElementById("provider").value;

    /*Verify before sending to AJAX*/
    next = true;
    type = 0;
    
    /*Cannot be blank*/
    if (document.getElementById("produname").value == "" || document.getElementById("code").value=="" ||
    document.getElementById("price").value == "" || document.getElementById("cat").value =="Seleccionar" || 
    document.getElementById("provider").value =="Seleccionar"){
        next = false;
        alert("Por favor rellene todos los datos antes de continuar");
    }

    /*Product code must be unique in the system*/
    var codes = [];
    var table = document.getElementById("products");
    for (var i = 0, row; row = table.rows[i]; i++) {
    for (var j = 0, col; col = row.cells[j]; j++) {
       if (j == 1){
           codes.push(col.innerHTML);
       }
    }  
    }

    for(var i = 0; i < codes.length; i++){
        if (code == codes[i]){
            alert("Producto con ese código ya existe en el sistema");
            next = false;
            type = 4;
            break;
        }
    }

    //Change borders

    if (type == 4){
        $('#code').css({"color":"red","border":"1px solid red"});
    }

    //Set back to default when user starts correcting the mistake

    $("#code").keyup(function(){
        $("#code").css({"color":"","border":""});
    });

    if (next){
    $.ajax({
        type:"POST",
        url:"../dbProd/addproduct.php",
        async: false,
        data: {name:name,code:code,price:price,cat:cat,provider:provider},
        success: function(data){
        alert(data);
            window.location = 'manageproducts.php';
        }
    });
    } // if next
});