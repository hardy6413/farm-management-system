const search = document.querySelector('input[placeholder="search field"]');
const fieldsContainer = document.querySelector(".fields-list");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/searchFields", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (fields) {
            fieldsContainer.innerHTML = "";
            loadFields(fields)
        });
    }
});


function loadFields(fields) {
    fields.forEach(field => {
        createField(field);
    });
}

function createField(field) {
    const template = document.querySelector("#field-template");

    const clone = template.content.cloneNode(true);
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${field.image}`;

    const fieldInfo = clone.querySelector(".field-info");
    fieldInfo.innerHTML = "Block number: "+ field.block_number + "<br> Name: " + field.name + "<br> Area: " + field.area;

    const fieldHref = clone.querySelector("#field-overview-id");
    fieldHref.href = "/fieldOverview/"+field.id


    fieldsContainer.appendChild(clone);
}