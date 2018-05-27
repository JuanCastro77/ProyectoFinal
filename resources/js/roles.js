$(document).ready(function(){
	$("#enviarDatos").click(function(){
		var user = $("#user").val();
		var pass = $("#password").val();

		if ($.trim(user).length > 0 && $.trim(pass).length > 0) {
				$.ajax({
					url: "verificacion.php",
					method: "POST",
					data: {user: user, password: pass},
					cache: "false",
					beforeSend: function()
					{
						$("#enviarDatos").val("Conectando...")
					}
					success: function(rol){
						$("#enviarDatos").val("Iniciar");
						if (data == "1") 
						{
							$(location).attr("href", "dashboard.php")
						}
						else
						{
							$("#resultado").html("<div class='alert alert-dimisible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong>Las credenciales son incorrectas.</div>");
						}
					}
				});
			},
		});
	});