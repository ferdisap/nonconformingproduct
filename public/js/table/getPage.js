function getPage(page){
  window.event.preventDefault();
  let table = document.querySelector('#table').parentNode;
  // let table = document.querySelector('#table');
  fetch('/dashboard/dpls-table?ajax=true&page=' + page)
    .then((response) => response.text()).then((result) => {
      // view=result;
      console.log(result)
      table.innerHTML = result;
      history.pushState({}, '', '/dashboard/' + 'dpls-index?page=' + page ) // pelajari lagi soal parameter pertama dan kedua function ini
      // history.pushState({}, '', '/dashboard/' + componentName) // pelajari lagi soal parameter pertama dan kedua function ini
    })
  // console.log(view);
}