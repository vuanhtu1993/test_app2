var myApp = angular.module('myApp',[],function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
myApp.controller('DemoController',function () {
   var demo = this;

   demo.modal = function () {
       $('#myModal').modal('show');
   }
});