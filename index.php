<?php include_once("index.html");
$host="us-cdbr-east-04.cleardb.com";
$user="bba7ba2004ed75";
$pass="8fcc9cd0";
$db="heroku_6b4cf65f4c17d8e";
$coneccion=mysqli_connect($host,$user,$pass,$db) or die("Error conección");
$query="CREATE TABLE USER(id int AUTO_INCREMENT, nombre varchar(70) not null, fechanac date not null, PRIMARY KEY (id))";
$res=mysqli_query($coneccion,$query) or die (" Error de consulta");
?>
