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

<body class="bg-light vh-100 d-flex align-items-center justify-content-between flex-column">
    <?php
    include_once 'headerAdminView.php';
    ?>
    <main class="container-fluid d-flex align-items-center justify-content-center page-main--category">
        <form class="container bg-light form__register-admin" method="POST" action="?controller=Category&action=registerCategory">
            <div class="container">
                <h1 class="mt-3 text-center form__tittle">Register category</h1>
            </div>
            <div class="container container--one">
                <label class="mb-2">Type</label>
                <input class="form-control" type="text" name="categoryType" placeholder="Enter category type" required>
            </div>
            <div class="container d-flex justify-content-center container--four">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </main>
    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>
<?php
    require_once 'footerView.php';
?>