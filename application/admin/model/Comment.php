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

class Comment extends Model{
    //列表
	static function index(){
		$keyword = input('keyword');
		$order = ['sequence'=>'desc','id'=>'desc'];
		$where['lang'] = input('lang');
		if(empty($keyword)){
		    $rs = Db::name('comment')->where($where)->order($order)->select();
			$rs = getChildSort($rs);
		}else{//关键词搜索
		    $rs = Db::name('comment')->where($where)->where('content','like',"%$keyword%")->order($order)->select();
			//下面这段竟然是为了数据表不存在的html字段赋值，待改进
			$temp = array();
	        foreach ($rs as $k => $v) {
			        $v['html'] = '';
			        $temp[] = $v;
	        }
			$rs = $temp;
		}
		return $rs;
	}
	
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$comment = Comment::get($id);
			$result = $comment->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$comment = new Comment;
			$result = $comment->allowField(true)->save(input('post.'));
		}
		return $comment->id;
	}
}