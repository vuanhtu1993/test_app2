var link = $('meta[name="website"]').attr('content');

//inject directives and services.
var myApp = angular.module('myApp', ['ngFileUpload'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
}).constant('API', link);

myApp.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
// get data file from input by FILES in directive
            element.bind('change', function () {
                scope.$apply(function () {
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);
myApp.controller('DemoController', function ($scope, $http, API) {
    $scope.load = function () {
        $http({
            method: 'GET',
            url: 'users'
        }).then(function (response) {
            $scope.users = response.data;
        })
    };
    $scope.load();

    //fix modal add
    $('#upload').change(function () {
        if ($(this).val() !== "") {
            $("#imgThumbnail").css('display', 'block');
        }
        $scope.files = null;
    });

    $scope.modal = function () {
        console.log($scope.form_add);
        $scope.form_add.$setUntouched();
        $('#myModal').modal('show');
    };
    $scope.close_modal = function () {
        $('#myModal').modal('hide');
        $('#myModal_edit').modal('hide');
    };
// editing modal
    $scope.modal_edit = function (user) {
       // console.log($scope.form_edit);
        // console.log($scope.files_edit);
        $scope.files_edit = null;   // fix bug 1 show image at edit form
        console.log($scope.files_edit);
        $scope.edit_user = angular.copy(user);
        //fix bug 2 cant show edit_users.age
        $scope.edit_user.age = Number($scope.edit_user.age);
        $('#myModal_edit').modal('show');
    };


    // upload on file select or drop
    //FILES from directive
    $scope.upload = function () {
        // if $scope.files != undefined thì gán thêm file vào obj
        //if not thì ko có obj không có file vì bên controller dã kiểm tra hasFile
        var obj = {};
        obj.name = $scope.users.name;
        obj.age = $scope.users.age;
        obj.address = $scope.users.address;
        if ($scope.files) {
            //alert('xxx');
            obj.file = $scope.files;
        }
        // Execute to check form_add.$valid one more time
        if ($scope.form_add.$valid) {
            $http({
                method: 'POST',
                url: 'users',
                headers: {'Content-Type': undefined},
                data: obj,
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
                $scope.files = null;
               // $scope.form_add = null; can not set $scope.form_add =null or ="";

                console.log('Success ' + resp.config.data.username + 'uploaded. Response: ' + resp.data);
            }, function (resp) {
                console.log('Error status: ' + resp.status);
            });
        }

    };
// edit user
    $scope.update = function () {
        var object = {};
        object.id = $scope.edit_user.id;
        object.name = $scope.edit_user.name;
        object.age = $scope.edit_user.age;
        object.address = $scope.edit_user.address;
        if ($scope.files_edit) {
            object.file = $scope.files_edit;//directive file-model(parameter)
        }
        console.log($scope.files_edit);
        console.log(object.file);
        //check validation on more time before sent http
        if ($scope.form_edit.$valid) {
            $http({
                method: 'POST',
                url: 'update/'+ $scope.edit_user.id,
                headers: {'Content-Type': undefined},
                data: object,
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
                console.log(resp);
                console.log(object);
                $scope.load();
                $scope.close_modal();
                // console.log('Success ' + resp.config.data.username + 'uploaded. Response: ' + resp.data);
            }, function (resp) {
                console.log('Error status: ' + resp.status);
            })
        }

    };

    //delete user
    $scope.delete = function (user) {
        $scope.user_delete = user;
        if (confirm('Are you sure to delete?')) {
            $http({
                method: 'DELETE',
                url: 'users/' + $scope.user_delete.id,
                data: {
                    id: $scope.user_delete.id
                }
            }).then(function (resp) {
                console.log(resp);
                $scope.load();
            })
        }
    };
    
    // sort data
    $scope.sortType     = 'name';
    $scope.sortReverse  = false;

});