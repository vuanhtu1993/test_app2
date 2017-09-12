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
    //DISPLAY DATA TO VIEW
    $scope.load = function () {
        $http.get('http://localhost/test_app2/public/users')
            .then(function (response) {
                $scope.users = response.data;
            })
    };
    $scope.load();

    $scope.close_modal = function () {
      $('#myModal').modal('hide');
    };

    $scope.modal = function () {
      $('#myModal').modal('show');
    };

    var formdata = new FormData();
    $scope.getTheFiles = function ($files) {
        angular.forEach($files,function (value,key) {
            console.log(value);
            console.log(key);
            formdata.append('file',value);
        });
        formdata.append('name',$scope.users.name);
        formdata.append('age',$scope.users.age);
        formdata.append('address',$scope.users.address)

    };


    // NOW UPLOAD THE FILES.
    $scope.uploadFiles = function () {
        // SEND THE FILES.
        $http.post('http://localhost/test_app2/public/users', formdata, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
            .then($scope.close_modal())
            .then($scope.load());
    }
});