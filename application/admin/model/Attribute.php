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

class Attribute extends Model{
    //列表
	static function index(){
		$lang = input('lang'); $moduleid = input('moduleid');
		$keyword = input('keyword');
		$order = ['sequence'=>'desc','id'=>'desc'];
		$where['lang'] = $lang;
		$where['moduleid'] = $moduleid;
		$pageParam['query']['lang'] = $lang;
		if(empty($keyword)){
			//视图查询
		    $rs = Db::view('attribute','id,moduleid,sortid,fieldtype,sequence,attname,attvalue,lang')
                ->view('sort',['title'=>'s_title','seotitle'=>'s_seotitle','keyword'=>'s_keyword','description'=>'s_description'],'attribute.sortid=sort.id')
                ->where($where)->order($order)
                ->paginate(20,false,$pageParam);
		}else{//关键词搜索
			$pageParam['query']['keyword'] = $keyword;
			//视图查询
		    $rs = Db::view('attribute','id,moduleid,sortid,fieldtype,sequence,attname,attvalue,lang')
                ->view('sort',['title'=>'s_title','seotitle'=>'s_seotitle','keyword'=>'s_keyword','description'=>'s_description'],'attribute.sortid=sort.id')
                ->where($where)->where('attribute.attname|attribute.attvalue|sort.title|sort.seotitle|sort.keyword|sort.description','like',"%$keyword%")->order($order)
                ->paginate(20,false,$pageParam);
		}
		return $rs;
	}
}