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
                    <table class="table table-bordered" style="width: 100%">
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
                            <th style="width: 10%"><% user.id %></th>
                            <td style="width: 70%">
                               <div> <% user.name %>  </div>
                               <div><% user.age %> </div>
                                <div><% user.address %></div>
                            </td>
                            <td style="width: 20%"><img style="width: 100%;" src="uploads/<% user.link %>" alt=""></td>

                            <td style="width: 10%">
                                <div ><button id="button_edit" ng-click="modal_edit(user)"><img style="width: 40%" src="images/edit.jpg" alt=""></button></div>
                                <div style="height: 40px"></div>
                                <div ><button id="button_edit" ng-click="delete(user)" ><img style="width: 50%" src="images/delete.png" alt=""></button></div>
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