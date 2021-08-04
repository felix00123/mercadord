let form = document.querySelector('.form-register');
let progressOptions = document.querySelectorAll('.progressbar__option');

form.addEventListener('click', function(e) {
    let element = e.target;
    let isButtonNext = element.classList.contains('step__button--next');
    let isButtonBack = element.classList.contains('step__button--back');
    let pasoActivo1 = document.getElementById('step-1');
    let pasoActivo2 = document.getElementById('step-2');
    let pasoActivo3 = document.getElementById('step-3');
    if (isButtonNext) {
        if(pasoActivo1.classList.contains('active'))
        {
            validarAccount1();
        }
        else if(pasoActivo2.classList.contains('active')){
            validarAccount2();
        }
        else if(pasoActivo3.classList.contains('active'))
        {
            validarAccount3();
        }
        else
        {

        }

    }
    if(isButtonBack)
    {
        pasos()
    }
    function pasos() {
        let currentStep = document.getElementById('step-' + element.dataset.step);
                let jumpStep = document.getElementById('step-' + element.dataset.to_step);
                currentStep.addEventListener('animationend', function callback() {
                     currentStep.classList.remove('active');
                     jumpStep.classList.add('active');
                     if (isButtonNext) {
                         currentStep.classList.add('to-left');
                         progressOptions[element.dataset.to_step - 1].classList.add('active');
                     } else {
                        jumpStep.classList.remove('to-left');
                         progressOptions[element.dataset.step - 1].classList.remove('active');
                     }
                    currentStep.removeEventListener('animationend', callback);
                 });
                 currentStep.classList.add('inactive');
                 jumpStep.classList.remove('inactive');
    }
    function validarAccount1() {
        var nombre = document.getElementById('nombre')
        var apellido = document.getElementById('Apellido')
        var fechaNac = document.getElementById('fechanac')
        var telefono = document.getElementById('telefono')
        var rango = document.getElementsByTagName("input")[3].value
    
        if(nombre.value.trim()==""){
            document.getElementById('nombre').classList.add('validartext')
            document.getElementById('Apellido').classList.remove('validartext')
            document.getElementById('fechanac').classList.remove('validartext')
            document.getElementById('telefono').classList.remove('validartext')
        }
        else if(apellido.value.trim()=="")
        {
            document.getElementById('Apellido').classList.add('validartext')
            document.getElementById('nombre').classList.remove('validartext')
            document.getElementById('fechanac').classList.remove('validartext')
            document.getElementById('telefono').classList.remove('validartext')
        }
        else if(fechaNac.value.trim()=="")
        {
            document.getElementById('fechanac').classList.add('validartext')
            document.getElementById('telefono').classList.remove('validartext')
            document.getElementById('nombre').classList.remove('validartext')
            document.getElementById('Apellido').classList.remove('validartext')
        }
        else if(telefono.value.trim()=="")
        {
            document.getElementById('fechanac').classList.remove('validartext')
            document.getElementById('telefono').classList.add('validartext')
            document.getElementById('nombre').classList.remove('validartext')
            document.getElementById('Apellido').classList.remove('validartext')
        }
        else if(!(rango.length===10)){
            document.getElementById('fechanac').classList.remove('validartext')
            document.getElementById('telefono').classList.add('validartext')
            document.getElementById('nombre').classList.remove('validartext')
            document.getElementById('Apellido').classList.remove('validartext')
    
        }
        else{
            document.getElementById('fechanac').classList.remove('validartext')
            document.getElementById('telefono').classList.remove('validartext')
            document.getElementById('nombre').classList.remove('validartext')
            document.getElementById('Apellido').classList.remove('validartext')
            pasos();
        
        }
    }
    function validarAccount2() {
        var direccion = document.getElementById('dire')
        var cedula = document.getElementById('cedula')
        var correo = document.getElementById('correo')
      

        if(direccion.value.trim()==""){
            document.getElementById('dire').classList.add('validartext')
            document.getElementById('cedula').classList.remove('validartext')
            document.getElementById('correo').classList.remove('validartext')
            
        }
        else if(cedula.value.trim()=="")
        {
            document.getElementById('cedula').classList.add('validartext')
            document.getElementById('dire').classList.remove('validartext')
            document.getElementById('correo').classList.remove('validartext')
        }
        else if(correo.value.trim()==""){
            document.getElementById('correo').classList.add('validartext')
            document.getElementById('dire').classList.remove('validartext')
            document.getElementById('cedula').classList.remove('validartext')
        }
        else if(!document.querySelector('input[name="sexo"]:checked'))
        {
            document.getElementById('correo').classList.remove('validartext')
            document.getElementById('dire').classList.remove('validartext')
            document.getElementById('cedula').classList.remove('validartext')
        }
        else
        {
            document.getElementById('correo').classList.remove('validartext')
            document.getElementById('dire').classList.remove('validartext')
            document.getElementById('cedula').classList.remove('validartext')
            pasos()
        }
    }
    
});
let formu = document.getElementById('formulario_crear')
if (formu) {
    formu.addEventListener('submit', validaciónFinal, false);
}
else
{
    console.log('no se encontro el formulario en el documento')
}
// document.formulario_Crear.addEventListener('submit', validaciónFinal);
function validaciónFinal(evObject) {
    var nombreUser = document.getElementById('user')
    var password = document.getElementById('pass')
    var confirmarC = document.getElementById('pass2')
    var terminos = document.getElementById('terminos').checked
    if(nombreUser.value.trim()=="")
    {
        evObject.preventDefault();
        document.getElementById('user').classList.add('validartext')
        document.getElementById('pass').classList.remove('validartext')
        document.getElementById('pass2').classList.remove('validartext')
    }
    else if(password.value.trim()=="")
    {
        evObject.preventDefault();
        document.getElementById('user').classList.remove('validartext')
        document.getElementById('pass').classList.add('validartext')
        document.getElementById('pass2').classList.remove('validartext')
    }
    else if(confirmarC.value.trim()=="")
    {
        evObject.preventDefault();
        document.getElementById('user').classList.remove('validartext')
        document.getElementById('pass').classList.remove('validartext')
        document.getElementById('pass2').classList.add('validartext')
    }
    else if(document.getElementById('password').value!==document.getElementById('confirmarC').value)
    {
        evObject.preventDefault();
        document.getElementById('user').classList.remove('validartext')
        document.getElementById('pass').classList.add('validartext')
        document.getElementById('pass2').classList.add('validartext')
    }
    else if(!terminos)
    {
        evObject.preventDefault();
        document.getElementById('user').classList.remove('validartext')
        document.getElementById('pass').classList.remove('validartext')
        document.getElementById('pass2').classList.remove('validartext')
    }
    else{
        document.getElementById('user').classList.remove('validartext')
        document.getElementById('pass').classList.remove('validartext')
        document.getElementById('pass2').classList.remove('validartext')
    }
}