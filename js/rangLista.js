$(document).ready(function () {

    $.ajax({ 
        type: "POST",
        dataType: "json",
        url: "php_skripte/filtrirajRangListu.php",
        data: {
            od: "",
            do: ""
        },
        success: function(data) {

            var tablica = "<tr><th>MJESTO</th><th>Username</th><th>Ime i prezime</th><th>Broj etapa</th></tr>";
             var br=0;
            $.each(data, function(e,r) {
                br++;
                tablica +="<tr><td>"+br+"</td>";
                $.each(r, function(k,v) {
                    
                    tablica+="<td>"+v+"</td>";
                });
                tablica +="</tr>";
            });
            $("#rang_lista").html(tablica);
        }
    })

  
    $("#filter").submit(function (event) {

        event.preventDefault();

        var vrijemeOd = $("#vrijeme_od").val();
        var vrijemeDo= $("#vrijeme_do").val();

        $.ajax({ 
            type: "POST",
            dataType: "json",
            url: "php_skripte/filtrirajRangListu.php",
            data: {
                od: vrijemeOd,
                do: vrijemeDo
            },
            success: function(data) {

                var tablica = "<tr><th>MJESTO</th><th>Username</th><th>Ime i prezime</th><th>Broj etapa</th></tr>";
                var br=0;
                $.each(data, function(e,r) {
                    br++;
                    tablica +="<tr><td>"+br+"</td>";
                    $.each(r, function(k,v) {
                        
                        tablica+="<td>"+v+"</td>";
                    });
                    tablica +="</tr>";
                });
                $("#rang_lista").html(tablica);
            }
        })
    });

});