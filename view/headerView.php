<header class="container-fluid page-header">
    <div class="row">
        <nav class="navbar navbar-expand-md navbar-light bg-warning">
            <div class="container"> <a href="#" class="navbar-brand">
                <img src="public/assets/shopping-bag.svg" alt="icon">
            </a></div>
            <div class="container justify-content-end">
                <div class="dropdown d-none d-md-flex d-lg-flex">
                    <button class="btn btn-secondary dropdown-toggle btn-dropdow text-dark" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Register
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li class="nav-item">
                            <a href="?controller=Admin&action=showAdminRegisterView" class="nav-link text-dark">Register admin</a>
                        </li>
                        <li class="nav-item">
                            <a href="?controller=Product&action=showProductRegisterView" class="nav-link text-dark">Register products</a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown d-none d-md-flex d-lg-flex">
                    <button class="btn btn-secondary dropdown-toggle btn-dropdow text-dark" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        Create
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <li class="nav-item">
                            <a href="?controller=Product&action=showProductRegisterView" class="nav-link text-dark">Create category</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-dark">Create promotions</a>
                        </li>
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-grow-0" id="toggleMobileMenu">
                    <ul class="nav ms-auto text-dark flex-column flex-md-row align-items-end justify-content-evenly">
                        <li class="nav-item d-flex d-md-none d-lg-none">
                            <a href="?controller=Admin&action=showAdminRegisterView" class="nav-link text-dark">Register admin</a>
                        </li>
                        <li class="nav-item d-flex d-md-none d-lg-none">
                            <a href="?controller=Product&action=showProductRegisterView" class="nav-link text-dark">Register products</a>
                        </li>
                        <li class="nav-item d-flex d-md-none d-lg-none">
                            <a href="?controller=Product&action=showProductRegisterView" class="nav-link text-dark">Create category</a>
                        </li>
                        <li class="nav-item d-flex d-md-none d-lg-none">
                            <a href="#" class="nav-link text-dark">Create promotions</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-dark">Report</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>