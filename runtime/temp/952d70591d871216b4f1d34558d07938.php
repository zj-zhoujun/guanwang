<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:53:"./application/index/view/default/pc/product\view.html";i:1493446820;s:52:"./application/index/view/default/pc/public\head.html";i:1491391033;s:52:"./application/index/view/default/pc/public\foot.html";i:1491199875;}*/ ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo $seotitle; ?></title>
<meta name="keywords" content="<?php echo $rs['keyword']; ?>" />
<meta name="description" content="<?php echo $rs['description']; ?>" />
<link href="__PUBLIC__/theme/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet"><!--产品预览-->
<link href="__PUBLIC__/theme/plugins/rateit/src/rateit.css" rel="stylesheet" type="text/css"><!--评分星级-->
<link href="__PUBLIC__/theme/pages/css/components.css" rel="stylesheet"><!--社会化分享-->
</head>
<body class="ecommerce">
<!--核心样式 开始-->
<link href="__PUBLIC__/theme/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"><!--产品分类及购物车-->
<link href="__PUBLIC__/theme/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"><!--全局样式-->
<!--核心样式 结束-->
<!--全局样式 开始-->
<link href="__PUBLIC__/theme/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
<link href="__PUBLIC__/theme/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
<link href="__PUBLIC__/theme/pages/css/style-shop.css" rel="stylesheet" type="text/css"><!--产品及购物车-->
<link href="__PUBLIC__/theme/corporate/css/style.css" rel="stylesheet"><!--全局样式-->
<link href="__PUBLIC__/theme/corporate/css/style-responsive.css" rel="stylesheet"><!--响应式手机-->
<link href="__PUBLIC__/theme/corporate/css/themes/red.css" rel="stylesheet" id="style-color"><!--全局皮肤-->
<!--全局样式 结束-->
<link href="__PUBLIC__/css/kefu.css" rel="stylesheet" id="style-color"><!--在线客服-->
<!--顶部导航条 开始-->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!--顶部导航条左侧 开始-->
            <div class="col-md-6 col-sm-6">
                <ul class="list-unstyled list-inline">
                    <li><?php echo $slogan; ?></li>
                </ul>
            </div>
            <!--顶部导航条左侧 结束-->
            <!--顶部导航条菜单 开始-->
            <div class="col-md-6 col-sm-6">
                <ul class="list-unstyled list-inline pull-right">
                    <li><i class="fa fa-phone"></i><?php echo \think\Lang::get('v_hotline'); ?>：<?php echo $telephone; ?></li>
                    <!--语言 开始-->
                    <li>
                        <?php $result = db("language")->where("status=1")->limit("5")->order("sequence desc,id desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$langRs): $mod = ($i % 2 );++$i;if($langRs['isdefault'] == '1'): ?>
                                <a href="/"><img src="<?php echo $langRs['ico']; ?>" class="margin-right-5" /><?php echo $langRs['viewtitle']; ?></a>
                            <?php else: ?>
                                <a href="/<?php echo $langRs['mulu']; ?>/"><img src="<?php echo $langRs['ico']; ?>" class="margin-right-5" /><?php echo $langRs['viewtitle']; ?></a>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </li>
                    <!--语言 结束-->
                </ul>
            </div>
            <!--顶部导航条菜单 结束-->
        </div>
    </div>        
</div>
<!--顶部导航条 结束-->
<!--头部 开始-->
<div class="header">
    <div class="container">
        <a class="site-logo" href="/"><img src="<?php echo $siteRs['logo']; ?>" alt="<?php echo $siteRs['sitetitle']; ?>"></a>
        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <!--导航 开始-->
        <div class="header-navigation">
            <ul>
                <?php if(is_array($navigation) || $navigation instanceof \think\Collection || $navigation instanceof \think\Paginator): $i = 0; $__LIST__ = $navigation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navRs): $mod = ($i % 2 );++$i;if(empty($navRs['sub']) || (($navRs['sub'] instanceof \think\Collection || $navRs['sub'] instanceof \think\Paginator ) && $navRs['sub']->isEmpty())): ?>
                        <li><a href="<?php echo $navRs['linkurl']; ?>"><?php echo $navRs['title']; ?></a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-target="#" href="<?php echo $navRs['linkurl']; ?>"><?php echo $navRs['title']; ?><i class="fa fa-angle-right"></i></a>
                            <ul class="dropdown-menu">
                                <?php if(is_array($navRs['sub']) || $navRs['sub'] instanceof \think\Collection || $navRs['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $navRs['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subRs): $mod = ($i % 2 );++$i;if(empty($subRs['subsub']) || (($subRs['subsub'] instanceof \think\Collection || $subRs['subsub'] instanceof \think\Paginator ) && $subRs['subsub']->isEmpty())): ?>
                                        <li><a href="<?php echo $subRs['linkurl']; ?>"><?php echo $subRs['title']; ?></a></li>
                                    <?php else: ?>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="<?php echo $subRs['linkurl']; ?>"><?php echo $subRs['title']; ?><i class="fa fa-angle-right"></i></a>
                                            <ul class="dropdown-menu">
                                                <?php if(is_array($subRs['subsub']) || $subRs['subsub'] instanceof \think\Collection || $subRs['subsub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $subRs['subsub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subsubRs): $mod = ($i % 2 );++$i;?>
                                                    <li><a href="<?php echo $subsubRs['linkurl']; ?>"><?php echo $subsubRs['title']; ?></a></li>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul>
                                        </li>
                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </li>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
          </ul>
      </div>
      <!--导航 结束-->
    </div>
</div>
<!--头部 结束-->

<!--内页banner  开始-->
<div class="title-wrapper" style="background: #72c2ff url(<?php echo $pagebanner; ?>) no-repeat 100% 100%;">
    <div class="container">
        <div class="container-inner"></div>
    </div>
</div>
<!--内页banner  结束-->
<!--主体 开始-->
<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i><?php echo \think\Lang::get('v_home'); ?></a></li>
            <li><a href="<?php echo url('/product/index-1'); ?>"><?php echo \think\Lang::get('product'); ?></a></li>
            <?php if(is_array($listnavigation) || $listnavigation instanceof \think\Collection || $listnavigation instanceof \think\Paginator): $i = 0; $__LIST__ = $listnavigation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?>
                <li class="active"><a href="<?php echo url('/'.$rs['urlroute'].'-p'.$rs['id'].'-1'); ?>"><?php echo $rs['title']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!--侧边栏和内容 开始-->
        <div class="row margin-bottom-40">
            <!--侧边栏 开始-->
            <div class="sidebar col-md-3 col-sm-5">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                    <?php if(is_array($moduleSort) || $moduleSort instanceof \think\Collection || $moduleSort instanceof \think\Paginator): $i = 0; $__LIST__ = $moduleSort;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;if(empty($rs['sub']) || (($rs['sub'] instanceof \think\Collection || $rs['sub'] instanceof \think\Paginator ) && $rs['sub']->isEmpty())): ?>
                            <li class="list-group-item clearfix"><a href="<?php echo url('/'.$rs['urlroute'].'-p'.$rs['id'].'-1'); ?>"><i class="fa fa-angle-right"></i><?php echo $rs['title']; ?></a></li>
                        <?php else: ?>
                            <li class="list-group-item clearfix dropdown active">
                                <a href="<?php echo url('/'.$rs['urlroute'].'-p'.$rs['id'].'-1'); ?>" class="collapsed"><i class="fa fa-angle-right"></i><?php echo $rs['title']; ?><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" style="display:block;">
                                    <?php if(is_array($rs['sub']) || $rs['sub'] instanceof \think\Collection || $rs['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $rs['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subRs): $mod = ($i % 2 );++$i;if(empty($subRs['subsub']) || (($subRs['subsub'] instanceof \think\Collection || $subRs['subsub'] instanceof \think\Paginator ) && $subRs['subsub']->isEmpty())): ?>
                                            <li class="list-group-item clearfix"><a href="<?php echo url('/'.$subRs['urlroute'].'-p'.$subRs['id'].'-1'); ?>"><i class="fa fa-angle-right"></i><?php echo $subRs['title']; ?></a></li>
                                        <?php else: ?>
                                            <li class="list-group-item dropdown clearfix">
                                                <a href="<?php echo url('/'.$subRs['urlroute'].'-p'.$subRs['id'].'-1'); ?>"><i class="fa fa-angle-right"></i><?php echo $subRs['title']; ?><i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown-menu" style="display:block;">
                                                    <?php if(is_array($subRs['subsub']) || $subRs['subsub'] instanceof \think\Collection || $subRs['subsub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $subRs['subsub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subsubRs): $mod = ($i % 2 );++$i;?>
                                                        <li class="list-group-item clearfix"><a href="<?php echo url('/'.$subsubRs['urlroute'].'-p'.$subsubRs['id'].'-1'); ?>"><i class="fa fa-angle-right"></i><?php echo $subsubRs['title']; ?></a></li>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </ul>
                                            </li>
                                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="sidebar-products clearfix">
                    <h2><?php echo \think\Lang::get('v_related_product'); ?></h2>
                    <?php $result = db("product")->where("sortid in($sortidArr) and lang='cn' and find_in_set('view',status)")->limit("6")->order("hits desc,sequence desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?>
                        <div class="item">
                            <a href="<?php echo url('/'.$rs['urlroute'].'-p'.$rs['id']); ?>"><img src="<?php echo $rs['thumb']; ?>" alt="<?php echo $rs['title']; ?>"></a>
                            <h3><a href="<?php echo url('/'.$rs['urlroute'].'-p'.$rs['id']); ?>"><?php echo $rs['title']; ?></a></h3>
                            <div class="price">&yen;<?php echo $rs['price']; ?></div>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <!--侧边栏 结束-->
            <!--右侧内容 开始-->
            <div class="col-md-9 col-sm-7">
                <div class="product-page">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="product-main-image">
                                <img src="<?php echo $rs['thumb']; ?>" alt="<?php echo $rs['title']; ?>" class="img-responsive" data-BigImgsrc="<?php echo $rs['thumb']; ?>">
                            </div>
                            <div class="product-other-images">
                                <?php foreach($morepics as $pic): ?> 
                                    <a href="<?php echo $pic; ?>" class="fancybox-button" rel="photos-lib"><img src="<?php echo $pic; ?>"></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h1><?php echo $rs['title']; ?></h1>
                            <div class="price-availability-block clearfix">
                                <div class="price">
                                    <strong><span>&yen;</span><?php echo $rs['price']; ?></strong>
                                    <em>&yen;<span><?php echo $rs['marketprice']; ?></span></em>
                                </div>
                                <div class="availability">
                                    <?php echo \think\Lang::get('v_stock'); ?>：<strong><?php echo $rs['quantity']; ?></strong>
                                </div>
                            </div>
                            <div class="description">
                                <p><?php echo htmlspecialchars_decode($rs['description']); ?></p>
                            </div>
                            <div class="product-page-options">
                                <?php if(is_array($attribute) || $attribute instanceof \think\Collection || $attribute instanceof \think\Paginator): $i = 0; $__LIST__ = $attribute;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$attRs): $mod = ($i % 2 );++$i;?>
                                    <span class="f16"><?php echo $attRs['attname']; ?>：<?php echo str_replace('|', '', $attRs['attvalue']); ?></span><br />
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <div class="review">
                                <a href="javascript:;"><?php echo \think\Lang::get('v_hits'); ?>：<?php echo $rs['hits']; ?></a>
                            </div>
                            <ul class="social-icons">
                                <!--分享 开始-->
<div class="jiathis_style_24x24"><span class="jiathis_txt" style="font-size:14px;"><?php echo \think\Lang::get('v_shareto'); ?>：</span>
<a class="jiathis_button_qzone"></a>
<a class="jiathis_button_tsina"></a>
<a class="jiathis_button_tqq"></a>
<a class="jiathis_button_weixin"></a>
<a class="jiathis_button_renren"></a>
<a class="jiathis_button_cqq"></a>
<a class="jiathis_button_xiaoyou"></a>
<a class="jiathis_button_tifeng"></a>
<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
<a class="jiathis_counter_style"></a>
</div>
<script type="text/javascript" >
var jiathis_config={
	summary:"",
	shortUrl:false,
	hideMore:false
}
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
<!--分享 结束-->
                            </ul>
                        </div>
                        <div class="product-page-content">
                            <ul id="myTab" class="nav nav-tabs">
                                <li class="active"><a href="#Description" data-toggle="tab"><?php echo \think\Lang::get('v_content1'); ?></a></li>
                                <li><a href="#Information" data-toggle="tab"><?php echo \think\Lang::get('v_content2'); ?></a></li>
                                <li><a href="#Reviews" data-toggle="tab"><?php echo \think\Lang::get('v_content3'); ?></a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="Description">
                                    <?php echo htmlspecialchars_decode($content1); ?>
                                </div>
                                <div class="tab-pane fade" id="Information">
                                    <?php echo htmlspecialchars_decode($rs['content2']); ?>
                                </div>
                                <div class="tab-pane fade" id="Reviews">
                                    <?php echo htmlspecialchars_decode($rs['content3']); ?>
                                </div>
                            </div>
                        </div>
                        <?php if($hot == '1'): ?><div class="sticker sticker-sale"></div><?php endif; if($new == '1'): ?><div class="sticker sticker-new"></div><?php endif; ?>
                    </div>
                </div>
            </div>
            <!--右侧内容 结束-->
        </div>
        <!--侧边栏和内容 结束-->
        <!--类似产品 开始-->
        <div class="row margin-bottom-40">
            <div class="col-md-12 col-sm-12">
                <h2><?php echo \think\Lang::get('v_hot_product'); ?></h2>
                <div class="owl-carousel owl-carousel4">
                    <?php $result = db("product")->where("lang='cn' and find_in_set('view',status) and find_in_set('hot',status)")->limit("8")->order("hits desc,sequence desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?>
                    <div>
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img src="<?php echo $rs['thumb']; ?>" class="img-responsive" alt="<?php echo $rs['title']; ?>">
                                <div>
                                    <a href="<?php echo $rs['thumb']; ?>" class="btn btn-default fancybox-button"><?php echo \think\Lang::get('v_big_thumb'); ?></a>
                                    <a href="<?php echo url('/'.$rs['urlroute'].'-p'.$rs['id']); ?>" class="btn btn-default fancybox-fast-view"><?php echo \think\Lang::get('v_detail'); ?></a>
                                </div>
                            </div>
                            <h3><a href="<?php echo url('/'.$rs['urlroute'].'-p'.$rs['id']); ?>"><?php echo $rs['title']; ?></a></h3>
                            <div class="pi-price">&yen;<?php echo $rs['price']; ?></div>
                            <a href="<?php echo url('/'.$rs['urlroute'].'-p'.$rs['id']); ?>" class="btn btn-default add2cart">&raquo;<?php echo \think\Lang::get('v_detail'); ?></a>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
        <!--类似产品 结束-->
    </div>
</div>
<!--主体 结束-->
<!--底部 开始-->
<div class="pre-footer">
    <div class="container">
        <div class="row">
            <!--底部关于我们 开始-->
            <div class="col-md-2 col-sm-6 pre-footer-col">
                <h2><?php echo \think\Lang::get('about'); ?></h2>
                <ul class="list-unstyled">
                    <?php $result = db("about")->where("lang='cn' and parentid<>0")->limit("6")->order("sequence desc,id desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?>
                        <li><i class="fa fa-angle-right"></i> <a href="<?php echo url('/'.$rs['urlroute'].'-a'.$rs['id']); ?>"><?php echo $rs['title']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <!--底部关于我们 结束-->
            <!--底部产品中心 开始-->
            <div class="col-md-2 col-sm-6 pre-footer-col">
                <h2><?php echo \think\Lang::get('product'); ?></h2>
                <ul class="list-unstyled">
                    <?php $result = db("sort")->where("lang='cn' and moduleid=1 and parentid=0")->limit("6")->order("sequence desc,id desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?>
                        <li><i class="fa fa-angle-right"></i> <a href="<?php echo url('/'.$rs['urlroute'].'-p'.$rs['id'].'-1'); ?>"><?php echo $rs['title']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <li><i class="fa fa-angle-right"></i> <a href="<?php echo url('/product/index-1'); ?>"><?php echo \think\Lang::get('v_more'); ?></a></li>
                </ul>
            </div>
            <!--底部产品中心 结束-->
            <!--底部新闻动态 开始-->
            <div class="col-md-2 col-sm-6 pre-footer-col">
                <h2><?php echo \think\Lang::get('v_news'); ?></h2>
                <ul class="list-unstyled">
                    <?php $result = db("sort")->where("lang='cn' and moduleid=2 and parentid=0")->limit("6")->order("sequence desc,id desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?>
                        <li><i class="fa fa-angle-right"></i> <a href="<?php echo url('/'.$rs['urlroute'].'-n'.$rs['id'].'-1'); ?>"><?php echo $rs['title']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <!--底部新闻动态 结束-->
            <!--底部联系我们 开始-->
            <div class="col-md-6 col-sm-6 pre-footer-col">
                <h2 class="margin-bottom-0"><?php echo \think\Lang::get('v_contact'); ?></h2>
                <div class="pull-left margin-right-10 margin-top-10 text-center"><img src="<?php echo $erweima; ?>" width="125" /><br /><?php echo \think\Lang::get('v_qrcode'); ?></div>
                <address class="pull-left margin-bottom-40">
                    <?php echo htmlspecialchars_decode($contact); ?>
                </address>
            </div>
            <!--底部联系我们 结束-->
        </div>
        <?php if(\think\Request::instance()->controller() == 'Index'): ?>
        <div class="row col-md-12 margin-bottom-10">
            <?php echo \think\Lang::get('v_links'); ?>：
            <?php $result = db("ad")->where("lang='cn' and typeid=2")->limit("35")->order("sequence desc,id desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?>
                <a href="<?php echo $rs['linkurl']; ?>" target="_blank"><?php echo $rs['title']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<!--底部  结束-->
<!--版权 开始-->
<div class="footer">
    <div class="container">
        <div class="row">
            <!--左侧 开始-->
            <div class="col-md-8 col-sm-8 padding-top-5"><?php echo htmlspecialchars_decode($copyright); ?>&nbsp;&nbsp;<?php if(!(empty($siteRs['icpnumber']) || (($siteRs['icpnumber'] instanceof \think\Collection || $siteRs['icpnumber'] instanceof \think\Paginator ) && $siteRs['icpnumber']->isEmpty()))): ?><a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo $siteRs['icpnumber']; ?></a><?php endif; ?></div>
            <!--左侧 结束-->
            <!--右侧 开始-->
            <div class="col-md-4 col-sm-4 text-right">
                <p class="powered">Powered by: <a href="http://www.df81.com/">df81.com</a></p>
            </div>
            <!--右侧 结束-->
        </div>
    </div>
</div>
<!--版权 结束-->
<!--客服 开始-->
<div id="top">
    <div id="izl_rmenu" class="izl-rmenu">
        <div class="izl-rl"></div>
        <div class="kfbtn btn-qq">
            <div class="qq">
                <?php $result = db("chat")->where("lang='cn' and typeid='qq'")->limit("5")->order("sequence desc,id desc")->select();$__LIST__ = $result; if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?>
                    <a rel="nofollow" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $rs['account']; ?>&site=qq&menu=yes"><img src="<?php echo $rs['thumb']; ?>" alt="<?php echo $rs['title']; ?>" /><br /><?php echo $rs['title']; ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="kfbtn btn-wx"><img class="pic" src="<?php echo $erweima; ?>"></div>
        <div class="kfbtn btn-phone">
            <div class="phone"><?php echo $telephone; ?></div>
        </div>
        <div class="kfbtn btn-top" style="display: none;"></div>
    </div>
</div>
<!--客服 结束-->
<!--核心脚本 开始-->
<!--[if lt IE 9]>
<script src="__PUBLIC__/theme/plugins/respond.min.js"></script>  
<![endif]-->
<script src="__PUBLIC__/theme/plugins/jquery.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/theme/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script><!--产品预览-->
<!--核心脚本 结束-->
<!--全局脚本 开始-->
<script src="__PUBLIC__/theme/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products --><!--产品加载-->
<script src="__PUBLIC__/theme/corporate/scripts/layout.js" type="text/javascript"></script><!--产品加载-->
<!--产品内容页 开始-->
<script src="__PUBLIC__/theme/plugins/jquery-migrate.min.js" type="text/javascript"></script><!--产品预览-->
<script src="__PUBLIC__/theme/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!--产品预览-->
<script src='__PUBLIC__/theme/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!--产品预览-->
<script src="__PUBLIC__/theme/plugins/bootstrap-touchspin/bootstrap.touchspin.min.js" type="text/javascript"></script><!--数量增减-->
<script src="__PUBLIC__/theme/plugins/rateit/src/jquery.rateit.min.js" type="text/javascript"></script><!--评分星级-->
<!--产品内容页 结束-->
<script type="text/javascript">
jQuery(document).ready(function() {
    Layout.init();//购物车滚动条及伸缩
    Layout.initOWL();//产品加载
    Layout.initTouchspin();//移动端
    Layout.initFixHeaderWithPreHeader();//固定头部
    Layout.initImageZoom();//产品预览
});
</script>
<!--全局脚本 结束-->
<script src="__PUBLIC__/js/kefu.js" type="text/javascript"></script><!--在线客服-->
<script src="__PUBLIC__/js/global.js" type="text/javascript"></script><!--搜索等全局-->
<?php if(!(empty($siteRs['htmlcode']) || (($siteRs['htmlcode'] instanceof \think\Collection || $siteRs['htmlcode'] instanceof \think\Paginator ) && $siteRs['htmlcode']->isEmpty()))): ?><?php echo $siteRs['htmlcode']; endif; ?>
</body>
</html>