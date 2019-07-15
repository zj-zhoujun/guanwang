<?php
namespace app\common\taglib;
use think\template\TagLib;

class Tag extends TagLib{
    //自定义定义标签列表
    protected $tags = [
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'common'     => ['attr' => 'name,table,where,num,order','close' => 1],
    ];

    //通用标签
	/*
	@name name
	@table 数据表
	@where 查询条件
	@num 数量
	@order 排序
	*/
    public function tagCommon($attr,$content){
        $name = $attr['name'];
        $table = $attr['table'];
        $where = $attr['where'];
        $num = $attr['num'];
        $order = empty($attr['order']) ? 'id desc' : $attr['order'];
        $parse = '<?php ';
        $parse .= '$result = db("'.$table.'")->where("' . $where . '")->limit("'.$num.'")->order("'.$order.'")->select();';
        $parse .= '$__LIST__ = $result;';
        $parse .= ' ?>';
        $parse .= '{volist name="__LIST__" id="' . $name . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }
	
	
}