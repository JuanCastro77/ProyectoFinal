$(document).ready(function(){

var dato =1;
$.ajax({
                           type: 'POST',
                           async: false,
                           dataType: 'json',
                           data: {dato:dato,key:'estadistica'},
                           url: "../controller/UsuarioController.php",
                           success: function (data)
                           {
                                if (data.estado==true) {
                                  var dataPoints = [];
                                
                                  $.each(data.info, function( key, value ) {
                                    dataPoints.push({x: new Date(2018, value.mes-1), y: parseInt(value.cantidad)});
                                  });

                                    var options = {
                                    animationEnabled: true,  
                                    title:{
                                      text: "Usuarios eliminados por mes"
                                    },
                                    axisX: {
                                      valueFormatString: "MMM"
                                    },
                                    axisY: {
                                      title: "Cantidad ",
                                      prefix: "#",
                                      includeZero: false
                                    },
                                    data: [{
                                      yValueFormatString: "#,###",
                                      xValueFormatString: "MMMM",
                                      type: "column",
                                      dataPoints: dataPoints,
                                    }]
                                  };
                                  $("#chartContainer").CanvasJSChart(options);


                                    
                                }else{
                                  
                                  // En el caso de un error

                                }
                                                                                 
                                },
                           error: function (xhr, status)
                           {
                                                                
                           }
        });



});