<?php
namespace app\index\model;
use think\Model;
use think\Db;

class Guestbook extends Model{
	//日期
    protected function setAddtimeAttr(){
	    $addtime = input('addtime');
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