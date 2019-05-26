/*Get selected row*/
$(function() {
    var tr = $('#providers').find('tr');
    var name = null;
    var dir = null;
    var phone = null;
    var rif = null;

    tr.bind('click', function(event) {
        $('#modify').attr("disabled", false);
        $('#delete').attr("disabled", false);
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
    
        $('#modify').click(function(event){
            $('#modify-provider').modal()
            $('#modify-provider').on('shown.bs.modal', function () {
              $('#modify-provider').trigger('focus')
            })
            /*Replace placeholders with gathered values, ready to modify*/
            document.getElementById("mname").value = name;
            document.getElementById("mdir").value = dir;
            document.getElementById("mphone").value = phone;
            document.getElementById("mrif").value = rif;
        });

        $('#modifyprov').click(function(event){ 
        var name = document.getElementById("mname").value;
        var dir = document.getElementById("mdir").value;
        var phone = document.getElementById("mphone").value;
        var nextrif = document.getElementById("mrif").value;

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
        allM.push(newe);

    for(var i = 0; i < rifs.length; i++){
    if (nextrif == rifs[i]){
        cont++;
        if (cont >= 2){
        alert("Proveedor con RIF ingresado ya existe en el sistema");
        next = false;
        break;
        }
    }
    }

    /*RIF verify*/
    var patt = new RegExp(/^([J-]+[0-9])/i);
    next = patt.test((String)(nextrif));

    if (!next){
    alert("Formato de RIF inválido: Debe ser J-numeros");
    }


    if (next){     
    $.ajax({
    type:"POST",
    url:"../dbProv/modprov.php",
    async: false,
    data: {name:name,dir:dir,phone:phone,rif:rif,nextrif:nextrif},
    success: function(data){
    alert(data);
        //window.location = '../Main/index.html';
    }
    });
    }
    }); //End of submit modify user
    });
    });