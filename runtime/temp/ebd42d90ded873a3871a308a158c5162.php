<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:72:"E:\phpstudy\WWW\1\5bb1e9ba11ab2/application/admin\view\product\edit.html";i:1538386296;s:71:"E:\phpstudy\WWW\1\5bb1e9ba11ab2/application/admin\view\public\head.html";i:1538386297;s:71:"E:\phpstudy\WWW\1\5bb1e9ba11ab2/application/admin\view\public\left.html";i:1538386279;s:80:"E:\phpstudy\WWW\1\5bb1e9ba11ab2/application/admin\view\public\response_left.html";i:1538386274;s:71:"E:\phpstudy\WWW\1\5bb1e9ba11ab2/application/admin\view\public\foot.html";i:1538386246;}*/ ?>
<!--有理想的地方，地狱都是天堂-->
<!--Copyright @ df81.com 版权所有-->
<!--作者: 符工@邦明 邮箱：1062129401@qq.com-->
<!--有理想的地方，地狱都是天堂-->
<!--Copyright @ df81.com 版权所有-->
<!--作者: 符工@邦明 邮箱：1062129401@qq.com-->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8" />
<title><?php echo \think\Lang::get('v_admin_system'); ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<!--全局强制样式 开始-->
<link href="__ADMIN__/bootstrap/googlefont/googlefont.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/bootstrap/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/bootstrap/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/bootstrap/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/bootstrap/global/plugins/uniform/css/uniform.default.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/bootstrap/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!--全局强制样式 结束-->
<!--皮肤全局样式 开始-->
<link href="__ADMIN__/bootstrap/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="__ADMIN__/bootstrap/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<!--皮肤全局样式 结束-->
<!--皮肤布局样式 开始-->
<link href="__ADMIN__/bootstrap/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/bootstrap/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
<!--皮肤布局样式 结束-->
<link href="__ADMIN__/css/global.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="page-header-fixed page-footer-fixed page-sidebar-closed-hide-logo page-content-white">
        <!--头部 开始-->
        <div class="page-header navbar navbar-fixed-top">
            <!--头部内部 开始-->
            <div class="page-header-inner ">
                <!--LOGO 开始-->
                <div class="page-logo">
                    <a href="<?php echo url('Index/index?lang='.input('lang')); ?>"><?php if(\think\Request::instance()->get('lang') == 'cn'): ?><img src="__ADMIN__/bootstrap/layouts/layout/img/logo.png" class="logo-default" /><?php else: ?><img src="__ADMIN__/bootstrap/layouts/layout/img/logoen.png" class="logo-default" /><?php endif; ?></a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!--LOGO 结束-->
                <!--头部左侧横向菜单 开始-->
                <div class="hor-menu   hidden-sm hidden-xs">
                    <ul class="nav navbar-nav">
                        <li class="classic-menu-dropdown 
                            <?php switch(\think\Request::instance()->controller()): case "Siteinfo":case "Guestbook":case "User":case "Area":case "AuthGroup":case "AuthRule":case "Language":case "Module":case "Config":case "Navigation":case "Banner":case "Comment":case "Ad":case "Keywordlink":case "Chat":case "Field":case "Databackup": break; default: ?>active
                            <?php endswitch; ?>">
                            <a href="<?php echo url('Index/index?lang='.input('get.lang')); ?>"><i class="fa fa-home"></i> <?php echo \think\Lang::get('v_home'); switch(\think\Request::instance()->controller()): case "Siteinfo":case "Guestbook":case "User":case "Area":case "AuthGroup":case "AuthRule":case "Language":case "Module":case "Config":case "Navigation":case "Banner":case "Comment":case "Ad":case "Keywordlink":case "Chat":case "Field":case "Databackup": break; default: ?><span class="selected"></span>
                                <?php endswitch; ?>
                            </a>
                        </li>
                        <li class="classic-menu-dropdown 
                            <?php switch(\think\Request::instance()->controller()): case "Siteinfo":case "Guestbook":case "User":case "Area":case "AuthGroup":case "AuthRule":case "Language":case "Module":case "Config":case "Navigation":case "Banner":case "Comment":case "Ad":case "Keywordlink":case "Chat":case "Field":case "Databackup": ?>active<?php break; endswitch; ?>">
                            <a href="<?php echo url('Siteinfo/index?lang='.input('get.lang')); ?>"><i class="fa fa-gear"></i> <?php echo \think\Lang::get('v_global'); switch(\think\Request::instance()->controller()): case "Siteinfo":case "Guestbook":case "User":case "Area":case "AuthGroup":case "AuthRule":case "Language":case "Module":case "Config":case "Navigation":case "Banner":case "Comment":case "Ad":case "Keywordlink":case "Chat":case "Field":case "Databackup": ?><span class="selected"></span><?php break; endswitch; ?>
                            </a>
                        </li>
                        <li class="classic-menu-dropdown"><a href="/" target="_blank"><i class="fa fa-desktop"></i> <?php echo \think\Lang::get('v_homepage'); ?></a></li>
                    </ul>
                </div>
                <!--头部左侧横向菜单 结束-->
                <!--响应式菜单开关 开始-->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!--响应式菜单开关 结束-->
                <!--头部右侧横向菜单 开始-->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!--待办事项下拉 开始-->
                        <li class="dropdown dropdown-extended">
                            <a href="<?php echo url('Index/delCache?lang='.input('lang')); ?>" class="dropdown-toggle">
                                <i class="fa fa-refresh"></i> <span><?php echo \think\Lang::get('v_clean_cache'); ?></span>
                            </a>
                            <ul>
                            </ul>
                        </li>
                        <!--待办事项下拉 结束-->
                        <!--语言导航条 开始-->
                        <?php if($languageNum > '1'): ?>
                            <li class="dropdown dropdown-language">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" src="<?php echo $nowLang['ico']; ?>">
                                    <span class="langname"><?php echo $nowLang['admintitle']; ?></span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <?php if(is_array($headlang) || $headlang instanceof \think\Collection || $headlang instanceof \think\Paginator): $i = 0; $__LIST__ = $headlang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$headlang): $mod = ($i % 2 );++$i;if(\think\Request::instance()->get('lang') != $headlang['mulu']): ?>
                                            <li><a href="<?php echo url('Index/index?lang='.$headlang['mulu']); ?>"><img src="<?php echo $headlang['ico']; ?>"><?php echo $headlang['admintitle']; ?></a></li>
                                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                         <?php endif; ?>
                        <!--语言导航条 结束-->
                        <!--用户登录下拉 开始-->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="<?php echo input('session.avatar'); ?>" />
                                <span class="username username-hide-on-mobile"> <?php echo input('session.realname'); ?></span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo url('User/edit?lang='.input('get.lang').'&id='.input('session.userid')); ?>">
                                        <i class="icon-user"></i> <?php echo \think\Lang::get('v_me_edit'); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo url('Login/logout'); ?>" onClick='return confirm("<?php echo \think\Lang::get('v_confirm_quit'); ?>");'>
                                        <i class="icon-power"></i> <?php echo \think\Lang::get('v_logout'); ?></a>
                                </li>
                            </ul>
                        </li>
                        <!--用户登录下拉 结束-->
                    </ul>
                </div>
                <!--头部右侧横向菜单 结束-->
            </div>
            <!--头部内部 结束-->
        </div>
        <!--头部 结束-->
        <!--头部和内容分割 开始-->
        <div class="clearfix"> </div>
        <!--头部和内容分割 结束-->
        
