$(document).ready(function () {
    var zabrani = false;

    $("#korisnickoime").blur(function (event) { 
        var korisnickoime = $("#korisnickoime").val();
        zabrani = false;
        $.ajax({ 
            type: "GET",
            dataType: "json",
            url: "php_skripte/provjeriKorisnickoIme.php?korisnickoime="+korisnickoime,
            success: function(data) {
                $.each(data, function(k, v) {
                    if(v =="1"){
                        zabrani = true;
                        alert("Korisnicko ime već postoji!");
                    }
                });
        
            },
            error: function(){
                alert("json not found");
            }
        });
        if(zabrani)
            $("#lab_korisnickoime").css("color","red");
        else
            $("#lab_korisnickoime").css("color","black");
    });

    $("#registracija").submit(function (event) {
        if(zabrani){
            event.preventDefault();
            alert("Korisnicko ime već postoji!");
            $("#lab_korisnickoime").css("color","red");
        }
            

    });
})