/*Get selected item*/
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
    });

    $('#delete').click(function(event){
        $.ajax({
        type:"POST",
        url:"../dbProv/delprov.php",
        async: false,
        data: {rif:rif},
        success: function(data){
        alert(data);
        window.location = 'providers.php';
        }
        });
        }); 
    });