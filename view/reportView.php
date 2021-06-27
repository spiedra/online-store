<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Juan Carlos Sequeira Piedra" />
    <meta name="keywords" content="store, covid, online, clean" />
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <script type="text/javascript" src="public/js/jquery.js"></script>
    <script src="public/js/modal.js"></script>
    <script src="public/js/report_sales.js"></script>
    <title>Online store</title>
</head>

<body class="vh-100">
    <?php
    include_once 'headerAdminView.php';
    ?>
    <main class="container-fluid h-100 d-flex align-items-center justify-content-start flex-column w-100">
        <div class="container text-center mt-4 mb-3">
            <h1 class="promo-table__title d-inline me-3">Report sales</h1>
            <button id="btn__search--sales" class="btn mb-2 d-inline" data-bs-toggle="modal" data-bs-target="#reportSalesModal"><img src="public/assets/search_black_24dp.svg" alt="Icon search" /></button>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 scrollme">
                    <table id="example" class="table table-bordered table-responsive">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">ID Customer</th>
                                <th scope="col">Total</th>
                                <th scope="col">Date time</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_report_sales">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="reportSalesModal" tabindex="-1" aria-labelledby="reportSalesModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="" method="POST">
                            <div class="container">
                                <label class="mt-3 mb-2">Start date</label>
                                <input id="modal__start-date" type="datetime-local" class="form-control" name="datetime" required>
                            </div>
                            <div class="container">
                                <label class="mt-3 mb-2">End date</label>
                                <input id="modal__end-date" type="datetime-local" class="form-control" name="datetime" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btn_search-sales" type="button" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="productsPurchasedCust" tabindex="-1" aria-labelledby="productsPurchasedCust" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Purchase history</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 scrollme">
                                    <table id="example" class="table table-bordered table-responsive">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">Product name</th>
                                                <th scope="col">User name</th>
                                                <th scope="col">Unit price</th>
                                                <th scope="col">Total detail</th>
                                                <th scope="col">Amount products</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody-products-sold"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go back</button>
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