
const form = document.querySelector('form[id="field-form"]');

const inputElements = form.getElementsByTagName("input");
const textAreaElements = form.getElementsByTagName("textarea");
const elements = [...inputElements, ...textAreaElements];


function emptyInputCondition(input){
    return input.length === 0;
}

function markValidation(element, condition) {
    condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');//dodaje styl co podkresla miejsce

}

function  validateEveryInput(){
    setTimeout(function (){
            for (let i = 0; i < elements.length; i++) {
                markValidation(elements[i],emptyInputCondition(elements[i].value))
            }
        }
        , 1000);

}

form.addEventListener('click',validateEveryInput)
