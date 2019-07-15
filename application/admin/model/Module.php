<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\model;
use think\Model;
use think\Db;

class Module extends Model{
    //列表
	static function index(){
		$order = ['sequence'=>'desc','id'=>'desc'];
		$lang = input('lang');
		$pageParam['query']['lang'] = $lang;
		$rs = Db::name('module')->order($order)->paginate(20,false,$pageParam);
		return $rs;
	}
	
	//目录
    protected function setTabledirAttr(){
	    $tabledir=strtolower(input('tabledir'));//强制小写
		return $tabledir;
    }
	
	//是否显示
    protected function setIsdisplayAttr(){
		$isdisplay = '';
		$isdisplay_array=input('isdisplay/a');
        for($i=0;$i<count($isdisplay_array);$i++){
			$i<count($isdisplay_array)-1 ? $isdisplay.=$isdisplay_array[$i]."," : $isdisplay.=$isdisplay_array[$i];
	    }
		return $isdisplay;
    }
	
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$module = Module::get($id);
			$result = $module->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$module = new Module;
			$result = $module->allowField(true)->save(input('post.'));
		}
		return $module->id;
	}
}