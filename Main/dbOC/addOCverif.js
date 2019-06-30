
/*Get selected row*/  
    $('#oc').modal()
    $('#oc').on('shown.bs.modal', function () {
    $('#oc').trigger('focus')
    })

/*Replace placeholders with gathered values, ready to modify*/
    document.getElementById("prodname2").value = document.getElementById("prodname").value;
    document.getElementById("price").value = document.getElementById("dprice").value;
    document.getElementById("prov").value = document.getElementById("provider").value;
    
    $('#submitprod').click(function(event){ 
        var name = document.getElementById("prodname").value;
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
        }
        
        //Set back to default when user starts correcting the mistake
        
        $("#codemod").keyup(function(){
            $("#codemod").css({"color":"","border":""});
        });*/
        
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
    