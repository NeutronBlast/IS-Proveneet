function dec2hex (dec) {
    return ('0' + dec.toString(16)).substr(-2)
    }

function generateId (len) {
    var arr = new Uint8Array((len || 40) / 2)
    window.crypto.getRandomValues(arr)
    return Array.from(arr, dec2hex).join('')
  }

function calculatePrice(price, mult){
    return price*mult;
}
    


$("#createOC").click(function(){
    var firstprice = document.getElementById("price").value;
    $("#quantity").keyup(function(){
    $("#quantity").css({"color":"","border":""});
    var test = this.value;
    if (test != ""){
    document.getElementById("price").value = calculatePrice(firstprice,test);
    }
    if (isNaN(test)){
        $('#quantity').css({"color":"red","border":"1px solid red"});
    }
});
    var code = generateId(13);
    document.getElementById("OCcode").value = code;
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+' '+time;
    document.getElementById("date").value = dateTime;

/*Replace placeholders with gathered values, ready to modify*/    
$('#submitprod').click(function(event){ 
    var prodcode = document.getElementById("OCcode").value;
    var prodprice = document.getElementById("price").value;
    var prodname = document.getElementById("prodname2").value;
    var prodprovider = document.getElementById("prov").value;
    var prodowner = document.getElementById("owner").value;
    var proddate = document.getElementById("date").value;
    var prodq = document.getElementById("quantity").value;

    var next = true;
    var type = 0;

    if (document.getElementById("quantity").value == ""){
        next = false;
        alert("Por favor rellene todos los datos antes de continuar");
    }
    
    if (next){     
    $.ajax({
    type:"POST",
    url:"../dbOC/addOC.php",
    async: false,
    data: {prodcode:prodcode,prodowner:prodowner,prodprice:prodprice,proddate:proddate},
    success: function(data){
    alert(data);
        window.location = 'pendingorders.php';
    }
    }); //End of submit modify
    }
}); 
}); 