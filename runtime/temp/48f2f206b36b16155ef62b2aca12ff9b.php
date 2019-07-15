<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:51:"./application/index/view/default/pc/about\view.html";i:1490774402;s:52:"./application/index/view/default/pc/public\head.html";i:1491391033;s:57:"./application/index/view/default/pc/public\guestbook.html";i:1490453313;s:52:"./application/index/view/default/pc/public\foot.html";i:1491199875;}*/ ?>
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
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i><?php echo \think\Lang::get('v_home'); ?></a></li>
            <?php if(is_array($viewNavigation) || $viewNavigation instanceof \think\Collection || $viewNavigation instanceof \think\Paginator): $i = 0; $__LIST__ = $viewNavigation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$aboutNavRs): $mod = ($i % 2 );++$i;?>
                <li class="active"><a href="<?php echo url('/'.$aboutNavRs['urlroute'].'-a'.$aboutNavRs['id']); ?>"><?php echo $aboutNavRs['title']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
                    <?php if(is_array($moduleSort) || $moduleSort instanceof \think\Collection || $moduleSort instanceof \think\Paginator): $i = 0; $__LIST__ = $moduleSort;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$aboutSortRs): $mod = ($i % 2 );++$i;if(empty($aboutSortRs['sub']) || (($aboutSortRs['sub'] instanceof \think\Collection || $aboutSortRs['sub'] instanceof \think\Paginator ) && $aboutSortRs['sub']->isEmpty())): ?>
                            <li class="list-group-item clearfix"><a href="<?php echo url('/'.$aboutSortRs['urlroute'].'-a'.$aboutSortRs['id']); ?>"><i class="fa fa-angle-right"></i><?php echo $aboutSortRs['title']; ?></a></li>
                        <?php else: ?>
                            <li class="list-group-item clearfix dropdown active">
                                <a href="<?php echo url('/'.$aboutSortRs['urlroute'].'-a'.$aboutSortRs['id']); ?>" class="collapsed"><i class="fa fa-angle-right"></i><?php echo $aboutSortRs['title']; ?><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" style="display:block;">
                                    <?php if(is_array($aboutSortRs['sub']) || $aboutSortRs['sub'] instanceof \think\Collection || $aboutSortRs['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $aboutSortRs['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subRs): $mod = ($i % 2 );++$i;if(empty($subRs['subsub']) || (($subRs['subsub'] instanceof \think\Collection || $subRs['subsub'] instanceof \think\Paginator ) && $subRs['subsub']->isEmpty())): ?>
                                            <li class="list-group-item clearfix"><a href="<?php echo url('/'.$subRs['urlroute'].'-a'.$subRs['id']); ?>"><i class="fa fa-angle-right"></i><?php echo $subRs['title']; ?></a></li>
                                        <?php else: ?>
                                            <li class="list-group-item dropdown clearfix">
                                                <a href="<?php echo url('/'.$subRs['urlroute'].'-a'.$subRs['id']); ?>"><i class="fa fa-angle-right"></i><?php echo $subRs['title']; ?><i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown-menu" style="display:block;">
                                                    <?php if(is_array($subRs['subsub']) || $subRs['subsub'] instanceof \think\Collection || $subRs['subsub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $subRs['subsub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subsubRs): $mod = ($i % 2 );++$i;?>
                                                        <li class="list-group-item clearfix"><a href="<?php echo url('/'.$subsubRs['urlroute'].'-a'.$subsubRs['id']); ?>"><i class="fa fa-angle-right"></i><?php echo $subsubRs['title']; ?></a></li>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </ul>
                                            </li>
                                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1><?php echo $rs['title']; ?></h1>
            <div class="content-page">
              <?php echo htmlspecialchars_decode($content1); ?>
            </div>
            <?php if($guestbook == '1'): ?>
            <div class="content-page">
                              <!--留言 开始-->
              <form name="guestbook" id="guestbook" onSubmit="return guestbookCheck();" method="post" action="<?php echo url('about/guestbook'); ?>" class="default-form" role="form">
                  <input type="hidden" name="addtime" value="<?php echo time(); ?>" />
                <div class="form-group">
                  <label for="name"><?php echo \think\Lang::get('v_realname'); ?><span class="require">*</span></label>
                  <input name="realname" id="realname" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="email">Email </label>
                  <input name="email" id="email" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="message"><?php echo \think\Lang::get('v_content1'); ?><span class="require">*</span></label>
                  <textarea name="content" id="content" class="form-control" rows="8"></textarea>
                </div>
                <div class="form-group">
                    <table><tr><td><img class="cursor" src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>'" border="0" width="125" height="34" align="absmiddle" /></td>
                    <td width="10"></td><td><input name="verify" type="text" class="form-control" maxlength="4" autocomplete="off" placeholder="<?php echo \think\Lang::get('v_verify'); ?>" /></td>
                    </tr></table>
                </div>
                <div class="padding-top-20">                  
                  <button type="submit" class="btn btn-primary"><?php echo \think\Lang::get('v_submit'); ?></button>
                </div>
              </form>
              <!--留言 结束-->
<script type="text/javascript">
function guestbookCheck(){
  var realname=document.guestbook.realname.value;
  var content=document.guestbook.content.value;
  if(document.guestbook.realname.value==""){
      alert("<?php echo \think\Lang::get('v_require_realname'); ?>");
      document.guestbook.realname.focus();
	  return false;
  }
  if(document.getElementById("content").value.length <5 || document.getElementById("content").value.length >500){
      alert("<?php echo \think\Lang::get('v_limit_content'); ?>");
      document.guestbook.content.focus();
	  return false;
  }
}
</script>

            </div>
            <?php endif; ?>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
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