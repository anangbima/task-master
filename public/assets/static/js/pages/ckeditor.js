ClassicEditor.create(document.querySelector("#editor"))
  .then( editor => {
    editor.ui.view.editable.element.style.height = '300px'; 
  }).catch((error) => {
    console.error(error)
})
