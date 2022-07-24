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




function etiquetaUnderline() {
  let desde = texto.selectionStart; 
  let hasta = texto.selectionEnd;
  let elTexto = texto.value;
  let sel = elTexto.substring(desde, hasta);
  if (sel.length > 0) {// si hay algo seleccionado
    texto.setRangeText(`<u>${sel}</u>`,desde,hasta,'select');
    resultado.innerHTML = texto.value;
  }
}
underline.addEventListener("click",(underline=>{etiquetaUnderline()}));



function etiquetaEnlazado() {
  let desde = texto.selectionStart; 
  let hasta = texto.selectionEnd;
  let elTexto = texto.value;
  let sel = elTexto.substring(desde, hasta);
  if (sel.length > 0) {// si hay algo seleccionado
    texto.setRangeText(`<a href="Inserta la url aquí">${sel}</a>`,desde,hasta,'select');
    resultado.innerHTML = texto.value;
  }
}
enlazado.addEventListener("click",(enlazado=>{etiquetaEnlazado()}));