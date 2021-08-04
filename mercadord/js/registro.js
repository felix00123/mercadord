        function validar() {

			
            var usuario = document.getElementById("user").value;
            var nombre = document.getElementById("nombre").value;
            var apellido = document.getElementById("Apellido").value;
            var correo = document.getElementById("correo").value;
			var clave = document.getElementById("pass").value;
            var clave2 = document.getElementById("pass2").value;
			var cedul = document.getElementById("cedula").value;
			var fecha = document.getElementById("fechanac").value;
            var telefono =  document.getElementById("telefono").value;
			var direccion =  document.getElementById("dire").value;
			var hola =true;


            if(clave2 == ""){
                document.getElementById("valida6c").innerHTML = "Necesita confirmar su  clave";
               
                hola= false;
            }else{
                document.getElementById("valida6c").innerHTML = "";
               
            }

            if(clave != clave2){
                document.getElementById("valida6c").innerHTML = "Las claves no coinciden";
                document.getElementById("valida5").innerHTML = "Las claves no coinciden";
                document.getElementById("pass").innerHTML = "";
                document.getElementById("pass2").innerHTML = "";
                hola= false;
            }else{
                document.getElementById("valida6c").innerHTML = "";
                document.getElementById("valida5").innerHTML = "";
            }
            if (usuario == "") {

                document.getElementById("valida1").innerHTML = "Ingrese un nombre de usuario";
                hola= false;

            } else {
                document.getElementById("valida1").innerHTML = "";
            }

			
            if (nombre == "") {

document.getElementById("valida2").innerHTML = "Ingrese un nombre";
hola= false;

} else {
document.getElementById("valida2").innerHTML = "";
}

			
if (apellido == "") {

document.getElementById("valida3").innerHTML = "Ingrese un apellido";
hola= false;

} else {
document.getElementById("valida3").innerHTML = "";
}



if (correo == "") {

document.getElementById("valida4").innerHTML = "ingrese un correo";
hola= false;

} else {
document.getElementById("valida4").innerHTML = "";
    
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(correo)){

  } else {
   document.getElementById("valida4").innerHTML = " La direccion de correo es incorrecta";
  }   
    
    
    
}

            
         
            
            
            
            
            
            

if (clave == "") {

document.getElementById("valida5").innerHTML = "Ingrese una clave";

document.getElementById("pass2").innerHTML = "";
hola= false;

} else {
document.getElementById("valida5").innerHTML = "";
}


 
if (cedul == "") {

document.getElementById("valida6").innerHTML = "Ingrese una cedula";
hola= false;

} else {
document.getElementById("valida6").innerHTML = "";
    

    var c = cedul.replace(/-/g,'');  
    var cedula = c.substr(0, c.length - 1);  
    var verificador = c.substr(c.length - 1, 1);  
    var suma = 0;  
    var cedulaValida = 0;
    if(ced.length < 11) { hola = false;   document.getElementById("valida6").innerHTML = "Ingrese una cedula valida"; }  
    for (i=0; i < cedula.length; i++) {  
        mod = "";  
         if((i % 2) == 0){mod = 1} else {mod = 2}  
         res = cedula.substr(i,1) * mod;  
         if (res > 9) {  
              res = res.toString();  
              uno = res.substr(0,1);  
              dos = res.substr(1,1);  
              res = eval(uno) + eval(dos);  
         }  
         suma += eval(res);  
    }  
    el_numero = (10 - (suma % 10)) % 10;  
    if (el_numero == verificador && cedula.substr(0,3) != "000") {  
      hola = true;
      document.getElementById("valida6").innerHTML = "";
    }  
    else   {  

        document.getElementById("valida6").innerHTML = "Ingrese una cedula valida";
     hola = false;
    }  
    

}
       







            




if (fecha == "") {

document.getElementById("valida7").innerHTML = "Ingrese una fecha";
hola= false;

} else {
document.getElementById("valida7").innerHTML = "";
}

if (telefono == "") {

document.getElementById("valida8").innerHTML = "Ingrese un telefono";
hola= false;

} else {
document.getElementById("valida8").innerHTML = " ";
     if (/[0-9]{9}/.test(telefono)){

  } else {
   document.getElementById("valida8").innerHTML = "el numero es incorrecto";
      hola= false;
  }   
}

    
            
            
            
             

            
            
            
            
            
            
         
            
if (direccion == "") {

document.getElementById("valida9").innerHTML = "Ingrese una direccion";
hola= false;

} else {
document.getElementById("valida9").innerHTML = "";
}
var TERMINOS =  document.getElementById("terminos").checked;

 if(!TERMINOS)
 {
    document.getElementById("valida10").innerHTML = "Necesita  aceptar los terminos y condiciones";
    hola= false;
 }
 else
 {
    document.getElementById("valida10").innerHTML = "";
 }
 
 var eshombre =  document.getElementById("mujer");
 var esmujer =  document.getElementById("hombre");
 
if (eshombre.checked != true && esmujer.checked !=true )
{document.getElementById("valida11").innerHTML = "Campo sexo requerido";
    hola= false;}
else
{ document.getElementById("valida11").innerHTML = "";}

            return hola;
        }