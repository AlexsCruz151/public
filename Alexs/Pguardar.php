<?php
include('../Alexs/Conexion.php');
if(isset($_POST['btnGuardarP']))
{
          $nom=$_POST['nom'];
          $ape=$_POST['ape'];
          $cor=$_POST['cor'];

          $q="INSERT INTO agenda.Persona(nombre,apellido,correo) values('$nom','$ape','$cor')";
          $r=pg_query($con,$q);
          if(!$r)
          {
               die("error en la insercion");     
          }
          header("Location: index.php");
}
 
?>
