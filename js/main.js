//Función de Logeo
function iniciarSesion()
{
	var usuario = $("#usuario").val();
	var pass = $("#pass").val();

	if (usuario == "" || pass == "") 
	{
		$("#mensaje-login").html('<h4 class="text text-danger">Ingrese un nombre de usuario y/o contraseña</h4>');
		return false;
	}

	$.ajax({
		type: 'POST',
		url: 'php/logeo.php',
		data: ("usuario="+usuario+"&pass="+pass),
		success: function(repuesta)
	{

			if (repuesta==1) {
				$("#mensaje-login").html('<h4 class="text text-info">Bienvenido/a '+usuario+'</h4>');
					window.location.href='index.php';
			}else if(repuesta==0){
				$("#mensaje-login").html('<h4 class="text text-info">Bienvenido/a '+usuario+'</h4>');
				window.location.href='inscribirActividades.php';
			}else{
				$("#mensaje-login").html('<h4 class="text text-danger">'+repuesta+'</h4>');
			}
		}, error: function(repuesta){
			console.log('ssss');
		}
	});

	
} //Corchete final de la función

//Función de registro de usuario
function enviardatosUsuario()
{
	var nombreUsuario = $("#nombreUsuario").val();
	var pass = $("#pass").val();
	var pass2 = $("#pass2").val();
	var correo = $("#correo").val();
	var fecha = $("#fecha").val();

	var txtnombreUsuario = document.getElementById("nombreUsuario").value;
	var txtPass = document.getElementById("pass").value;
	var txtPass2 = document.getElementById("pass2").value;
	var txtCorreo = document.getElementById("correo").value;



	if (txtnombreUsuario.length == 0 || /^\s+$/.test(txtnombreUsuario)) 
	{
		$("#mensaje-registro").html('<h4 class="text text-danger">Faltan campos por rellenar</h4>');
		return false;
	}
	else if (txtPass.length == 0 || /^\s+$/.test(txtPass)) 
	{
		$("#mensaje-registro").html('<h4 class="text text-danger">Faltan campos por rellenar</h4>');
		return false;
	}
	else if (txtPass2.length == 0 || /^\s+$/.test(txtPass2)) 
	{
		$("#mensaje-registro").html('<h4 class="text text-danger">Faltan campos por rellenar</h4>');
		return false;
	}
	else if (txtCorreo.length == 0 || /^\s+$/.test(txtCorreo)) 
	{
		$("#mensaje-registro").html('<h4 class="text text-danger">Faltan campos por rellenar</h4>');
		return false;
	}

	


	if (pass == pass2) 
	{
		$.ajax({

			type: 'POST',
			url: 'php/alta_usuario.php',
			data: ("nombreUsuario="+nombreUsuario+"&pass="+pass+"&pass2="+pass2+"&correo="+correo+"&fecha="+fecha),
			success: function(repuesta)
			{

				//var respuestaPHP = repuesta;

				$("#mensaje-registro").html("<h4 class="+"text text-danger"+">"+repuesta+"</h4>");
				 

				document.getElementById("nombreUsuario").value = "";
				document.getElementById("pass").value = "";
				document.getElementById("pass2").value = "";
				document.getElementById("correo").value = "";
				document.getElementById("fecha").value = "";

			},
			error: function(repuesta){
				console.log('ssss');
			}
		})
	}else
	{
		$("#mensaje-registro").html('<h4 class="text text-danger">Las contraseñas no coinciden</h4>');
		return false;
	}
} //Corchete final de la función


//Función para cargar acts para el Admi
function loadActividadesAdmi(){
	// body...
	$.ajax({
		type: "get",
		url: 'php/consultaactsAdmi.php',
		success:function(repuesta)
		{
			$("#actsdisponiblesAdmi").html(repuesta);
		}
	})
} //Corchete final de la función

//Función para cargar acts para Participante
function loadactsParticipantes(){

	$.ajax({
		type: "get",
		url: 'php/consultaactsParticipantes.php',
		success: function(repuesta)
		{
			$("#actsdisponiblesParticipantes").html(repuesta);
		}
	})
} //Corchete final de la función

