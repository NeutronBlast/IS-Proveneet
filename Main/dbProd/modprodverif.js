function getSelectedRow(){
    $('#modify-product').modal()
    $('#modify-product').on('shown.bs.modal', function () {
      $('#modify-product').trigger('focus')
    })

$("#products tr").click(function() {
var name = null;
var code = null;
var price = null;
var cat = null;
var provider = null;
var index = 0;
var flag=1;

$(this).find("td").each(function(){
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


    /*Replace placeholders with gathered values, ready to modify*/
    document.getElementById("prodmod").value = name;
    document.getElementById("codemod").value = code;
    document.getElementById("pricemod").value = price;
    document.getElementById("catmod").value = cat;
    document.getElementById("provmod").value = provider;

$('#submitmod').click(function(event){ 
var name = document.getElementById("prodmod").value;
var price = document.getElementById("pricemod").value;
var cat = document.getElementById("catmod").value;
var provider = document.getElementById("provmod").value;
var nextcode = document.getElementById("codemod").value;
var next = true;
var type = 0;

if (document.getElementById("prodmod").value == "" || document.getElementById("pricemod").value=="" ||
document.getElementById("codemod").value == "" || document.getElementById("catmod").value =="Seleccionar" || 
document.getElementById("provmod").value =="Seleccionar"){
next = false;
alert("Por favor rellene todos los datos antes de continuar");
}   

var codes = [];
var table = document.getElementById("products");
for (var i = 0, row; row = table.rows[i]; i++) {
for (var j = 0, col; col = row.cells[j]; j++) {
if (j == 1){
    codes.push(col.innerHTML);
}
}  
}

var cont = 0;
if (code != nextcode)
codes.push(nextcode);

for(var i = 0; i < codes.length; i++){
if (nextcode == codes[i]){
cont++;
if (cont >= 2){
alert("Producto con código ingresado ya existe en el sistema");
next = false;
type = 4;
break;
}
}
}

//Name validation
if(!name[1] && flag){
        
    msg = "Nombre del producto debe ser mínimo 2 caracteres";
    alert(msg);
    flag = 0;
    type = 1;
}

//Price validation


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
$('#codemod').css({"color":"red","border":"1px solid red"});
}

if (type == 1){
    $('#prodmod').css({"color":"red","border":"1px solid red"});
}

if(type==3){

    $('#pricemod').css({"color":"red","border":"1px solid red"});
}


//Set back to default when user starts correcting the mistake

$("#codemod").keyup(function(){
$("#codemod").css({"color":"","border":""});
});

if (flag){     
$.ajax({
type:"POST",
url:"../dbProd/modprod.php",
async: false,
data: {name:name,nextcode:nextcode,price:price,provider:provider,cat:cat,code:code},
success: function(data){
alert(data);
window.location = 'manageproducts.php';
}
});
}
}); //End of submit modify user
});
}
