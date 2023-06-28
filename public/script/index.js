const savebtn = document.getElementById("save");
const switcher = document.getElementById("productType");

switcher.addEventListener("change", (e) => {
    let listOfValues = ["dvd", "furniture", "book"];
    document.getElementById(e.target.value).classList.remove("hidden");

    let indexToRemove = listOfValues.indexOf(e.target.value);
    if (indexToRemove > -1) {
        listOfValues.splice(indexToRemove, 1);
    }

    listOfValues.map((atr) => {
        document.getElementById(atr).classList.add("hidden");
        document.querySelector(`#${atr} input`).value = 0;
    });

    if (e.target.value === "furniture") {
        document.getElementById("height").value = 0;
        document.getElementById("width").value = 0;
        document.getElementById("length").value = 0;
    }

});

savebtn.addEventListener("click", (e) => {
    document.querySelectorAll(".hidden input").forEach((input) => {
        input.required = false;
    });
});
