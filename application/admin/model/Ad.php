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

class Ad extends Model{
    protected function setPositionAttr(){
	    $position=implode(',',input('post.position/a'));
		return $position;
    }

    //列表
	static function index(){
		$lang = input('lang');
		$keyword = input('keyword');
		$order = ['sequence'=>'desc','id'=>'desc'];
		$where['lang'] = $lang;
		$pageParam['query']['lang'] = $lang;
		if(empty($keyword)){
		    $rs = Db::name('ad')->where($where)->order($order)->paginate(20,false,$pageParam);
		}else{//关键词搜索
			$pageParam['query']['keyword'] = $keyword;
		    $rs = Db::name('ad')->where($where)->where('title|description','like',"%$keyword%")->order($order)->paginate(20,false,$pageParam);
		}
		return $rs;
	}

    //客户端
    protected function setClientAttr(){
        $client = '';
		$client_array=input('post.client/a');
        for($i=0;$i<count($client_array);$i++){
			$i<count($client_array)-1 ? $client.=$client_array[$i]."," : $client.=$client_array[$i];
	    }
		return $client;
    }
	
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$ad = Ad::get($id);
			$result = $ad->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$ad = new Ad;
			$result = $ad->allowField(true)->save(input('post.'));
		}
		return $ad->id;
	}
}