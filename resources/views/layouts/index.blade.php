<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Angular-Laravel</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    <script src="angular/demo.js"></script>
</head>

<body ng-app="myApp" ng-controller="DemoController">

@include('layouts.header')
<div class="container">
    <div class="searching-result">
        <span style="font-size: 28px; color: black">Search results for “<% search %>”</span>
    </div>
    <div class="row" style="margin-top: 20px">
        <div class="contents">
            <div class="col-xs-3 col-sm-3 col-md-3">
                {{--menu left--}}
                <div class="menu-left">
                    <ul> User
                        <li><a href=""></a>Add</li>
                        <li>Add</li>
                        <li>Add</li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-9">
                <div class="users-page" >
                    <div class="row">
                        <div class="user-info">
                            <div class="col-xs-4 col-sm-4 col-sm-4">
                                <div class="image-user">
                                    image

                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="user-name">
                                    name
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <div class="edit">
                                    edit
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.modal')
</div>







<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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