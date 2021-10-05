<?php

  $host="localhost";
  $user="root";
  $pass="";
  $db="dbp1";
  $coneccion=mysqli_connect($host,$user,$pass,$db) or die("Error conección");

$nomb=$_POST['nomb'];
$nomTutor=$_POST['nomTutor'];
$fechaNiño=$_POST['fechaNiño'];
$sexoNiño=$_POST['sexoNiño'];
$edNiño=$_POST['edNiño'];
$curp=$_POST['curp'];

echo "Nombre: " . $nomb  . "<br>";
echo "Tutor: " . $nomTutor. " <br>";
echo "Fecha Alumno: " . $fechaNiño. " <br>";

echo "Sexo niño: " . $sexoNiño. " <br>";
echo "Edad del niño: " . $edNiño. " <br>";
echo "Curp: " . $curp. " <br>";

$query="SELECT COUNT(*) from alumnos";
$res=mysqli_query($coneccion,$query) or die (" Error de consulta");
if ($row = mysqli_fetch_row($res)) {
  $count = trim($row[0]);
  }
echo "a".$count;
if($count < 50){
  $query="INSERT INTO alumnos (Nom_Alumno, Nom_Tutor, Fecha_nacimiento, Sexo, Edad, Curp) VALUES ('$nomb','$nomTutor', '$fechaNiño', '$sexoNiño', '$edNiño', '$curp')";

  $res=mysqli_query($coneccion,$query) or die (" Error de consulta");
  $query="SELECT @@identity AS id";
  $res=mysqli_query($coneccion,$query) or die (" Error de consulta id");
  if ($row = mysqli_fetch_row($res)) {
    $id = trim($row[0]);
    }
  //echo "aaaa".$id."<br>";

  $query="select * from alumnos";

  $res=mysqli_query($coneccion,$query) or die ("Error de consulta 2");



  $tabla="<table>
  <tr>
    <th> Nom_Alumno|| </th> 
    <th> Nom_Tutor||  </th> 
    <th> Fecha_nacimiento||  </th>
    <th> Sexo||  </th>
    <th> Edad||  </th>
    <th> Curp  </th>
  </tr>
  ";

  while ($fila=mysqli_fetch_assoc($res))
  {
      $tabla=$tabla."<tr><td>".$fila['Nom_Alumno']."</td><td>".$fila['Nom_Tutor']."</td><td>".$fila['Fecha_nacimiento']."</td><td>".$fila['Sexo']."</td><td>".$fila['Edad']."</td><td>".$fila['Curp']."</td></tr>";
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