$(document).ready(function () {

    $.ajax({ 
        type: "POST",
        dataType: "json",
        url: "php_skripte/filtrirajDnevnikRada.php",
        data: {
            od: "",
            do: "",
            tip: "",
            username: ""
        },
        success: function(data) {

            var tablica = "<tr><th>LOG_ID</th><th>VRIJEME</th><th>DOGAĐAJ</th><th>KORISNIK_ID</th><tr></tr>";

            $.each(data, function(e,r) {
                tablica +="<tr>";
                $.each(r, function(k,v) {
                    
                    tablica+="<td>"+v+"</td>";
                });
                tablica +="</tr>";
            });
            $("#dnevnik_rada").html(tablica);
        }
    })

  
    $("#filter").submit(function (event) {

        event.preventDefault();

        var vrijemeOd = $("#vrijeme_od").val();
        var vrijemeDo= $("#vrijeme_do").val();
        var username = $("#username").val();
        var tipUpita = $("#tip").val();


        $.ajax({ 
            type: "POST",
            dataType: "json",
            url: "php_skripte/filtrirajDnevnikRada.php",
            data: {
                od: vrijemeOd,
                do: vrijemeDo,
                tip: tipUpita,
                username: username
            },
            success: function(data) {

                var tablica = "<tr><th>LOG_ID</th><th>VRIJEME</th><th>DOGAĐAJ</th><th>KORISNIK_ID</th><tr></tr>";

                $.each(data, function(e,r) {
                    tablica +="<tr>";
                    $.each(r, function(k,v) {
                        
                        tablica+="<td>"+v+"</td>";
                    });
                    tablica +="</tr>";
                });
                $("#dnevnik_rada").html(tablica);
            }
        })
    });

});