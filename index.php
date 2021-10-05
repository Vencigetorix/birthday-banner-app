<?php 
// include_once("index.html");
$host="us-cdbr-east-04.cleardb.com";
$user="bba7ba2004ed75";
$pass="8fcc9cd0";
$db="heroku_6b4cf65f4c17d8e";
$coneccion=mysqli_connect($host,$user,$pass,$db) or die("Error conección");
// $query="CREATE TABLE USER(id int AUTO_INCREMENT, nombre varchar(70) not null, fechanac date not null, PRIMARY KEY (id))";
// $res=mysqli_query($coneccion,$query) or die (" Error de consulta");
//include_once("registro.html");
$out='<!DOCTYPE html>
    <html lang="es">
    <head>';
    $script='
    <script>
    var indice = 0;
    function frases_alea(){
    
    frases = new Array();
    ';
    $ind = 0;
    
    $query="select * from user where month(fechanac) = ".date("n");
    $res=mysqli_query($coneccion,$query) or die ("Error de consulta show table");
    
    while ($fila=mysqli_fetch_assoc($res))
    {
        $script=$script."frases[".$ind.'] = "¡Felicidades, '.$fila['nombre'].'!";';
        $ind = $ind + 1;
    }

    $script = $script.'
    indice=(indice + 1)%'.$ind.';';
    $script= $script.'
    return frases[indice];
    
    }
    onload=function(){
        document.getElementById("algo").innerHTML=frases_alea();
        setInterval(function(){document.getElementById("algo").innerHTML=frases_alea();},5000)
    }
    </script>';
    $out = $out.$script;
    
    $out=$out.'    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet", href="css/show.css">
        <title>Cumpleanos</title>
    </head>

    <body>
        ';
    $out = $out.'<div id="algo"></div>';
    $out = $out.'</body>

    </html>';
    echo $out;
?>
