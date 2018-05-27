<?php
require_once '../controller/empleadoController.php';
require_once '../app/validacionGeneral.php'; 
//require_once '../model/Empleado.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Empleado</title>
	<?php include_once '../src/header.php'; ?>
	<script type="text/javascript" src="../resources/js/empleado.js"></script>
</head>
<body>
<?php require_once '../src/menuAdmin.php'; ?>
	

    <!-- Page Content -->
    <div class='container'>
  		<div class="row">
  			<div class="col-md-6" style="margin-top: 30px;">
  		            <p class="robo" style="font-weight: 300; margin-bottom: 0px; font-size: 30px;">Empleado</p>
  		            <p class="robo" style="font-weight: 300; font-size: 14px; height: 40px;">Gesti&oacute;n  de Empleado</p>
        </div>
        <div class="col-md-3" style="margin-top: 30px;">
  					<div class="btn-group pull-right">
  	            <a href="#" class="admin-menu-navi">
  	                <button class="btn btn-primary  btn-sm " style="margin-left: 5px;" id="nuevoEmpleado">Nuevo</button>
  	             </a>
            </div>
  			</div>
  			<div class="clearfix"></div>
  				 <div class="col-md-12" style="margin-top: 10px;">
  					<table id="listadoEmpleado" class="mdl-data-table" cellspacing="1" width="100%">
  				 		<thead>
  				 			<th>DUI</th>
  				 			<th>Nombre</th>
                <th>Genero</th>
                <th>Cargo</th>
                <th>Telefono</th>
  				 			<th>Accion</th>
  				 		</thead>
              <tbody>
  				 		<?php 

  				 		$objEmpleado = new Empleado();
  				 		$data = $objEmpleado->getAll();
  				 		if ($data!=false) {
  				 			foreach ($data as $value) {
  				 				echo "<tr>
  				 						<td>".$value['dui']."</td>
  				 						<td>".$value['nombre']."</td>
                      <td>".$value['genero']."</td>
                      <td>".$value['cargo']."</td>
                      <td>".$value['telefono']."</td>
  				 						<td>
  				 							<input type='button' class='btn-success btn-sm editarEmpleado' idEmpleado='".$value['idEmpleado']."' value='Editar'>
  			 								<input type='button' class='btn-danger btn-sm eliminarEmpleado' idEmpleado='".$value['idEmpleado']."' value='Eliminar'>
  				 						</td>
  				 				</tr>";
  				 			}
  				 		}
  				 		?>
              </tbody>
  			 		</table>
  			 	</div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class='py-5 bg-light'>
      <div class='container'>
        <p class='m-0 text-center text-black'>Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>
</body>
</html>









<!-- Modal de inserción de Empleado -->
<div class="modal fade modal" id="modalIngresoEmpleado" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Agregar Empleado</span>
                </div>
                <div class="modal-body" >
                      <div class="row" id="infoEmpleado">
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                                 <div class="form-group required">
                                     <label for="nombreEmpleado" class="control-label">DUI</label>
                      
                                     <input type="text" class="form-control requerido"  
                                            placeholder="DUI" name="dui"  id="dui" required>
                                 </div>
                          </div>
                           <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="nombre" class="control-label">Nombre</label>            
                              <input type="text"  name="nombre" class="form-control" id="nombre" placeholder="Nombre" required >
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="genero" class="control-label">Genero</label>            
                              <input type="text"  name="genero" class="form-control" id="genero" placeholder="Genero" required >
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="cargo" class="control-label">Cargo</label>            
                              <input type="text"  name="cargo" class="form-control" id="cargo" placeholder="Cargo" required >
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="telefono" class="control-label">Telefono</label>            
                              <input type="text"  name="telefono" class="form-control" id="telefono" 
                              placeholder="Telefono" required >
                            </div>
                          </div>
                          <div class="clearfix"></div>
                    <div>
                       <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                    <button class="btn btn-primary  btn-sm " id="agregarEmpleado" >Guardar</button>
                            </div>
                        </div>
                  </div>

              </div>         
               <div class="modal-footer" id="modalFooter" >
                  
               </div>
            </div>
        </div> 
    </div>   
</div>



<!-- Modal de editar de Empleado -->
<div class="modal fade modal" id="modalModificacionEmpleado" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Modificar Empleado</span>
                </div>
                <div class="modal-body" >

                      <div class="row" id="infoEmpleadoEdit">
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                                 <div class="form-group required">
                                     <label for="nombreEmpleado" class="control-label">DUI</label>
                                    <input type="hidden" name="idEmpleado" id="idEmpleado">
                                     <input type="text" class="form-control requerido"  
                                            placeholder="DUI" name="dui"  id="duiE" required>
                                 </div>
                          </div>
                           <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="nombre" class="control-label">Nombre</label>            
                              <input type="text"  name="nombre" class="form-control" id="nombreE" placeholder="Nombre" required >
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="genero" class="control-label">Genero</label>            
                              <input type="text"  name="genero" class="form-control" id="generoE" placeholder="Genero" required >
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="cargo" class="control-label">Cargo</label>            
                              <input type="text"  name="cargo" class="form-control" id="cargoE" placeholder="Cargo" required >
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="telefono" class="control-label">Telefono</label>            
                              <input type="text"  name="telefono" class="form-control" id="telefonoE" 
                              placeholder="Telefono" required >
                            </div>
                           <!-- <input type="hidden" name="idUsuario" id="idUsuario"> -->
                          </div>
                          <div class="clearfix"></div>
                    <div>
                       <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                    <button class="btn btn-primary  btn-sm " id="modificarEmpleado" >Guardar</button>
                            </div>
                        </div>
                  </div>

              </div>         
               <div class="modal-footer" id="modalFooter" >
                  
               </div>
            </div>
        </div> 
    </div>   
</div>

