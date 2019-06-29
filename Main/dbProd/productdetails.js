$("#catalog tr").click(function(){
	cont = 0;
	var name = null;
	var code = null;
        $(this).find("td").each(function(){
        	if (cont == 0){
        		values = $(this).html();
        		start = values.indexOf("y")+2;
        		aux = values.slice(start+1,length.values);
                end = aux.indexOf("<");

                name = aux.slice(0,end);
        		alert(name);
        	}

        	if (cont == 3){
        		values = $(this).html();
        		code = values;
        	}
        	cont++;
        });

        $.ajax({
        type:"POST",
        url:"../dbProd/getDetails.php",
        async: false,
        data: {name:name,code:code},
        success: function(data){
        alert(data);
            window.location = 'details.php';
        }
        });
    });