<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>laravel8企业官网测试@yield('title')</title>
    <link rel="icon" type="image/png" href="themes/icon/favicon.png">

    <!-- 新 Bootstrap IE8 CSS 文件 -->
    <script src="{{asset(__index__)}}/js/html5shiv.min.js"></script>

    <!-- 新 Bootstrap IE9 CSS 文件 -->
    <script src="{{asset(__index__)}}/js/respond.min.js"></script>

    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="{{asset(__index__)}}/css/bootstrap.min.css">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="{{asset(__index__)}}/js/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="{{asset(__index__)}}/js/bootstrap.min.js"></script>

    <!-- 最新的 Bootstrap  自定义样式 文件 -->
    <link href="{{asset(__index__)}}/themes/css/home.css" rel="stylesheet"  type="text/css">

</head>
<body>

<!--------header begin-------->
<div class=" container-fluid header-main header-section">
    <div class="header-back"></div>
    <nav class="navbar navbar-default  navbar-brands  navbar-abouts">
        <div class="container">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.html" class="navbar-logo navbar-brand "></a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a aria-expanded="false" role="button" aria-haspopup="true"  class="dropdown-toggle" href="index.html" title="Home">首页</a>
                    </li>
                    <li class="">
                        <a aria-expanded="false" role="button" aria-haspopup="true"  class="dropdown-toggle" href="about.html"  title="About us">关于我们</a>
                    </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" aria-haspopup="true"  class="dropdown-toggle" href="Product.html" title="Product service">产品服务</a>
                    </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" aria-haspopup="true"  class="dropdown-toggle" href="Case.html" title="Classic case">经典案例</a>
                    </li>
                    <!--<li class="dropdown">-->
                        <!--<a aria-expanded="false" role="button" aria-haspopup="true"  class="dropdown-toggle" href="Service.html" title="Micro business service" >微商服务</a>-->
                    <!--</li>-->
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" aria-haspopup="true"  class="dropdown-toggle" href="contact.html" title="Contact us">联系我们</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container container-zindex container-index">
        <img class="img-responsive" src="{{asset(__index__)}}/themes/img/showcase-header.png" about="" alt="">
        <h1>移动公关第一品牌</h1>
        <p>未来,我们一直在路上 移动互联网时代的创意革命 “北京前推”</p>
    </div>

</div>