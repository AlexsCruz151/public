<?php
include('../Alexs/Conexion.php');
if(isset($_POST['btnGuardarO']))
{
          $ope=$_POST['ope'];
          $nac=$_POST['nac'];

          $q="INSERT INTO agenda.Operadora(nombre,nacionalidad) values('$ope','$nac')";
          $r=pg_query($con,$q);
          if(!$r)
          {
               die("error en la insercion");     
          }
          header("Location: operadora.php");
}
 
?>