$(document).ready(function(){

var dato =1;
$.ajax({
                           type: 'POST',
                           async: false,
                           dataType: 'json',
                           data: {dato:dato,key:'estadistica1'},
                           url: "../controller/UsuarioController.php",
                           success: function (data)
                           {
                                if (data.estado==true) {
                                  var dataPoints = [];
                                
                                  $.each(data.info, function( key, value ) {
                                    dataPoints.push({label: new Date(2018,  value.mes-1), y: parseInt(value.cantidad)});
                                  });

                                    var options = {
                                    animationEnabled: true,  
                                    title:{
                                      text: "Usuarios Ingresados por mes"
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
                                      labels:["enero","mayo"],
                                      type: "pie",
                                      startAngle:240,
                                      yValueFormatString: "##0.00\"%\"",
                                
                                      dataPoints: dataPoints,
                                    }]
                                  };
                                  $("#chartContainer1").CanvasJSChart(options);


                                    
                                }else{
                                  
                                  // En el caso de un error

                                }
                                                                                 
                                },
                           error: function (xhr, status)
                           {
                                                                
                           }
        });



});