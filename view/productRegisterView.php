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
    <main class="container-fluid h-75 d-flex align-items-center justify-content-center page-main">
        <form class="container bg-light form__register-admin">
            <div class="container">
                <h1 class="mt-3 text-center form__tittle">Register Admin</h1>
            </div>
            <div class="container container--one">
                <label class="mb-2">User name</label>
                <input class="form-control" type="text" name="userNameAdmin" placeholder="Enter user name" required>
            </div>
            <div class="container container--two">
                <label class="mb-2">Password</label>
                <input type="password" class="form-control" name="passwordAdmin" placeholder="Password" required>
            </div>
            <div class="container container--three-sign-in">
                <label class="mb-2">Confirm password</label>
                <input type="password" class="form-control" name="passwordConfirmedAdmin" placeholder="Password" required>
            </div>
            <div class="container d-flex justify-content-center container--four">
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
        </form>
    </main>
    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>
<?php
require_once 'footerView.php';
?>