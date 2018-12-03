const notes = []
localStorage.setItem('notes',JSON.stringify('notes'))
const x = JSON.parse(localStorage.getItem('notes'))


const filters= {
  searchText : ''
}

const remove = function (id) {
  const index = notes.findIndex((note)=> {
    return note.id == id
  })
  if (index > -1) {
    notes.splice(index,1)
  }
}

const renderNotes  = function (input,filters) {

    const filteredNotes = input.filter(function (element) {
   return element.title.toLowerCase().includes(filters.searchText.toLowerCase())
  } )

  document.getElementById('results').innerHTML = ''
  filteredNotes.forEach(function (note){
    let buttonIt = document.createElement('button')
    buttonIt.innerHTML = 'x'

    let showIt = document.createElement('p')
    showIt.textContent = note.title.length > 0 ? note.title : 'No name'
    document.getElementById('results').appendChild(showIt)
    showIt.appendChild(buttonIt)
    // function remove
    buttonIt.addEventListener('click' , function () {
      remove(note.id)
      renderNotes(notes,filters)
    })

  })



}

renderNotes(notes,filters)


document.querySelector('#filter-note').addEventListener('input' , function(e) {
  filters.searchText = e.target.value
  renderNotes(notes,filters)

})

document.getElementById('button-note').addEventListener('click' , function(e) {
  let uniqueId = uuidv4()
  notes.push({
    title : '' ,
    body : '',
    id : uniqueId
  })
  renderNotes(notes,filters)

})
