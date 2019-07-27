<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;

class Config extends Base{
    public function index(){
        if(!request()->isPost()){
            return $this->fetch();
		}else{
			//表单验证
			$checkResult = $this->validate(input('post.'),'Config');
			if($checkResult !== true) $this->error($checkResult);

            $siteinfo_array = input('post.siteinfo/a');
            $siteinfo = empty($siteinfo_array) ? 0 : $siteinfo_array[0];
            $field_array = input('post.field/a');
            $field = empty($field_array) ? 0 : $field_array[0];
            $guestbook_array = input('post.guestbook/a');
            $guestbook = empty($guestbook_array) ? 0 : $guestbook_array[0];
            $chat_array = input('post.chat/a');
            $chat = empty($chat_array) ? 0 : $chat_array[0];
            $ad_array = input('post.ad/a');
            $ad = empty($ad_array) ? 0 : $ad_array[0];
            $keyword_array = input('post.keyword/a');
            $keyword = empty($keyword_array) ? 0 : $keyword_array[0];
            $navigation_array = input('post.navigation/a');
            $navigation = empty($navigation_array) ? 0 : $navigation_array[0];
            $comment_array = input('post.comment/a');
            $comment = empty($comment_array) ? 0 : $comment_array[0];
            $area_array = input('post.area/a');
            $area = empty($area_array) ? 0 : $area_array[0];
            $user_array = input('post.user/a');
            $user = empty($user_array) ? 0 : $user_array[0];
            $authgroup_array = input('post.authgroup/a');
            $authgroup = empty($authgroup_array) ? 0 : $authgroup_array[0];
            $authrule_array = input('post.authrule/a');
            $authrule = empty($authrule_array) ? 0 : $authrule_array[0];
            $language_array = input('post.language/a');
            $language = empty($language_array) ? 0 : $language_array[0];
            $module_array = input('post.module/a');
            $module = empty($module_array) ? 0 : $module_array[0];
            $parameter_array = input('post.parameter/a');
            $parameter = empty($parameter_array) ? 0 : $parameter_array[0];
            $databackup_array = input('post.databackup/a');
            $databackup = empty($databackup_array) ? 0 : $databackup_array[0];
			
		    $str = "<?php
			//配置文件
			return [
                //公共配置
                'url_common_param' => true,// URL普通方式参数，多语言后缀获取
				
                'view_replace_str' => [
                    '__ADMIN__' => '/public/admin',
                    '__UEDITOR__' => '/public/ueditor',
                ],
				
                'isdisplay' => [
                    'siteinfo' => ".$siteinfo.",
                    'field' => ".$field.",
                    'guestbook' => ".$guestbook.",
                    'chat' => ".$chat.",
                    'ad' => ".$ad.",
                    'keyword' => ".$keyword.",
                    'navigation' => ".$navigation.",
                    'comment' => ".$comment.",
                    'area' => ".$area.",
                    'user' => ".$user.",
                    'authgroup' => ".$authgroup.",
                    'authrule' => ".$authrule.",
                    'language' => ".$language.",
                    'module' => ".$module.",
                    'parameter' => ".$parameter.",
                    'databackup' => ".$databackup.",
                ],
	
			    'water' => '".input('water')."',
			    'waterPosition' => '".input('waterPosition')."',
			    'waterImage' => '".input('waterImage')."',
			    'transparency' => '".input('transparency')."',
			    'waterText' => '".input('waterText')."',
			    'waterfont' => '".input('waterfont')."',
			    'watercolor' => '".input('watercolor')."',
			    'watersize' => '".input('watersize')."',
			    'thumb' => '".input('thumb')."',
			    'thumbwidth' => '".input('thumbwidth')."',
			    'thumbheight' => '".input('thumbheight')."',
			    'imageMaxSize' => '".input('imageMaxSize')."',
			    'fileMaxSize' => '".input('fileMaxSize')."',
			    'thumbnail' => '".input('thumbnail')."',
			    'settheme' => '".input('settheme')."',
			
            ];";
			$configFile = CONF_PATH.request()->module().'/config.php';
		    $result = file_put_contents($configFile,$str);
		    $result ? $this->success(lang('操作成功')) : $this->error(lang('修改失败，请修改').$configFile.lang('文件权限'));
		}
    }

}
