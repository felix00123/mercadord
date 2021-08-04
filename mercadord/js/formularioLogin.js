window.onload = function()
{
    let formularioL = document.getElementById('formulario_login')
    if (formularioL) {
        formularioL.addEventListener('submit', validaciónLogin, false)
    }
    else{
        console.log('No existe el formulario')
    }
}
function validaciónLogin(evObject)
{
    let username = document.getElementById('user')
    let pass = document.getElementById('pass')
    if (username.value.trim()=="") {
        evObject.preventDefault();
        document.getElementById('user').classList.add('error')
        document.getElementById('pass').classList.remove('error')
    }
    else if(pass.value.trim()==""){
        evObject.preventDefault();
        document.getElementById('pass').classList.add('error')
        document.getElementById('user').classList.remove('error')
    }
    else{
        document.getElementById('pass').classList.remove('error')
        document.getElementById('user').classList.remove('error')
    }
}