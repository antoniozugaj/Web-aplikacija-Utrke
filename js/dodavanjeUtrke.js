$(document).ready(function () {

    function prikazi(){
        $.ajax({ 
            type: "GET",
            dataType: "json",
            url: "php_skripte/dohvatiUtrke.php",
            success: function(data) {

                var tablica = "<tr><th>UTRKA_ID</th><th>NAZIV</th><th>BROJ SUDIONIKA</th><th>KRAJ PRIJAVA</th><th>POČETAK UTRKE</th><th>KRAJ UTRKE</th><th>UREDI UTRKU</th></tr>";

                $.each(data, function(e,r) {
                    tablica +="<tr>";
                    $.each(r, function(k,v) {
                        
                        tablica+="<td>"+v+"</td>";
                    });
                    tablica +="</tr>";
                });
                $("#sve_utrke").html(tablica);
            }
        })
    }

    prikazi();
  
    $("#dodaj_utrku").submit(function (event) {

        event.preventDefault();

        var drzava =$("#drzava").val();
        var tip = $("#tip").val();
        var naziv = $("#naziv").val();
        var sudionici= $("#broj_sudionika").val();
        var prijave = $("#prijave").val();
        var pocetak = $("#pocetak").val();
        var kraj = $("#kraj").val();

        $.ajax({
            type: "POST",
            url: "php_skripte/dodajUtrku.php",
            data: {
                drzava: drzava,
                tip: tip,
                naziv: naziv,
                sudionici: sudionici,
                prijava: prijave,
                pocetak: pocetak,
                kraj: kraj
            }
        })
        .done(function () {
            alert("Utrka dodana!");
            $("#drzava").val("");
            $("#tip").val("");
            $("#naziv").val("");
            $("#broj_sudionika").val("");
            $("#prijave").val("");
            $("#pocetak").val("");
            $("#kraj").val("");
            prikazi();
        });
    });

});