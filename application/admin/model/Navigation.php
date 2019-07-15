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

class Navigation extends Model{
    //列表
	static function index(){
		$keyword = input('keyword'); $lang = input('lang');
		$order = ['sequence'=>'desc','id'=>'desc'];
		$where['lang'] = $lang;
		$navigationTable = Db::name('navigation');
		if(empty($keyword)){
		    $rs = $navigationTable->where($where)->order($order)->select();
			$rs = getChildSort($rs);
		}else{//关键词搜索
		    $rs = $navigationTable->where($where)->where('title','like',"%$keyword%")->order($order)->select();
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
			$navigation = Navigation::get($id);
			$result = $navigation->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$navigation = new Navigation;
			$result = $navigation->allowField(true)->save(input('post.'));
		}
		return $navigation->id;
	}
}