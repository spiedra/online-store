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
        <form class="container my-4 bg-light form__register-product" method="POST" action="">
            <div class="form-group">
                <h1 class="mt-3 text-center form__tittle">Register Product</h1>
            </div>
            <div class="form-group">
                <label class="mb-2" for="inputNameProduct">Name</label>
                <input type="text" class="form-control" id="inputNameProduct" placeholder="Product name">
            </div>
            <div class="form-group">
                <label class="mb-2" for="inputPriceProduct">Price</label>
                <input type="number" min="0.00" max="any" step="0.01" class="form-control" id="inputPriceProduct" placeholder="Price $">
            </div>
            <div class="form-group">
                <label class="mb-2" for="inputDescriptionProduct">Description</label>
                <textarea type="text" class="form-control" id="inputDescriptionProduct"></textarea>
            </div>
            <div class="form-group ">
                <label class="mb-2 d-block" for="inputImageFile">Image</label>
                <input type="file" class="form-control-file" id="inputImageFile">
            </div>
            <div class="container mb-0 d-flex justify-content-center container--four">
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>
        </form>
    </main>
    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>
<?php
require_once 'footerView.php';
?>