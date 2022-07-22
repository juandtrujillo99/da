resultado.innerHTML = texto.value;

function etiquetaStrong() {
  let desde = texto.selectionStart; 
  let hasta = texto.selectionEnd;
  let elTexto = texto.value;
  let sel = elTexto.substring(desde, hasta);
  if (sel.length > 0) {// si hay algo seleccionado
    texto.setRangeText(`<strong>${sel}</strong>`,desde,hasta,'select');
    resultado.innerHTML = texto.value;
  }
}


bold.addEventListener("click",(bold=>{etiquetaStrong()}));