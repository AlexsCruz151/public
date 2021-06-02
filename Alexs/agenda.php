<?php
include('../Alexs/Conexion.php');
include('../Alexs/plantilla/header.php');
?>




<div class="container p-4" >
          <div class="row">
          <div class="card card-body">
                    <div class="row">
                              <div class="col-md-6 mx-auto">
                               <div class="card card-body border-primary">
                                 <form action="Aguardar.php" method="POST">
                                 <br><input required class="form-control" name="tel" placeholder="Telefono" type="text">
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
                                 <br><input class="btn btn-success" name="btnGuardarD" value="Guardar " type="submit">
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
                                           <td>Operadora</td>
                                           <td>Opciones</td>
                                          </tr>
                                         </thead>

                                         <tbody>
                                         <?php
                                         $query="SELECT d.id,p.nombre,o.nombre as operadora,o.nacionalidad,d.telefono FROM agenda.Persona  as p inner join agenda.DetalleTelefono as d
                                         on p.id=d.personaid inner join agenda.Operadora o on o.id=d.operadoraid";
                                         $resul=pg_query($con,$query);
                                        
                                        while ($d= pg_fetch_array($resul)) {?>
                                                
                                           <tr>
                                                 
                                                  <td><?php echo $d['nombre']; ?></td>
                                                  <td><?php echo $d['telefono']; ?></td>
                                                  <td><?php echo $d['operadora']; ?></td>
                                                  <td class="text-center">
                                                            <a href="Aeditar.php?idp=<?php echo $d['id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                            <a href="Aeliminar.php?idp=<?php echo $d['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                  </td>
                                            </tr>

                                        <?php } ?>

                                        
                                            
                                         </tbody>
                                        </table>
                              </div>
                    </div>
          </div>
          
</div>
 

</div>

<?php
include('../Alexs/plantilla/footer.php');
?>