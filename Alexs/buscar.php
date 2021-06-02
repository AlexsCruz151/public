<?php
include('../Alexs/Conexion.php');
include('../Alexs/plantilla/header.php');

$d=array();
$n=0;
if(isset($_POST['btnBuscarP']))
{
          $p=$_POST['per'];


          $q="SELECT p.nombre,d.telefono FROM agenda.Persona as p INNER JOIN agenda.DetalleTelefono as d on d.personaid=p.id
          where p.id=$p";
          $r=pg_query($con,$q);
          if(!$r)
          {
               die("error en la actualizacion");     
          }
          $n= pg_numrows($r);
          $d = pg_fetch_array($r);

         
}
 
?>
<div class="container p-4" >
          <div class="row">
          <div class="card card-body">
                    <div class="row">
                              <div class="col-md-6 mx-auto">
                               <div class="card card-body border-primary">

                               <form action="buscar.php" method="POST">
                                 <br>
                                 <select name="per"class="form-select" id=""> 
                                 
                                 <?php
                                         $q="SELECT * FROM agenda.Persona";
                                         $r=pg_query($con,$q);
                                        
                                        while ($e= pg_fetch_array($r)) {?>
                                                
                                                <option value="<?php echo $e['id'];?>"> <?php echo $e['nombre'];?> </option>

                                        <?php } ?>
                                 </select>
                               
                                 <br><input class="btn btn-success" name="btnBuscarP" value="Buscar " type="submit">
                                 </form>
                               </div>
                              </div>

                    </div>

                    <br>
                    <div class="row">
                              <div class="col-md-8 mx-auto">
                                        <table class="table table-bordered">
                                         <thead class="text-center bg-success text-light">
                                          <tr>
                                           <td>Persona</td>
                                           <td>Telefono</td>
                                          </tr>
                                         </thead>

                                         <tbody>
                                         <?php
                                         
                                        $i=0;
                                        while ($i<$n) {?>
                                                
                                           <tr>
                                                 
                                                  <td><?php echo $d['nombre']; ?></td>
                                                  <td><?php echo $d['telefono']; ?></td>
                                                 
                                            </tr>

                                        <?php $i++; } ?>

                                        
                                            
                                         </tbody>
                                        </table>
                              </div>
                    </div>
                   
          </div>
          
</div>
<?php
 include('../Alexs/plantilla/footer.php');
?>