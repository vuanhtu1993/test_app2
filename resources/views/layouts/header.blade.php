<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

                <a style="padding-top: 0; padding-left: 2em; " class="navbar-brand" href="#">
                    <img style="width: 50px; float: left" src="images/scuti-logo.png" alt="">
                </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            </ul>
            {{--search--}}
            <div class="col-xs-12 col-sm-8 col-md-8">
            <div class="search-bar" >
                <input type="text" placeholder="Search" ng-model="search">
            </div>
            </div>
            {{--end search--}}
            <ul class="nav navbar-nav navbar-right">
                <li><a style="color: rgb(89, 205, 227); font-weight: bold" href="#" ng-click="modal()">Link</a></li>
                <li class="dropdown">
                    <a style="color: orange; font-weight: bold" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>