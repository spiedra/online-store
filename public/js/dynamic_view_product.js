var section, sectionPromo,
    article,
    articleMainContainer,
    articleFirstRow,
    articleImage,
    articleSecondRow,
    secondRowDescription,
    secondRowInput,
    articleDescription,
    lblPrice,
    btnShoppingCart,
    btnFavorite,
    btnBuy,
    imgShoppingCart,
    imgFav,
    imgBuy,
    mainTittle, productClicked, amountProductsPurchased,
    productName, sortCmbx, containerCmbx, optionSelected,
    optionAsc, optionDesc, secondTitle, containerSecondTitle, lblDiscontedPrice, lblLike;

function initMainElements() {
    section = document.createElement('section');
    article = document.createElement('article');
    mainTittle = document.createElement('h1');
    sortCmbx = document.createElement('select');
    containerCmbx = document.createElement('div');
    optionSelected = document.createElement('option');
    optionAsc = document.createElement('option');
    optionDesc = document.createElement('option');
    modifySection();
    modifyMainTittle();
    modifySortCmbx();
    modifyArticle(section);
}

function initElements() {
    articleMainContainer = document.createElement('div');
    articleFirstRow = document.createElement('div');
    articleImage = document.createElement('img');
    articleSecondRow = document.createElement('div');
    secondRowDescription = document.createElement('div');
    secondRowInput = document.createElement('div');
    articleDescription = document.createElement('p');
    btnBuy = document.createElement('button');
    btnFavorite = document.createElement('button');
    btnShoppingCart = document.createElement('button');
    lblPrice = document.createElement('label');
    imgShoppingCart = document.createElement('img');
    imgFav = document.createElement('img');
    imgBuy = document.createElement('img');
    productName = document.createElement('h5');
    lblDiscontedPrice = document.createElement('label');
    lblLike = document.createElement('label');
}

function initMainElementsPromo() {
    sectionPromo = document.createElement('section');
    article = document.createElement('article');
    containerSecondTitle = document.createElement('div');
    secondTitle = document.createElement('h2');

    modifySectionPromotion();
    modifyArticle(sectionPromo);
}

function setElementParametersPromo(element) {
    initElements();
    modifyArticleMaincontainer();
    modifyArticleFirstRow();
    modifyImageArticle("public/assets/" + element['IMAGE_NAME'], "Icon " + element['IMAGE_NAME']);
    modifyArticleSecondRow();
    modifySecondRowDescription();
    modifyArticleProductName(element['NAME']);
    modifyArticleDescription(element['DESCRIPTION']);

    modifyLabelPrice(element['PRICE'], "label__cost-before");
    modifyDiscountedPriceLbl(element['DISCOUNTED_PRICE']);
    modifyLblLike(element['NUMBER_LIKES'], element['ID']) 
    modifySecondRowInput();
    createButton(element['ID']);
    modifyBtnImages(imgShoppingCart, "public/assets/add_shopping_cart_black_24dp.svg", "Icon shopping cart", btnShoppingCart);
    modifyBtnImages(imgFav, "public/assets/favorite_border_black_24dp.svg", "Icon heard", btnFavorite);
    modifyBtnImages(imgBuy, "public/assets/sell_black_24dp.svg", "Icon sell", btnBuy);
    document.getElementById('mainCustomerView').appendChild(sectionPromo);
}

function setElementParameters(element) {
    initElements();
    modifyArticleMaincontainer();
    modifyArticleFirstRow();
    modifyImageArticle("public/assets/" + element['IMAGE_NAME'], "Icon " + element['IMAGE_NAME']);
    modifyArticleSecondRow();
    modifySecondRowDescription();
    modifyArticleProductName(element['NAME']);
    modifyArticleDescription(element['DESCRIPTION']);

    if (element['DISCOUNTED_PRICE'] !== undefined && element['DISCOUNTED_PRICE'] !== null) {
        modifyLabelPrice(element['PRICE'], "label__cost-before");
        modifyDiscountedPriceLbl(element['DISCOUNTED_PRICE']);
    }else{
        modifyLabelPrice(element['PRICE'], "label__cost-after");
    }
    modifyLblLike(element['NUMBER_LIKES'], element['ID']) 
    modifySecondRowInput();
    createButton(element['ID']);
    modifyBtnImages(imgShoppingCart, "public/assets/add_shopping_cart_black_24dp.svg", "Icon shopping cart", btnShoppingCart);
    modifyBtnImages(imgFav, "public/assets/favorite_border_black_24dp.svg", "Icon heard", btnFavorite);
    modifyBtnImages(imgBuy, "public/assets/sell_black_24dp.svg", "Icon sell", btnBuy);
    document.getElementById('mainCustomerView').appendChild(section);
}

function addChildToElement(element, child) {
    element.appendChild(child);
}

function setAttributeToElement(element, name, value) {
    element.setAttribute(name, value);
}

function addTextNode(text) {
    return document.createTextNode(text);
}

function modifySection() {
    setAttributeToElement(section, "class", "main-section__tours");
}

function modifyArticle(element) {
    setAttributeToElement(article, "class", "section-tour__article");
    addChildToElement(element, article);
}

function modifyMainTittle() {
    setAttributeToElement(mainTittle, "class", "main__tittle");
    mainTittle.appendChild(addTextNode("Online Store"));
    addChildToElement(section, mainTittle);
}

