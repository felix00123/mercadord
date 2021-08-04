function handleFiles(files)
{
    var listImg = document.getElementById('fileList');
    if (!files.length) {
        listImg.innerHTML = "<p>No files selected!</p>";
        evObject.preventDefault()
    }
    else
    {
        document.getElementById('alertaFile').style.display="none"
        var list = document.createElement("ul");
        list.id="delete"
        listImg.appendChild(list);
        for (var i=0; i < files.length; i++) {
            var li = document.createElement("li");
            list.appendChild(li);
            
            var img = document.createElement("img");
            img.src = window.URL.createObjectURL(files[i]);;
            
            img.onload = function() {
            window.URL.revokeObjectURL(this.src);
            }
            li.appendChild(img);
            
            // var info = document.createElement("span");
            // info.innerHTML = files[i].name + ": " + files[i].size + " bytes";
            // li.appendChild(info);
        }
    }
}
window.onload = function () 
{ document.forms['form_producto'].addEventListener('submit', validarFormPro);
document.getElementById('nameArticulo').focus(); document.getElementById('alertaFile').style.display="none"
; document.getElementById('alertSmall').style.display="none"
}
function validarFormPro(evObject)
{
    var img = document.getElementById('exampleFormControlFile1').files
    if (document.getElementById('nameArticulo').value.trim()=="") {
        document.getElementById('nameArticulo').classList.add('is-invalid')
        evObject.preventDefault();
    }
    else if(document.getElementById('precioArticulo').value.trim()=="")
    {
        document.getElementById('precioArticulo').classList.add('is-invalid')
        evObject.preventDefault()
    }
    else if(document.getElementById('desArticulo').value.trim()=="")
    {
        document.getElementById('desArticulo').classList.add('is-invalid')
        evObject.preventDefault()

    }
    else if(document.getElementById('catArticulo').selectedIndex==0||null)
    {
        document.getElementById('catArticulo').classList.add('is-invalid')
        evObject.preventDefault()
    }
    else if(!document.querySelector('input[name="estado"]:checked'))
    {
        document.getElementById('alertSmall').style.display="block"
        evObject.preventDefault()
    }
    else if(img.length===0) 
    {
        document.getElementById('alertaFile').style.display="block"
        document.getElementById('alertSmall').style.display="none"
        evObject.preventDefault()
    }
    else if(img.length>10)
    {
        document.getElementById('alertaFile').style.display="block"
        document.getElementById('alertSmall').style.display="none"
        document.getElementById('alertaFile').innerText="Debe seleccionar un maximo de 10 fotos"
        document.getElementById('exampleFormControlFile1').value=""
        var elemetUl = document.getElementById('delete')
        if (!elemetUl) {
            console.log('no existe el elemento de lista')
        }
        else
        {
            var padre = elemetUl.parentNode;
            padre.removeChild(elemetUl);
        }
        evObject.preventDefault()
    }
}
function myValidar()
{
    if (document.getElementById('nameArticulo').onblur) {
        var nombreA = document.getElementById('nameArticulo')
        if (nombreA.value.trim()=="") {

        }
        else
        {
            document.getElementById('nameArticulo').classList.remove('is-invalid')
            document.getElementById('nameArticulo').classList.add('is-valid')
        }
    }
    if (document.getElementById('precioArticulo').onblur) {
        var precioA = document.getElementById('precioArticulo')
        if (precioA.value.trim()=="") {

        }
        else
        {
            document.getElementById('precioArticulo').classList.remove('is-invalid')
            document.getElementById('precioArticulo').classList.add('is-valid')
        }
    }
    if(document.getElementById('desArticulo').onblur)
    {
        var desA = document.getElementById('desArticulo')
        if (desA.value.trim()=="") {

        }
        else
        {
            document.getElementById('desArticulo').classList.remove('is-invalid')
            document.getElementById('desArticulo').classList.add('is-valid')
        }
    }
    if(document.getElementById('catArticulo').onblur)
    {
        var catA = document.getElementById('catArticulo')
        if (catA.selectedIndex==0||null) {
            
        }
        else
        {
            document.getElementById('catArticulo').classList.remove('is-invalid')
            document.getElementById('catArticulo').classList.add('is-valid')
        }
    }
}