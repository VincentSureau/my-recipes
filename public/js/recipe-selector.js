const list = document.querySelector(".recipe-list");

list.addEventListener("click", (event) => {
    const elem = event.target.closest(".card");
    if (!elem) return;
    if (!list.contains(elem)) return;

    console.log(elem);
    highlight(elem);
})

function highlight(element) {
    element.style.setProperty("box-shadow","0 .5rem 1rem red", "important");
}

