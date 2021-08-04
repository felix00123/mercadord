function previewIMG(event)
{
    var input = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function(){
        var results = reader.result;
        var caracteres = results.toString();
        var perfilIMG = document.getElementById('previewIMGperfil');
        perfilIMG.style.backgroundImage = 'url("'+caracteres+'")';
    }
    reader.readAsDataURL(input);
}
window.onload = function()
{
    document.forms['form_Perfil'].addEventListener('submit', validarFormPerfil);
}
function validarFormPerfil(evObject)
{
    if (document.getElementById('nombre1').value.trim()=="") {
        document.getElementById('nombre1').classList.add('is-invalid')
        evObject.preventDefault();
    }
    else if (document.getElementById('apellido1').value.trim()=="") {
        document.getElementById('apellido1').classList.add('is-invalid')
        evObject.preventDefault();
    }
    else if (document.getElementById('email1').value.trim()=="") {
        document.getElementById('email1').classList.add('is-invalid')
        evObject.preventDefault();
    }
    else if (document.getElementById('fecha1').value.trim()=="") {
        document.getElementById('fecha1').classList.add('is-invalid')
        evObject.preventDefault();
    }
    else if (document.getElementById('cedula').value.trim()=="") {
        document.getElementById('cedula').classList.add('is-invalid')
        evObject.preventDefault();
    }
    else if (document.getElementById('telefono').value.trim()=="") {
        document.getElementById('telefono').classList.add('is-invalid')
        evObject.preventDefault();
    }
    else if (document.getElementById('direccion').value.trim()=="") {
        document.getElementById('direccion').classList.add('is-invalid')
        evObject.preventDefault();
    }
    else if(!document.querySelector('input[name="sexo"]:checked'))
    {
        document.getElementById('alertSmall').style.display="block"
        evObject.preventDefault()
    }
    else{
        
    }
}
