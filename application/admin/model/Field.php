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

class Field extends Model{
    //列表
	static function index(){
		$lang = input('lang');
		$keyword = input('keyword');
		$order = ['sequence'=>'desc','id'=>'desc'];
		$where['lang'] = $lang;
		$pageParam['query']['lang'] = $lang;
		$fieldTable = Db::name('field');
		if(empty($keyword)){
		    $rs = $fieldTable->where($where)->order($order)->paginate(20,false,$pageParam);
		}else{//关键词搜索
			$pageParam['query']['keyword'] = $keyword;
		    $rs = $fieldTable->where($where)->where('fieldlabel|fieldtext|fieldvalue','like',"%$keyword%")->order($order)->paginate(20,false,$pageParam);
		}
		return $rs;
	}
	
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$field = Field::get($id);
			$result = $field->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$field = new Field;
			$result = $field->allowField(true)->save(input('post.'));
		}
		return $field->id;
	}
}