<link href="__ADMIN__/bootstrap/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/bootstrap/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/bootstrap/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<!--百度编辑器开始-->
<script src="__UEDITOR__/ueditor.config.js" type="text/javascript"></script>
<?php if(!\think\Request::instance()->isMobile()): ?>
    <script src="__UEDITOR__/ueditor.all.min.js" type="text/javascript"></script>
<?php else: ?>
    <script src="__UEDITOR__/mobile.ueditor.all.min.js" type="text/javascript"></script>
<?php endif; if(\think\Request::instance()->get('lang') == 'cn' or \think\Request::instance()->get('lang') == 'tw'): ?>
<script type="text/javascript" charset="utf-8" src="__UEDITOR__/lang/zh-cn/zh-cn.js"></script>
<?php else: ?>
<script type="text/javascript" charset="utf-8" src="__UEDITOR__/lang/en/en.js"></script>
<?php endif; ?>
<!--百度编辑器结束-->
        <!--容器 开始-->
        <div class="page-container">
            <!--侧边栏 开始-->
            <div class="page-sidebar-wrapper">
                <!--侧边栏 开始-->
                <div class="page-sidebar navbar-collapse collapse">
                    <!--有理想的地方，地狱都是天堂-->
<!--Copyright @ df81.com 版权所有-->
<!--作者: 符工@邦明 邮箱：1062129401@qq.com-->
                    <!--侧边栏菜单 开始-->
                    <ul class="page-sidebar-menu  page-header-fixed hidden-sm hidden-xs" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <?php if(is_array($modulelist) || $modulelist instanceof \think\Collection || $modulelist instanceof \think\Paginator): $i = 0; $__LIST__ = $modulelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$modulers): $mod = ($i % 2 );++$i;$isdisplay_array=explode(',',$modulers['isdisplay']); ?>
                        <li class="nav-item <?php if($modulers['id'] == \think\Request::instance()->get('moduleid')): ?>active open<?php endif; ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
				                <?php switch($modulers['id']): case "1": ?><i class="icon-grid"></i><?php break; case "2": ?><i class="icon-book-open"></i><?php break; case "3": ?><i class="icon-doc"></i><?php break; case "4": ?><i class="icon-badge"></i><?php break; case "5": ?><i class="icon-paper-clip"></i><?php break; default: ?><i class="icon-grid"></i>
                                <?php endswitch; ?>
                                <span class="title">
				                    <?php switch($modulers['id']): case "1": ?><?php echo \think\Lang::get('v_product'); break; case "2": ?><?php echo \think\Lang::get('v_news'); break; case "3": ?><?php echo \think\Lang::get('v_about_module'); break; case "4": ?><?php echo \think\Lang::get('v_project'); break; case "5": ?><?php echo \think\Lang::get('v_down'); break; default: ?><?php echo $modulers['title']; endswitch; ?> <?php echo \think\Lang::get('v_manage'); ?>
                                </span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <?php if(in_array(('addinfo'), is_array($isdisplay_array)?$isdisplay_array:explode(',',$isdisplay_array))): ?><!--是否显示添加信息-->
                                <li class="nav-item <?php if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == $modulers['tabledir'] and \think\Request::instance()->action() == 'edit'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url($modulers['tabledir'].'/edit?moduleid='.$modulers['id'].'&lang='.input('get.lang')); ?>" class="nav-link ">
                                        <i class="fa fa-edit"></i>
                                        <?php echo \think\Lang::get('v_add'); switch($modulers['id']): case "1": ?><?php echo \think\Lang::get('v_product'); break; case "2": ?><?php echo \think\Lang::get('v_news'); break; case "3": ?><?php echo \think\Lang::get('v_about_module'); break; case "4": ?><?php echo \think\Lang::get('v_project'); break; case "5": ?><?php echo \think\Lang::get('v_down'); break; default: ?><?php echo $modulers['title']; endswitch; if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == $modulers['tabledir'] and \think\Request::instance()->action() == 'edit'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <!--信息管理-->
                                <li class="nav-item <?php if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == $modulers['tabledir'] and \think\Request::instance()->action() == 'index'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url($modulers['tabledir'].'/index?moduleid='.$modulers['id'].'&lang='.input('get.lang')); ?>" class="nav-link ">
                                        <i class="fa fa-th"></i>
				                        <?php switch($modulers['id']): case "1": ?><?php echo \think\Lang::get('v_product'); break; case "2": ?><?php echo \think\Lang::get('v_news'); break; case "3": ?><?php echo \think\Lang::get('v_about_module'); break; case "4": ?><?php echo \think\Lang::get('v_project'); break; case "5": ?><?php echo \think\Lang::get('v_down'); break; default: ?><?php echo $modulers['title']; endswitch; ?> <?php echo \think\Lang::get('v_manage'); if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == $modulers['tabledir'] and \think\Request::instance()->action() == 'index'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?>
                                    </a>
                                </li>
                                <?php if(in_array(('sort'), is_array($isdisplay_array)?$isdisplay_array:explode(',',$isdisplay_array))): ?><!--是否显示分类-->
                                <li class="nav-item <?php if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == 'Sort'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('Sort/index?moduleid='.$modulers['id'].'&lang='.input('get.lang')); ?>" class="nav-link ">
                                        <i class="fa fa-sitemap"></i>
				                        <?php switch($modulers['id']): case "1": ?><?php echo \think\Lang::get('v_product'); break; case "2": ?><?php echo \think\Lang::get('v_news'); break; case "3": ?><?php echo \think\Lang::get('v_about_module'); break; case "4": ?><?php echo \think\Lang::get('v_project'); break; case "5": ?><?php echo \think\Lang::get('v_down'); break; default: ?><?php echo $modulers['title']; endswitch; ?> <?php echo \think\Lang::get('v_sort'); if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == 'Sort'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?>
                                    </a>
                                </li>
                                <?php endif; if(in_array(('attribute'), is_array($isdisplay_array)?$isdisplay_array:explode(',',$isdisplay_array))): ?><!--是否显示属性-->
                                <li class="nav-item <?php if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == 'Attribute'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('Attribute/index?moduleid='.$modulers['id'].'&lang='.input('get.lang')); ?>" class="nav-link ">
                                        <i class="fa fa-tag"></i>
				                        <?php switch($modulers['id']): case "1": ?><?php echo \think\Lang::get('v_product'); break; case "2": ?><?php echo \think\Lang::get('v_news'); break; case "3": ?><?php echo \think\Lang::get('v_about_module'); break; case "4": ?><?php echo \think\Lang::get('v_project'); break; case "5": ?><?php echo \think\Lang::get('v_down'); break; default: ?><?php echo $modulers['title']; endswitch; ?> <?php echo \think\Lang::get('v_attribute'); if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == 'Attribute'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <!--侧边栏菜单 结束-->

                    <!--有理想的地方，地狱都是天堂-->
