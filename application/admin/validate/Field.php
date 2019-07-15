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

class Field extends Validate{
	protected $rule = [
	    ['fieldlabel','require|alpha|length:3,20','{%y_condition_fieldlabel}|{%y_condition_fieldlabel}|{%y_condition_fieldlabel}'],
	];
	
}