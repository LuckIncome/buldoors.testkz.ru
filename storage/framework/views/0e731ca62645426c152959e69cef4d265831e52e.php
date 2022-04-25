<nav id="top">
    <div class="container">
        <div class="row topLine align-items-center">
            <div class="col d-none d-lg-flex">

                <!--search-->
                <form class="input-group" id="search" data-ng-controller="SearchController as sc">`
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input
                        class="form-control"
                        name="search"
                        placeholder="Я хочу купить..."
                        type="text"
                        data-ng-model="searchInput"
                    >
                    <span class="input-group-btn">
                        <button class="button" data-ng-click="sc.searchByInput(searchInput)">Найти</button>
                    </span>
                    <div class="items">
                        <a data-ng-repeat="item in sc.searchItems track by $index" class="item"
                           data-ng-href="{{item.full_link}}">{{item.item}}:
                            <span>{{item.name}}</span> </a>
                        <p data-ng-if="sc.searchItems.length < 1">По вашему запросу ничего не найдено.</p></div>
                </form>
                <!-- search-->

            </div>
            <div class="col-12 col-lg-auto p-0 px-sm-2">
                <ul class="nav justify-content-around justify-content-sm-between justify-content-lg-end">
                    <li class="nav-item"><a class="nav-link button instaBtn" href="" target="_blank"><i
                                class="fa fa-instagram"></i></a></li>
                    <li class="nav-item"><a class="nav-link button emailBtn" href="mailto:info@buldoors.kz">info@buldoors.kz</a>
                    </li>
                    <li class="nav-item"><a class="nav-link button phoneBtn" href="tel:+77788888848"> +7 (778) <span>888–88–48</span></a>
                    </li>
                    <li class="nav-item d-none d-md-inline-block"><a class="nav-link button yellowBtn" href="#"
                                                                     data-toggle="modal" data-target="#callback">Заказать
                            звонок</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<header data-ng-controller="HeaderController as hc">
    <div class="container" data-ng-init="hc.init()">
        <div class="row headerLine align-items-start align-items-xl-center">
            <div class="col-auto order-first headerLogo">
                <a href="/">
                    <img src="/img/logo_header_new.jpg" alt="логотип Бульдорс">
                </a>
            </div>
            <div id="mainIcons" class="col col-xl-auto order-xl-last order-2 justify-content-end pl-0 px-sm-3 px-xl-2">
                <ul class="list-inline navIcons">
                    <li class="list-inline-item d-none d-lg-block">

                    </li>
                    <li class="list-inline-item">
                        <!--cart-->
                        <div id="cart" data-ng-controller="CartController as cart">
                            <a href="<?php echo e(route('cart.index')); ?>" id="carttotal" class="button" data-ng-init="cart.getCartContent()">
                                <img src="/img/cart.svg" alt="cart">
                                <span data-ng-if="hc.cartItems > 0" id="cart-total">{{hc.cartItems}}</span>
                            </a>
                        </div>
                        <!--cart-->
                    </li>
                    <li class="list-inline-item d-none d-lg-block">
                        <a class="button" id="comparetotal" href="<?php echo e(route('compare.index')); ?>">
                            <img src="/img/compare.svg" alt="compare-head">
                            <span data-ng-if="hc.compareItems > 0" id="compare-total">{{hc.compareItems}}</span>
                        </a>
                    </li>
                    <li class="list-inline-item d-block d-lg-none">
                        <a class="button" href="#" data-toggle="modal" data-target="#searchModal"><img src="/img/search.svg" alt="Иконка Поиск"></a>
                    </li>
                </ul>
            </div>
            <div id="mainMenu" class="col-auto col-sm-2 col-xl order-last order-xl-2 pr-2 pl-0 p-sm-0">
                <nav id="menu" class="navbar navbar-expand-xl navbar-light p-0">
                    <button class="navbar-toggler ml-auto border-0" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-expanded="false" aria-controls="mainNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php echo e(menu('frontend', 'partials.header-menu')); ?>

                </nav>
            </div>
        </div>
    </div>


</header>
<?php /**PATH /home/users/b/buldoorskz/domains/buldoors.kz/resources/views/partials/header.blade.php ENDPATH**/ ?>