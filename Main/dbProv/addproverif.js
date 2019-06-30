/*Add provider*/
$('#addpro').click(function(event){ 
    var next = true;
    var name = document.getElementById("name").value;
    var dir = document.getElementById("dir").value;
    var phone = document.getElementById("phone").value;
    var rif = document.getElementById("rif").value;


    /*Verify before sending to AJAX*/
    next = true;
    type = 0;
    
    /*Cannot be blank*/
    if (document.getElementById("name").value == "" || document.getElementById("dir").value=="" ||
    document.getElementById("phone").value == "" || document.getElementById("rif").value ==""){
        next = false;
        alert("Por favor rellene todos los datos antes de continuar");
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

    //Change borders

    if (type == 4){
        $('#rif').css({"color":"red","border":"1px solid red"});
    }

    //Set back to default when user starts correcting the mistake

    $("#rif").keyup(function(){
        $("#rif").css({"color":"","border":""});
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