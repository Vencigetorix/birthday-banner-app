<?php

  $host="us-cdbr-east-04.cleardb.com";
  $user="bba7ba2004ed75";
  $pass="8fcc9cd0";
  $db="heroku_6b4cf65f4c17d8e";
  $coneccion=mysqli_connect($host,$user,$pass,$db) or die("Error conección");

  $nomb=$_POST['nomb'];
  $fecha=$_POST['fecha'];
  
  echo "Nombre: " . $nomb  . "<br>";
  echo "Fecha" . $fecha. " <br>";
  
  $query="SELECT COUNT(*) from user";
  $res=mysqli_query($coneccion,$query) or die (" Error de consulta show");
  if ($row = mysqli_fetch_row($res)) {
    $count = trim($row[0]);
    }
  echo "a".$count;
  if($count < 50){
    $query="INSERT INTO user (nombre, fechanac) VALUES ('$nomb', '$fecha')";
  
    $res=mysqli_query($coneccion,$query) or die (" Error de consulta insert");
    $query="SELECT @@identity AS id";
    $res=mysqli_query($coneccion,$query) or die (" Error de consulta id");
    if ($row = mysqli_fetch_row($res)) {
      $id = trim($row[0]);
      }
    $query="select * from user";
  
    $res=mysqli_query($coneccion,$query) or die ("Error de consulta show table");
  
  
  
    $tabla="<table>
    <tr>
      <th> Nombre|| </th> 
      <th> Fecha_nacimiento||  </th>
    </tr>
    ";
  
    while ($fila=mysqli_fetch_assoc($res))
    {
        $tabla=$tabla."<tr><td>".$fila['nombre']."</td><td>".$fila['fechanac']."</td></tr>";
    }
  
    if ($res) {
      $rowcount=mysqli_num_rows($res);
      echo "The total number of rows are: ".$rowcount."</td></tr>";
      if(intdiv($id, 10) == 0){
        echo "Su matricula es 202100".$id."</td></tr>";
      }if(intdiv($id, 10) < 10){
        echo "Su matricula es 20210".$id."</td></tr>";
      }else{
        echo "Su matricula es 2021".$id."</td></tr>";
      }
    } //CUENTA NUMERO DE FILAS
  
    $tabla=$tabla."</table";
    echo $tabla;
  }else{
    echo "Ya no es posible ingresar otro alumno";
  }
  mysqli_close($coneccion);
  
  
  ?>