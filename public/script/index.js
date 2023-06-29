const savebtn = document.getElementById("save");
const switcher = document.getElementById("productType");


const inputFields = {
    dvd: ["size"],
    furniture: ["height", "width", "length"],
    book: ["weight"],
};

switcher.addEventListener("change", (e) => {
    // Remove "hidden" class from the selected type
    document.getElementById(e.target.value).classList.remove("hidden");

    // Add "hidden" class to other types and reset their input values
    for (const type in inputFields) {
        if (type !== e.target.value) {
            document.getElementById(type).classList.add("hidden");
            inputFields[type].forEach((field) => {
                document.getElementById(field).value = 0;
            });
        }
    }

    // Set all inputs to 0 for the selected type
    inputFields[e.target.value].forEach((field) => {
        const input = document.getElementById(field);
        input.value = null;
        input.required = true;
    });
});

savebtn.addEventListener("click", (e) => {
    document.querySelectorAll(".hidden input").forEach((input) => {
        input.required = false;
    });
});
