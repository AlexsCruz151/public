<?php
include('../Alexs/Conexion.php');
include('../Alexs/plantilla/header.php');
if(isset($_GET['idp']))
{
          $id=$_GET['idp'];

          $q="SELECT * FROM agenda.Persona WHERE id=$id";
          $r=pg_query($con,$q);
          if(pg_num_rows($r)==1)
          {
                    $e=pg_fetch_array($r);
                    $nom=$e['nombre'];
                    $ape=$e['apellido'];
                    $cor=$e['correo'];
          }
          
         
}

if(isset($_POST['btnEditarP']))
{

          $id=$_GET['idp'];
          $nom=$_POST['nom'];
          $ape=$_POST['ape'];
          $cor=$_POST['cor'];

          $q="UPDATE agenda.Persona SET nombre='$nom',apellido='$ape',correo='$cor' WHERE id=$id";
          $r=pg_query($con,$q);
          if(!$r)
          {
               die("error en la actualizacion");     
          }
          header("Location: index.php");
}
 
?>
<div class="container p-4" >
          <div class="row">
          <div class="card card-body">
                    <div class="row">
                              <div class="col-md-6 mx-auto">
                               <div class="card card-body border-primary">
                                 <form action="Peditar.php?idp=<?php echo $id;?>" method="POST">
                                 <br><input required class="form-control" value="<?php echo $nom; ?>" name="nom" placeholder="Nombre" type="text">
                                 <br><input required class="form-control" value="<?php echo $ape; ?>" name="ape" placeholder="Apellido" type="text">
                                 <br><input required class="form-control" value="<?php echo $cor; ?>" name="cor" placeholder="Correo" type="email">
                                 <br><input class="btn btn-success" name="btnEditarP" value="editar Persona" type="submit">
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