var link= $('meta[name="website"]').attr('content');

//inject directives and services.
var myApp = angular.module('myApp', ['ngFileUpload'],function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
}).constant('API', link);

myApp.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
// get data file from input by FILES in directive
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);
myApp.controller('DemoController', function ($scope, $http, API) {

    $scope.load = function () {
      $http({
          method:   'GET',
          url:      'users'
      }).then(function (response) {
          $scope.users = response.data;
      })
    };
    $scope.load();

    //fix modal
    $('#upload').change(function() {
        if($(this).val() !== "") {
            $("#imgThumbnail").css('display', 'block');
        }
        $scope.files = null;
    });

    $scope.modal = function () {
        // $('#imgThumbnail').attr('src', '');
        // document.getElementById("upload").value = "";
        // if ($("#imgThumbnail").attr('src') == '') {
        //     $("#imgThumbnail").css('display', 'none');
        // }
        // $scope.files = null;

      $('#myModal').modal('show');
    };
    $scope.close_modal = function () {
      $('#myModal').modal('hide');
    };

    // upload on file select or drop
    //FILES from directive
    $scope.upload = function () {
        $http({
            method : 'POST',
            url: 'users',
            headers: {'Content-Type': undefined},
            data: {
                file : $scope.files,
                name : $scope.users.name,
                age  : $scope.users.age,
                address: $scope.users.address
            },
            transformRequest: function (data, headersGetter) {
                var fd = new FormData();
                angular.forEach(data, function (value, key) {
                    fd.append(key, value);
                });
                var headers = headersGetter();
                delete headers['Content-Type'];
                return fd;
            }
        }).then(function (resp) {
            $scope.load();
            $scope.close_modal();
            $scope.users.image = '';
            $scope.files = null;
            console.log('Success ' + resp.config.data.username + 'uploaded. Response: ' + resp.data);
        }, function (resp) {
            console.log('Error status: ' + resp.status);
        });
    };

});