function modifySortCmbx() {
    setAttributeToElement(containerCmbx, "class", "container__cmbx");
    addChildToElement(section, containerCmbx);

    setAttributeToElement(sortCmbx, "id", "sortSelect");
    setAttributeToElement(sortCmbx, "class", "form-select");

    setAttributeToElement(optionSelected, "disabled", "")
    setAttributeToElement(optionSelected, "selected", "")
    optionSelected.appendChild(addTextNode("Sort by price"));

    optionAsc.appendChild(addTextNode("Lower cost"));

    optionDesc.appendChild(addTextNode("More expensive"));

    addChildToElement(sortCmbx, optionSelected);
    addChildToElement(sortCmbx, optionDesc);
    addChildToElement(sortCmbx, optionAsc);

    addChildToElement(containerCmbx, sortCmbx);
}

function modifyArticleMaincontainer() {
    setAttributeToElement(articleMainContainer, "class", "article__main-container");
    addChildToElement(article, articleMainContainer);
}

function modifyArticleFirstRow() {
    setAttributeToElement(articleFirstRow, "class", "article__first-row");
    addChildToElement(articleMainContainer, articleFirstRow);
}

function modifyImageArticle(imagePath, imageAlt) {
    setAttributeToElement(articleImage, "class", "article__image-tour");
    setAttributeToElement(articleImage, "src", imagePath);
    setAttributeToElement(articleImage, "alt", imageAlt);
    addChildToElement(articleFirstRow, articleImage);
}

function modifyArticleSecondRow() {
    setAttributeToElement(articleSecondRow, "class", "article__second-row");
    addChildToElement(articleMainContainer, articleSecondRow);
}

function modifySecondRowDescription() {
    setAttributeToElement(secondRowDescription, "class", "second-row__description");
    addChildToElement(articleSecondRow, secondRowDescription);
}

function modifyArticleProductName(pName) {
    setAttributeToElement(productName, "class", "mb-3");
    productName.appendChild(addTextNode(pName));
    addChildToElement(secondRowDescription, productName);
}

function modifyArticleDescription(description) {
    articleDescription.appendChild(addTextNode("Description: " + description));
    addChildToElement(secondRowDescription, articleDescription);
}

function modifyLabelPrice(price, msjClass) {
    setAttributeToElement(lblPrice, "class", msjClass);
    lblPrice.appendChild(addTextNode(price+"$"));
    addChildToElement(secondRowDescription, lblPrice);
}

function modifySecondRowInput() {
    setAttributeToElement(secondRowInput, "class", "secod-row__input");
    addChildToElement(articleMainContainer, secondRowInput);
}

function createButton(idProduct) {
    setAttributeToElement(btnShoppingCart, "id", idProduct);
    setAttributeToElement(btnShoppingCart, "class", "btn btn-warning btn-sales btn-shopping-cart");
    setAttributeToElement(btnShoppingCart, "data-bs-toggle", "modal");
    setAttributeToElement(btnShoppingCart, "data-bs-target", "#amountModal");
    addChildToElement(secondRowInput, btnShoppingCart);

    setAttributeToElement(btnFavorite, "id", idProduct);
    setAttributeToElement(btnFavorite, "class", "btn btn-warning btn-sales btn-fav");
    addChildToElement(secondRowInput, btnFavorite);

    setAttributeToElement(btnBuy, "id", idProduct);
    setAttributeToElement(btnBuy, "class", "btn btn-warning btn-sales btn-buy");
    setAttributeToElement(btnBuy, "data-bs-toggle", "modal");
    setAttributeToElement(btnBuy, "data-bs-target", "#amountModalDirect");

    addChildToElement(secondRowInput, btnBuy);
}

function modifyBtnImages(element, imagePath, imageAlt, btnParent) {
    setAttributeToElement(element, "src", imagePath);
    setAttributeToElement(element, "alt", imageAlt);
    addChildToElement(btnParent, element);
    addChildToElement(secondRowInput, btnParent);
}

function modifyLblLike(likes, idProduct) {
    setAttributeToElement(lblLike, "id", "lblLike"+idProduct);
    setAttributeToElement(lblLike, "class", "d-block mt-3");
    lblLike.appendChild(addTextNode("Likes: " + likes));
    addChildToElement(secondRowDescription, lblLike);
}

// Promotions

function modifySectionPromotion() {
    setAttributeToElement(sectionPromo, "class", "main-section__tours");
    modifySecondTitleContainer();
}

function modifySecondTitleContainer() {
    setAttributeToElement(containerSecondTitle, "class", "container-fluid d-flex justify-content-center bg-warning");
    addChildToElement(sectionPromo, containerSecondTitle);
    modifySecondTitle();
}

function modifySecondTitle() {
    setAttributeToElement(secondTitle, "class", "h2");
    secondTitle.appendChild(addTextNode("Promotions"));
    addChildToElement(containerSecondTitle, secondTitle);
}

function modifyDiscountedPriceLbl(price) {
    setAttributeToElement(lblDiscontedPrice, "class", "label__cost-after container d-inline ml-1");
    lblDiscontedPrice.appendChild(addTextNode(price+"$"));
    addChildToElement(secondRowDescription, lblDiscontedPrice);
}