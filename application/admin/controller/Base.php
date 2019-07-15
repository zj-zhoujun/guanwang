<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use think\Controller;
use app\admin\model\Module as ModuleModel;
use think\Db;

class Base extends Controller {
    public function _initialize(){
        $userid = session('userid'); $groupid = session('groupid');
        //判断用户是否登陆
        if(!isset($userid)) $this->redirect(url('Login/index'));

	    //头部语言循环
		$headlang = getTableList('Language',10);
		$this->assign('headlang',$headlang);
		//头部当前语言
		$language = Db::name('Language');
		$nowLangWhere['mulu'] = input('get.lang');
		$nowLang = $language->where($nowLangWhere)->find();
		$this->assign('nowLang',$nowLang);
		
		//默认语言
		$muluRs = $language->where('isdefault=1')->find();
		$mulu = $muluRs['mulu'];
		$this->assign('defaultlang',$mulu);
		
		//启用的语言数量
		$languageNum = $language->where('status=1')->count();
        $this->assign('languageNum',$languageNum);
		
        //（左侧）模块循环
		$moduleWhere['disabled'] = 1;//启用
		$this->assign('modulelist',Db::name('module')->where($moduleWhere)->order('sequence desc')->select());
		
		//导航变量
		$moduleid = input('moduleid');
		$Module = ModuleModel::get($moduleid);
		$this->assign('modulenav',$Module);

        if(($groupid == 1)) return true;//超级管理员允许访问任何页面

    }

    //汉字转拼音
    public function pinyin(){
		$pinyin = new \common\Pinyin();
        $str = input('title'); 
        echo $pinyin->strtopin($str); 
	}

}