$(document).ready(function(){

	$("#listadoEmpleado").DataTable({
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

	$(document).on("click","#nuevoEmpleado",function(){
		$("#modalIngresoEmpleado").modal({backdrop: 'static', keyboard: false});
	});

//agregar Empleado---------------------------------------------------------------------------------
	$("#agregarEmpleado").on("click", function(){
		var dataEmpleado = JSON.stringify($('#infoEmpleado :input').serializeArray());
		$.ajax({
			type: 'POST',
			async: false,
			dataType: 'json',
			data:{info:dataEmpleado, key:'agregar'},
			url: "../controller/empleadoController.php",
			success: function(res)
			{
				if (res.estado==true) {
					swal({
						title: '¡Éxito!',
						text: res.descripcion,
						timer: 1500,
						type: 'success',
						closeOnConfirm: true,
								closeOnCancel: true,
					});
					setTimeout(function(){
						location.reload();
					}, 1000);
				}
				else{
					swal({
						title: '¡Error!',
						text: res.descripcion,
						timer: 1500,
						type: 'error',
						closeOnConfirm: true,
								closeOnCancel: true,
					});
				}
			},
			error: function(xhr, status)
			{

			}
		});
	});

//editar Empleado---------------------------------------------------------------------------------------------
	

	 $(document).on("click",".editarEmpleado",  function(){   

		var idEmpleado = $(this).attr('idEmpleado');

			$.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {idEmpleado:idEmpleado, key:'solicitarInfo'},
                                    url: "../controller/empleadoController.php",
                                    success: function (data)
                                    {
                                      $("#idEmpleado").val(data.id);
                                       $("#duiE").val(data.dui);
                                       $("#nombreE").val(data.nombre);
                                       $("#generoE").val(data.genero);
                                       $("#cargoE").val(data.cargo);
                                       $("#telefonoE").val(data.telefono);
                                         
                                        
                                    },
                                    error: function (xhr, status)
                                    {
                      
                                    }
                                        
                       });
             $("#modalModificacionEmpleado").modal({backdrop: 'static', keyboard: false});
          
    });


   $("#modificarEmpleado").on("click", function(){

     var dataEmpleado=  JSON.stringify($('#infoEmpleadoEdit :input').serializeArray());

        $.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {info:dataEmpleado, key:'modificar'},
                                    url: "../controller/empleadoController.php",
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

//eliminar Empleado--------------------------------------------------------------------------

 $(document).on("click",".eliminarEmpleado",  function(){   

    var idEmpleado = $(this).attr('idEmpleado');

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
                                          data: {idEmpleado:idEmpleado, key:'eliminar'},
                                          url: "../controller/empleadoController.php",
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

});