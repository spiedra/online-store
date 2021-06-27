<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Juan Carlos Sequeira Piedra" />
    <meta name="keywords" content="store, covid, online, clean" />
    <script type="text/javascript" src="public/js/jquery.js"></script>
    <script src="public/js/manage_admin.js"></script>
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <title>Online store</title>
</head>

<body class="vh-100">
    <?php
    include_once 'headerAdminView.php';
    ?>
    <main class="container-fluid h-100 d-flex align-items-center justify-content-start flex-column w-100">
        <div class="container text-center mt-4 mb-3">
            <h1 class="promo-table__title">List admins</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 scrollme">
                    <table id="tb-admins" class="table table-bordered table-responsive">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($vars as $data) {
                            ?>
                                <tr>
                                    <td class="adminId fw-bold" scope="row"><?php echo $data['ID'] ?></td>
                                    <td id="<?php echo "tdManageAdmin".$data['ID'] ?>" class="adminUserName"><?php echo $data['USER_NAME'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary my-1 btn-update--admin" data-bs-toggle="modal" data-bs-target="#updateAdminModal"><i class="fas fa-cog fa-lg"></i></button>
                                        <button type="button" class="btn btn-danger btn-delete--admin"><i class="fas fa-trash-alt fa-lg"></i></button>
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
        <div class="modal fade" id="updateAdminModal" tabindex="-1" aria-labelledby="updateAdminModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Admin update</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="container">
                                <label class="mt-2 mb-2">ID</label>
                                <input id="adminId" class="form-control" type="text" name="" placeholder="" disabled>
                            </div>
                            <div class="container">
                                <label class="mt-2 mb-2">User name</label>
                                <input id="adminUserName" class="form-control" type="text" name="" placeholder="" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btn-update" type="button" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
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