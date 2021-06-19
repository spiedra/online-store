<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Juan Carlos Sequeira Piedra" />
    <meta name="keywords" content="store, covid, online, clean" />
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/css/style.css" />
    <script type="text/javascript" src="public/js/jquery.js"></script>
    <script src="public/js/modal.js"></script>
    <script src="public/js/show_products.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <title>Online store</title>
</head>

<body>
    <?php
    include_once 'headerCustomerView.php';
    ?>
    <main id="mainCustomerView">
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="" method="POST">
                            <div class="container">
                                <label class="mt-2 mb-2">Product name</label>
                                <input id="discount-percent" class="form-control" type="text" name="discountedPrice" placeholder="Name" required>
                            </div>
                            <div class="container">
                                <label class="mb-2" for="inputCategories">Categories</label>
                                <select id="selectCategories" class="form-select" name="categorySelected"></select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btn_create-promotion" type="button" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>
<?php
// require_once 'footerView.php';
?>