//Función para cargar el select de tipo de actividad en la sección de Alta de Actividades
function gettipoActividad()
{
	$.ajax({
		type: "get",
		url: "php/buscartipoAct.php",
		success:function(repuesta)
		{
			$("#tipoActividad").html(repuesta);
		}
	})
}//Corchete final de la función

//Función para registrar actividades
function altaActividades()
{
	var tipoActividad = $("#tipoActividad").val();
	var nombreActividad = $("#nombreActividad").val();
	var sedesDisponibles = $("#sedesDisponibles").val();
	var fecha = $("#fecha").val();
	var horaInicio = $("#horaInicio").val();
	var horaFinal = $("#horaFinal").val();
	var limiteParticipantes = $("#limiteParticipantes").val();

	if ($("#tipoActividad").val() == 0 || $("#tipoActividad").val() == "") 
	{
		$("#msg-alta-Actividades").html('<h4 class="text text-danger">Faltan opciones por seleccionar y/o campos por rellenar</h4>');
		return false;
	}
	else if($("#nombreActividad").val() == 0 || $("#nombreActividad").val() == "")
	{
		$("#msg-alta-Actividades").html('<h4 class="text text-danger">Faltan opciones por seleccionar y/o campos por rellenar</h4>');
		return false;
	}
	else if($("#sedesDisponibles").val() == 0 || $("#sedesDisponibles").val() == "")
	{
		$("#msg-alta-Actividades").html('<h4 class="text text-danger">Faltan opciones por seleccionar y/o campos por rellenar</h4>');
		return false;
	}



	
	if (validaFechaDDMMAAAA(fecha) == false) 
		{
			$("#msg-alta-Actividades").html('<h4 class="text text-danger">La fecha no es correcta</h4>');
			return false;
		}


	$.ajax({
		type:'POST',
		url: "php/altaActs.php",
		data: ("tipoActividad="+tipoActividad+"&nombreActividad="+nombreActividad+"&sedesDisponibles="+sedesDisponibles+"&fecha="+fecha+"&horaInicio="+horaInicio+"&horaFinal="+horaFinal+"&limiteParticipantes="+limiteParticipantes),
		success: function(repuesta)
		{
			$("#msg-alta-Actividades").html('<h4 class="text text-info">'+repuesta+'</h4>');

			if (repuesta == "¡Actividad subida exitosamente!") 
			{
				
				document.getElementById("fecha").value = "";
				document.getElementById("horaInicio").value = "";
				document.getElementById("horaFinal").value = "";
				document.getElementById("limiteParticipantes").value = "";
				
			}

		}
	})
}//Corchete final de la función

//Función para eliminar actividades como usuario administrador
function bajaActs(id)
{
	$.ajax({
		type: "POST",
		url: "php/eliminaactsAdmi.php",
		data:{'id':id},
		success: function(repuesta)
		{
			$("#msg-bajaActs").html('<h4 class="text text-info">'+repuesta+'</h4>');

			if (repuesta == "La actividad se ha eliminado correctamente") 
			{
				loadActividadesAdmi();
			}

		}
	})
}//Corchete final de la función

//Agendar actividades como usuario participante
function agendarActs(id)
{
	$.ajax({
		type: "POST",
		url: "php/agendaractsParticipante.php",
		data: {'id':id},
		success: function(repuesta)
		{
			$("#msg-inscribirActs").html('<h4 class="text text-info">'+repuesta+'</h4>');

			if (repuesta == "¡Actividad agendada exitosamente!") 
				{
					loadactsParticipantes();
				}
		}
	})
}

//Función para mostrar actividades agendadas por el participante
function loadactsagendadasParticipantes()
{
	$.ajax({
		type: "get",
		url: 'php/consultaactsagendadasParticipante.php',
		success: function(repuesta)
		{
			$("#cancelaractsAgendadas").html(repuesta);
		}
	})
}//Corchete final de la función

