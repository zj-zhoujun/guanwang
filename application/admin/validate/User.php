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

class User extends Validate{
	protected $rule = [
	    ['username','require|unique:user|alphaDash|length:4,20','{%m_require_username}|{%m_username_exists}|{%y_condition_username}|{%y_condition_username}'],
	    ['password','require|length:6,20','{%m_require_password}|{%m_require_password}'],
	    ['vpassword','require|confirm:password','{%m_password_inconsistent}|{%m_password_inconsistent}'],
	];
	
}