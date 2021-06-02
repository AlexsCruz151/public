<?php
include('../Alexs/Conexion.php');
include('../Alexs/plantilla/header.php');
if(isset($_GET['idp']))
{
          $id=$_GET['idp'];

          $q="SELECT * FROM agenda.Operadora WHERE id=$id";
          $r=pg_query($con,$q);
          if(pg_num_rows($r)==1)
          {
                    $e=pg_fetch_array($r);
                    $nom=$e['nombre'];
                    $nac=$e['nacionalidad'];
          }
          
         
}

if(isset($_POST['btnEditarO']))
{

          $id=$_GET['idp'];
          $nom=$_POST['ope'];
          $nac=$_POST['nac'];

          $q="UPDATE agenda.Operadora SET nombre='$nom',nacionalidad='$nac' WHERE id=$id";
          $r=pg_query($con,$q);
          if(!$r)
          {
               die("error en la actualizacion");     
          }
          header("Location: operadora.php");
}
 
?>
<div class="container p-4" >
          <div class="row">
          <div class="card card-body">
                    <div class="row">
                              <div class="col-md-6 mx-auto">
                               <div class="card card-body border-primary">
                               <form action="Oeditar.php?idp=<?php echo $id;?>" method="POST">
                                 <br><input required class="form-control" value="<?php echo $nom;?>" name="ope" placeholder="Operadora" type="text">
                                 <br><input required class="form-control" value="<?php echo $nac;?>" name="nac" placeholder="Nacionalidad" type="text">
                                 <br><input class="btn btn-success" name="btnEditarO" value="Editar Operadora" type="submit">
                                 </form>
                               </div>
                              </div>

                    </div>
                    <br>
                   
          </div>
          
</div>
<?php
 include('../Alexs/plantilla/footer.php');
?>