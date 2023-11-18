$(document).ready(function () {

    function prikazi(){
        $.ajax({ 
            type: "GET",
            dataType: "json",
            url: "php_skripte/dohvatiUtrkeModeratora.php",

            success: function(data) {
                tekst="";
                $.each(data, function(e,r) {
                    tekst+="<h2>"+e+"</h2>";
                    tekst+="<table>";
                    tekst +="<tr><th>UTRKA ID</th><th>IME UTRKE</th><th>ZAKLJUČANA</th><th>UREDI ETAPE</th></tr>";
                    $.each(r, function(q,j) {
                        tekst+="<tr>";
                        $.each(j, function(k,v) {
                            tekst+="<td>"+v+"</td>";
                        });
                        tekst +="</tr>";
                    });
                    tekst+="</table>";
                });
                $("#utrke").html(tekst);
            }
        })
    }

    prikazi();
});