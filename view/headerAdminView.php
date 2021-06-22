<header class="container-fluid page-header m-0 p-0 page-header">
    <nav class="navbar navbar-expand-md navbar-light bg-warning flex-row flex-nowrap">
        <div class="mx-2">
            <a href="?controller=Session&action=logOut" class="btn btn-primary me-auto"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="container-fluid justify-content-end">
            <div class="dropdown d-none d-md-flex d-lg-flex">
                <button class="btn btn-secondary dropdown-toggle btn-dropdow text-dark" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Register
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="nav-item">
                        <a href="?controller=Admin&action=showAdminRegisterView" class="dropdown-item text-dark">Register admin</a>
                    </li>
                    <li class="nav-item">
                        <a href="?controller=Product&action=showProductRegisterView" class="dropdown-item text-dark">Register products</a>
                    </li>
                </ul>
            </div>
            <div class="dropdown d-none d-md-flex d-lg-flex">
                <button class="btn btn-secondary dropdown-toggle btn-dropdow text-dark" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    Create
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                    <li class="nav-item">
                        <a href="?controller=Category&action=showCategoryRegisterView" class="dropdown-item text-dark">Create category</a>
                    </li>
                    <li class="nav-item">
                        <a href="?controller=Promotion&action=showPromotionView" class="dropdown-item text-dark">Create promotions</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-end align-items-center flex-column">
                <div class="container d-flex justify-content-end">
                <button class="navbar-toggler text-right" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </div>
                <div class="collapse navbar-collapse flex-column" id="toggleMobileMenu">
                    <ul class="nav ms-auto text-dark flex-column flex-md-row align-items-end justify-content-evenly">
                        <li class="nav-item d-flex d-md-none d-lg-none">
                            <a href="?controller=Admin&action=showAdminRegisterView" class="nav-link text-dark">Register admin</a>
                        </li>
                        <li class="nav-item d-flex d-md-none d-lg-none">
                            <a href="?controller=Product&action=showProductRegisterView" class="nav-link text-dark">Register products</a>
                        </li>
                        <li class="nav-item d-flex d-md-none d-lg-none">
                            <a href="?controller=Category&action=showCategoryRegisterView" class="nav-link text-dark">Create category</a>
                        </li>
                        <li class="nav-item d-flex d-md-none d-lg-none">
                            <a href="?controller=Promotion&action=showPromotionView" class="nav-link text-dark">Create promotions</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-dark">Report</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>