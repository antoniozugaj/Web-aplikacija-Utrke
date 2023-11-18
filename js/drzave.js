$(document).ready(function () {

    function prikazi(){
        $.ajax({ 
            type: "GET",
            dataType: "json",
            url: "php_skripte/dohvatiDrzave.php",
            success: function(data) {

                var tablica = "<tr><th>DRŽAVA_ID</th><th>IME</th><th>KONTINENT</th><th>BROJ DOSADAŠNJIH UTRKA</th><th>UREĐIVANJE</th></tr>";

                $.each(data, function(e,r) {
                    tablica +="<tr>";
                    $.each(r, function(k,v) {
                        
                        tablica+="<td>"+v+"</td>";
                    });
                    tablica +="</tr>";
                });
                $("#sve_drzave").html(tablica);
            }
        })
    }

    prikazi();
  
    $("#dodaj_drzavu").submit(function (event) {

        event.preventDefault();

        var ime = $("#ime").val();
        var kontinent= $("#kontinent").val();
        var brojUtrka = 0;

        $.ajax({
            type: "POST",
            url: "php_skripte/dodajDrzavu.php",
            data: {
                ime: ime,
                kontinent: kontinent,
                brojUtrka: brojUtrka
            }
        })
        .done(function () {
            ime = $("#ime").val("");
            kontinent= $("#kontinent").val("");
            prikazi();
        });
    });

});