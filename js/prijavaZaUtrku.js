document.addEventListener("DOMContentLoaded", pokretanjeObrasca);

function pokretanjeObrasca(){

    var forma=document.getElementById("prijava_obrazac");

    forma.addEventListener("submit", 

        function(event){
            var greske = "";
            var ispravnostSlika=true;
            var ispravnostGodina=true;

            oznaciGreske(ispravnostSlika,ispravnostGodina);

            if(document.getElementById("slika").value != "" ){ 

                var ekstenzija = document.getElementById("slika").value.split('.').pop();

                if(ekstenzija !== "png" && ekstenzija !== "jpg" && ekstenzija !== "jpeg"){ 

                    greske+="\r\nDozvoljena datoteka smije biti samo png, jpeg ili jpg. Vaša datoteka je: " + ekstenzija;
                    ispravnostSlika=false;
                }

                var velicinaDatoteke = document.getElementById("slika").files[0].size / 1024 / 1024;
                
                if(velicinaDatoteke > 0.5){ 

                    greske+="\r\nDozvoljena veličina datoteke je 500KB. Veličina vaše datoteke: "+velicinaDatoteke.toFixed(2)+" MB";
                    ispravnostSlika=false;
                }
            }else{

                greske+="\r\nNiste odabrali sliku";
                ispravnostSlika=false;
            }

            if(document.getElementById("godina").value != ""){
                var uzorak=/^[0-9]+$/;
                var godina = document.getElementById("godina").value;
                godina=godina.replaceAll(".","");
                godina = godina.match(uzorak);
                if(godina != null){
                    if(godina[0].length != 4 || godina[0] > 2022 || godina[0] < 1922){
                        greske+="\r\nUnesena godina nije ispravna";
                        ispravnostGodina=false;
                    }
                }else{
                    greske+="\r\nUnesena godina nije ispravna";
                    ispravnostGodina=false;
                }
            }else{
                greske+="\r\nGodina nije unesena";
                ispravnostGodina=false;
            }
            

            if(greske.length != 0){
                oznaciGreske(ispravnostSlika,ispravnostGodina);
                alert(greske);
                event.preventDefault();
            }
        }
        ,false
    );
};

function oznaciGreske(ispravnostSlika,ispravnostGodina){
    if(ispravnostSlika){
        document.getElementById("labela_slika").innerText=document.getElementById("labela_slika").innerText.replaceAll("*","");
        document.getElementById("labela_slika").style.color="black";
    }else{
        document.getElementById("labela_slika").innerText = "*"+document.getElementById("labela_slika").innerText;
        document.getElementById("labela_slika").style.color="red";
    }

    if(ispravnostGodina){
        document.getElementById("labela_godina").innerText=document.getElementById("labela_godina").innerText.replaceAll("*","");
        document.getElementById("labela_godina").style.color="black";
    }else{
        document.getElementById("labela_godina").innerText = "*"+document.getElementById("labela_godina").innerText;
        document.getElementById("labela_godina").style.color="red";
    }
}