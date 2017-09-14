<html>
<head>
    <meta content="{{URL::asset('')}}" name="website" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Angular-Laravel</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body ng-app="myApp" ng-controller="DemoController">

@include('layouts.header')
<div class="container">
    <div class="searching-result">
        <span style="font-size: 28px; color: black">Search results for “<% search %>”</span>
    </div>
    <div class="row" style="margin-top: 20px">
        <div class="contents">
            <div>
                <div class="users-page">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Information</th>
                            <th style="text-align: center">Image</th>
                            <th>Edit/Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="user in users">
                            <th><% user.id %></th>
                            <td><% user.name %> <br>
                                <% user.age %> <br>
                                <% user.address %>
                            </td>
                            <td style="width: 30%"><img style="width: 100%;" src="uploads/<% user.link %>" alt=""></td>

                            <td>
                                <div><button ng-click="modal_edit(user)">Edit</button></div>
                                <div><button  ng-click="delete(user)" >Del</button></div>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.modal')
    @include('layouts.modal_edit')
</div>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
<script src="angular/ng-file-upload-all.min.js"></script>
<script src="angular/ng-file-upload-shim.min.js"></script>
<script src="angular/ng-file-upload.min.js"></script>
<script src="angular/demo.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>