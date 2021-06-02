<?php
include('../Alexs/Conexion.php');
include('../Alexs/plantilla/header.php');
if(isset($_GET['idp']))
{
          $id=$_GET['idp'];

          $q="SELECT p.nombre,o.nombre as operadora,d.telefono FROM agenda.Persona  as p inner join agenda.DetalleTelefono as d
          on p.id=d.personaid inner join agenda.Operadora o on o.id=d.operadoraid where d.id=$id";
          $r=pg_query($con,$q);
          if(pg_num_rows($r)==1)
          {
                    $e=pg_fetch_array($r);
                    $nom=$e['nombre'];
                    $ope=$e['operadora'];
                    $tel=$e['telefono'];
          }
          
         
}

if(isset($_POST['btnEditarD']))
{

          $id=$_GET['idp'];
          $nom=$_POST['per'];
          $operado=$_POST['ope'];
          $tel=$_POST['tel'];

          $q="UPDATE agenda.DetalleTelefono SET telefono='$tel',personaid=$nom,operadoraid=$operado WHERE id=$id";
          $r=pg_query($con,$q);
          if(!$r)
          {
               die("error en la actualizacion");     
          }
          header("Location: agenda.php");
}
 
?>
<div class="container p-4" >
          <div class="row">
          <div class="card card-body">
                    <div class="row">
                              <div class="col-md-6 mx-auto">
                               <div class="card card-body border-primary">
                               <form action="Aeditar.php?idp=<?php echo $id;?>" method="POST">
                                 <br><input required class="form-control" value="<?php echo  $tel; ?>" name="tel" placeholder="Telefono" type="text">
                                 <br>
                                 <select name="per"class="form-select" id=""> 
                                 
                                 <?php
                                         $q="SELECT * FROM agenda.Persona";
                                         $r=pg_query($con,$q);
                                        
                                        while ($e= pg_fetch_array($r)) {?>
                                                
                                                <option value="<?php echo $e['id'];?>"> <?php echo $e['nombre'];?> </option>

                                        <?php } ?>
                                 </select>
                                 <br>
                                 <select name="ope"  class="form-select" id="">
                                 <?php
                                         $p="SELECT * FROM agenda.Operadora";
                                         $re=pg_query($con,$p);
                                        
                                        while ($i= pg_fetch_array($re)) {?>
                                                
                                                <option value="<?php echo $i['id'];?>"> <?php echo $i['nombre'];?> </option>

                                        <?php } ?>
                                 </select>
                                 <br><input class="btn btn-success" name="btnEditarD" value="editar " type="submit">
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