resultado.innerHTML = texto.value;

function etiquetaStrong() {
  let desde = texto.selectionStart; 
  let hasta = texto.selectionEnd;
  let elTexto = texto.value;
  let sel = elTexto.substring(desde, hasta);
  if (sel.length > 0) {// si hay algo seleccionado
    texto.setRangeText(`<b>${sel}</b>`,desde,hasta,'select');
    resultado.innerHTML = texto.value;
  }
}


bold.addEventListener("click",(bold=>{etiquetaStrong()}));



function etiquetaItalic() {
  let desde = texto.selectionStart; 
  let hasta = texto.selectionEnd;
  let elTexto = texto.value;
  let sel = elTexto.substring(desde, hasta);
  if (sel.length > 0) {// si hay algo seleccionado
    texto.setRangeText(`<i>${sel}</i>`,desde,hasta,'select');
    resultado.innerHTML = texto.value;
  }
}


italic.addEventListener("click",(italic=>{etiquetaItalic()}));