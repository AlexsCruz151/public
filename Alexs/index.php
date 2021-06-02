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
                                 <form action="Pguardar.php" method="POST">
                                 <br><input required class="form-control" name="nom" placeholder="Nombre" type="text">
                                 <br><input required class="form-control" name="ape" placeholder="Apellido" type="text">
                                 <br><input required class="form-control" name="cor" placeholder="Correo" type="email">
                                 <br><input class="btn btn-success" name="btnGuardarP" value="Guardar Persona" type="submit">
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
                                           <td>ID</td>
                                           <td>Nombre</td>
                                           <td>Apellido</td>
                                           <td>Correo</td>
                                           <td>Opciones</td>
                                          </tr>
                                         </thead>

                                         <tbody>
                                         <?php
                                         $q="SELECT * FROM agenda.Persona";
                                         $r=pg_query($con,$q);
                                        
                                        while ($e= pg_fetch_array($r)) {?>
                                                
                                           <tr>
                                                  <td><?php echo $e['id']; ?></td>
                                                  <td><?php echo $e['nombre']; ?></td>
                                                  <td><?php echo $e['apellido']; ?></td>
                                                  <td><?php echo $e['correo']; ?></td>
                                                  <td class="text-center">
                                                            <a href="Peditar.php?idp=<?php echo $e['id']; ?>&" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                            <a href="Peliminar.php?idp=<?php echo $e['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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