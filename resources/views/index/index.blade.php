@extends('index/parent')
@section('content')
    <!--------container begin-------->
<div class="container marketing">
    <div class="row">
        <div class="col-lg-3">
            <img width="140" height="140" alt="Generic placeholder image" src="{{asset(__index__)}}/themes/img/pd/Spread.png" class="">
            <h2>社会化媒体传播</h2>
            <p>以落地活动为主要传播信息，定期将文字、图片及视频短片传到官方微信、微博进行传播。</p>
        </div><!-- 社会化媒体传播 -->
        <div class="col-lg-3">

            <img width="140" height="140" alt="Generic placeholder image" src="{{asset(__index__)}}/themes/img/pd/mobile.png" class="">
            <h2>移动互联网搭建</h2>
            <p>根据客户的需求，市场状况，企业情况等进行搭建适合客户的微信。 </p>
        </div><!-- 移动互联网搭建 -->
        <div class="col-lg-3">
            <img width="140" height="140" alt="Generic placeholder image" src="{{asset(__index__)}}/themes/img/pd/weixin.png" class="">
            <h2>微信全案营销</h2>
            <p>为企业量身定制独立的全案营销方案，全方位的为客户提供有效的解决方案。</p>
        </div><!-- 微信全案营销 -->

        <div class="col-lg-3">
            <img width="140" height="140" alt="Generic placeholder image" src="{{asset(__index__)}}/themes/img/pd/web.png" class="">
            <h2>定制项目开发</h2>
            <p>丰富Web组件，可二次开发的面板，可快速构建界面出色、体验优秀的跨屏页面。</p>
        </div><!-- 定制项目开发 -->
    </div>
</div>
<!--------container End-------->


<!--------Media begin-------->
<div class="container marketing marketing-media">
    <div class="row featurette">
        <div class="col-md-5" >
            <div data-ride="carousel" class="carousel slide" id="myCarousel">
                <div role="listbox" class="carousel-inner">
                    <div class="item">
                        <img alt="First slide" src="{{asset(__index__)}}/themes/img/banner/banner.png" class="first-slide">
                    </div>
                    <div class="item active">
                        <img alt="Second slide" src="{{asset(__index__)}}/themes/img/banner/banner.png" class="second-slide">
                    </div>
                    <div class="item">
                        <img alt="Third slide" src="{{asset(__index__)}}/themes/img/banner/banner.png" class="third-slide">
                    </div>
                </div>
                <!--<a data-slide="prev" role="button" href="#myCarousel" class="left carousel-control">-->
                    <!--<span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>-->
                    <!--<span class="sr-only">Previous</span>-->
                <!--</a>-->
                <!--<a data-slide="next" role="button" href="#myCarousel" class="right carousel-control">-->
                    <!--<span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>-->
                    <!--<span class="sr-only">Next</span>-->
                <!--</a> 左右按钮   -->
            </div>
        </div>
        <div class="col-md-7">
            <h2 class="featurette-heading">媒介资源 <span class="text-muted" style="font-size:22px;"> ...</span></h2>
            <p class="lead">微信订阅号<span>总账户数超70000+</span>，累计订阅量100亿，覆盖行业广泛，受众群体精准</p>
            <ul class="present-list"><li>资源可视化展示及操作</li><li>历史及实时监控图表</li><li>记录所有重要操作行为</li><li>工单系统，第一时间解决资源相关问题</li></ul>
            <p><a role="button" href="#" class="btn btn-lg btn-success">了解详情<span class="glyphicon glyphicon-menu-right"></span></a></p>
        </div>
    </div>
</div>
<!--------Media end-------->


<!--------Data resource begin-------->
<div class="container-fluid container-fluid-back ">
    <div class="container">
        <div class="text-center text-header-title">
            <h1>我们拥有最全面的数据资源</h1>
            <p><span>拥有1200家媒体</span>，新闻稿在线媒体实时更新综合门户、地方门户、行业媒体细分。</p>
            <p>微信订阅号<span>总账户数超70000+</span>，累计订阅量100亿，覆盖行业广泛，受众群体精准。</p>
            <p>微信朋友圈<span>总账户数超22000+</span>，累计好友量1亿5千万，覆盖行业广泛，受众群体精准，均视频认证过确保真实。</p>
        </div>
    </div>
