const search = document.querySelector('input[placeholder="search farm"]');
const farmContainer = document.querySelector(".farms-list");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (farms) {
            farmContainer.innerHTML = "";
            loadFarms(farms)
        });
    }
});


function loadFarms(farms) {
    farms.forEach(farm => {
        console.log(farm);
        createFarm(farm);
    });
}

function createFarm(farm) {
    const template = document.querySelector("#farm-template");

    const clone = template.content.cloneNode(true);
    console.log("weeee")
    debugger;
    console.log("wewsee")
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${farm.image}`;

    const owner = clone.querySelector("h2");
    owner.innerHTML = farm.first_name + ' ' + farm.last_name;

    const name = clone.querySelector("p");
    name.innerHTML = farm.name;

    const address  = clone.querySelector("h3");
    address.innerHTML  = "test";

    farmContainer.appendChild(clone);
}