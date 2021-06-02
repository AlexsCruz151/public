<?php
include('../Alexs/Conexion.php');
if(isset($_GET['idp']))
{
          $id=$_GET['idp'];

          $q="DELETE from  agenda.Operadora WHERE id=$id";
          $r=pg_query($con,$q);
          if(!$r)
          {
               die("error en la eliminacion");     
          }
          header("Location: operadora.php");
}
 
?>