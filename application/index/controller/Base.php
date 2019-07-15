<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Field as FieldModel;
use app\index\model\Navigation as NavigationModel;
use app\index\model\Siteinfo as SiteinfoModel;
use think\Lang;
use think\Request;

class Base extends Controller{
    public function _initialize(){
		Lang::load(APP_PATH . 'index\\lang\\'.config('default_lang').'.php');//加载语言包
		
		$lang = config('default_lang');
 		//全局参数
		$fieldRs = FieldModel::all(['lang'=>$lang]);
		foreach($fieldRs as $k => $w){
		    $this->assign($w['fieldlabel'],$w['fieldvalue']);
		}
		
		//网站信息
		$siteRs = SiteinfoModel::get(['lang'=>$lang]);
		if($siteRs['sitestatus'] == 0){//关闭网站
			echo $siteRs['closereason'];
			die;
		}
		$this->assign('siteRs',$siteRs);
		
		//导航嵌套循环：四级//JS前端尚未实现四级
		$navigation = NavigationModel::index(0,$lang);
		$this->assign('navigation',$navigation);

        //定义控制器名等常量
        define('MODULE_NAME',Request::instance()->module());//模块名
        define('CONTROLLER_NAME',Request::instance()->controller());//控制器名
        define('ACTION_NAME',Request::instance()->action());//方法名

    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}