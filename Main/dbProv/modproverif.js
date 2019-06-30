/*Get selected row*/
function getSelectedRow(){
    $(function() {
        var tr = $('#providers').find('tr');
        var name = null;
        var dir = null;
        var phone = null;
        var rif = null;
    
        tr.bind('click', function(event) {
            var values = '';
            var tds = $(this).addClass('row-highlight').find('td');
            $.each(tds, function(index, item) {
                values = values + 'td' + (index + 1) + ':' + item.innerHTML + '<br/>';
                /* Gather values from the row*/
                    if (index == 0){
                        start = values.indexOf(":");
                        end = values.indexOf("<");
    
                        name = values.slice(start+1,end);
                        values = "";
                    }
                    else if (index == 1){
                        start = values.indexOf(":");
                        end = values.indexOf("<");
    
                        dir = values.slice(start+1,end);
                        values = "";
                    }
                
                    else if (index == 2){
                        start = values.indexOf(":");
                        end = values.indexOf("<");
    
                        phone = values.slice(start+1,end);
                        values = "";
                    }
    
                    else if (index == 3){
                        start = values.indexOf(":");
                        end = values.indexOf("<");
    
                        rif = values.slice(start+1,end);
                        values = "";
                    }
            });
    
                $('#modify-provider').modal()
                $('#modify-provider').on('shown.bs.modal', function () {
                  $('#modify-provider').trigger('focus')
                })
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
            var type = 0;
    
        if (document.getElementById("mname").value == "" || document.getElementById("mdir").value=="" ||
        document.getElementById("mphone").value == "" || document.getElementById("mrif").value ==""){
            next = false;
            alert("Por favor rellene todos los datos antes de continuar");
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
    
        //Change borders
    
        if (type == 4){
            $('#mrif').css({"color":"red","border":"1px solid red"});
        }
        
        //Set back to default when user starts correcting the mistake
        
        $("#mrif").keyup(function(){
            $("#mrif").css({"color":"","border":""});
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
        });
    }