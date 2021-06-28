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
    <script type="text/javascript" src="public/js/manage_product.js"></script>
    <title>Online store</title>
</head>

<body class="vh-100">
    <?php
    include_once 'headerAdminView.php';
    ?>
    <main class="container-fluid h-100 d-flex align-items-center justify-content-start flex-column w-100">
        <div class="container text-center mt-4 mb-3">
            <h1 class="promo-table__title">List products</h1>
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
                        <tbody id="tdbody_manage_product">
                            <?php
                            foreach ($vars as $data) {
                            ?>
                                <tr>
                                    <td class="productId fw-bold" scope="row"><?php echo $data['ID'] ?></td>
                                    <td class="productName"><?php echo $data['NAME'] ?></td>
                                    <td class="productPrice"><?php echo $data['PRICE'] ?></td>
                                    <td class="productDescription"><?php echo $data['DESCRIPTION'] ?></td>
                                    <td class="productType"><?php echo $data['TYPE'] ?></td>
                                    <td id="<?php echo $data['IMAGE_NAME'] ?>" class="productImage"><img class="img-responsive" src="public/assets/<?php echo $data['IMAGE_NAME'] ?>" alt="image product" width="65" height="65" /></td>
                                    <td>
                                        <button type="button" class="btn btn-primary my-1 btn-update--product" data-bs-toggle="modal" data-bs-target="#updateProductnModal"><i class="fas fa-cog fa-lg"></i></button>
                                        <button type="button" class="btn btn-danger btn-delete--product"><i class="fas fa-trash-alt fa-lg"></i></button>
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
        <div class="modal fade" id="updateProductnModal" tabindex="-1" aria-labelledby="updateProductnModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Admin update</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" action="?controller=Product&action=updateProduct">
                        <input id="producIdMange" type="hidden" name="productId" value="" />
                            <div class="container">
                                <label class="mb-1" for="inputNameProduct">Name</label>
                                <input type="text" class="form-control" id="inputNameProduct" name="nameProduct" placeholder="Product name" required>
                            </div>
                            <div class="container mt-1">
                                <label class="mb-1" for="inputPriceProduct">Price</label>
                                <input type="number" min="0.00" max="any" step="0.01" class="form-control" id="inputPriceProduct" name="priceProduct" placeholder="Price $" required>
                            </div>
                            <div class="container mt-1">
                                <label class="mb-1" for="inputCategories">Categories</label>
                                <select id="inputCategories" class="form-select" name="categorySelected">

                                </select>
                            </div>
                            <div class="container mt-1">
                                <label class="mb-1" for="inputDescriptionProduct">Description</label>
                                <textarea type="text" class="form-control" id="inputDescriptionProduct" name="descriptionProduct" required></textarea>
                            </div>
                            <div class="container d-flex justify-content-center align-items-center">
                                <div id="containerCurrentImage" class="container w-25">

                                </div>
                                <div class="container flex-grow-1">
                                    <label class="mb-1" for="inputImageFile">New image</label>
                                    <input type="file" class="form-control" id="inputImageFile" value="jaja" name="imageFile">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
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