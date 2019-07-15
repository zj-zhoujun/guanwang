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

class Language extends Model{
    //列表
	static function index(){
		$lang = input('lang'); $keyword = input('keyword');
		$order = ['sequence'=>'desc','id'=>'desc'];
		$pageParam['query']['lang'] = $lang;
		$languageTable = Db::name('language');
		if(empty($keyword)){
		    $rs = $languageTable->order($order)->paginate(20,false,$pageParam);
		}else{//关键词搜索
			$pageParam['query']['keyword'] = $keyword;
		    $rs = $languageTable->where('admintitle|viewtitle','like',"%$keyword%")->order($order)->paginate(20,false,$pageParam);
		}
		return $rs;
	}
	
	//目录
    protected function setMuluAttr(){
	    $mulu=strtolower(input('mulu'));//强制小写
		return $mulu;
    }
	
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$language = Language::get($id);
			$result = $language->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$language = new Language;
			$result = $language->allowField(true)->save(input('post.'));
		}
		return $language->id;
	}
}