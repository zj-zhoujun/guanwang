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

class Config extends Validate{
	protected $rule = [
	    ['waterImage','require','{%y_condition_waterImage}'],
	    ['transparency','require|integer','{%y_condition_transparency}|{%y_condition_transparency}'],
	    ['waterText','require','{%y_condition_waterText}'],
	    ['watercolor','require','{%y_condition_watercolor}'],
	    ['watersize','require|integer','{%y_condition_watersize}|{%y_condition_watersize}'],
	    ['thumbwidth','require|integer','{%y_condition_thumbwidth}|{%y_condition_thumbwidth}'],
	    ['thumbheight','require|integer','{%y_condition_thumbheight}|{%y_condition_thumbheight}'],
	    ['imageMaxSize','require|integer','{%y_condition_imageMaxSize}|{%y_condition_imageMaxSize}'],
	    ['fileMaxSize','require|integer','{%y_condition_fileMaxSize}|{%y_condition_fileMaxSize}'],
	];
	
}