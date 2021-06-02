<?php
include('../Alexs/Conexion.php');
if(isset($_POST['btnGuardarD']))
{
          $tel=$_POST['tel'];
          $ope=$_POST['ope'];
          $per=$_POST['per'];

          $q="INSERT INTO agenda.DetalleTelefono(personaid,operadoraid,telefono) values('$per','$ope','$tel')";
          $r=pg_query($con,$q);
          if(!$r)
          {
               die("error en la insercion");     
          }
          header("Location: agenda.php");
}
 
?>