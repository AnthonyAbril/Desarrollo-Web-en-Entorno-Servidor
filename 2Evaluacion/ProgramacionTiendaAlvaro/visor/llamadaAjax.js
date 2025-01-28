function iniciarValores() {

    let enviar = document.getElementById("enviar");
    enviar.addEventListener('click', llamadaAjax, false);

}

function llamadaAjax() {

    let selectObjetos = document.getElementById("objetos");
    let valueObjetos = selectObjetos.value;

    
}




window.addEventListener('load', iniciarValores, false);