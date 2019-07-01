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
    var flag=1;
    
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

    //Code validation
    for(var i = 0; i < codes.length; i++){
        if (code == codes[i]){

            alert("Producto con ese código ya existe en el sistema");
            flag = false;
            type = 4;
            break;
        }
    }

    //Name validation
    if(!name[1] && flag){
        
        msg = "Nombre del producto debe ser mínimo 2 caracteres";
        alert(msg);
        flag = 0;
        type = 1;
    }
    var nameval=/^[0-9]+$/;
    if( nameval.exec(name[0].value)){
        
        msg = "Nombre del producto inválido";
        alert(msg);
        flag = 0;
        type = 1;
    }



    //Price validation

    //alert(price);

    if (isNaN(price)){
        flag = 0;
        type = 3;
        alert("Formato de precio inválido, por favor introduzca un número");
    }

    if (price<=0){
        flag = 0;
        type = 3;
        alert("El campo de precio debe ser un número positivo mayor a 0");
    }
    //Change borders

    if (type == 4){
        $('#code').css({"color":"red","border":"1px solid red"});
    }

    if (type == 1){
        $('#produname').css({"color":"red","border":"1px solid red"});
    }

    if(type==3){

        $('#price').css({"color":"red","border":"1px solid red"});
    }


    //Set back to default when user starts correcting the mistake

    $("#code").keyup(function(){
        $("#code").css({"color":"","border":""});
    });

    if (flag){
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