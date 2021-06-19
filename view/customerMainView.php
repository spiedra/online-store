<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Juan Carlos Sequeira Piedra" />
    <meta name="keywords" content="store, covid, online, clean" />
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="public/css/style1.css" />
    <title>Online store</title>
</head>

<body class="page-body">
    <?php
    include_once 'headerView.php';
    ?>
    <main id="page-main" class="page-main page-main--tours">
        <section class="main-section__tours">
            <div class="section-tours__header">
                <h2 class="section-tour__tittle">Tours para toda la familia</h2>
                <div class="container__amount">
                    <img class="amount-tour__icon" src="public\assets\shopping-bag.svg" alt="Carrito de compras" />
                    <p id="amount-tours" class="amout-tours"></p>
                </div>
            </div>
            <h3 class="section__article-tittle">Tours con descuento</h3>
            <article class="section-tour__article">
                <div class="article__main-container">
                    <div class="article__first-row">
                        <img class="article__image-tour" src="public\assets\shopping-bag.svg" alt="Hombre caminando en montaña" />
                    </div>
                    <div class="article__second-row">
                        <div class="second-row__description">
                            <p>Las mejores caminatas por la montaña con paisajes increibles viviendo una aventura con
                                animales.</p>
                            <label class="label__cost-before">₡25000</label>
                            <label id="label_cost_1" class="label__cost-after">₡15000</label>
                        </div>
                        <div class="secod-row__input">
                            <label class="tour__label">Cantidad de personas:</label>
                            <input id="input_tour_1" class="tour__input" type="number" />
                            <input id="button_tour_1" class="tour__button" type="button" value="Agregar al carrito">
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>
<?php
// require_once 'footerView.php';
?>