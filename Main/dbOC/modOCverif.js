function getSelectedRow(){
    $('#modOC').modal('show');

    $("#orders tr").click(function(){
    cont = 0;
    var stats = null;
    var code = null;
    var next = false;
        $(this).find("td").each(function(){
            if (cont == 1){
                values = $(this).html();
                code = values;
            }

            if (cont == 4){
                values = $(this).html();
                start = values.indexOf("y")+2;
                aux = values.slice(start+1,length.values);
                end = aux.indexOf("<");
                stats = aux.slice(0,end);
            }
            cont++;
        });

        if (stats == "Pendiente"){
            $("#r5").prop('checked',true);
        }

        $("#submitmodoc").click(function(){
            if (document.getElementById("r6").checked)
                stats = "Procesada";
        
            $.ajax({
            type:"POST",
            url:"../dbOC/modOC.php",
            async: false,
            data: {code:code,stats:stats},
            success: function(data){
            alert(data);
                window.location = 'processedorders.php';
            }
            }); //End of submit modify
    });
     
});
}