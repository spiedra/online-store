<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Juan Carlos Sequeira Piedra" />
    <meta name="keywords" content="store, covid, online, clean" />
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/css/style.css" />
    <title>Online store</title>
</head>

<body class="vh-100">
    <?php
    include_once 'headerView.php';
    ?>
    <main class="container-fluid d-flex align-items-center justify-content-center page-main">
        <form class="container my-5 bg-light form__register-product" method="POST" enctype="multipart/form-data" action="?controller=Product&action=registerProduct">
            <div class="form-group">
                <h1 class="mt-3 text-center form__tittle">Register Product</h1>
            </div>
            <div class="form-group">
                <label class="mb-2" for="inputNameProduct">Name</label>
                <input type="text" class="form-control" id="inputNameProduct" name="nameProduct" placeholder="Product name" required>
            </div>
            <div class="form-group">
                <label class="mb-2" for="inputPriceProduct">Price</label>
                <input type="number" min="0.00" max="any" step="0.01" class="form-control" id="inputPriceProduct" name="priceProduct" placeholder="Price $" required>
            </div>
            <div class="form-group col-md-4">
                <label class="mb-2" for="inputCategories">Categories</label>
                <select id="inputCategories" class="form-select" name="categorySelected">
                    <option value="" disabled selected>Choose option</option>
                    <?php
                    foreach ($vars as $item) {
                    ?>
                        <option class="select_opcion" value="<?php echo $item['TYPE'] ?>"><?php echo $item['TYPE'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label class="mb-2" for="inputDescriptionProduct">Description</label>
                <textarea type="text" class="form-control" id="inputDescriptionProduct" name="descriptionProduct" required></textarea>
            </div>
            <div class="form-group">
                <label class="mb-2 d-block" for="inputImageFile">Image</label>
                <input type="file" class="form-control" id="inputImageFile" name="imageFile" required>
            </div>
            <div class="form-group d-flex justify-content-center container--four-product">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </main>
    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>
<?php
require_once 'footerView.php';
?>