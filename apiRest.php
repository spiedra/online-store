<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        // require 'libs/configuration.php';
        // require 'model/ProductosModel.php';

        // $producto=new ProductosModel();
        // $data=$producto->buscarProducto($_GET['id']);
        // header("HTTP/1.1 200 OK");
        // echo json_encode($data);
        // exit();
    } else {
    }
} // GET

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['userNameAdmin'], $_POST['passwordAdmin'], $_POST['passwordConfirmedAdmin'])) {
        require 'libs/configuration.php';
        require 'model/AdminModel.php';

        $adminModel = new AdminModel();
        $response = $adminModel->registerAdmin($_POST['userNameAdmin'], $_POST['passwordAdmin']);

        if ($response == 1) {
            http_response_code(200);
            echo json_encode($response);
        } else {
            http_response_code(406);
            echo json_encode($response);
        }
        exit();
    } else if (isset($_POST['userName'], $_POST['password'])) {
        require 'libs/configuration.php';
        require 'model/SessionModel.php';

        $sessionModel = new SessionModel();
        $response = $sessionModel->validateSession($_POST['userName'], $_POST['password']);
        if ($response == 1) {
            http_response_code(200);
            echo json_encode($response);
        } else if ($response == 2) {
            http_response_code(200);
            echo json_encode($response);
        } else {
            http_response_code(404);
            echo json_encode(-1);
        }
        exit();
    }
} // POST

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
} // PUT

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
} // DELETE    
