var myApp = angular.module('myApp',[],function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
//Directive
myApp.directive('ngFiles', ['$parse', function ($parse) {

    function fn_link(scope, element, attrs) {
        var onChange = $parse(attrs.ngFiles);
        element.on('change', function (event) {
            onChange(scope, { $files: event.target.files });
        });
    };

    return {
        link: fn_link
    }
} ]);



//Controller
myApp.controller('DemoController', function ($scope, $http) {

    $scope.modal = function () {
      $('#myModal').modal('show');
    };

    var formdata = new FormData();
    $scope.getTheFiles = function ($files) {
        console.log($files); // get file immediately after input
    };

    // NOW UPLOAD THE FILES.
    $scope.uploadFiles = function () {

        var request = {
            method: 'POST',
            url: 'http://localhost/test_app2/public/users',
            data: formdata,
            headers: {
                'Content-Type': undefined
            }
        };

        // SEND THE FILES.
        $http(request)
            .success(function (d) {
                alert(d);
            })
            .error(function () {
            });
    }
});