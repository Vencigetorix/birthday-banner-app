<?php
header( 'Location: http://localhost/AplicWeb/prac1/#inicio' );
$host="localhost";
$user="root";
$pass="";
$db="dbp1";
$coneccion=mysqli_connect($host,$user,$pass,$db) or die("Error conección");

$folio=$_POST['folio'];
$folio=$folio%2021;

echo "Folio buscado: " . $folio  . "<br>";

$query="select * from alumnos where id_usuarios=".$folio;

$res=mysqli_query($coneccion,$query) or die ("Error de consulta 2");
$rowcount=mysqli_num_rows($res);
if($rowcount > 0){
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
        $tabla=$tabla."<tr>
            <td>".$fila['Nom_Alumno']."</td>
            <td>".$fila['Nom_Tutor']."</td>
            <td>".$fila['Fecha_nacimiento']."</td>
            <td>".$fila['Sexo']."</td>
            <td>".$fila['Edad']."</td>
            <td>".$fila['Curp']."</td>
            </tr>";
    }
    $tabla=$tabla."</table";
    echo $tabla;
}else{
    echo "No existe ese folio, Regístrese <br>";
}
mysqli_close($coneccion);
if($rowcount > 0){
    $tabla="<table>
    <tr>
    <th> Nom_Alumno|| </th> 
    <th> Nom_Tutor||  </th> 
    <th> Fecha_nacimiento||  </th>
    <th> Sexo||  </th>
    <th> Edad||  </th>
    <th> Curp     ||  </th>
    <th> Grado    ||  </th>
    <th> Direccion     ||  </th>
    <th> Telefono      ||  </th>
    <th> Correo     ||  </th>
    </tr>
    ";

    while ($fila=mysqli_fetch_assoc($res))
    {
        $tabla="<table>
            <tr><td> Nom_Alumno:       </td><td>".$fila['Nom_Alumno']."</td></tr>
            <tr><td> Nom_Tutor:        </td><td>".$fila['Nom_Tutor']."</td></tr>
            <tr><td> Fecha_nacimiento: </td><td>".$fila['Fecha_nacimiento']."</td></tr>
            <tr><td> Sexo:             </td><td>".$fila['Sexo']."</td></tr>
            <tr><td> Edad:             </td><td>".$fila['Edad']."</td></tr>
            <tr><td> Curp:             </td><td>".$fila['Curp']."</td></tr>
            <tr><td> Grado:            </td><td>".$fila['Grado']."</td></tr>
            <tr><td> Direccion:        </td><td>".$fila['Direccion']."</td></tr>
            <tr><td> Telefono:         </td><td>".$fila['Telefono']."</td>/tr>
            <tr><td> Correo:           </td><td>".$fila['Correo']."</td></tr>
        </table>";
    }
?>