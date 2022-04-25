(function (dvericity) {
    "use strict";
    dvericity.controller('ProductController', ['$rootScope','$scope','$window','$http','Api',function ($rootScope, $scope, $window, $http, Api) {
        var pc = {
            inCart : false,
            inCompare : false,
            activeInterior: false,
            intOptionsActive: true,
            product: {},
            init:function (slug) {
                Api.getCurrentProduct(slug).then(function (response) {
                    if (response.data){
                        pc.product = response.data.product;
                    }
                });
            },
            showInterior: function () {
                  pc.activeInterior = !pc.activeInterior;
            },
            addToCart: function (product_id) {
                Api.addToCart(product_id).then(function (response) {
                    if (response.data){
                        pc.inCart = true;
                        hc.getCartItems();
                        cart.getCartContent();
                    }
                });
            },
            removeQuantity: function (product) {
                angular.forEach(cart.products, function (item) {
                    if (item === product) {
                        if (item.quantity < 1){
                            cart.deleteItem(item);
                        }
                        item.quantity = item.quantity - 1;
                        product.quantity = item.quantity;
                    }
                });

                Api.updateCart(product.id,product.quantity).then(function (response) {
                    if (response.data) {
                        cart.getResponseData(response.data);
                    }
                });
            },
            addQuantity: function (product) {
                angular.forEach(cart.products, function (item) {
                    if (item === product) {
                        item.quantity = item.quantity + 1;
                        product.quantity = item.quantity;
                    }
                });
                Api.updateCart(product.id,product.quantity).then(function (response) {
                    if (response.data) {
                        cart.getResponseData(response.data);
                    }
                });
            },
            addToCompare: function (product_id) {
                Api.addToCompare(product_id).then(function (response) {
                    if (response.data){
                        pc.inCompare = true;
                        pc.product.inCompare = true;
                        hc.getCompareItems();
                    }
                });
            },
            deleteCompare: function (product_id) {
                Api.removeFromCompare(product_id).then(function (response) {
                    if (response.data) {
                        pc.inCompare = false;
                        pc.product.inCompare = false;
                        hc.getCompareItems();
                    }
                });
            }
        };

        window.pc = pc;
        angular.extend(pc, this);
        return pc;
    }]);
})(dvericity);
