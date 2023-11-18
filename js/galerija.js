$(document).ready(function () {

    var sortiranje="";
    var drzava="";
    prikaz();

    $("#ime_uzlazno").click(function(event){
        sortiranje = "ime_uzlazno";
        prikaz();
    });

    $("#ime_silazno").click(function(event){
        sortiranje = "ime_silazno";
        prikaz();
    });

    $("#prezime_uzlazno").click(function(event){
        sortiranje = "prezime_uzlazno";
        prikaz();
    });

    $("#prezime_silazno").click(function(event){
        sortiranje = "prezime_silazno";
        prikaz();
    });

    $("#drzava").change(function(event) {
        drzava = $("#drzava").val();
        prikaz();
      });

    function prikaz(){
        $.ajax({ 
            type: "POST",
            dataType: "json",
            url: "php_skripte/dohvatiGaleriju.php",
            data: {
                sortiranje: sortiranje,
                drzava: drzava

            },
            success: function(data) {
    
                var tekst = "";
    
                $.each(data, function(k,v) {
                    tekst+="<figure><img src="+v.slika+" alt="+v.usrname+" height=200 height=200>";
                    tekst+="<figcaption>"+v.ime+" "+v.prezime+", "+v.utrka+": "+v.pozicija+". mjesto</figcaption></figure> ";
                });
                $("#galerija").html(tekst);
            }
        });
    }
   
});