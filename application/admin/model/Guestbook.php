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

class Guestbook extends Model{
    //列表
	static function index(){
		$lang = input('lang');
		$keyword = input('keyword');
		$order = ['sequence'=>'desc','id'=>'desc'];
		$guestbookTable = Db::name('guestbook');
		if(empty($keyword)){
		    $rs = $guestbookTable->order($order)->paginate(20);
		}else{//关键词搜索
			$pageParam['query']['keyword'] = $keyword;
		    $rs = $guestbookTable->where('title|content|username|realname','like',"%$keyword%")->order($order)->paginate(20);
		}
		return $rs;
	}
	
	//日期
    protected function setAddtimeAttr(){
	    $addtime=strtotime(input('post.addtime'));
		return $addtime;
    }
	
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$guestbook = Guestbook::get($id);
			$result = $guestbook->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$guestbook = new Guestbook;
			$result = $guestbook->allowField(true)->save(input('post.'));
		}
		return $guestbook->id;
	}
}