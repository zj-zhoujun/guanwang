<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Json extends Controller{

    public function authurl(){
	    echo json_encode(Db::name('chat')->field('title,id')->limit(2)->order('sequence desc')->select());
	}



}
