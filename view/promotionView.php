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
    <title>Online store</title>
</head>

<body class="vh-100">
    <?php
    include_once 'headerAdminView.php';
    ?>
    <main class="container-fluid h-100 d-flex align-items-center justify-content-start flex-column w-100">
        <div class="container text-center mt-4 mb-3">
            <h1 class="promo-table__title">List products (manage promotions)</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 scrollme">
                    <table id="example" class="table table-bordered table-responsive">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($vars as $data) {
                            ?>
                                <tr>
                                    <td class="productId fw-bold" scope="row"><?php echo $data['ID'] ?></td>
                                    <td class="productName"><?php echo $data['NAME'] ?></td>
                                    <td class="productPrice"><?php echo $data['PRICE'] ?></td>
                                    <td><?php echo $data['DESCRIPTION'] ?></td>
                                    <td><?php echo $data['TYPE'] ?></td>
                                    <td><img class="img-responsive" src="public/assets/<?php echo $data['IMAGE_NAME'] ?>" alt="image product" width="65" height="65" /></td>
                                    <td>
                                        <button type="button" class="btn btn-primary my-1 btn-modal__create" data-bs-toggle="modal" data-bs-target="#exampleModal">Create</button>
                                        <button type="button" class="btn btn-success btn-modal__history" data-bs-toggle="modal" data-bs-target="#success">History</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="" method="POST">
                            <div class="container">
                                <label class="mt-2 mb-2">Discount percentage</label>
                                <input id="discount-percent" class="form-control" type="number" min="0.00" max="any" step="0.01" name="discountedPrice" placeholder="%" required>
                            </div>
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
                        <button id="btn_create-promotion" type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="success" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal_tittle"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 scrollme">
                                    <table id="example" class="table table-bordered table-responsive">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Discounted price</th>
                                                <th scope="col">Start date</th>
                                                <th scope="col">End date</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody-modal">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>
<?php
require_once 'footerView.php';
?>