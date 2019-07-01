/*Get selected row*/
function getSelectedRow(){
    $('#modify-provider').modal()
    $('#modify-provider').on('shown.bs.modal', function () {
      $('#modify-provider').trigger('focus')
    })

$("#providers tr").click(function() {
var index = 0;
var name = null;
var dir = null;
var phone = null;
var rif = null;

$(this).find("td").each(function(){
var values = '';
    /* Gather values from the row*/
        if (index == 0){
            name = $(this).html();
        }
        else if (index == 1){
            dir = $(this).html();
        }
    
        else if (index == 2){
            phone = $(this).html();
        }

        else if (index == 3){
            rif = $(this).html();
        }
        index++;
});

    /*Replace placeholders with gathered values, ready to modify*/
    document.getElementById("mname").value = name;
    document.getElementById("mdir").value = dir;
    document.getElementById("mphone").value = phone;
    document.getElementById("mrif").value = rif;


$('#modifyprov').click(function(event){ 
var name = document.getElementById("mname").value;
var dir = document.getElementById("mdir").value;
var phone = document.getElementById("mphone").value;
var nextrif = document.getElementById("mrif").value;
var next = true;
var skip = false;
var type = 0;

if (document.getElementById("mname").value == "" || document.getElementById("mdir").value=="" ||
document.getElementById("mphone").value == "" || document.getElementById("mrif").value ==""){
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


var rifs = [];
var table = document.getElementById("providers");
for (var i = 0, row; row = table.rows[i]; i++) {
for (var j = 0, col; col = row.cells[j]; j++) {
if (j == 3){
    rifs.push(col.innerHTML);
}
}  
}

var cont = 0;
if (rif != nextrif)
rifs.push(nextrif);

for(var i = 0; i < rifs.length; i++){
if (nextrif == rifs[i]){
cont++;
if (cont >= 2){
alert("Proveedor con RIF ingresado ya existe en el sistema");
next = false;
type = 4;
break;
}
}
}

/*RIF verify*/
var patt = new RegExp(/^([J-]+[0-9])/i);
k = patt.test((String)(nextrif));

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

if (type == 1){
    $('#mname').css({"color":"red","border":"1px solid red"});
    }

if (type == 2){
    $('#mdir').css({"color":"red","border":"1px solid red"});
}

if (type == 3){
    $('#mphone').css({"color":"red","border":"1px solid red"});
}


if (type == 4){
$('#mrif').css({"color":"red","border":"1px solid red"});
}

//Set back to default when user starts correcting the mistake

$("#mrif").keyup(function(){
    $("#mrif").css({"color":"","border":""});
});

$("#mphone").keyup(function(){
    $("#mphone").css({"color":"","border":""});
});

$("#mdir").keyup(function(){
    $("#mdir").css({"color":"","border":""});
});

$("#mname").keyup(function(){
    $("#mname").css({"color":"","border":""});
    });

if (!next==false){     
$.ajax({
type:"POST",
url:"../dbProv/modprov.php",
async: false,
data: {name:name,dir:dir,phone:phone,rif:rif,nextrif:nextrif},
success: function(data){
alert(data);
window.location = 'providers.php';
}
});
}
}); //End of submit modify user
});
}