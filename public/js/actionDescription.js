const tbody = document.querySelector("#action-rows");
const actions = tbody.getElementsByTagName("tr");
const actionsArray = [...actions];
const descriptionContent = document.querySelector(".action-description");


actionsArray.forEach(action => action.addEventListener("click",function (event){
    event.preventDefault();
    const data = {id: this.id};

    fetch("/fieldDetailedInfo", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (actionOverview) {
        descriptionContent.innerHTML = "";
        loadDescription(actionOverview)
    });
}))



function loadDescription(actionOverview) {
    let str = "";
    for(let key in actionOverview) {
        if (actionOverview.hasOwnProperty(key)){
            if (actionOverview[key].param_name !== undefined){
                let test = actionOverview[key].param_name + " : " + actionOverview[key].value;
                str = str + test + "<br>";
            }
        }
    }
    descriptionContent.innerHTML = actionOverview.created_at +  "<br>" +
     "Worker: " + actionOverview.first_name + " " + actionOverview.last_name  + "<br>" + str;
}
