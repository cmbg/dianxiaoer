
<html>
<head>
    <title>Laravel 商店</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<nav class="navbar navbar-default  " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Laravel 商店

            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/order">我的订单 <span class="fa fa-briefcase"></span></a></li>
                <li><a href="/cart">购物车 <span class="fa fa-shopping-cart"></span></a></li>
                <li><a href="/auth/login">登录</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @foreach( $products as $product)

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" >
                        <img src="/photoes/p{{$product['id']}}.jpg" class="img-responsive">
                        <div class="caption">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <h3>{{$product['name']}}</h3>
                                </div>
                                <div class="col-md-6 col-xs-6 price">
                                    <h3>
                                        <label>{{$product['price']}}</label></h3>
                                </div>
                            </div>
                            <p>{{$product['des']}}</p>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="/addcart/{{$product['id']}}" class="btn btn-success btn-product"><span class="fa fa-shopping-cart"></span> 加入购物车</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach


            </div>
        </div>
    </div>

</div>
</body>

</html>