<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Juan Carlos Sequeira Piedra" />
    <meta name="keywords" content="store, covid, online, clean" />
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/css/style.css" />
    <title>Online Store</title>
</head>

<body class="py-5 px-0">
    <main class="container-fluid d-flex align-items-center justify-content-center">
        <form class="container bg-warning form__sign-in" method="post" action="?controller=Customer&action=registerCustomer">
            <div class="container d-flex align-items-center justify-content-center">
                <h1 class="mt-3 text-center">Sign in</h1>
            </div>
            <div class="container container--one">
                <label class="mb-2">User name</label>
                <input class="form-control" type="text" name="userNameCustomer" placeholder="Enter user name" required>
            </div>
            <div class="container container--one">
                <label class="mb-2">First name</label>
                <input class="form-control" type="text" name="firstName" placeholder="Enter your first name" required>
            </div>
            <div class="container container--one">
                <label class="mb-2">Last Name</label>
                <input class="form-control" type="text" name="lastName" placeholder="Enter your last name" required>
            </div>
            <div class="container container--one">
                <label class="mb-2">Date of birth</label>
                <input class="form-control" type="date" name="dateBirth" placeholder="Enter your age" required>
            </div>
            <div class="container container--one">
                <label class="mb-2">Address</label>
                <input class="form-control" type="text" name="address" placeholder="Enter your address" required>
            </div>
            <div class="container container--two">
                <label class="mb-2">Password</label>
                <input type="password" class="form-control" name="passwordCustomer" placeholder="Password" required>
            </div>
            <div class="container container--three-sign-in">
                <label class="mb-2">Confirm password</label>
                <input type="password" class="form-control" name="passwordConfirmedCustomer" placeholder="Password" required>
            </div>
            <div class="container d-flex justify-content-center container--four">
                <a href="?controller=Index&action=showIndexView" class="btn btn-danger">Go back</a>
                <button type="submit" class="btn btn-primary mx-2">Sign in</button>
            </div>
        </form>
    </main>
    </div>
    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>