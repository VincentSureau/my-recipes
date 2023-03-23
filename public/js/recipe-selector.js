const list = document.querySelector(".recipe-list");

list.querySelectorAll(".card")

list.addEventListener("click", (event) => {
    const elem = event.target.closest(".card");
    if (!elem) return;
    if (!list.contains(elem)) return;

    const recipeId = elem.dataset.recipeId;

    if (elem.classList.toggle("selected")) {
        // selection
        console.log("selection", recipeId);
    } else {
        // deselection
        console.log("deselection", recipeId);
    }
})



// search

function searchRecipe() {
    let input = document.getElementById("search").value;
    input = input.toLowerCase();
    let x = list.querySelectorAll(".card");

    for (i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display = "none";
        }
        else {
            x[i].style.display = "";
        }
    }
}