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

class Keywordlink extends Model{
    //列表
	static function index(){
		$lang = input('lang'); $keyword = input('keyword');
		$order = ['sequence'=>'desc','id'=>'desc'];
		$keywordlinkTable = Db::name('keywordlink');
		if(empty($keyword)){
		    $rs = $keywordlinkTable->order($order)->paginate(20);
		}else{//关键词搜索
			$pageParam['query']['keyword'] = $keyword;
		    $rs = $keywordlinkTable->where('keyword|linkurl','like',"%$keyword%")->order($order)->paginate(20,false,$pageParam);
		}
		return $rs;
	}
	
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$keywordlink = Keywordlink::get($id);
			$result = $keywordlink->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$keywordlink = new Keywordlink;
			$result = $keywordlink->allowField(true)->save(input('post.'));
		}
		return $keywordlink->id;
	}
}