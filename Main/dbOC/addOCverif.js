function dec2hex (dec) {
    return ('0' + dec.toString(16)).substr(-2)
    }

function generateId (len) {
    var arr = new Uint8Array((len || 40) / 2)
    window.crypto.getRandomValues(arr)
    return Array.from(arr, dec2hex).join('')
  }

$("#createOC").click(function(){
    var code = generateId(13);
    document.getElementById("OCcode").value = code;
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+' '+time;
    document.getElementById("date").value = dateTime;
/*Replace placeholders with gathered values, ready to modify*/    
$('#submitprod').click(function(event){ 
    var name = document.getElementById("prodname2").value;
    var price = document.getElementById("price").value;
    var provider = document.getElementById("prov").value;
    var next = true;
    var type = 0;

    /*if (document.getElementById("prodmod").value == "" || document.getElementById("pricemod").value=="" ||
    document.getElementById("codemod").value == "" || document.getElementById("catmod").value =="Seleccionar" || 
    document.getElementById("provmod").value =="Seleccionar"){
        next = false;
        alert("Por favor rellene todos los datos antes de continuar");
    } */  


/*    if (type == 4){
        $('#codemod').css({"color":"red","border":"1px solid red"});
    }*/
    
    //Set back to default when user starts correcting the mistake
    
    $("#quantity").keyup(function(){
        $("#codemod").css({"color":"","border":""});
        var test = this.value;
        alert(test);
    });
    
/*    if (next){     
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
    }*/
    }); //End of submit modify user
});
