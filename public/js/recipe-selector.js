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

