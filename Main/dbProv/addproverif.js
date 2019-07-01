/*Add provider*/
$('#addpro').click(function(event){ 
    var next = true;
    var skip = false;
    var name = document.getElementById("name").value;
    var dir = document.getElementById("dir").value;
    var phone = document.getElementById("phone").value;
    var rif = document.getElementById("rif").value;


    /*Verify before sending to AJAX*/
    next = true;
    var type = 0;
    
    /*Cannot be blank*/
    if (document.getElementById("name").value == "" || document.getElementById("dir").value=="" ||
    document.getElementById("phone").value == "" || document.getElementById("rif").value ==""){
        next = false;
        alert("Por favor rellene todos los datos antes de continuar");
    }
    if (!name[3]){
        alert("Nombre de proveedor demasiado corto");
        next = false;
        type = 1;
    }
    
    if (name[101]){
        alert("Nombre de proveedor demasiado largo");
        next = false;
        type = 1;
    }
    
    if (nextrif[21]){
        alert("RIF proveedor demasiado largo");
        next = false;
        type = 4;
    }
    
    if (!nextrif[9]){
        alert("RIF proveedor demasiado corto");
        next = false;
        type = 4;
    }
    
    if (dir[150]){
        alert("Dirección de proveedor demasiado larga");
        next = false;
        type = 2;
    }
    
    if (!dir[3]){
        alert("Dirección de proveedor demasiado corta");
        next = false;
        type = 2;
    }
    
    if (!phone[7]){
        alert("Numero de teléfono inválido. Formato aceptado: Al menos 8 caracteres: XXXXXXXX o +XX-XXXXXX o XXXX-XXXXXX o +XXXXXXXXXX");
        next = false;
        type = 3;
        skip = true;
    }
    
    if (phone[50]){
        alert("Numero de teléfono inválido");
        next = false;
        type = 3;
        skip = true;
    }

    /*Provider must be unique in the system*/
    var rifs = [];
    var table = document.getElementById("providers");
    for (var i = 0, row; row = table.rows[i]; i++) {
    for (var j = 0, col; col = row.cells[j]; j++) {
       if (j == 3){
           rifs.push(col.innerHTML);
       }
    }  
    }

    for(var i = 0; i < rifs.length; i++){
        if (rif == rifs[i]){
            alert("Proveedor con RIF ingresado ya existe en el sistema");
            next = false;
            type = 4;
            break;
        }
    }

    /*RIF verify*/
    var patt = new RegExp(/^([J-]+[0-9])/i);
    k = patt.test((String)(rif));

    if (!k){
        alert("Formato de RIF inválido: Debe ser J-numeros");
        type = 4;
        next = false;
    }

    /*Phone verify*/
    var cont = 0;
    var patt2 = new RegExp(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im);
    var q = patt2.test((String)(phone));

    if (!q && !skip){
    alert("Formato de teléfono inválido. Formato aceptado: Al menos 8 caracteres: XXXXXXXX o +XX-XXXXXX o XXXX-XXXXXX o +XXXXXXXXXX");
    type = 3;
    next = false;
    }

    //Change borders

    if (type == 4){
        $('#rif').css({"color":"red","border":"1px solid red"});
    }

    if (type == 3){
        $('#phone').css({"color":"red","border":"1px solid red"});
    }

    if (type == 2){
        $('#dir').css({"color":"red","border":"1px solid red"});
    }

    if (type == 1){
        $('#name').css({"color":"red","border":"1px solid red"});
    }

    //Set back to default when user starts correcting the mistake

    $("#rif").keyup(function(){
        $("#rif").css({"color":"","border":""});
    });

        
    $("#phone").keyup(function(){
        $("#phone").css({"color":"","border":""});
    });

    $("#dir").keyup(function(){
        $("#dir").css({"color":"","border":""});
    });

    $("#name").keyup(function(){
        $("mname").css({"color":"","border":""});
    });

    if (next){
    $.ajax({
        type:"POST",
        url:"../dbProv/addprovider.php",
        async: false,
        data: {name:name,dir:dir,phone:phone,rif:rif},
        success: function(data){
        alert(data);
            window.location = 'providers.php';
        }
    });
    } // if next
});