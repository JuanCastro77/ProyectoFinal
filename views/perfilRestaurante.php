<?php require_once '../controller/productoController.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Perfil</title>
  <?php 
    require_once '../src/header.php';
   ?>
   <script type="text/javascript" src="../resources/js/usuario.js"></script>
</head>
<body>
<?php 
require_once '../src/menuAdmin.php';
include ('../model/Usuario.php');
 ?>

 <div class="container fixed">
  <div class="row">
    <div class="col-md-3">
      <img class="img-thumbnail" src="../media/royalewithcheese.jpg">
    </div>
    <br><br>
    <div class="col-md-3">
      <p class="robo" style="font-weight: 300; font-size: 80px; color: #0174DF;" id="etiquetaRestaurante">Restaurante</p>
    </div>
    <div class="col-md-8">
      <p class="robo" style="font-weight: 200; font-size: 30px; color: #BDBDBD;" id="etiquetaUsuario">usuario</p>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-3">
      <br>
      <table class="table">
        <tr>
          <td><input type='button' class='btn-success btn-sm editarUsuario' id='Editar' value='Editar perfil'></td>
        </tr>
        <tr>
          <td><input type='button' class='btn-primary btn-sm editarUsuario' id='Cambiar' value='Cambiar contraseña'></td>
        </tr>
        <tr>
          <td><input type='button' class='btn-danger btn-sm eliminarUsuario' id='Eliminar' value='Eliminar cuenta'></td>
        </tr>
      </table>
    </div>
    <div class="col-md-8">
      <table class="table">
        <tr>
          <td>
            <label class="control-label" style="font-weight:20px; font-size: 40px; color: #31B404;">Datos</label>
            <br><br>
            <p style="font-size: 20px;">Nombre restaurante: </p> 
            <p style="font-size: 20px;">Codigo tributario: </p>
            <p style="font-size: 20px;">Direccion Restaurante: </p>
            <p style="font-size: 20px;">Télefono: </p> 
            <p style="font-size: 20px;">Correo: </p>
            <p style="font-size: 20px;">Cantidad sucursales: </p>
            <p style="font-size: 20px;">Ciudad: </p>
            <p style="font-size: 20px;"></p>
          </td>
        </tr>
        
      </table>
    </div>
  </div>
 </div>

</body>
</html>

<div class="modal fade modal" id="modalModificacionUsuario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Modificar Restaurante</span>
                </div>
                <div class="modal-body" >
                  
                      <div class="row" id="infoUsuarioEdit">
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                                 <div class="form-group required">
                                     <label for="nombreCiclo" class="control-label">Username</label>
                                     <input type="text" class="form-control requerido"  
                                            placeholder="Username" name="usernameEdit"  required id="usernameEdit">
                                 </div>
                          </div>
                           
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="nombreRestaurante" class="control-label">Nombre restaurante</label>            
                              <input type="text" class='form-control' name="nombreRestaurante" id="nombreRestauranteEdit" required>
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="email" class="control-label">Email</label>            
                              <input type="email" class='form-control' name="email" id="emailEdit" required>
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="telefono" class="control-label">Telefono</label>            
                              <input type="text" class='form-control' name="telefono" id="telefonoEdit" required>
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="direccion" class="control-label">Direccion</label>            
                              <input type="text" class='form-control' name="direccion" id="direccionEdit" required>
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="ciudad" class="control-label">Ciudad</label>            
                              <input type="text" class='form-control' name="ciudad" id="ciudadEdit" required>
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="cantidadSucursales" class="control-label">Cantidad sucursales</label>            
                              <input type="text" class='form-control' name="cantidadSucursales" id="cantidadSucursalesEdit" required>
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="cantidadSucursales" class="control-label">Codigo tributario</label>            
                              <input type="text" class='form-control' name="codigoTributario" id="codigoTributarioEdit" required>
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="logoRestaurante" class="control-label">Logo</label>            
                              <input type="file" class='form-control' name="logoRestaurante" id="logoRestauranteEdit">
                            </div>
                          </div>
            
                          <div class="clearfix"></div>

                    </div>
                    <div>
                    <button class="btn btn-primary  btn-sm " id="modificarUsuario" >Guardar Modificacion</button>
                  </div>

              </div>         
               <div class="modal-footer" id="modalFooter" >
                  
               </div>
            </div>
        </div> 
</div>

<!------------------------------------------------------------------------------------------------------------------------------------------------>
            <div class="modal fade modal" id="modalModificacionPassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Cambiar contraseña</span>
                </div>
                <div class="modal-body" >
                  
                      <div class="row" id="infoPassEdit">
                          
                           <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="password" class="control-label">Contraseña</label>            
                              <input type="password"  name="password" class="form-control" id="passwordEdit" >
                            </div>
                          </div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                              <label for="repassword" class="control-label">Repitir contraseña</label>            
                              <input type="password"  name="repassword" class="form-control" id="repasswordEdit" >
                            </div>
                          </div>
                          
                          <div class="clearfix"></div>

                    </div>
                    <div>
                    <button class="btn btn-primary  btn-sm " id="modificarPassword" >Cambiar contraseña</button>
                  </div>

              </div>         
               <div class="modal-footer" id="modalFooter" >
                  
               </div>
            </div>
        </div> 
</div>     