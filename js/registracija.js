document.addEventListener("DOMContentLoaded", nakonUcitavanja);

function nakonUcitavanja(){

    var forma=document.getElementById("registracija");
    
    forma.addEventListener("submit", function(event){

        var popisGresaka="";
        var ispravnostIme = true;
        var ispravnostKorisnicko = true;
        var ispravnostLozinka = true;
        var ispravnostPonovljena = true;
        var ispravnostEmail = true;

        var reg = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
        var email=document.getElementById("email").value;

        if(!reg.test(email)){
            popisGresaka+="\r\nEmail: krivi format";
            ispravnostEmail = false;
        }
        if(email == ""){
            popisGresaka+="\r\nEmail: nije unešen";
            ispravnostEmail = false;
        }
            
        var lozinka = document.getElementById("lozinka").value;
        if(lozinka.length < 8){
            popisGresaka += "\r\nLozinka: pre mali broj znakova";
            ispravnostLozinka = false;
        }
        if(lozinka == ""){
            popisGresaka += "\r\nLozinka: nije unešena";
            ispravnostLozinka = false;
        }
        if(lozinka.length > 20){
            popisGresaka+="\r\nLozinka: previše unešenih znakova";
            ispravnostPonovljena = false;
        }
        if(!/\d/.test(lozinka)){
            popisGresaka += "\r\nLozinka: mora sadržavati najmanje jedan broj";
            ispravnostLozinka = false;
        }
        if(lozinka.toUpperCase() == lozinka){
            popisGresaka += "\r\nLozinka: mora sadržavati najmanje jedno malo slovo";
            ispravnostLozinka = false;
        }
        if(lozinka.toLowerCase() == lozinka){
            popisGresaka += "\r\nLozinka: mora sadržavati najmanje jedno veliko slovo";
            ispravnostLozinka = false;
        }
            
        var ponLozinka=document.getElementById("ponlozinka").value;
        if(ponLozinka !== lozinka){
            popisGresaka+="\r\nPonovljena lozinka: nije jednaka lozinci";
            ispravnostPonovljena = false;
        }
        if(ponLozinka == ""){
            popisGresaka+="\r\nPonovljena lozinka: nije unešena";
            ispravnostPonovljena = false;
        }

        var imePrezime = document.getElementById("imeprezime").value;
        if(imePrezime == ""){
            ispravnostIme=false;
            popisGresaka += "\r\nIme i prezime: nije uneseno";
        }
        if(imePrezime.length >40){
            ispravnostIme=false;
            popisGresaka += "\r\nIme i prezime: previše unešenih znakova";
        }

        var korisnickoIme = document.getElementById("korisnickoime").value;
        if(korisnickoIme == ""){
            ispravnostKorisnicko = false;
            popisGresaka += "\r\nKorisničko ime: nije unešeno";
        }
        if(korisnickoIme.length > 20){
            ispravnostKorisnicko = false;
            popisGresaka += "\r\nKorisničko ime: previše unešenih znakova";
        }
            
        oznaciNeispravno(ispravnostEmail, ispravnostIme, ispravnostKorisnicko, ispravnostLozinka, ispravnostPonovljena);
        if(popisGresaka != ""){
            alert(popisGresaka);
            event.preventDefault();
        }
    } );

    function oznaciNeispravno(ispravnostEmail, ispravnostIme, ispravnostKorisnicko, ispravnostLozinka, ispravnostPonovljena){
        if(!ispravnostEmail){
            document.getElementById("lab_email").style.color="red";
        }else{
            document.getElementById("lab_email").style.color="black";
        }

        if(!ispravnostIme){
            document.getElementById("lab_imeprezime").style.color="red";
        }else{
            document.getElementById("lab_imeprezime").style.color="black";
        }

        if(!ispravnostKorisnicko){
            document.getElementById("lab_korisnickoime").style.color="red";
        }else{
            document.getElementById("lab_korisnickoime").style.color="black";
        }

        if(!ispravnostLozinka){
            document.getElementById("lab_lozinka").style.color="red";
        }else{
            document.getElementById("lab_lozinka").style.color="black";
        }

        if(!ispravnostPonovljena){
            document.getElementById("lab_ponlozinka").style.color="red";
        }else{
            document.getElementById("lab_ponlozinka").style.color="black";
        }

    }
}