const cantidad = document.getElementById('cantidad');
document.getElementById('cant').onclick = () => {
  const cont_temarios = document.getElementById('cont_temarios');
  while (cont_temarios.hasChildNodes()) {
    cont_temarios.removeChild(cont_temarios.firstChild);
  }
  for (let index = 0; index < cantidad.value; index++) {
    createChilds(cont_temarios, index);
  }
};

function createChilds(padre, cantidad) {
  const col = document.createElement('div');
  const lab =  document.createElement('label');
  const inp = document.createElement('input');

  col.className = "col-sm-12 col-md-12 col-lg-12 mb-3";
  
  lab.className = "form-label";
  lab.form = `prac${cantidad}`;
  lab.innerText = `Practica ${cantidad + 1}`; 

  inp.type = "text";
  inp.className = "form-control";
  inp.name = `prac${cantidad}`;
  inp.id = `prac${cantidad}`;

  col.appendChild(lab);
  col.appendChild(inp);

  padre.appendChild(col);
  
}