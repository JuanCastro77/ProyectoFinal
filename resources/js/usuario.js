$(document).ready(function(){

	 		$("#listadoUsuarios").DataTable({
			    "language": {
			        "sProcessing":    "Procesando...",
			        "sLengthMenu":    "Mostrar _MENU_ registros",
			        "sZeroRecords":   "No se encontraron resultados",
			        "sEmptyTable":    "Ningún dato disponible en esta tabla",
			        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
			        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
			        "sInfoPostFix":   "",
			        "sSearch":        "Buscar:",
			        "sUrl":           "",
			        "sInfoThousands":  ",",
			        "sLoadingRecords": "Cargando...",
			        "oPaginate": {
			            "sFirst":    "Primero",
			            "sLast":    "Último",
			            "sNext":    "Siguiente",
			            "sPrevious": "Anterior"
			        },
			        "oAria": {
			            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			        }
			    }
			});

	$(document).on("click","#nuevoUsuario",function() { 
             $("#modalIngresoUsuario").modal({backdrop: 'static', keyboard: false});
          
    });


// Agregar usuario
	$("#agregarUsuario").on("click", function(){

		 var dataUsuario=  JSON.stringify($('#infoUsuario :input').serializeArray());

				$.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {info:dataUsuario, key:'agregar'},
                                    url: "../controller/UsuarioController.php",
                                    success: function (data)
                                    {
                                        if (data.estado==true) {
                                        	swal({
                                                  title: "Exito!",
                                                  text: data.descripcion,
                                                  timer: 1500,
                                                  type: 'success',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                        	setTimeout( function(){ 
                                            	location.reload();
                                         	}, 1000 );
                                        	
                                        }else{
                                        		swal({
                                                  title: "Error!",
                                                  text: data.descripcion,
                                                  timer: 1500,
                                                  type: 'error',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                        }
                                         
                                        
                                    },
                                    error: function (xhr, status)
                                    {
                      
                                    }
                                        
                       });



	});

// Modificar Usuario

	 $(document).on("click",".editarUsuario",  function(){   

		var idUsuario = $(this).attr('id');

			$.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {idUsuario:idUsuario, key:'solicitarInfo'},
                                    url: "../controller/UsuarioController.php",
                                    success: function (data)
                                    {
                                      $("#idUsuario").val(data.id);
                                       $("#usernameE").val(data.username);
                                       $("#rolE").val(data.idRol);
                                         
                                        
                                    },
                                    error: function (xhr, status)
                                    {
                      
                                    }
                                        
                       });
             $("#modalModificacionUsuario").modal({backdrop: 'static', keyboard: false});
          
    });


   $("#modificarUsuario").on("click", function(){

     var dataUsuario=  JSON.stringify($('#infoUsuarioEdit :input').serializeArray());

        $.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {info:dataUsuario, key:'modificar'},
                                    url: "../controller/UsuarioController.php",
                                    success: function (data)
                                    {
                                        if (data.estado==true) {
                                          swal({
                                                  title: "Exito!",
                                                  text: data.descripcion,
                                                  timer: 1500,
                                                  type: 'success',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                          setTimeout( function(){ 
                                              location.reload();
                                          }, 1000 );
                                          
                                        }else{
                                            swal({
                                                  title: "Error!",
                                                  text: data.descripcion,
                                                  timer: 1500,
                                                  type: 'error',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                        }
                                         
                                        
                                    },
                                    error: function (xhr, status)
                                    {
                      
                                    }
                                        
                       });



  });


   $(document).on("click",".eliminarUsuario",  function(){   

    var idUsuario = $(this).attr('id');

                                      swal({
                                                    title: "Advertencia",
                                                    text: "¿Estas seguro de eliminar este registro? Si aceptas removerlo, no habra forma de recuperar los datos posteriormente",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    cancelButtonText: "No",
                                                    confirmButtonText: "Si",
                                                    confirmButtonColor: "#00A59D",
                                                    closeOnConfirm: true,
                                                    closeOnCancel: true
                                                },
                                function (isConfirm) {
                                  if (isConfirm) {
                                    $.ajax({
                                          type: 'POST',
                                          async: false,
                                          dataType: 'json',
                                          data: {idUsuario:idUsuario, key:'eliminar'},
                                          url: "../controller/UsuarioController.php",
                                          success: function (data)
                                          {
                                            if (data.estado==true) {
                                          swal({
                                                  title: "Exito!",
                                                  text: data.descripcion,
                                                  timer: 1500,
                                                  type: 'success',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                          setTimeout( function(){ 
                                              location.reload();
                                          }, 1000 );
                                          
                                        }else{
                                            swal({
                                                  title: "Error!",
                                                  text: data.descripcion,
                                                  timer: 1500,
                                                  type: 'error',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                        }
                                               
                                              
                                          },
                                          error: function (xhr, status)
                                          {
                            
                                          }
                                        
                                          });                           
                                                          

                                    } else {
                                                                
                                                                
                                                                
                                            }
                                                            
                                                            
                          });

             
    });
   // Fin de la eliminacion de los usuarios
      $("#verUsuarios").on("click", function(){
        var url="../views/reportes/pruebaReporte.php";
        window.open(url,"_blank"); 
        //Fin de ver usuarios 
      });




});