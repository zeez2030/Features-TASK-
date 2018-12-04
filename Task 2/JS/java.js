const sites = []
const validate = function (url) {

    var pattern = /^((https?|ftp|smtp):\/\/)?(www.)?[a-z0-9]+(\.[a-z]{2,}){1,3}(#?\/?[a-zA-Z0-9#]+)*\/?(\?[a-zA-Z0-9-_]+=[a-zA-Z0-9-%]+&?)?$/;
    if (pattern.test(url)) {

        return true;
    }

    return false;

}
const remove = function (id) {
    const index = sites.findIndex((site) => {
        return site.id == id
    })
    if (index > -1) {
        sites.splice(index, 1)
         

    }
}

const renderSites = function (sites) {
    document.getElementById('results').innerHTML = ''
    sites.forEach(function (site) {


        // create a dive inside div with id="results"
        let divIT = document.createElement('div')
        //give the div a class to style it later
        divIT.setAttribute('class', 'd-flex URL-box mb-5 margin')
        let Result = document.getElementById("results")
        Result.appendChild(divIT)
        // create a header to insert the Name of URL and create the two buttons
        let showIt = document.createElement('h3')
        showIt.setAttribute('class' , 'book-h3')
        showIt.textContent = site.shortcut
        divIT.appendChild(showIt)

        let visitBtn = document.createElement('a')
        let url = document.getElementById("URL").value
        visitBtn.setAttribute('class', 'btn btn-primary mx-4')
        visitBtn.setAttribute('id', 'Visit')
        visitBtn.textContent = 'visit site'
        divIT.appendChild(visitBtn)
        visitBtn.addEventListener('click', function () {
            window.open(url, '_blank');
        })

        let deleteBtn = document.createElement('button')
        deleteBtn.setAttribute('class', 'btn btn-danger  mx-4')
        deleteBtn.textContent = 'Delete'
        divIT.appendChild(deleteBtn)
        console.log(site.id)
        deleteBtn.addEventListener('click', function () {
            remove(site.id)
           renderSites(sites)
          
       })

    })

}

document.getElementById("submit").addEventListener('click', function (e) {
    var url = document.getElementById("URL").value;
    let shortcut = document.getElementById('shortcut').value;
    let uniqueId = uuidv4()
    if (validate(url)) {
        sites.push({
            shortcut: shortcut,
            id: uniqueId
        })
        renderSites(sites)
    } else {
        alert("Url is not valid!");
    }
})
