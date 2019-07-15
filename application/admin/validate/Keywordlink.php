<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\validate;
use think\Validate;
use think\Lang;

class Keywordlink extends Validate{
	protected $rule = [
	    ['keyword','require|unique:keywordlink|length:2,50','{%y_condition_keyword}|{%y_condition_keyword}|{%y_condition_keyword}'],
	];
	
}