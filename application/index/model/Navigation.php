<?php
namespace app\index\model;
use think\Model;
use think\Db;

class Navigation extends Model{
    //四级分类嵌套循环
	static function index($parentid=0,$lang='cn'){
		$order = 'sequence desc,id desc';
		$navigationWhere['parentid'] = $parentid; $navigationWhere['lang'] = $lang;
		$navigation = Db::name('navigation')->where($navigationWhere)->order($order)->select();//一级
        foreach($navigation as $i=> $navigationRs){//二级
			$subWhere['parentid'] = $navigationRs['id'];
            $navigation[$i]['sub'] = Db::name('navigation')->where($subWhere)->order($order)->select();
            foreach($navigation[$i]['sub'] as $j=> $navigationRsRs){//三级
				$subsubWhere['parentid'] = $navigationRsRs['id'];
                $navigation[$i]['sub'][$j]['subsub'] = Db::name('navigation')->where($subsubWhere)->order($order)->select();
                foreach($navigation[$i]['sub'][$j]['subsub'] as $k=> $fourRs){//四级
				    $fourWhere['parentid'] = $fourRs['id'];
                    $navigation[$i]['sub'][$j]['subsub'][$k]['foursub'] = Db::name('navigation')->where($fourWhere)->order($order)->select();
				}
            }  
        }  
		return $navigation;
	}
}