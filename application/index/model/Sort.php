<?php
namespace app\index\model;
use think\Model;
use think\Db;

class Sort extends Model{
    //三级分类嵌套循环
	static function sortlist($moduleid=1,$parentid=0,$lang='cn'){
		$order = 'sequence desc,id desc';
		$sortWhere['moduleid'] = $moduleid; $sortWhere['parentid'] = $parentid; $sortWhere['lang'] = $lang;
		$moduleSort = Db::name('sort')->where($sortWhere)->order($order)->select();//一级
        foreach($moduleSort as $i=> $moduleSortRs){//二级
			$subWhere['parentid'] = $moduleSortRs['id'];
            $moduleSort[$i]['sub'] = Db::name('sort')->where($subWhere)->order($order)->select();
            foreach($moduleSort[$i]['sub'] as $j=> $moduleSortRsRs){//三级
				$subsubWhere['parentid'] = $moduleSortRsRs['id'];
                $moduleSort[$i]['sub'][$j]['subsub'] = Db::name('sort')->where($subsubWhere)->order($order)->select();
            }  
        }  
		return $moduleSort;
	}
}