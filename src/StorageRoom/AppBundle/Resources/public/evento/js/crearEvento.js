var myApp = angular.module('myApp', []);


myApp.controller('eventoCtrl',[
    '$scope',
    function($scope){
        $scope.productos = [];
        $scope.agregarProducto = function(){
            $scope.productos.push({nombre: $scope.productoNuevo.nombre, precio: $scope.productoNuevo.precio });
            $scope.productoNuevo.nombre = "";
            $scope.productoNuevo.precio = "";
            $scope.gastoTotal();
        };

        $scope.quitarProducto = function(index){
            $scope.productos.splice(index, 1);
            $scope.gastoTotal();
        };

        $scope.gastoTotal = function(){
            var gasto = 0;
            for (var i = $scope.productos.length - 1; i >= 0; i--) {
                gasto = gasto + $scope.productos[i].precio;
            }
            return gasto;
        };
    }
]);