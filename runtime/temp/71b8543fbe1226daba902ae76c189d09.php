<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\phpstudy\WWW\1\5bb1e9ba11ab2/application/admin\view\login\index.html";i:1538386267;}*/ ?>
<!--有理想的地方，地狱都是天堂-->
<!--Copyright @ df81.com 版权所有-->
<!--作者: 符工@邦明 邮箱：1062129401@qq.com-->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]--><head>
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
<!--页面级别样式 开始-->
<link href="__ADMIN__/bootstrap/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
<!--页面级别样式  结束-->
<link type="text/css" href="__ADMIN__/css/global.min.css" rel="stylesheet" />
<?php if($season == 'winter'): ?>
    
<style type="text/css">body{background:url(__ADMIN__/bootstrap/pages/img/bg/winter.jpg) center repeat;}</style>
<?php elseif($season == 'autumn'): ?>
    <style type="text/css">body{background:url(__ADMIN__/bootstrap/pages/img/bg/autumn.jpg) center repeat;}</style>
<?php elseif($season == 'summer'): ?>
    <style type="text/css">body{background:url(__ADMIN__/bootstrap/pages/img/bg/summer.jpg) center repeat;}</style>
<?php else: ?>
    <style type="text/css">body{background:url(__ADMIN__/bootstrap/pages/img/bg/spring.jpg) center repeat;}</style>
<?php endif; ?>
<body class="login">
        <!--LOGO 开始-->
        <div class="logo"><img src="__ADMIN__/bootstrap/layouts/layout/img/logo.png" /></div>
        <!--LOGO 结束-->
        <!--登录 开始-->
        <div class="content">
            <!--登录表单 开始-->
            <form name="login" class="login-form" onSubmit="return logincheck();" action="<?php echo url('?lang=cn'); ?>" method="post">
                <h3 class="form-title"><?php echo \think\Lang::get('v_user_login'); ?></h3>
                <div class="form-group">
                    <!--IE8和IE9不支持html5 placeholder,所以我们显示用户名在这里-->
                    <label class="control-label visible-ie8 visible-ie9"><?php echo \think\Lang::get('v_username'); ?></label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input name="username" type="text" class="form-control placeholder-no-fix" maxlength="20" autocomplete="off" placeholder="<?php echo \think\Lang::get('v_username'); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9"><?php echo \think\Lang::get('v_password'); ?></label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input name="password" type="password" class="form-control placeholder-no-fix" maxlength="20" autocomplete="off" placeholder="<?php echo \think\Lang::get('v_password'); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9"><?php echo \think\Lang::get('v_verify'); ?></label>
                    <div class="input-icon">
                        <i class="fa fa-info-circle"></i>
                        <input name="verify" type="text" class="form-control" maxlength="4" autocomplete="off" placeholder="<?php echo \think\Lang::get('v_verify'); ?>" />
                    </div>
                </div>
                <div class="form-actions">
                    <img class="cursor" src="<?php echo url('Captcha/index'); ?>" onclick="this.src='<?php echo url('Captcha/index'); ?>'" border="0" width="125" height="35" align="absmiddle" />
                    <button type="submit" class="btn green pull-right"> <?php echo \think\Lang::get('v_login'); ?> </button>
                </div>
                <div class="login-options">
                    <div class="radio-list">
                        <?php if(is_array($langlist) || $langlist instanceof \think\Collection || $langlist instanceof \think\Paginator): $i = 0; $__LIST__ = $langlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lang): $mod = ($i % 2 );++$i;?>
                            <label class="radio-inline">
                                <input name="language" type="radio" value="<?php echo $lang['mulu']; ?>" <?php if($lang['isdefault'] == '1'): ?> checked="checked"<?php endif; ?> /><img src="<?php echo $lang['ico']; ?>" border="0" width="16" height="11" class="mr5" /><?php echo $lang['admintitle']; ?>
                            </label>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="forget-password">
                    <h4><?php echo $helloChosen; ?></h4>
                </div>
                <div class="create-account">
                    <p><?php echo \think\Lang::get('v_words'); ?></p>
                </div>
            </form>
            <!--登录表单结束-->
        </div>
        <!--登录 结束-->
        <!--版权 开始-->
        <div class="copyright">
            <?php if(\think\Config::get('copyright') == '1'): ?>
                Copyright &copy; <?php echo $system_url; ?> <?php echo $system_name; ?><br><?php echo \think\Lang::get('v_version'); ?>：<?php echo $system_version; endif; ?>
        </div>
        <!--版权 结束-->
