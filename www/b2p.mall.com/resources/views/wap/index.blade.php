<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>商品详情</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no"/>
        <meta name="format-detection" content="telephone=no" />
        <!-- iphone的私有标签 它指定的iphone中safari顶端的状态条的样式 默认值为default（白色），可以定为black（黑色）和black-translucent（灰色半透明） -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <!-- iphone设备中的safari私有meta标签 允许全屏模式浏览，隐藏浏览器导航栏 -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- 它支持用户将网页创建快捷方式到桌面时，其图标变为我们自己定义的图标 apple-touch-icon.png 命名 -->
        <link rel="apple-touch-icon-precomposed" href="http://3gimg.qq.com/wap30/info/info5/img/logo_icon.png">
        <meta name="author" content="seedlings" />

        <link rel="stylesheet" href="{{ elixir('css/wap/base.css') }}">
        <link rel="stylesheet" href="{{ elixir('css/wap/index.css') }}">

		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" charset="utf-8">
			wx.config({!! $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), true) !!});
			//分享到朋友圈
			wx.onMenuShareTimeline({
				title: '这是分享到朋友圈的标题', // 分享标题
				link: '这是分享到朋友圈的链接', // 分享链接
				imgUrl: 'xx', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
			//分享给朋友
			wx.onMenuShareAppMessage({
				title: '这是分享朋友的标题', // 分享标题
				desc: '这是分享朋友的描述', // 分享描述
				link: '这是分享朋友的链接', // 分享链接
				imgUrl: '这是分享朋友的图片', // 分享图标
				success: function () { 
					// 用户确认分享后执行的回调函数
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
		</script>
    </head>

    <body>
        <div class="main_warp slider_box" id="slider_wrapper">
            <ul>
                @if(isset($goods_images) && is_array($goods_images) && count($goods_images) > 0)
                    @foreach($goods_images as $sk=>$sv)
                        <li>
                            <a href="###">
                                <img src="{{ $sv['url_links'] }}" alt="{{ $sv['file_name'] }}">
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
            <div class="dot">
                <span class="cur"></span>
                <span class=""></span>
                <span class=""></span>
            </div>
        </div>

        <div class="goods_detail main_warp">
            <h1>商品名称商品名称商品名称商品名称</h1>
            <p class="gd_introduction">商品简介商品简介商品简介商品简介商品简介商品简介商品简介商品简介商品简介商品简介商品简介商品简介商品简介商品简介商品简介商品简介商品简介商品简介商品简介</p>
            <div class="goods_price_box">
                <span class="now_price">&yen;<strong>{{ $goods_details['shop_price'] }}</strong></span>
                <del>&yen;{{ $goods_details['market_price'] }}</del>(市场价)
            </div>

            <div class="goods_sales_box">
                库存：{{ $goods_details['goods_number'] }}件
            </div>

            <div class="goods_sku_box" id="sku_box" data-url="###">
                规格：
                <span class="cur" data-id="11">规格1</span><span data-id="555">规格2</span>
            </div>

            <div class="hint_box">
                *开团并邀请2人参团，人数不足自动退款。
            </div>

            <div class="photo_details">
                <div class="pd_title">
                    <span>图文详情</span>
                </div>
                <div class="pd_detail">
                    <!--
                    <p>这里是图片文字文字说明</p>
                    <img src="{{asset('images/goods_img.jpg')}}">
                    -->
                    {{ $goods_details['content'] }}
                </div>
            </div>
        </div>

        <!-- <div class="recommend_goods main_warp">
            <div class="rg_title">
                你可能还喜欢
            </div>
            <ul>
                <li>
                    <a href="###">
                        <img src="./images/goods_img.jpg" alt="图片">
                        <div class="rg_goods_name">商品名商品名商品名商品名商品名商品</div>
                        <div class="rg_goods_price">&yen;95</div>
                    </a>
                </li>
                <li>
                    <a href="###">
                        <img src="./images/goods_img.jpg" alt="图片">
                        <div class="rg_goods_name">商品名商品名</div>
                        <div class="rg_goods_price">&yen;95</div>
                    </a>
                </li>
                <li>
                    <a href="###">
                        <img src="./images/goods_img.jpg" alt="图片">
                        <div class="rg_goods_name">商品名商品名</div>
                        <div class="rg_goods_price">&yen;95</div>
                    </a>
                </li>
                <li>
                    <a href="###">
                        <img src="./images/goods_img.jpg" alt="图片">
                        <div class="rg_goods_name">商品名商品名商品名商品名商品名商品</div>
                        <div class="rg_goods_price">&yen;95</div>
                    </a>
                </li>
                <li>
                    <a href="###">
                        <img src="./images/goods_img.jpg" alt="图片">
                        <div class="rg_goods_name">商品名商品名</div>
                        <div class="rg_goods_price">&yen;95</div>
                    </a>
                </li>
                <li>
                    <a href="###">
                        <img src="./images/goods_img.jpg" alt="图片">
                        <div class="rg_goods_name">商品名商品名</div>
                        <div class="rg_goods_price">&yen;95</div>
                    </a>
                </li>
                <li>
                    <a href="###">
                        <img src="./images/goods_img.jpg" alt="图片">
                        <div class="rg_goods_name">商品名商品名商品名商品名商品名商品</div>
                        <div class="rg_goods_price">&yen;95</div>
                    </a>
                </li>
                <li>
                    <a href="###">
                        <img src="./images/goods_img.jpg" alt="图片">
                        <div class="rg_goods_name">商品名商品名</div>
                        <div class="rg_goods_price">&yen;95</div>
                    </a>
                </li>
                <li>
                    <a href="###">
                        <img src="./images/goods_img.jpg" alt="图片">
                        <div class="rg_goods_name">商品名商品名</div>
                        <div class="rg_goods_price">&yen;95</div>
                    </a>
                </li>
                <li>
                    <a href="###">
                        <img src="./images/goods_img.jpg" alt="图片">
                        <div class="rg_goods_name">商品名商品名商品名商品名商品名商品</div>
                        <div class="rg_goods_price">&yen;95</div>
                    </a>
                </li>
                <li>
                    <a href="###">
                        <img src="./images/goods_img.jpg" alt="图片">
                        <div class="rg_goods_name">商品名商品名</div>
                        <div class="rg_goods_price">&yen;95</div>
                    </a>
                </li>
                <li>
                    <a href="###">
                        <img src="./images/goods_img.jpg" alt="图片">
                        <div class="rg_goods_name">商品名商品名</div>
                        <div class="rg_goods_price">&yen;95</div>
                    </a>
                </li>
            </ul>
        </div> -->

        <div class="fix_nav">
            <ul>
                <li>
                    <span>&yen;108</span>
                    <span>单独购</span>
                </li>
                <li>
                    <span>&yen;88</span>
                    <span>3人购</span>
                </li>
            </ul>
        </div>

        <script src="{{ elixir('js/jquery.js') }}"></script>
        <script src="{{ elixir('js/wap/base.js') }}"></script>
        <script src="{{ elixir('js/wap/detail.js') }}"></script>
        <script src="{{ elixir('js/wap/swipeSlide.js') }}"></script>
        <script>
            $(function(){
                $('#slider_wrapper').swipeSlide({
                    continuousScroll: true,
                    speed: 3000,
                    transitionType : 'cubic-bezier(0.22, 0.69, 0.72, 0.88)',
                    firstCallback : function(i,sum,me){
                        me.find('.dot').children().first().addClass('cur');
                    },
                    callback : function(i,sum,me){
                        me.find('.dot').children().eq(i).addClass('cur').siblings().removeClass('cur');
                    }
                });
            });
        </script>
    </body>
</html>