<!--Copyright @ df81.com 版权所有-->
<!--作者: 符工@邦明 邮箱：1062129401@qq.com-->
                <div class="page-sidebar-wrapper">
                    <!--响应式水平和侧边栏菜单 开始-->
                    <ul class="page-sidebar-menu visible-sm visible-xs  page-header-fixed">
                        <!--内容管理开始-->
                        <?php if(is_array($modulelist) || $modulelist instanceof \think\Collection || $modulelist instanceof \think\Paginator): $i = 0; $__LIST__ = $modulelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$modulers): $mod = ($i % 2 );++$i;$isdisplay_array=explode(',',$modulers['isdisplay']); ?>
                        <li class="nav-item <?php if($modulers['id'] == \think\Request::instance()->get('moduleid')): ?>active open<?php endif; ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
				                <?php switch($modulers['id']): case "1": ?><i class="icon-grid"></i><?php break; case "2": ?><i class="icon-book-open"></i><?php break; case "3": ?><i class="icon-doc"></i><?php break; case "4": ?><i class="icon-badge"></i><?php break; case "5": ?><i class="icon-paper-clip"></i><?php break; default: ?><i class="icon-grid"></i>
                                <?php endswitch; ?>
                                <span class="title">
				                    <?php switch($modulers['id']): case "1": ?><?php echo \think\Lang::get('v_product'); break; case "2": ?><?php echo \think\Lang::get('v_news'); break; case "3": ?><?php echo \think\Lang::get('v_about_module'); break; case "4": ?><?php echo \think\Lang::get('v_project'); break; case "5": ?><?php echo \think\Lang::get('v_down'); break; default: ?><?php echo $modulers['title']; endswitch; ?> <?php echo \think\Lang::get('v_manage'); ?>
                                </span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <?php if(in_array(('addinfo'), is_array($isdisplay_array)?$isdisplay_array:explode(',',$isdisplay_array))): ?><!--是否显示添加信息-->
                                <li class="nav-item <?php if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == $modulers['tabledir'] and \think\Request::instance()->action() == 'edit'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url($modulers['tabledir'].'/edit?moduleid='.$modulers['id'].'&lang='.input('get.lang')); ?>" class="nav-link ">
                                        <i class="fa fa-edit"></i>
                                        <?php echo \think\Lang::get('v_add'); switch($modulers['id']): case "1": ?><?php echo \think\Lang::get('v_product'); break; case "2": ?><?php echo \think\Lang::get('v_news'); break; case "3": ?><?php echo \think\Lang::get('v_about_module'); break; case "4": ?><?php echo \think\Lang::get('v_project'); break; case "5": ?><?php echo \think\Lang::get('v_down'); break; default: ?><?php echo $modulers['title']; endswitch; if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == $modulers['tabledir'] and \think\Request::instance()->action() == 'edit'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <!--信息管理-->
                                <li class="nav-item <?php if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == $modulers['tabledir'] and \think\Request::instance()->action() == 'index'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url($modulers['tabledir'].'/index?moduleid='.$modulers['id'].'&lang='.input('get.lang')); ?>" class="nav-link ">
                                        <i class="fa fa-th"></i>
				                        <?php switch($modulers['id']): case "1": ?><?php echo \think\Lang::get('v_product'); break; case "2": ?><?php echo \think\Lang::get('v_news'); break; case "3": ?><?php echo \think\Lang::get('v_about_module'); break; case "4": ?><?php echo \think\Lang::get('v_project'); break; case "5": ?><?php echo \think\Lang::get('v_down'); break; default: ?><?php echo $modulers['title']; endswitch; ?> <?php echo \think\Lang::get('v_manage'); if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == $modulers['tabledir'] and \think\Request::instance()->action() == 'index'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?>
                                    </a>
                                </li>
                                <?php if(in_array(('sort'), is_array($isdisplay_array)?$isdisplay_array:explode(',',$isdisplay_array))): ?><!--是否显示分类-->
                                <li class="nav-item <?php if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == 'Sort'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('Sort/index?moduleid='.$modulers['id'].'&lang='.input('get.lang')); ?>" class="nav-link ">
                                        <i class="fa fa-sitemap"></i>
				                        <?php switch($modulers['id']): case "1": ?><?php echo \think\Lang::get('v_product'); break; case "2": ?><?php echo \think\Lang::get('v_news'); break; case "3": ?><?php echo \think\Lang::get('v_about_module'); break; case "4": ?><?php echo \think\Lang::get('v_project'); break; case "5": ?><?php echo \think\Lang::get('v_down'); break; default: ?><?php echo $modulers['title']; endswitch; ?> <?php echo \think\Lang::get('v_sort'); if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == 'Sort'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?>
                                    </a>
                                </li>
                                <?php endif; if(in_array(('attribute'), is_array($isdisplay_array)?$isdisplay_array:explode(',',$isdisplay_array))): ?><!--是否显示属性-->
                                <li class="nav-item <?php if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == 'Attribute'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('Attribute/index?moduleid='.$modulers['id'].'&lang='.input('get.lang')); ?>" class="nav-link ">
                                        <i class="fa fa-tag"></i>
				                        <?php switch($modulers['id']): case "1": ?><?php echo \think\Lang::get('v_product'); break; case "2": ?><?php echo \think\Lang::get('v_news'); break; case "3": ?><?php echo \think\Lang::get('v_about_module'); break; case "4": ?><?php echo \think\Lang::get('v_project'); break; case "5": ?><?php echo \think\Lang::get('v_down'); break; default: ?><?php echo $modulers['title']; endswitch; ?> <?php echo \think\Lang::get('v_attribute'); if($modulers['id'] == \think\Request::instance()->get('moduleid') and \think\Request::instance()->controller() == 'Attribute'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <!--内容管理结束-->
                        <!--全局管理开始-->
                        <li class="nav-item
                            <?php switch(\think\Request::instance()->controller()): case "Field":case "Chat":case "Ad":case "Navigation":case "Comment":case "Area":case "User": ?> active open<?php break; endswitch; ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
				                <i class="icon-globe"></i>
                                <span class="title"><?php echo \think\Lang::get('v_global'); ?></span>
                                <span class="selected"></span><span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php if(\think\Request::instance()->controller() == 'Field'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('Field/index?lang='.input('get.lang')); ?>" class="nav-link "><i class="fa fa-list-alt"></i> <?php echo \think\Lang::get('v_field'); ?> <?php echo \think\Lang::get('v_manage'); if(\think\Request::instance()->controller() == 'Field'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?></a>
                                </li>
                                <?php if(\think\Config::get('chat') == '1'): ?>
                                <li class="nav-item <?php if(\think\Request::instance()->controller() == 'Chat'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('Chat/index?lang='.input('get.lang')); ?>" class="nav-link "><i class="fa fa-comments"></i> <?php echo \think\Lang::get('v_chat'); if(\think\Request::instance()->controller() == 'Chat'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?></a>
                                </li>
                                <?php endif; if(\think\Config::get('advertisement') == '1'): ?>
                                <li class="nav-item <?php if(\think\Request::instance()->controller() == 'Ad'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('Ad/index?lang='.input('get.lang')); ?>" class="nav-link "><i class="fa fa-bullhorn"></i> <?php echo \think\Lang::get('v_ad'); ?> <?php echo \think\Lang::get('v_manage'); if(\think\Request::instance()->controller() == 'Ad'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?></a>
                                </li>
                                <?php endif; if(\think\Config::get('navigation') == '1'): ?>
                                <li class="nav-item <?php if(\think\Request::instance()->controller() == 'Navigation'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('Navigation/index?lang='.input('get.lang')); ?>" class="nav-link "><i class="fa fa-navicon"></i> <?php echo \think\Lang::get('v_navigation'); ?> <?php echo \think\Lang::get('v_manage'); if(\think\Request::instance()->controller() == 'Navigation'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?></a>
                                </li>
                                <?php endif; if(\think\Config::get('comment') == '1'): ?>
                                <li class="nav-item <?php if(\think\Request::instance()->controller() == 'Comment'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('Comment/index?lang='.input('get.lang')); ?>" class="nav-link "><i class="fa fa-commenting-o"></i> <?php echo \think\Lang::get('v_comment'); ?> <?php echo \think\Lang::get('v_manage'); if(\think\Request::instance()->controller() == 'Comment'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?></a>
                                </li>
                                <?php endif; if(\think\Config::get('area') == '1'): ?>
                                <li class="nav-item <?php if(\think\Request::instance()->controller() == 'Area'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('Area/index?lang='.input('get.lang')); ?>" class="nav-link "><i class="fa fa-map-marker"></i> <?php echo \think\Lang::get('v_area_manage'); if(\think\Request::instance()->controller() == 'Area'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?></a>
                                </li>
                                <?php endif; ?>
                                <li class="nav-item <?php if(\think\Request::instance()->controller() == 'User'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('User/index?lang='.input('get.lang')); ?>" class="nav-link "><i class="fa fa-user"></i> <?php echo \think\Lang::get('v_user_manage'); if(\think\Request::instance()->controller() == 'User'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?></a>
                                </li>
                            </ul>
                        </li>
                        <?php if(\think\Config::get('authgroup') == 1 or \think\Config::get('authrule') == 1 or \think\Config::get('language') == 1 or \think\Config::get('module') == 1 or \think\Config::get('parametersetting') == 1 or \think\Config::get('databackup') == 1): ?>
                        <li class="nav-item
                            <?php switch(\think\Request::instance()->controller()): case "AuthGroup":case "AuthRule":case "Language":case "Module":case "Setconfig":case "Databackup": ?> active open<?php break; endswitch; ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
				                <i class="icon-settings"></i>
                                <span class="title"><?php echo \think\Lang::get('v_system_manage'); ?></span>
                                <span class="selected"></span><span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <?php if(\think\Config::get('authgroup') == '1'): ?>
                                <li class="nav-item <?php if(\think\Request::instance()->controller() == 'AuthGroup'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('AuthGroup/index?lang='.input('get.lang')); ?>" class="nav-link "><i class="fa fa-users"></i> <?php echo \think\Lang::get('v_usergroup_manage'); if(\think\Request::instance()->controller() == 'AuthGroup'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?></a>
                                </li>
                                <?php endif; if(\think\Config::get('authrule') == '1'): ?>
                                <li class="nav-item <?php if(\think\Request::instance()->controller() == 'AuthRule'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('AuthRule/index?lang='.input('get.lang')); ?>" class="nav-link "><i class="fa fa-briefcase"></i> <?php echo \think\Lang::get('v_auth_manage'); if(\think\Request::instance()->controller() == 'AuthRule'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?></a>
                                </li>
                                <?php endif; if(\think\Config::get('language') == '1'): ?>
                                <li class="nav-item <?php if(\think\Request::instance()->controller() == 'Language'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('Language/index?lang='.input('get.lang')); ?>" class="nav-link "><i class="fa fa-language"></i> <?php echo \think\Lang::get('v_language_manage'); if(\think\Request::instance()->controller() == 'Language'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?></a>
                                </li>
                                <?php endif; if(\think\Config::get('module') == '1'): ?>
                                <li class="nav-item <?php if(\think\Request::instance()->controller() == 'Module'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('Module/index?lang='.input('get.lang')); ?>" class="nav-link "><i class="fa fa-cubes"></i> <?php echo \think\Lang::get('v_module_manage'); if(\think\Request::instance()->controller() == 'Module'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?></a>
                                </li>
                                <?php endif; if(\think\Config::get('parametersetting') == '1'): ?>
                                <li class="nav-item <?php if(\think\Request::instance()->controller() == 'Setconfig'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('Setconfig/index?lang='.input('get.lang')); ?>" class="nav-link "><i class="fa fa-cogs"></i> <?php echo \think\Lang::get('v_config_setting'); if(\think\Request::instance()->controller() == 'Setconfig'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?></a>
                                </li>
                                <?php endif; if(\think\Config::get('databackup') == '1'): ?>
                                <li class="nav-item <?php if(\think\Request::instance()->controller() == 'Databackup'): ?> active open<?php endif; ?>">
                                    <a href="<?php echo url('Databackup/index?lang='.input('get.lang')); ?>" class="nav-link "><i class="fa fa-database"></i> <?php echo \think\Lang::get('v_data'); ?> <?php echo \think\Lang::get('v_backup'); if(\think\Request::instance()->controller() == 'Databackup'): ?><span class="fa fa-angle-right pull-right"></span><?php endif; ?></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <!--全局管理结束-->
                    </ul>
                    <!--响应式水平和侧边栏 结束-->
                </div>

                </div>
            <!--侧边栏 结束-->
            </div>
            <!--侧边栏 结束-->
            <!--内容 开始-->
            <div class="page-content-wrapper">
                <!--内容主体 开始-->
                <div class="page-content">
                    <!--页面头部 开始-->
                    <!--页面导航 开始-->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li><span><?php echo \think\Lang::get('v_home'); ?></span><i class="fa fa-angle-right"></i></li>
                            <li><span><?php echo \think\Lang::get('v_product_manage'); ?></span><i class="fa fa-angle-right"></i></li>
                            <li><span><?php if($rs['id'] == ''): ?><?php echo \think\Lang::get('v_add'); else: ?><?php echo \think\Lang::get('v_edit'); endif; ?> <?php echo \think\Lang::get('v_product'); ?></span></li>
                        </ul>
                    </div>
                    <!--页面导航 结束-->
                    <!--页面头部 结束-->
                    <!--右侧主体 开始-->
                    <div class="row">
                        <div class="col-md-12">
                            <form name="editform" id="editform" method="post" action="" class="form-horizontal" id="validationForm">
                                <input type="hidden" name="id" value="<?php echo $rs['id']; ?>">
				                <input type="hidden" name="lang" value="<?php echo input('get.lang'); ?>">
				                <input type="hidden" name="moduleid" value="<?php echo input('get.moduleid'); ?>">
                                <?php $isdisplay_array=explode(',',$modulenav['isdisplay']); ?>
                                <div class="portlet bg-green bg-font-white">
                                    <div class="portlet-body">
                                        <div class="tabbable-bordered">
                                            <div class="edit_nav_left">
                                                <i class="fa fa-edit font-white"></i> <span class="font-white"><?php if($rs['id'] == ''): ?><?php echo \think\Lang::get('v_add'); else: ?><?php echo \think\Lang::get('v_edit'); endif; ?> <?php echo \think\Lang::get('v_product'); ?></span>
                                            </div>
                                            <ul class="nav nav-tabs tabs-reversed"></ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_general">
                                                    <div class="form-body">
                                                        <div class="alert alert-danger display-hide"><button class="close" data-close="alert"></button><?php echo \think\Lang::get('v_error_tips'); ?></div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_sort'); ?></label>
                                                            <div class="col-md-5">
                                                                <select name="sortid" onchange="showAttribute(this.value)" autocomplete="off" id="single" class="form-control select2">
										                            <?php $LoadSortID = $rs['sortid']; if(is_array($Sort) || $Sort instanceof \think\Collection || $Sort instanceof \think\Paginator): if( count($Sort)==0 ) : echo "" ;else: foreach($Sort as $key=>$k): if($key==0 && empty($rs['sortid'])) $LoadSortID = $k['id']; ?>
                                                                        <option value="<?php echo $k['id']; ?>" <?php if($rs['sortid']==$k['id']): ?>selected="selected"<?php endif; ?>><?php echo $k['html']; ?> <?php echo $k['title']; ?></option>
                                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <?php if((in_array('attribute',$isdisplay_array))): ?>
                                                            <div id="attNameValue"></div>
                                                        <?php endif; ?>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_title'); ?><span class="required" aria-required="true">*</span></label>
                                                            <div class="col-md-5">
                                                                <div class="input-icon right"><i class="fa"></i><input type="text" class="form-control" name="title" id="title" onblur="strtopy();" value="<?php echo $rs['title']; ?>" /></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_seo'); ?> <?php echo \think\Lang::get('v_title'); ?></label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="seotitle" value="<?php echo $rs['seotitle']; ?>" placeholder="<?php echo \think\Lang::get('v_seo_use_title'); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_keyword'); ?></label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="keyword" value="<?php echo $rs['keyword']; ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_description'); ?></label>
                                                            <div class="col-md-5">
                                                                <textarea name="description" rows="4" class="form-control"><?php echo $rs['description']; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <?php if((in_array('fileurl',$isdisplay_array))): ?>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><?php echo \think\Lang::get('v_upload_file'); ?></label>
                                                                <div class="col-md-5">
                                                                    <div class="input-group"><input name="fileurl" id="file" type="text" class="form-control" value="<?php echo $rs['fileurl']; ?>" /> <span class="input-group-btn"><input type="button" value=" <?php echo \think\Lang::get('v_upload_file'); ?> " class="btn green" onclick="upFiles();"></span></div>
                                                                </div>
                                                            </div>
                                                        <?php endif; if((in_array('morecontents',$isdisplay_array))): ?>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><?php echo \think\Lang::get('v_content_a'); ?></label>
                                                                <div class="col-md-9">
                                                                    <button type="button" name="ShowUeditor1" id="ShowUeditor1" onclick="ShowUeditor1a();" class="btn green btn-sm" /><?php echo \think\Lang::get('v_editor_showornot'); ?></button>
                                                                    <textarea name="content1" id="content1a" style="width:100%; height:350px; display:none;"><?php echo $rs['content1']; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><?php echo \think\Lang::get('v_content_b'); ?></label>
                                                                <div class="col-md-9">
                                                                    <button type="button" name="ShowUeditor2" id="ShowUeditor2" onclick="ShowUeditor2a();" class="btn green btn-sm" /><?php echo \think\Lang::get('v_editor_showornot'); ?></button>
                                                                    <textarea name="content2" id="content2a" style="width:100%; height:350px; display:none;"><?php echo $rs['content2']; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><?php echo \think\Lang::get('v_content_c'); ?></label>
                                                                <div class="col-md-9">
                                                                    <button type="button" name="ShowUeditor3" id="ShowUeditor3" onclick="ShowUeditor3a();" class="btn green btn-sm" /><?php echo \think\Lang::get('v_editor_showornot'); ?></button>
                                                                    <textarea name="content3" id="content3a" style="width:100%; height:350px; display:none;"><?php echo $rs['content3']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><?php echo \think\Lang::get('v_content_a'); ?></label>
                                                                <div class="col-md-9">
                                                                    <textarea name="content1" id="content1a" style="width:100%; height:350px;"><?php echo $rs['content1']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        
                                                            <div class="form-group <?php if((in_array('area',$isdisplay_array))): else: ?>hidden<?php endif; ?>">
                                                                <label class="control-label col-md-3"><?php echo \think\Lang::get('v_area'); ?></label>
                                                                <div class="col-md-9" id="area">
                                                                    <?php $__FOR_START_21539__=1;$__FOR_END_21539__=5;for($i=$__FOR_START_21539__;$i < $__FOR_END_21539__;$i+=1){ ?>
                                                                        <select name="areaid" class="area<?php echo $i; ?> form-control input-small input-inline" data-style="btn-primary">
                                                                            <?php if($rs['id'] != ''): ?><!--编辑状态-->
                                                                                <?php switch($i): case "1": ?><option value="<?php echo $a; ?>" selected><?php break; case "2": ?><option value="<?php echo $b; ?>" selected><?php break; case "3": ?><option value="<?php echo $c; ?>" selected><?php break; case "4": ?><option value="<?php echo $d; ?>" selected><?php break; endswitch; ?>
                                                                                </option>
                                                                            <?php endif; ?>
                                                                        </select>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        
                                                        <?php if((in_array('thumb',$isdisplay_array))): ?>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><?php echo \think\Lang::get('v_img'); ?></label>
                                                                <div class="col-md-5">
                                                                    <div class="input-group"><input name="thumb" id="morepics1" type="text" class="form-control" value="<?php echo $rs['thumb']; ?>" /> <span class="input-group-btn"><input type="button" value=" <?php echo \think\Lang::get('v_upload_img'); ?> " class="btn green" onclick="upImage1();"></span></div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?><!--更多图片-->
                                                        <?php if((in_array('morepics',$isdisplay_array))): ?>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><?php echo \think\Lang::get('v_more_img'); ?></label>
                                                                <div class="col-md-5">
                                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" id="tab1">
												                        <?php if(empty($rs['morepics'])): ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="input-group">
                                                                                        <input type="text" name="morepics[]" id="morepics2" value="<?php echo $rs['morepics']; ?>" class="form-control">
                                                                                        <span class="input-group-btn">
                                                                                            <input type="button" onClick="upImage2();" value=" <?php echo \think\Lang::get('v_upload_img'); ?> " class="btn green borderradius" /><input type="button" class="btn blue borderradius_left0" value="<?php echo \think\Lang::get('v_add_one'); ?>" onClick="javascript:AddRow();" />
                                                                                        </span><input type="hidden" name="fuJ" id="fuJ1" />
                                                                                    </div>
                                                                                </td>
                                                                            </tr>                        
												                        <?php else: if(is_array($morepics) || $morepics instanceof \think\Collection || $morepics instanceof \think\Paginator): $i = 0; $__LIST__ = $morepics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="input-group">
                                                                                            <input type="text" name="morepics[]" id="morepics<?php echo $i+1; ?>" value="<?php echo $img; ?>" class="form-control">
                                                                                            <span class="input-group-btn">
                                                                                                <input type="button" onClick="upImage<?php echo $i+1; ?>();" value=" <?php echo \think\Lang::get('v_upload_img'); ?> " class="btn green borderradius" />
                                                                                                <?php if($i == '1'): ?>
                                                                                                    <input type="button" class="btn blue borderradius_left0" value="<?php echo \think\Lang::get('v_add_one'); ?>" onClick="javascript:AddRow();" />
                                                                                                <?php else: ?>
                                                                                                    <label class="btn red borderradius_left0"><input type="checkbox" class="hidden" id="box1" onClick="javascript:DelRow();" /><?php echo \think\Lang::get('v_delete_this'); ?></label>
                                                                                                <?php endif; ?>
                                                                                            </span><input type="hidden" name="fuJ" id="fuJ1" />
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>                        
                                                                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        <?php endif; if((in_array('price',$isdisplay_array))): ?>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_price'); ?></label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="price" value="<?php if($rs['price'] == ''): ?>0.00<?php else: ?><?php echo $rs['price']; endif; ?>" />
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_market_price'); ?></label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="marketprice" value="<?php if($rs['marketprice'] == ''): ?>0.00<?php else: ?><?php echo $rs['marketprice']; endif; ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_quantity'); ?></label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="quantity" value="<?php if($rs['quantity'] == ''): ?>1000000<?php else: ?><?php echo $rs['quantity']; endif; ?>" onKeyDown="if(event.keyCode==13)event.returnValue=false" onChange="if(/\D/.test(this.value)){alert('<?php echo \think\Lang::get('v_require_number'); ?>！');this.value='1000000';}" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_urlroute'); ?></label>
                                                            <div class="col-md-5">
                                                                <div class="input-icon right"><i class="fa"></i><input type="text" class="form-control" name="urlroute" id="urlroute" placeholder="<?php echo \think\Lang::get('v_urlroute_tips'); ?>" value="<?php echo $rs['urlroute']; ?>" /></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_sequence'); ?></label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="sequence" value="<?php if($rs['sequence'] == ''): ?>0<?php else: ?><?php echo $rs['sequence']; endif; ?>" onKeyDown="if(event.keyCode==13)event.returnValue=false" onChange="if(/\D/.test(this.value)){alert('<?php echo \think\Lang::get('v_require_number'); ?>！');this.value='0';}" />
                                                            </div>
                                                        </div>
                                                        <?php if((in_array('hits',$isdisplay_array))): ?>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_click'); ?></label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="hits" value="<?php if($rs['hits'] == ''): ?>1<?php else: ?><?php echo $rs['hits']; endif; ?>" onKeyDown="if(event.keyCode==13)event.returnValue=false" onChange="if(/\D/.test(this.value)){alert('<?php echo \think\Lang::get('v_require_number'); ?>！');this.value='1';}" />
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                                        <div class="form-group <?php if((in_array('client',$isdisplay_array))): else: ?>hidden<?php endif; ?>">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_client'); ?></label>
                                                            <div class="col-md-5">
                                                                <div class="checkbox-list">
                                                                    <?php $client_array=explode(',',$rs['client']); ?>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="client[]" value="pc" <?php if((in_array('pc',$client_array)) or $rs['client'] == ''): ?>checked="checked"<?php endif; ?>><?php echo \think\Lang::get('v_client_pc'); ?>
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="client[]" value="wap" <?php if((in_array('wap',$client_array)) or $rs['client'] == ''): ?>checked="checked"<?php endif; ?>><?php echo \think\Lang::get('v_client_mobile'); ?>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group <?php if((in_array('status',$isdisplay_array))): else: ?>hidden<?php endif; ?>">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_status'); ?></label>
                                                            <div class="col-md-5">
                                                                <div class="checkbox-list">
                                                                    <?php $status_array=explode(',',$rs['status']); ?>
                                                                    <label class="checkbox-inline">
                                                                        <input name="status[]" type="checkbox" value="view" <?php if((in_array('view',$status_array)) or $rs['status'] == ''): ?>checked="checked"<?php endif; ?> /><?php echo \think\Lang::get('v_status_show'); ?>
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input name="status[]" type="checkbox" class="ml10r5" value="commend" <?php if((in_array('commend',$status_array)) or $rs['status'] == ''): ?>checked="checked"<?php endif; ?> /><?php echo \think\Lang::get('v_status_commend'); ?>
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input name="status[]" type="checkbox" class="ml10r5" value="new" <?php if((in_array('new',$status_array)) or $rs['status'] == ''): ?>checked="checked"<?php endif; ?> /><?php echo \think\Lang::get('v_status_new'); ?>
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input name="status[]" type="checkbox" class="ml10r5" value="hot" <?php if((in_array('hot',$status_array)) or $rs['status'] == ''): ?>checked="checked"<?php endif; ?> /><?php echo \think\Lang::get('v_status_hot'); ?>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group <?php if((in_array('addtime',$isdisplay_array))): else: ?>hidden<?php endif; ?>">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_adddate'); ?></label>
                                                            <div class="col-md-5">
                                                                <div class="input-group date form_datetime">
                                                                    <input type="text" class="form-control" name="addtime" readonly="readonly" value="<?php if(empty($rs['addtime'])){ echo date('Y-m-d H:i:s',time()); }else{ echo date('Y-m-d H:i:s',$rs['addtime']);} ?>" />
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn default date-set"><i class="fa fa-calendar"></i></button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php if((in_array('linkurl',$isdisplay_array))): ?>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?php echo \think\Lang::get('v_jump_url'); ?></label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="linkurl" value="<?php echo $rs['linkurl']; ?>" />
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn green"><i class="fa fa-check"></i> <?php echo \think\Lang::get('v_save'); ?></button>
                                                            <button type="button" class="btn default" onclick="javascript:history.back(-1);"><?php echo \think\Lang::get('v_goback'); ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--右侧主体 结束-->
                </div>
                <!--内容主体 结束-->
            </div>
            <!--内容 结束-->
        </div>
        <!--容器 结束-->
<!--有理想的地方，地狱都是天堂-->
<!--Copyright @ df81.com 版权所有-->
<!--作者: 符工@邦明 邮箱：1062129401@qq.com-->
        <!--底部 开始-->
        <div class="page-footer">
            <div class="page-footer-inner"><?php echo \think\Lang::get('v_version'); ?>：<?php echo \think\Session::get('system_version'); ?> &copy; <?php echo \think\Session::get('system_url'); ?></div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!--底部 结束-->
<!--[if lt IE 9]>
<script src="__ADMIN__/bootstrap/global/plugins/respond.min.js"></script>
<script src="__ADMIN__/bootstrap/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<!--核心插件 开始-->
<script src="__ADMIN__/bootstrap/global/plugins/jquery.min.js" type="text/javascript"></script><!--此次注意，会影响到地区等-->
<script src="__ADMIN__/bootstrap/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!--核心插件 结束-->
<!--皮肤全局脚本 开始-->
<script src="__ADMIN__/bootstrap/global/scripts/app.min.js" type="text/javascript"></script>
<!--皮肤全局脚本 结束-->
<!--皮肤布局脚本 开始-->
<script src="__ADMIN__/bootstrap/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!--皮肤布局脚本 结束-->
<script src="__ADMIN__/js/admin.js" type="text/javascript"></script><!--全选反选-->

<!--汉字转拼音 开始-->
<!--前提要引入JQ-->
<script type="text/javascript">
function strtopy(){
	var abc = $("#title").val();
	$.post("<?php echo url('base/pinyin'); ?>",{title:abc},function(data){
		document.editform.urlroute.value=data;
	});
}
</script>
<!--汉字转拼音 结束-->
<!--日期选择 开始-->
<script src="__ADMIN__/bootstrap/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<?php if(\think\Request::instance()->get('lang') == 'cn'): ?>
<script type="text/javascript" src="__ADMIN__/bootstrap/global/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<?php endif; ?>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
		autoclose: true,
		todayBtn: true,
		<?php if(\think\Request::instance()->get('lang') == 'cn'): ?>
		language: 'zh-CN',
		<?php endif; ?>
		pickerPosition: "bottom-left"
    });
</script>
<!--日期选择 结束-->
<script src="__ADMIN__/bootstrap/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/pages/scripts/components-select2.min.js" type="text/javascript"></script>
<!--文件上传开始-->
<script type="text/plain" id="input_editor" style="display:none;"></script>
<script type="text/javascript">
//弹出文件上传的对话框
    var url='<?php echo url('Ueditor/Index'); ?>';
    //实例化编辑器
    var upload_editor = UE.getEditor('input_editor',{
        serverUrl :url,
        UEDITOR_HOME_URL:'/public/ueditor/',
    });
function upFiles(){
	  
    upload_editor.ready(function(){
        upload_editor.execCommand('serverparam', {
        'userid': 'file',//图片子文件夹，以用户ID命名
        });

        upload_editor.hide();//隐藏编辑器
	    //文件上传监听
        // 需要在ueditor.all.min.js文件中找到d.execCommand("insertHtml",l)之后插入d.fireEvent('afterUpfile',b)
	    upload_editor.addListener('afterUpfile', function (t, arg){
            document.getElementById("file").value=arg[0].url;
        });
    });
	
    //弹出文件上传的对话框
    var myFiles = upload_editor.getDialog("attachment");
    myFiles.open();
} 
</script>
<!--文件上传结束-->
<!--富文本编辑器开始-->
<?php if((in_array('morecontents',$isdisplay_array))): ?>
<script type="text/javascript">
<?php for($i=1;$i<4;$i++){ ?>
function ShowUeditor<?php echo $i; ?>a(){
    var url='<?php echo url('Ueditor/Index'); ?>';
    var ue = UE.getEditor('content<?php echo $i; ?>a',{
        serverUrl :url,
    });
    if(content<?php echo $i; ?>a.style.display=="block"){
        content<?php echo $i; ?>a.style.display='none';
    }else{
        content<?php echo $i; ?>a.style.display='block';
    }
}
<?php } ?>
</script>
<?php else: ?>
<script type="text/javascript">
    var url='<?php echo url('Ueditor/Index'); ?>';
    var ue = UE.getEditor('content1a',{
        serverUrl :url,
    });
</script>
<?php endif; ?>
<!--富文本编辑器结束-->

<!--属性开始-->
<?php if((in_array('attribute',$isdisplay_array))): ?>
<script type="text/javascript">
jQuery(function($) {
    showAttribute(<?php echo $LoadSortID; ?>);
});

var xmlHttp;

function showAttribute(str){ 
    xmlHttp=GetXmlHttpObject()
    if(xmlHttp==null){
        alert ("Browser does not support HTTP Request")
        return
    }
    var url="<?php echo url('Attribute/getAttribute'); ?>"
    url=url+"?sortid="+str
    url=url+"&infoid=<?php echo $rs['id']; ?>"
//    url=url+"&mulu="
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=stateChanged 
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null);
}

function stateChanged(){ 
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
        document.getElementById("attNameValue").innerHTML=xmlHttp.responseText 
    } 
}

function GetXmlHttpObject(){
    var xmlHttp=null;
    try{
        // Firefox, Opera 8.0+, Safari
        xmlHttp=new XMLHttpRequest();
    }
    catch (e){
        //Internet Explorer
        try{xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");}
        catch (e){xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");}
    }
    return xmlHttp;
}
</script>
<?php endif; ?>
<!--属性结束-->
<!--图片上传开始-->
<?php if((in_array('morepics',$isdisplay_array))): $step=13; else: $step=2; endif; $__FOR_START_2007__=1;$__FOR_END_2007__=$step;for($i=$__FOR_START_2007__;$i < $__FOR_END_2007__;$i+=1){ ?>
<script type="text/plain" id="input_editor<?php echo $i; ?>" style="display:none;"></script>
<script type="text/javascript">
    var url='<?php echo url('Ueditor/Index'); ?>';
    var upload_editor<?php echo $i; ?> = UE.getEditor('input_editor<?php echo $i; ?>',{
        serverUrl :url,
        UEDITOR_HOME_URL:'/public/ueditor/',
    });
function upImage<?php echo $i; ?>(){
	  
    upload_editor<?php echo $i; ?>.ready(function(){
        upload_editor<?php echo $i; ?>.execCommand('serverparam', {
        'userid': 'image',
        });

        upload_editor<?php echo $i; ?>.hide();
        upload_editor<?php echo $i; ?>.addListener('beforeInsertImage', function (t,arg){
            document.getElementById("morepics<?php echo $i; ?>").value=arg[0].src;
        });
    });
    var myImage<?php echo $i; ?> = upload_editor<?php echo $i; ?>.getDialog("insertimage");
    myImage<?php echo $i; ?>.open();
}
</script>
<?php } ?>
<!--图片上传结束-->
<!--多图增减开始-->
<?php if((in_array('morepics',$isdisplay_array))): ?>
<script type="text/javascript">
function AddRow(){
//添加一行
    var i =tab1.rows.length;
    var Nam="'div1'";
    var Cod="fuJ"+i;
    var newTr = tab1.insertRow();
	var morepicsNum=<?php echo $morepicsNum; ?>+i;
    //添加列
    var newTd0 = newTr.insertCell();
    newTd0.innerHTML = '<div class="input-group"><input type="text" name="morepics[]" id="morepics'+morepicsNum+'" value="" class="form-control" /><span class="input-group-btn"><input type="button" onClick="upImage'+morepicsNum+'();" value=" <?php echo \think\Lang::get('v_upload_img'); ?> " class="btn green borderradius" /><label class="btn red borderradius_left0"><input type="checkbox" class="hidden" id="box1" onclick="javascript:DelRow();"/ /><?php echo \think\Lang::get('v_delete_this'); ?></label><input type="hidden" name="fuJ" id='+Cod+' /></span></div>';
}
function DelRow(){
//删除一行
    var shu=0;
    var cheCou=document.all("box1");
    for(var i=0;i<cheCou.length;i++){
        if (cheCou[i].checked==true){
            shu++;
        }
    }
    if(shu==cheCou.length){
        return;
    }else  if(shu==0){
        tab1.deleteRow(1);
    }else if(shu==1){
        for(var i=0;i<cheCou.length;i++){
            if(cheCou[i].checked==true){
                tab1.deleteRow(i+1);
            }
        }
    }else if(shu>1){
        for(var a=0;a<shu;a++){
            for(var i=0;i<cheCou.length;i++){
                if(cheCou[i].checked==true){
                    tab1.deleteRow(i+1);
                    break;
                }
            }
        }
    }
}
function GetRow(){
    //获得行索引
    //两个parentElement分别是TD和TR哟，rowIndex是TR的属性
    //this.parentElement.parentElement.rowIndex
    cGetRow=window.event.srcElement.parentElement.parentElement.rowIndex;
}
</script>
<?php endif; ?>
<!--多图增减结束-->
<!--地区开始-->
<script src="__ADMIN__/js/jquery.cxselect.min.js"></script>
<script type="text/javascript">
$('#area').cxSelect({
  url: <?php echo $areaArr; ?>,
  selects: [<?php $__FOR_START_11518__=1;$__FOR_END_11518__=5;for($i=$__FOR_START_11518__;$i < $__FOR_END_11518__;$i+=1){ ?>'area<?php echo $i; ?>'<?php if($i != '4'): ?>,<?php endif; } ?>],
  required: true,
  jsonName: 'title', 
  jsonValue: 'id', 
  jsonSub: '0', 
  nodata: 'none'
});
</script>
<!--地区结束-->
</body>
</html>