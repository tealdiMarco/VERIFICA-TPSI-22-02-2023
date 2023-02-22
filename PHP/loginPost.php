<?php
header("Access-Control-ALlow-Origin: *");

$utenti = '
    [
        {"ut":"luca.abete", "pwd":"prova","nome":"Luca", "cognome":"Abete", "preferenze":["azione", "avventura"]},
        {"ut":"andrew.tate", "pwd":"prova","nome":"Andrew", "cognome":"Tate", "preferenze":["gangster", "fantasy", "commedie", "drammi"]},
        {"ut":"matteo.denaro", "pwd":"prova","nome":"Matteo", "cognome":"Denaro Messina", "preferenze":["thriller", "gialli", "fantascienza"]}
    ]
    ';

$obj = new stdClass();

$arrayPersone = json_decode($utenti); //<-- trasforma oggetto json in stringa
$ut="";
$password="";

$Json=file_get_contents('php://input');//<--prendo cio che ho scritto in post
$dati = json_decode($Json);//<--e lo spacchetta
if(!(is_null($dati)))
{
    $ut = $dati->utente;
    $password = $dati->password;
}

$obj -> POST=$_POST;
$obj -> ut = $ut;
$obj -> pwd = $password;
$obj -> json = $dati;//in realta non serve


$i =0;

while ($i<count($arrayPersone) && ($arrayPersone[$i]->ut != $ut || $arrayPersone[$i]->pwd != $password))
{
    $i++;
}

if($i<count($arrayPersone))
{
    $obj->login = true;
    $obj->code = 1;
    $obj->gay = "no";

}
else
{
    $obj->login = false;
    $obj->code = -1;
    $obj->gay = "si";

}

echo json_encode($obj); //<- da json a stringa


