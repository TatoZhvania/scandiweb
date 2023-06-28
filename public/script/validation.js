const form = document.getElementById("product_form");

form.addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(form);

    fetch("/products", {
        method: "POST",
        body: formData,
    })
        .then((response) => {
            console.log(response);
            return response.json();
        })
        .then((data) => {
            console.log(data);
            if (data["success"] === true) {
                // console.log("Product added successfully!");
                window.location.href = "/";
            } else {
                const errorMessage = document.getElementById("sku-message");
                errorMessage.textContent = "A product with the same SKU already exists!";
                errorMessage.classList.remove("hidden");
            }
        })
        .catch((error) => {
            console.error("An error occurred:", error);
        });
});
