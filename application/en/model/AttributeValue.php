<?php
namespace app\en\model;
use think\Model;
use think\Db;

class AttributeValue extends Model{
    //列表
	static function index($moduleid,$id){
		$order = ['sequence'=>'desc','id'=>'desc']; $where['attribute_value.moduleid'] = $moduleid; $where['attribute_value.infoid'] = $id;
	    //视图查询
		$rs = Db::view('attribute_value','id,attvalue')->view('attribute','attname','attribute.id=attribute_value.attid')->where($where)->order($order)->select();
		return $rs;
	}
}