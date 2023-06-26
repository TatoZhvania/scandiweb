const savebtn = document.getElementById("save");
const switcher = document.getElementById("productType");

switcher.addEventListener("change", (e) => {
    let listOfValues = ["dvd", "book", "furniture"];
    document.getElementById(e.target.value).classList.remove("hidden");

    let indexToRemove = listOfValues.indexOf(e.target.value);
    if (indexToRemove > -1) {
        listOfValues.splice(indexToRemove, 1);
    }

    listOfValues.map((atr) => {
        document.getElementById(atr).classList.add("hidden");
        document.querySelector(`#${atr} input`).value = null;
        console.log(document.getElementById(atr).value);
    });
});

savebtn.addEventListener("click", (e) => {
    document.querySelectorAll(".hidden input").forEach((input) => {
        input.required = false;
    });
});
