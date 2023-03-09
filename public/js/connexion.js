
let passInput = document.getElementById("passwordconfirmation_input");
let pseudoInput = document.getElementById("pseudo_input");
let subscribeBtn = document.getElementById("subscribe_btn");



subscribeBtn.addEventListener("click",hideElement,false)

function hideElement(){

    console.log("hiden");
    subscribeBtn.classList.add("d-none");
    passInput.classList.add("d-none");
    pseudoInput.classList.add("d-none");
};