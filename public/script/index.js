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
        const inputs = document.querySelectorAll(`#${atr} input`);
        inputs.forEach((input) => {
            input.value = 0;
        });
    });

    // Set all inputs to 0 for the selected type
    const currentInputs = document.querySelectorAll(`#${e.target.value} input`);
    currentInputs.forEach((input) => {
        input.value = 0;
        input.addEventListener("focus", () => {
            if (input.value === "0") {
                input.value = "";
            }
        });
    });

});

savebtn.addEventListener("click", (e) => {
    document.querySelectorAll(".hidden input").forEach((input) => {
        input.required = false;
    });
});
