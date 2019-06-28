
/*Get selected row*/
function getTarget(){
    $(function() {
        var tr = $('#products').find('tr');
        var name = null;
        var code = null;
        var price = null;
        var cat = null;
        var provider = null;
    
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
    
                        code = values.slice(start+1,end);
                        values = "";
                    }
                
                    else if (index == 2){
                        start = values.indexOf(":");
                        end = values.indexOf("<");
    
                        price = values.slice(start+1,end);
                        values = "";
                    }
    
                    else if (index == 3){
                        start = values.indexOf(":");
                        end = values.indexOf("<");
    
                        cat = values.slice(start+1,end);
                        values = "";
                    }
    
                    else if (index == 4){
                        start = values.indexOf(":");
                        end = values.indexOf("<");
    
                        provider = values.slice(start+1,end);
                        values = "";
                    }
            });

            $.ajax({
            type:"POST",
            url:"../dbProd/delprod.php",
            async: false,
            data: {code:code},
            success: function(data){
            alert(data);
            window.location = 'manageproducts.php';
            }
            });
            });
            }); 
            }
    