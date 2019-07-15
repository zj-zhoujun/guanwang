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

class Module extends Validate{
	protected $rule = [
	    ['tabledir','require|unique:module|alpha|length:2,20','{%y_condition_mulu}|{%y_condition_mulu}|{%y_condition_mulu}|{%y_condition_mulu}'],
	];
	
}