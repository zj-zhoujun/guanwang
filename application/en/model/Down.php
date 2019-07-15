<?php
namespace app\en\model;
use think\Model;
use think\Db;

class Down extends Model{
    //列表
	static function index(){
		$lang = 'en';	$keyword = input('keyword'); $sortid = input('sortid'); $order = ['sequence'=>'desc','id'=>'desc'];
		$where['lang'] = $lang;
			
        //父类找子类
        $sortidArr = "";
        foreach(getChildSort(Db::name('sort')->select(),$sortid) as $k => $w){
        	$sortidArr .= $w['id'].",";
        }
		$sortidArr = $sortid.','.$sortidArr;
        $where['sortid'] = array('in',"$sortidArr");
		
		//后台模块设置的前端显示数量
        $listNumRs = Db::name('module')->find(5);
        $listNum = $listNumRs['listnum'];
		if(!empty($sortid)){
			$path = '/en/'.request()->route('urlroute').'-d'.request()->route('sortid').'-[PAGE].html';
		}else{
			$path = '/en/down/index-[PAGE].html';
		}
		if(!empty($keyword)) $path .= '?keyword='.$keyword;
		
		//视图查询
		$rs = Db::view('down','id,sortid,areaid,lang,sequence,thumb,urlroute,title,seotitle,keyword,description,content1,addtime,hits')
            ->view('sort',['title'=>'s_title','seotitle'=>'s_seotitle','keyword'=>'s_keyword','description'=>'s_description'],'down.sortid=sort.id')
            ->view('area',['title'=>'a_title'],'down.areaid=area.id')
            ->where($where)->where('find_in_set("view",status)')->where('down.title|down.seotitle|down.keyword|down.description|down.content1|sort.title|sort.seotitle|sort.keyword|sort.description|area.title','like',"%$keyword%")->order($order)
            ->paginate($listNum,false,['page'=>input('param.page')?:1,'path'=>$path]);
		return $rs;
	}
	
    //面包屑
	/*
	@lang 语言
	@moduleid 模块ID
	@分类ID
	*/
	static function listnavigation($lang,$moduleid,$id){
		$where['lang'] = $lang; $where['moduleid'] = $moduleid;
		$rs = getParentSort(Db::name('sort')->where($where)->select(),$id);
		return $rs;
	}
	
}