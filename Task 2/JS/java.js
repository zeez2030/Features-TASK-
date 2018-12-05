const sites = []

//function to check that url is valid and that the name input isnt empty 

const validate = function (url,name) {
    var pattern = /^((https?|ftp|smtp):\/\/)?(www.)?[a-z0-9]+(\.[a-z]{2,}){1,3}(#?\/?[a-zA-Z0-9#]+)*\/?(\?[a-zA-Z0-9-_]+=[a-zA-Z0-9-%]+&?)?$/;
    if (pattern.test(url) && name !="") {

        return true;
    }

    return false;

}

//function to remove a bookmark by id 
const remove = function (id) {
    const index = sites.findIndex((site) => {
        return site.id == id
    })
    if (index > -1) {
        sites.splice(index, 1)


    }
}

//fucntion to show and update any event happen to the sites
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
        showIt.setAttribute('class', 'book-h3')
        showIt.textContent = site.shortcut
        divIT.appendChild(showIt)

        let visitBtn = document.createElement('button')
        let url = document.getElementById("URL").value
        visitBtn.setAttribute('class', 'btn btn-outline-primary mx-4')
        visitBtn.setAttribute('id', 'Visit')
        visitBtn.textContent = 'Visits'
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


//what happens when submit button is clicked
document.getElementById("submit").addEventListener('click', function (e) {
    var url = document.getElementById("URL").value;
    let shortcut = document.getElementById('shortcut').value;
    let uniqueId = uuidv4()
    if (validate(url,shortcut)) {
        sites.push({
            shortcut: shortcut,
            id: uniqueId
        })
        renderSites(sites) //makes a new bookmark if validate return true so that url is valid and the site name isnt empty 
    } else {
        if(shortcut=="") alert("Name must have value")
        else
        alert("Url is not valid!");
    }
})