</div>
<!--------Data resource End-------->


<!--------choose begin-------->
<div class="container" style="margin-bottom:40px; margin-top:40px;">
    <div class="container text-center text-center-h1">
        <h1>他们选择了我们</h1>
    </div>
    <div data-example-id="simple-thumbnails" class="bs-example">
        <div class="row thumbnail-clear">
            <div class="col-xs-6 col-md-3">
                <a class="thumbnail thumbnail-bottom" href="http://www.qunar.com/" target="_blank" title="去哪儿网" >
                    <img alt="100%x110" data-src="holder.js/100%x110" style="height: 110px; width: 100%; display: block;" src="{{asset(__index__)}}/themes/img/code/h1.png" data-holder-rendered="true">
                </a>
            </div>
            <div class="col-xs-6 col-md-3">
                <a class="thumbnail thumbnail-bottom" href="http://www.amazon.cn/" target="_blank" title="卓越亚马逊">
                    <img alt="100%x180" data-src="holder.js/100%x180" style="height: 110px; width: 100%; display: block;" src="{{asset(__index__)}}/themes/img/code/h2.png" data-holder-rendered="true">
                </a>
            </div>
            <div class="col-xs-6 col-md-3">
                <a class="thumbnail thumbnail-bottom" href="http://www.cebbank.com/" target="_blank" title="光大银行">
                    <img alt="100%x180" data-src="holder.js/100%x180" style="height: 110px; width: 100%; display: block;" src="{{asset(__index__)}}/themes/img/code/h3.png" data-holder-rendered="true">
                </a>
            </div>
            <div class="col-xs-6 col-md-3">
                <a class="thumbnail thumbnail-bottom" href="http://www.lexus.com.cn/" target="_blank" title="雷克萨斯">
                    <img alt="100%x180" data-src="holder.js/100%x180" style="height: 110px; width: 100%; display: block;" src="{{asset(__index__)}}/themes/img/code/h4.png" data-holder-rendered="true">
                </a>
            </div>
            <div class="col-xs-6 col-md-3">
                <a class="thumbnail thumbnail-bottom" href="http://www.haval.cn/" target="_blank" title="哈佛网">
                    <img alt="100%x180" data-src="holder.js/100%x180" style="height: 110px; width: 100%; display: block;" src="{{asset(__index__)}}/themes/img/code/h5.png" data-holder-rendered="true">
                </a>
            </div>
            <div class="col-xs-6 col-md-3">
                <a class="thumbnail thumbnail-bottom" href="http://www.yonyou.com/" target="_blank" title="用友yonyou">
                    <img alt="100%x180" data-src="holder.js/100%x180" style="height: 110px; width: 100%; display: block;" src="{{asset(__index__)}}/themes/img/code/h6.png" data-holder-rendered="true">
                </a>
            </div>
            <div class="col-xs-6 col-md-3">
                <a class="thumbnail thumbnail-bottom" href="http://www.xiaoniu88.com/" target="_blank" title="小牛在线">
                    <img alt="100%x180" data-src="holder.js/100%x180" style="height: 110px; width: 100%; display: block;" src="{{asset(__index__)}}/themes/img/code/h7.png" data-holder-rendered="true">
                </a>
            </div>
            <div class="col-xs-6 col-md-3">
                <a class="thumbnail thumbnail-bottom" href="http://www.hzkywy.com/" target="_blank" title="开元物业">
                    <img alt="100%x180" data-src="holder.js/100%x180" style="height: 110px; width: 100%; display: block;" src="{{asset(__index__)}}/themes/img/code/h8.png" data-holder-rendered="true">
                </a>
            </div>
        </div>
    </div>
</div>
<!--------choose end-------->
@endsection