$(document).ready(function () {

    var id= $("#utrka_id").val();

    var orginalna= $("#opcija").val();
    $.ajax({
        type: "POST",
        url: "php_skripte/zakljucajUtrku.php",
        data: {
            utrka: id,
            opcija: orginalna
        }
    })
    .done(function (rezultat) {
        
        if(rezultat == 1){
            $("#unos").css("display","none");
        }else if(rezultat == 0){
            $("#unos").css("display","block");
        }else{
            alert(rezultat);
            alert("Kako bi ste zaključali utrku, sve etape moraju biti zaključane!");
        }
    });

    function zakljucaj(){
        var opcija= $("#lokot").val();
        $.ajax({
            type: "POST",
            url: "php_skripte/zakljucajUtrku.php",
            data: {
                utrka: id,
                opcija: opcija
            }
        })
        .done(function (rezultat) {
            
            if(rezultat == 1){
                $("#unos").css("display","none");
            }else if(rezultat == 0){
                $("#unos").css("display","block");
            }else{
                alert("Kako bi ste zaključali utrku, sve etape moraju biti zaključane!");
            }
        });
    }

    
    function prikazi(){
        $.ajax({ 
            type: "GET",
            dataType: "json",
            url: "php_skripte/dohvatiEtape.php?id="+id,
            success: function(data) {

                var tablica = "<tr><th>ETAPA ID</th><th>GRAD</th><th>ADRESA</th><th>DULJINA</th><th>ZAKLJUCANA</th><th>POČETAK</th><th>KRAJ</th><th>AKCIJE</th></tr>";

                $.each(data, function(e,r) {
                    tablica +="<tr>";
                    $.each(r, function(k,v) {
                        
                        tablica+="<td>"+v+"</td>";
                    });
                    tablica +="</tr>";
                });
                $("#etape").html(tablica);
            }
        })
    }
    prikazi();
  
    $("#dodaj_etapu").submit(function (event) {

        event.preventDefault();

        var grad = $("#grad").val();
        var adresa= $("#adresa").val();
        var duljina= $("#duljina").val();
        var pocetak= $("#pocetak").val();
        var kraj= $("#kraj").val();

        $.ajax({
            type: "POST",
            url: "php_skripte/dodajEtapu.php",
            data: {
                utrka: id,
                grad: grad,
                adresa: adresa,
                duljina: duljina,
                pocetak: pocetak,
                kraj: kraj
            }
        })
        .done(function () {
            $("#grad").val("");
            $("#adresa").val("");
            $("#duljina").val("");
            $("#pocetak").val("");
            $("#kraj").val("");
            prikazi();
        });
    });

    $("#lokot").change(zakljucaj);

});