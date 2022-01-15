const actionSelect = document.getElementById("action-select");
const plant = document.querySelector('input[name="plant"]');
const plantingRatio = document.querySelector('input[name="planting-ratio"]');
const plantSeedBrand = document.querySelector('input[name="plant-seed-brand"]');
const sprayBrand = document.querySelector('input[name="spray-brand"]');
const sprayingRatio = document.querySelector('input[name="spraying-ratio"]');
const harvestAmount = document.querySelector('input[name="harvest-amount"]');

const actionForm = document.querySelector('form[name="action-form"]');





actionSelect.addEventListener("change", function(){
    const inputs = [...actionForm.getElementsByTagName('input')];
    inputs.forEach((input)=> input.style.display = 'none');
    switch (actionSelect.value){
        case 'planting':
            plant.style.display = 'inherit';
            plantingRatio.style.display = 'inherit';
            plantSeedBrand.style.display = 'inherit';
            break;
        case 'spraying':
            sprayBrand.style.display = 'inherit';
            plant.style.display = 'inherit';
            sprayingRatio.style.display = 'inherit';
            break;
        case 'harvesting':
            plant.style.display = 'inherit';
            harvestAmount.style.display = 'inherit';
            break;
        default: break;
    }
});