//Función para cambiar contraseña
function cambioPassword()
{
	//var passActual = $("#passActual").val();
	var passNueva = $("#passNueva").val();
	var passNueva2 = $("#passNueva2").val();

	if (passNueva == passNueva2) 
		{
			
			$.ajax({
				type: "POST",
				url: 'php/cambiarPassword.php',
				data: ("passNueva="+passNueva+"&passNueva2="+passNueva2),
				success: function(repuesta)
					{

							if (repuesta == "¡Contraseña actualizada exitosamente!") 
							{
								$("#msg-cambioPasswd").html('<h4 class="text text-info">'+repuesta+'</h4>');
								window.location.href='inscribirActividades.php';
							}

						
					}
			})

		}else
			{
				$("#msg-cambioPasswd").html('<h4 class="text text-danger">Las nuevas contraseñas no coinciden</h4>');
				return false;	
			}


}

//--*Sección para validar fechas incorrectas o menor a la fecha actual*--

//Valida el formato de fecha
function validarFormatoFecha(campo) {
      var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
      if ((campo.match(RegExPattern)) && (campo!='')) {
            return true;
      } else {
            return false;
      }
}

//Validar si existe fecha
function existeFecha(fecha){
      var fechaf = fecha.split("/");
      var day = fechaf[0];
      var month = fechaf[1];
      var year = fechaf[2];
      var date = new Date(year,month,'0');
      if((day-0)>(date.getDate()-0)){
            return false;
      }
      return true;
}

//Validar si la fecha es menor a la actual
function validarFechaMenorActual(date){
      var x=new Date();
      var fecha = date.split("/");
      x.setFullYear(fecha[2],fecha[1]-1,fecha[0]);
      var today = new Date();
 
      if (x >= today)
        return false;
      else
        return true;
}


//Función opcional validar fecha
function validaFechaDDMMAAAA(fecha){
	var dtCh= "/";
	var minYear=1900;
	var maxYear=2100;
	function isInteger(s){
		var i;
		for (i = 0; i < s.length; i++){
			var c = s.charAt(i);
			if (((c < "0") || (c > "9"))) return false;
		}
		return true;
	}
	function stripCharsInBag(s, bag){
		var i;
		var returnString = "";
		for (i = 0; i < s.length; i++){
			var c = s.charAt(i);
			if (bag.indexOf(c) == -1) returnString += c;
		}
		return returnString;
	}
	function daysInFebruary (year){
		return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
	}
	function DaysArray(n) {
		for (var i = 1; i <= n; i++) {
			this[i] = 31
			if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
			if (i==2) {this[i] = 29}
		}
		return this
	}
	function isDate(dtStr){
		var daysInMonth = DaysArray(12)
		var pos1=dtStr.indexOf(dtCh)
		var pos2=dtStr.indexOf(dtCh,pos1+1)
		var strDay=dtStr.substring(0,pos1)
		var strMonth=dtStr.substring(pos1+1,pos2)
		var strYear=dtStr.substring(pos2+1)
		strYr=strYear
		if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
		if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
		for (var i = 1; i <= 3; i++) {
			if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
		}
		month=parseInt(strMonth)
		day=parseInt(strDay)
		year=parseInt(strYr)
		if (pos1==-1 || pos2==-1){
			return false
		}
		if (strMonth.length<1 || month<1 || month>12){
			return false
		}
		if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
			return false
		}
		if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
			return false
		}
		if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
			return false
		}
		return true
	}
	if(isDate(fecha)){
		return true;
	}else{
		return false;
	}
}
//--*Aquí termina la sección para validar fechas incorrectas o menor a la fecha actual*--

function verificarexistenciaactsDisponibles()
{
	$.ajax({
		type: "get",
		url: "php/verificarexistenciaactsDisponibles.php",
		success:function(repuesta)
		{
			$("#msg-error-inscribirActs").html(repuesta);
		}
	})
}
