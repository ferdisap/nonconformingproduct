function getPage(page){
  window.event.preventDefault();
  let table = document.querySelector('#table').parentNode;
  // let table = document.querySelector('#table');
  // fetch('/dashboard/dpls-table?ajax=true&page=' + page)
  fetch('/dashboard/dpls-table?page=' + page, {
    headers:{
      'X-Requested-With': 'XMLHttpRequest', //method request()->ajax() akan return true. Valunya harus XMLHttpReqeust, source marcusmoore comment on https://github.com/laravel/nova-issues/issues/323, jika X-CSRF-TOKEN: document.head.querySelector('meta[name="csrf-token"]').content
    },
  })
    .then((response) => response.text()).then((result) => {
      // view=result;
      console.log(result)
      table.innerHTML = result;
      history.pushState({}, '', '/dashboard/' + 'dpls-index?page=' + page ) // pelajari lagi soal parameter pertama dan kedua function ini
      // history.pushState({}, '', '/dashboard/' + componentName) // pelajari lagi soal parameter pertama dan kedua function ini
    })
  // console.log(view);
}

// fetch('/dashboard/users-profile',{
//   headers:{
//     'X-Requested-With': 'XMLHttpRequest', //method request()->ajax() akan return true. Valunya harus XMLHttpReqeust, source marcusmoore comment on https://github.com/laravel/nova-issues/issues/323, jika X-CSRF-TOKEN: document.head.querySelector('meta[name="csrf-token"]').content
//   },
// })
// .then((response) => response.text()).then((result) => {
//   console.log(result)
// })