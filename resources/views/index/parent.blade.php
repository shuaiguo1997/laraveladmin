@section('public')
    @include('index/public')
@show

@yield('content')
<footer class="main-footer  main-footer1">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title"><img src="{{asset(__index__)}}/themes/img/logo-blue.png"></h4>
                    <div class="content recent-post">
                        <div class="recent-single-post"><div class="date">QIANTUI移动公关第一品牌，我们拥有最全面的媒介数据库资源，我们能给您提供全面的服务 。</div></div>
                        <div class="recent-single-post"><a class="post-title" href="#">北京前友推广信息科技有限公司</a><div class="date" style="padding-top:10px;">Copyright © 2017 </div></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget">
                    <h4 class="title"></h4>
                    <div class="content-about">
                        <div><a href="about.html">关于我们</a></div>
                        <div><a href="contact.html">联系我们</a></div>
                        <div><a href="http://www.lagou.com/gongsi/j71361.html" target="_blank">加入我们</a></div>
                        <div><a href="Product.html">产品服务</a></div>
                        <div><a href="Case.html">经典案例</a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget">
                    <h4 class="title"></h4>
                    <div class="content-about">
                        <div><a href="Introduction.html" >平台优势</a></div>
                        <div><a href="Introduction.html">服务条款</a></div>
                        <div><a href="Introduction.html">免责声明</a></div>
                        <div><a href="Introduction.html">合作代理</a></div>
                        <div><a href="Introduction.html">帮助中心</a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="widget">
                    <div class="content-about" >
                        <img src="{{asset(__index__)}}/themes/img/ewm.jpg" width="148" height="148" style="border:1px solid #eee; padding:5px;" title="扫描二维码。关注我们。">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--------footer End-------->
</body>
</html>