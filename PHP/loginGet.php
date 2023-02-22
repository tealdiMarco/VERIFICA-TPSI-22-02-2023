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
if(isset($_GET["utente"]) && isset($_GET["password"]))
{
    $ut = $_GET["utente"];
    $password = $_GET["password"];
}

$obj -> GET=$_GET;
$obj -> ut = $ut;
$obj -> pwd = $password;

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



