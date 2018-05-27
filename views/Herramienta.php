<?php
require_once '../controller/herramientaController.php';
require_once '../app/validacionGeneral.php'; 
require_once '../model/Herramienta.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Herramienta</title>
  <?php include_once '../src/header.php'; ?>
  <script type="text/javascript" src="../resources/js/herramienta.js"></script>
</head>
<body>
<?php require_once '../src/menuAdmin.php'; ?>
  

    <!-- Page Content -->
    <div class='container'>
      <div class="row">
        <div class="col-md-6" style="margin-top: 30px;">
                  <p class="robo" style="font-weight: 300; margin-bottom: 0px; font-size: 30px;">Herramienta</p>
                  <p class="robo" style="font-weight: 300; font-size: 14px; height: 40px;">Gesti&oacute;n  de Herramienta</p>
        </div>
        <div class="col-md-3" style="margin-top: 30px;">
            <div class="btn-group pull-right">
                <a href="#" class="admin-menu-navi">
                    <button class="btn btn-primary  btn-sm " style="margin-left: 5px;" id="nuevoHerramienta">Nuevo</button>
                 </a>
            </div>
        </div>
        <div class="clearfix"></div>
           <div class="col-md-12" style="margin-top: 10px;">
            <table id="listadoHerramienta" class="mdl-data-table" cellspacing="1" width="100%">
              <thead>
                
                <th>Nombre de la Herramienta</th>
                <th>Categoria</th>
                <th>Estado Herramienta</th>
                <th>Acciones</th>
                
              </thead>
              <tbody>
              <?php 

              $objHerramienta = new Herramienta();
              $data = $objHerramienta->getAll();
              if ($data!=false) {
                foreach ($data as $value) {
                  echo "<tr>
                      <td>".$value['nombreHerramienta']."</td>
                      <td>".$value['categoria']."</td>
                      <td>".$value['estado']."</td>
                      <td>
                        <input type='button' class='btn-success btn-sm editarHerramienta' id='".$value['idHerramienta']."' value='Editar'>
                        <input type='button' class='btn-danger btn-sm eliminarHerramienta' id='".$value['idHerramienta']."' value='Eliminar'>
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


<!-- Modal de inserción de producto -->
<div class="modal fade modal" id="modalIngresoHerramienta" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Agregar Herramienta</span>
                </div>
                <div class="modal-body" >
                      <div class="row" id="infoHerramienta">
                          <div class="form-column col-md-5.5 col-sm-5.5 col-xs-5.5">
                                 <div class="form-group required">
                                     <label for="nombreProducto" class="control-label">Nombre Herramienta</label>
                                     
                                     <input type="text" class="form-control requerido"  
                                            placeholder="Nombre" name="nombreHerramienta" id="nombreHerramienta" required>
                                 </div>
                          </div>
                           
                          <div class="form-group required">
                              <label for="Categoria" class="control-label">Categoria</label>            
                              <select name="Categoria" class="form-control">
                                <?php 
                                    $objHerramienta = new Herramienta();
                                    $data = $objHerramienta->AllCategoria();
                                    if ($data!=null) {
                                        foreach ($data as $value) {
                                        echo "<option value='".$value['idCategoriaHerramienta']."'>";
                                        echo $value['categoria'];
                                        echo "</option>";
                                       } 
                                    }else{
                                      echo "<option value='null'>No hay registros</option>";
                                    }
                                    
                                 ?>
                                
                              </select>
                            </div>

                           <div class="form-group required">
                              <label for="Estado" class="control-label">Estado</label>            
                              <select name="Estado" class="form-control">
                                <?php 
                                    $objHerramienta = new Herramienta();
                                    $data = $objHerramienta->AllEstado();
                                    if ($data!=null) {
                                        foreach ($data as $value) {
                                        echo "<option value='".$value['idEstadoHerramienta']."'>";
                                        echo $value['estado'];
                                        echo "</option>";
                                       } 
                                    }else{
                                      echo "<option value='null'>No hay registros</option>";
                                    }
                                    
                                 ?>
                                
                              </select>
                            </div>
                          </div>
                          
                          <div class="clearfix"></div>
                    <div>
                       <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                    <button class="btn btn-primary  btn-sm " id="agregarHerramienta" >Guardar</button>
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




<!-- Modal de inserción de producto -->
<div class="modal fade modal" id="modalModificacionHerramienta" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Editar Herramienta</span>
                </div>
                <div class="modal-body" >
                      <div class="row" id="infoHerramientaEdit">
                          <div class="form-column col-md-5.5 col-sm-5.5 col-xs-5.5">
                                 <div class="form-group required">
                                     <label for="nombreProducto" class="control-label">Nombre Herramienta</label>
                                     <input type="hidden" name="idHerramienta" id="idHerramienta">
                                     <input type="text" class="form-control requerido"  
                                            placeholder="Nombre" name="nombreHerramienta" id="nombreHerramientaE" required>
                                 </div>
                          </div>
                           
                          <div class="form-group required">
                              <label for="Categoria" class="control-label">Categoria</label>            
                              <select name="Categoria" class="form-control" id="categoriaE">
                                <?php 
                                    $objHerramienta = new Herramienta();
                                    $data = $objHerramienta->AllCategoria();
                                    if ($data!=null) {
                                        foreach ($data as $value) {
                                        echo "<option value='".$value['idCategoriaHerramienta']."'>";
                                        echo $value['categoria'];
                                        echo "</option>";
                                       } 
                                    }else{
                                      echo "<option value='null'>No hay registros</option>";
                                    }
                                    
                                 ?>
                                
                              </select>
                            </div>

                           <div class="form-group required">
                              <label for="Estado" class="control-label">Estado</label>            
                              <select name="Estado" class="form-control" id="estadoE">
                                <?php 
                                    $objHerramienta = new Herramienta();
                                    $data = $objHerramienta->AllEstado();
                                    if ($data!=null) {
                                        foreach ($data as $value) {
                                        echo "<option value='".$value['idEstadoHerramienta']."'>";
                                        echo $value['estado'];
                                        echo "</option>";
                                       } 
                                    }else{
                                      echo "<option value='null'>No hay registros</option>";
                                    }
                                    
                                 ?>
                                
                              </select>
                            </div>
                          </div>
                          
                          <div class="clearfix"></div>
                    <div>
                       <div class="form-column col-md-4 col-sm-4 col-xs-4">
                            <div class="form-group required">
                    <button class="btn btn-primary  btn-sm " id="modificarHerramienta" >Guardar</button>
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
