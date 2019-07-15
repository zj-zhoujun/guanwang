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

class Product extends Validate{
	protected $rule = [
	    ['urlroute','require|alpha|length:1,30','{%v_urlroute_tips}|{%v_urlroute_tips}|{%v_urlroute_tips}'],
	];
	
}