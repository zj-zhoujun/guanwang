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

class Siteinfo extends Model{
    //新增编辑
	static function edit($action){
		$lang = input('lang');
	    if($action == 'edit'){//编辑
			$siteinfo =Siteinfo::get(['lang' => $lang]);
			$id = $siteinfo['id'];
			$result = $siteinfo->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$siteinfo = new Siteinfo;
			$result = $siteinfo->allowField(true)->save(input('post.'));
		}
		return $siteinfo->id;
	}
}