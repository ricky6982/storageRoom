var myApp = angular.module('myApp',[]);

myApp.controller('resumenCtrl',[
    '$scope',
    function($scope){
        $scope.resumen = resumen;
        $scope.participantes = participantes;
        console.log($scope.resumen);
        console.log($scope.participantes);

        $scope.saldoTotal = function(){
            return $scope.resumen.recaudacion + $scope.resumen.saldoAnterior - $scope.resumen.gastoTotal;
        };
    }
]);