<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Product List</title>
</head>

<body>
    <div class="container">
        <form method="POST" action="/delete-product" id="mass-delete-form">
            <header class="d-flex justify-content-between my-4">
                <h2>Product List</h2>
                <div>
                    <a href="add-product" class="btn btn-success">ADD</a>
                    <button class="btn btn-danger" type="submit" name="delete-product-btn" id="delete-product-btn">MASS DELETE</button>
                </div>
            </header>
            <hr>

            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php foreach ($productData as $row) : ?>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input delete-checkbox" type="checkbox" name="delete_checkbox[]" value="<?php echo $row->id; ?>">
                                </div>
                                <h5 class="card-title"><?php echo $row->sku; ?></h5>
                                <p class="card-text"><?php echo $row->name; ?></p>
                                <p class="card-text"><?php echo $row->price; ?>$</p>

                                <?php if (!empty($row->size)) : ?>
                                    <p class="card-text">Size: <?php echo $row->size; ?> MB</p>
                                <?php endif; ?>

                                <?php if (!empty($row->height) && !empty($row->width) && !empty($row->length)) : ?>
                                    <p class="card-text">Dimensions: <?php echo $row->height; ?>x<?php echo $row->width; ?>x<?php echo $row->length; ?></p>
                                <?php endif; ?>

                                <?php if (!empty($row->weight)) : ?>
                                    <p class="card-text">Weight: <?php echo $row->weight; ?> KG</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </form>
    </div>
    <?php require('partials/footer.php'); ?>
</body>

</html>