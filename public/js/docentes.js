const addDocente = document.getElementById('addDocente');
addDocente.onclick = () => {
  const formDocente = document.getElementById('formDocente');
  formDocente.classList.toggle('ghost');
};

const btnTable = document.querySelectorAll('.btn-table');
btnTable.forEach((item) => {
  if(item.innerText !== '0'){
    item.onclick = (event) => {
      event.preventDefault();
      console.log(`tr${item.dataset.btn}`);
      const tr = document.getElementById(`tr${item.dataset.btn}`);
      tr.classList.toggle('ghost-table');
    }
  }
});