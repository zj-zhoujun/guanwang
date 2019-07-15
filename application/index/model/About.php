<?php
namespace app\index\model;
use think\Model;
use think\Db;

class About extends Model{
    //列表
	static function index(){
		$lang = config('default_lang');	$keyword = input('keyword'); $sortid = input('sortid'); $order = ['sequence'=>'desc','id'=>'desc'];
		$where['lang'] = $lang;
			
        //父类找子类
        $sortidArr = "";
        foreach(getChildSort(Db::name('sort')->select(),$sortid) as $k => $w){
        	$sortidArr .= $w['id'].",";
        }
		$sortidArr = $sortid.','.$sortidArr;
        $where['sortid'] = array('in',"$sortidArr");
		
		//后台模块设置的前端显示数量
        $listNumRs = Db::name('module')->find(3);
        $listNum = $listNumRs['listnum'];
		if(!empty($sortid)){
			$path = '/'.request()->route('urlroute').'-a'.request()->route('sortid').'-[PAGE].html';
		}else{
			$path = '/about/index-[PAGE].html';
		}
		if(!empty($keyword)) $path .= '?keyword='.$keyword;
		
		//视图查询
		$rs = Db::view('about','id,sortid,areaid,lang,sequence,thumb,urlroute,title,seotitle,keyword,description,content1,addtime,hits')
            ->view('sort',['title'=>'s_title','seotitle'=>'s_seotitle','keyword'=>'s_keyword','description'=>'s_description'],'about.sortid=sort.id')
            ->view('area',['title'=>'a_title'],'about.areaid=area.id')
            ->where($where)->where('find_in_set("view",status)')->where('about.title|about.seotitle|about.keyword|about.description|about.content1|sort.title|sort.seotitle|sort.keyword|sort.description|area.title','like',"%$keyword%")->order($order)
            ->paginate($listNum,false,['page'=>input('param.page')?:1,'path'=>$path]);
		return $rs;
	}
	
    //列表页面包屑
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
	
    //详情页面包屑
	/*
	@lang 语言
	@moduleid 模块ID
	@分类ID
	*/
	static function viewNavigation($lang,$id){
		$where['lang'] = $lang;
		$rs = getParentSort(Db::name('about')->where($where)->select(),$id);
		return $rs;
	}
	
    //三级页面嵌套循环
	static function sortlist($parentid=0,$lang='cn'){
		$order = 'sequence desc,id desc';
		$aboutWhere['parentid'] = $parentid; $aboutWhere['lang'] = $lang;
		$moduleSort = Db::name('about')->where($aboutWhere)->order($order)->select();
        foreach($moduleSort as $i=> $moduleSortRs){
			$subWhere['parentid'] = $moduleSortRs['id'];
            $moduleSort[$i]['sub'] = Db::name('about')->where($subWhere)->order($order)->select();
            foreach($moduleSort[$i]['sub'] as $j=> $moduleSortRsRs){ 
			    $subsubWhere['parentid'] = $moduleSortRsRs['id'];
                $moduleSort[$i]['sub'][$j]['subsub'] = Db::name('about')->where($subsubWhere)->order($order)->select();
            }  
        }  
		return $moduleSort;
	}
	
}