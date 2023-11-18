$(document).ready(function () {

    var kolacici = decodeURIComponent(document.cookie);

    var podjela = kolacici.split(/[;=]+/);
    var kolacic="";
    for(var i=0; i < podjela.length;i++){
        if(podjela[i] == "trcanjeUser")
            kolacic=podjela[i+1];
    }

    if(kolacic != ""){


        $("#username").val(kolacic);
    }


    $("#zaboravili").click(function(event){
        var korisnik = $("#username").val();
        $.ajax({
            type: "POST",
            url: "php_skripte/novaLozinka.php",
            data: {
                korisnicko: korisnik
            }
        })
        .done(function () {
            alert("Nova lozinka vam je poslana na registrirani email!");
        });
    });

    var brojPokusaja = 0;

    var DBusername;
    var DBlozinka;
    var DBblokiran;
    var DBuvjeti;
    var DBtip;
    var DBvalidiran;
    var DBvrijeme;

    $("#prijava_forma").submit(function (event) {
        var username= $("#username").val();
        var password = $("#password").val();
        var zapamti = $("#zapamti").is(":checked");

        event.preventDefault();

        $.ajax({ 
            type: "GET",
            dataType: "json",
            url: "php_skripte/dohvatiPodatkePrijave.php?username="+username,
            success: function(data) {
                $.each(data, function(k, v) {
                    if(k=="username")  
                        DBusername=v;
                    if(k=="lozinka")  
                        DBlozinka=v;
                    if(k=="blokiran")  
                        DBblokiran=v;
                    if(k=="uvjeti_koristenja")  
                        DBuvjeti=v;
                    if(k=="tip_korisnika")  
                        DBtip=v;
                    if(k=="validiran")  
                        DBvalidiran=v;
                    if(k=="datum")
                        DBvrijeme = v;
                });
                 
                if(DBlozinka == "null"){
                    alert("Ne postojeci racun")
                }else{
                    brojPokusaja+=1;

                    if(DBblokiran == "1"){
                        alert("Ovaj račun je blokiran.\n Kontaktirajte administratora kako bi vam otključali račun.")
                    }else{
                        if(brojPokusaja > 3){

                            $.ajax({
                                type: "POST",
                                url: "php_skripte/blokirajKorisnika.php",
                                data: {
                                    korisnicko: DBusername
                                }
                            })
                            .done(function () {
                                alert("Ovaj račun je blokiran.\n Kontaktirajte administratora kako bi vam otključali račun.");
                            });

                        }else{
                            if(DBlozinka == password){
                                
                                $.ajax({
                                    type: "POST",
                                    url: "php_skripte/prijaviKorisnika.php",
                                    data: {
                                        korisnicko: DBusername,
                                        uvjeti: DBuvjeti,
                                        tip: DBtip,
                                        validiran: DBvalidiran,
                                        datum: DBvrijeme
                                    }
                                })
                                .done(function () {
                                    if(DBvalidiran=="0"){
                                        window.location.replace("validacija.php");
                                        brojPokusaja=0;
                                    }else{
                                        brojPokusaja=0;
                                        if(zapamti){
                                            rok = new Date();   
                                            rok.setTime(rok.getTime()+(2*24*60*60*1000));
                                            document.cookie = "trcanjeUser="+DBusername+"; expires="+rok.toGMTString()+";secure;";
                                        }
                                        window.location.replace("index.php");
                                    }
                                });
                            }else{
                                $.ajax({
                                    type: "POST",
                                    url: "php_skripte/neuspijesnaPrijava.php",
                                    data: {
                                        korisnicko: DBusername
                                    }
                                })
                                .done(function () {
                                    alert("Neispravna lozinka!");
                                });

                            }
                        }
                    }
                }
                
        
            },
            error: function(){
                alert("json not found");
            }
        });  
    });
})