<!--[if lt IE 9]>
<script src="__ADMIN__/bootstrap/global/plugins/respond.min.js"></script>
<script src="__ADMIN__/bootstrap/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<!--核心插件 开始-->
<script src="__ADMIN__/bootstrap/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!--核心插件 结束-->
<!--页面级别插件 开始-->
<script src="__ADMIN__/bootstrap/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="__ADMIN__/bootstrap/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!--页面级别插件 结束-->
<!--皮肤全局脚本 开始-->
<script src="__ADMIN__/bootstrap/global/scripts/app.min.js" type="text/javascript"></script>
<!--皮肤全局脚本 结束-->
<script type="text/javascript">
/*function logincheck(){
  var username=document.login.username.value;
  var password=document.login.password.value;
  var verify=document.login.verify.value;
  if(username==""){
      alert("<?php echo \think\Lang::get('v_username_required'); ?>");
      document.login.username.focus();
	  return false;
  }
  if(password==""){
      alert("<?php echo \think\Lang::get('v_password_required'); ?>");
      document.login.password.focus();
	  return false;
  }
  if(verify==""){
      alert("<?php echo \think\Lang::get('v_verify_required'); ?>");
      document.login.verify.focus();
	  return false;
  }
}
*/
var Login = function () {

	var handleLogin = function() {
		$('.login-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                username: {
	                    required: true
	                },
	                password: {
	                    required: true
	                },
	                verify: {
	                    required: true
	                }
	            },

	            messages: {
	                username: {
	                    required: "<?php echo \think\Lang::get('v_username_required'); ?>"
	                },
	                password: {
	                    required: "<?php echo \think\Lang::get('v_password_required'); ?>"
	                },
	                verify: {
	                    required: "<?php echo \think\Lang::get('v_verify_required'); ?>"
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger', $('.login-form')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                    $('.login-form').submit();
	                }
	                return false;
	            }
	        });
	}

	var handleForgetPassword = function () {
		$('.forget-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                email: {
	                    required: true,
	                    email: true
	                }
	            },

	            messages: {
	                email: {
	                    required: "Email is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

	        $('.forget-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.forget-form').validate().form()) {
	                    $('.forget-form').submit();
	                }
	                return false;
	            }
	        });

	        jQuery('#forget-password').click(function () {
	            jQuery('.login-form').hide();
	            jQuery('.forget-form').show();
	        });

	        jQuery('#back-btn').click(function () {
	            jQuery('.login-form').show();
	            jQuery('.forget-form').hide();
	        });

	}

	var handleRegister = function () {

		        function format(state) {
            if (!state.id) { return state.text; }
            var $state = $(
             '<span><img src="__ADMIN__/global/img/flags/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
            );
            
            return $state;
        }

        if (jQuery().select2 && $('#country_list').size() > 0) {
            $("#country_list").select2({
	            placeholder: '<i class="fa fa-map-marker"></i>&nbsp;Select a Country',
	            templateResult: format,
                templateSelection: format,
                width: 'auto', 
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });


	        $('#country_list').change(function() {
	            $('.register-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
    	}


         $('.register-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                
	                fullname: {
	                    required: true
	                },
	                email: {
	                    required: true,
	                    email: true
	                },
	                address: {
	                    required: true
	                },
	                city: {
	                    required: true
	                },
	                country: {
	                    required: true
	                },

	                username: {
	                    required: true
	                },
	                password: {
	                    required: true
	                },
	                rpassword: {
	                    equalTo: "#register_password"
	                },

	                tnc: {
	                    required: true
	                }
	            },

	            messages: { // custom messages for radio buttons and checkboxes
	                tnc: {
	                    required: "Please accept TNC first."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
	                    error.insertAfter($('#register_tnc_error'));
	                } else if (element.closest('.input-icon').size() === 1) {
	                    error.insertAfter(element.closest('.input-icon'));
	                } else {
	                	error.insertAfter(element);
	                }
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

			$('.register-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.register-form').validate().form()) {
	                    $('.register-form').submit();
	                }
	                return false;
	            }
	        });

	        jQuery('#register-btn').click(function () {
	            jQuery('.login-form').hide();
	            jQuery('.register-form').show();
	        });

	        jQuery('#register-back-btn').click(function () {
	            jQuery('.login-form').show();
	            jQuery('.register-form').hide();
	        });
	}
    
    return {
        //main function to initiate the module
        init: function () {
        	
            handleLogin();
            handleForgetPassword();
            handleRegister();    

            // init background slide images
		    $.backstretch([
		        "__ADMIN__/bootstrap/pages/img/bg/<?php echo $season; ?>.jpg"
		        ], {
		          fade: 1000,
		          duration: 8000
		    	}
        	);
        }
    };

}();

jQuery(document).ready(function() {
    Login.init();
});
</script>
</body>
</html>