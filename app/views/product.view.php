<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Add New Product</title>
    <link rel="stylesheet" href="public/style/style.css">
</head>


<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h2>Product Add</h2>
            <div>
                <button type="submit" class="btn btn-success" id="save" name="create-btn" form="product_form">Save</button>
                <a href="/" class="btn btn-danger">Cancel</a>
            </div>
        </header>
        <hr>

        <form action="/products" method="POST" id="product_form">
            <div class="mb-3 d-flex">
                <label for="sku" class="form-label col-1">SKU</label>
                <input type="text" class="form-control w-50" name="sku" id="sku" required>
            </div>
            <strong class="text-danger hidden" id="sku-message"></strong>

            <div class="mb-3 d-flex">
                <label name="name" class="form-label col-1">Name</label>
                <input type="text" class="form-control w-50" name="name" id="name" required>
            </div>

            <div class="mb-3 d-flex">
                <label for="price" class="form-label col-1">Price ($)</label>
                <input type="number" class="form-control w-50" name="price" id="price" required>
            </div>

            <!-- TYPE -->
            <div class="mb-3 d-flex">
                <label class="form-label col-1">Type</label>
                <select name="type" class="form-control w-50" id="productType" required>
                    <option value disabled selected>Select Type</option>
                    <option value="dvd">DVD</option>
                    <option value="furniture">Furniture</option>
                    <option value="book">Book</option>
                </select>
            </div>
            <br>
            <div class="dvd hidden" id="dvd">
                <div class=" mb-3 d-flex row">
                    <label for="size" class="form-label col-1">Size (MB)</label>
                    <input type="number" class="form-control w-50 mx-2" name="size" id="size" required>
                    <p class="text-warning"><strong>Please, provide disc space in MB.</strong></p>
                </div>
            </div>

            <div class="furniture hidden" id="furniture">
                <div class="mb-3 d-flex row">
                    <label for="height" class="form-label col-1 ">Height(CM)</label>
                    <input type="number" class="form-control w-50 mx-2" name="height" id="height" required>
                </div>
                <div class="mb-3 d-flex row">
                    <label for="width" class="form-label col-1">Width(CM)</label>
                    <input type="number" class="form-control w-50 mx-2" name="width" id="width" required>
                </div>
                <div class="mb-3 d-flex row">
                    <label for="length" class="form-label col-1">Length(CM)</label>
                    <input type="number" class="form-control w-50 mx-2" name="length" id="length" required>
                </div>
                <p class="text-warning"><strong>Please, provide dimensions in HxWxL format.</strong></p>
            </div>

            <div class="book hidden" id="book">
                <div class="mb-3 d-flex row">
                    <label for="weight" class="form-label col-1 ">Weight(KG)</label>
                    <input type="number" class="form-control w-50 mx-2" name="weight" id="weight" required>
                    <p class="text-warning"><strong>Please, provide weight in KG.</strong></p>
                </div>
            </div>
        </form>
        <?php require('partials/footer.php'); ?>
    </div>
    <script src="public/script/index.js"></script>
    <script src="public/script/validation.js"></script>

</body>

</html>