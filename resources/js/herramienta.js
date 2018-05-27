$(document).ready(function(){

	$("#listadoHerramienta").DataTable({
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

	$(document).on("click","#nuevoHerramienta",function(){
		$("#modalIngresoHerramienta").modal({backdrop: 'static', keyboard: false});
	});

	$("#agregarHerramienta").on("click", function(){
		var dataHerramienta = JSON.stringify($('#infoHerramienta :input').serializeArray());

		$.ajax({
			type: 'POST',
			async: false,
			dataType: 'json',
			data:{info:dataHerramienta, key:'agregar'},
			url: "../controller/herramientaController.php",
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
	});//end agregar herramien


	// Modificar Herramienta--------------------------------------------------------------------------

	 $(document).on("click",".editarHerramienta",  function(){   

		var idHerramienta = $(this).attr('id');

			$.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {idHerramienta:idHerramienta, key:'solicitarInfo'},

                                    url: "../controller/herramientaController.php",
                                    success: function (data)
                                    {
                                      $("#idHerramienta").val(data.idHerramienta); 

                                       $("#nombreHerramientaE").val(data.nombreHerramienta);
                                       $("#categoriaE").val(data.idCategoria);
                                       $("#estadoE").val(data.idEstado);
                                         
                                        
                                    },
                                    error: function (xhr, status)
                                    {
                      
                                    }
                                        
                       });
             $("#modalModificacionHerramienta").modal({backdrop: 'static', keyboard: false});
          
    });

   $("#modificarHerramienta").on("click", function(){

     var dataHerramienta=  JSON.stringify($('#infoHerramientaEdit :input').serializeArray());
     	 var idHerramienta=$(".editarHerramienta").attr("id");
        $.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {idHerramienta:idHerramienta, info:dataHerramienta, key:'modificar'},
                                    url: "../controller/herramientaController.php",
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

  	//eliminar Herramienta--------------------------------------------------------------------------

 $(document).on("click",".eliminarHerramienta",  function(){   

    var idHerramienta = $(this).attr('id');

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
                                          data: {idHerramienta:idHerramienta, key:'eliminar'},
                                          url: "../controller/herramientaController.php",
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
   // Fin de la eliminacion de los Heramienta
	

});