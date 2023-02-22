"use strict"
var indirizzoServer = "http://localhost:63342/TEALDI/PHP/";
$(document).ready(function() {



});


function loginGet()
{
    let utente = document.getElementById("txtUtente").value;
    let password = document.getElementById("txtPassword").value;

    let promise = fetch(indirizzoServer+"loginGet.php?utente="+utente+"&password="+password,{
        method : 'GET'

    });

    promise.then(
        async(risposta)=>{
            let dati = await risposta.json(); //<- prendo cio che ho mandato nell' eco di php
            console.log(dati);
            if(dati.code == 1 && dati.login)
            {
                alert("complimenti sei gay");
            }
            else
            {
                alert("complimenti sei gay :(");
            }
        }
    );

}


function loginPost()
{
    let utente = document.getElementById("txtUtente").value;
    let password = document.getElementById("txtPassword").value;
    let dati = {"utente":utente,"password":password};

    let promise = fetch(indirizzoServer+"loginPost.php",{
        method : 'POST',
        headers:{'Content-Type':'application/json'},
        body: JSON.stringify(dati)

    });

    promise.then(
        async(risposta)=>{
            let dati = await risposta.json(); //<- prendo cio che ho mandato nell' eco di php
            console.log(dati);
            if(dati.code == 1 && dati.login)
            {
                alert("complimenti sei gay");
            }
            else
            {
                alert("complimenti sei gay :(");
            }
        }
    );

}