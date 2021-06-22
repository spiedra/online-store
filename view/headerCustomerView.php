<header class="container-fluid page-header m-0 p-0 min-h-256 page-header">
    <nav class="container-fluid navbar navbar-expand-md navbar-light bg-warning flex-row flex-nowrap ">
        <div class="d-flex align-items-start justify-content-end flex-grow-1">
            <a href="?controller=Session&action=logOut" class="btn btn-primary me-auto"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="justify-content-end">
            <button id="btn__shopping-cart" class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#shoppingCartModal"><img src="public/assets/shopping_cart_black_24dp.svg" alt="Icon shopping cart" /></button>
            <button id="btn__search" class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#searchModal"><img src="public/assets/search_black_24dp.svg" alt="Icon search" /></button>
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
                        <a href="?controller=Category&action=showCategoryRegisterView" class="nav-link text-dark">Create category</a>
                    </li>
                    <li class="nav-item d-flex d-md-none d-lg-none">
                        <a href="?controller=Promotion&action=showPromotionView" class="nav-link text-dark">Create promotions</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>