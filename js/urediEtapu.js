$(document).ready(function () {

    var id= $("#etapa_id").val();
    var orginalna= $("#opcija").val();
    $.ajax({
        type: "POST",
        url: "php_skripte/zakljucajEtapu.php",
        data: {
            utrka: id,
            opcija: orginalna
        }
    })
    .done(function (rezultat) {
        if(rezultat == 1){
            $("#azuriranje").css("display","none");
            $("#rezultati").css("display","none");
            $("#poruka").html("Etapa je zaključana.");
        }else{
            $("#azuriranje").css("display","block");
            $("#rezultati").css("display","block");
            forma();
            upisiRezultate();
        }
    });
    

    $("#upis").submit(function (event) {
        event.preventDefault();
        var opcija=1;

        var lista = $("#upis fieldset");
        var podaci=[];
        $.each(lista,function(li){
            var korisnik_id = $(this).find(".id").val();
            var pozicija = $(this).find(".pozicija").val();
            var vrijeme = $(this).find(".vrijeme").val();
            const element = [korisnik_id, pozicija, vrijeme];
            podaci.push(element);
        })
        $.ajax({
            type: "POST",
            url: "php_skripte/zakljucajEtapu.php",
            data: {
                utrka: id,
                opcija: opcija,
                podaci: podaci
            }
        })
        .done(function (rezultat) {
                $("#azuriranje").css("display","none");
                $("#rezultati").css("display","none");
                $("#poruka").html("Rezultati spremljeni. Etapa je zaključana.<br><a href=moderiranje.php>VARATI NA POPIS UTRKA</a>");
        }); 
    });

    
    function forma(){
        $.ajax({ 
            type: "GET",
            dataType: "json",
            url: "php_skripte/dohvatiEtape.php?id="+id+"&forma=1",
            success: function(data) {
                var tekst="";
                $.each(data, function(k,v) {
                    tekst += "<label for="+k+">"+k+"</label>";
                    tekst += "<input type=tekst id = "+k+" value='"+v+"' readonly>";
                });
                tekst += "<br><br><label for=novi_grad>Novi grad</label><input type=text id = novi_grad>";
                tekst += "<label for=nova_adresa>Nova adresa</label><input type=text id = nova_adresa>";
                tekst += "<label for=nova_duljina>Nova duljina</label><input type=text id = nova_duljina>";
                tekst += "<label for=novi_pocetak>Novi pocetak</label><input type=text id = novi_pocetak>";
                tekst += "<label for=novi_kraj>Novi kraj</label><input type=text id = novi_kraj>";
                tekst += "<br><input type=submit value =Promjeni>";
                $("#azuriraj").html(tekst);
            }
        })
    }
    $("#azuriraj").submit(function (event) {
        event.preventDefault();

        var grad = $("#grad").val();
        var adresa= $("#adresa").val();
        var duljina= $("#duljina").val();
        var pocetak= $("#pocetak").val();
        var kraj= $("#kraj").val();

        var novi_grad = $("#novi_grad").val();
        var nova_adresa= $("#nova_adresa").val();
        var nova_duljina= $("#nova_duljina").val();
        var novi_pocetak= $("#novi_pocetak").val();
        var novi_kraj= $("#novi_kraj").val();
        $.ajax({
            type: "POST",
            url: "php_skripte/azurirajEtapu.php",
            data: {
                etapa: id,
                grad: grad,
                adresa: adresa,
                duljina: duljina,
                pocetak: pocetak,
                kraj: kraj,
                novi_grad: novi_grad,
                nova_adresa: nova_adresa,
                nova_duljina: nova_duljina,
                novi_pocetak: novi_pocetak,
                novi_kraj: novi_kraj
            }
        })
        .done(function (rez) {
            $("#novi_grad").val("");
            $("#nova_adresa").val("");
            $("#nova_duljina").val("");
            $("#novi_pocetak").val("");
            $("#novi_kraj").val("");
            forma();
        });
    });

    function upisiRezultate(){
        $.ajax({ 
            type: "POST",
            dataType: "json",
            url: "php_skripte/dohvatiNatjecatelje.php?etapa="+id,
            success: function(data) {
                var tekst="";
                $.each(data, function(k,v) {
                    tekst+="<fieldset>";
                    tekst+="<input type=hidden class=id value='"+v.id+"'>";
                    tekst += "<label for=ime>Ime i prezime</label>";
                    tekst+="<input type=text class=ime value='"+v.ime+"' id=ime readonly>";
                    tekst += "<label for=username>Korisničko ime</label>";
                    tekst+="<input type=text class=username value='"+v.username+"' id=username readonly>";
                    if(v.sudjelovanje == "0"){
                        tekst += "<label for=pozicija>Završna pozicija</label>";
                        tekst+="<input type=text class=pozicija id=pozicija value='ODUSTAO/LA' readonly>";
                        tekst += "<label for=vrijeme>Vrijeme</label>";
                        tekst+="<input type=text class=vrijeme id=vrijeme value='ODUSTAO/LA' readonly>";
                    }else{
                        tekst += "<label for=pozicija>Završna pozicija</label>";
                        tekst+="<input type=text class=pozicija id=pozicija>";
                        tekst += "<label for=vrijeme>Vrijeme</label>";
                        tekst+="<input type=text class=vrijeme id=vrijeme>";
                    }
                    tekst+="</fieldset>";
                });
                tekst += "<br><input type=submit value='Spremi rezultate i zaklučaj etapu'>";
                $("#upis").html(tekst);
            }
        })
    }

});

