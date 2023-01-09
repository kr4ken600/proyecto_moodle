const btnTable = document.querySelectorAll('.btn-table');
btnTable.forEach((item) => {
  if(item.innerText !== '0'){
    item.onclick = (event) => {
      event.preventDefault();
      const tr = document.getElementById(`tr${item.dataset.btn}`);
      tr.classList.toggle('ghost-table');
    }
  }
});