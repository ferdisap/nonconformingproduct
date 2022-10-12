function showDetailModel(primaryKey){
  window.event.preventDefault();
  let content = document.querySelector('#content');

  fetch(window.location.href + "/" + primaryKey, {
    headers:{
      'X-Requested-With': 'XMLHttpRequest', //method request()->ajax() akan return true. Valunya harus XMLHttpReqeust, source marcusmoore comment on https://github.com/laravel/nova-issues/issues/323, jika X-CSRF-TOKEN: document.head.querySelector('meta[name="csrf-token"]').content
    },
  })
    .then((response) => response.text()).then((result) => {
      // view=result;
      console.log("showDetailModel" , result)
      content.innerHTML = result;
      history.pushState({}, '', window.location.href + "/" + primaryKey ) // pelajari lagi soal parameter pertama dan kedua function ini
    })
}