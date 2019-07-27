<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Siteinfo as SiteinfoModel;
use think\Db;

class Siteinfo extends Base{
    //编辑信息
    public function index($id=0){
		$lang = input('lang');
		if(!request()->isPost()){
			$where['lang'] = $lang;
            $rs = Db::name('siteinfo')->where($where)->order('id desc')->find();
            $this->assign('rs',$rs);
			return $this->fetch();
        }else{
			$siteinfo = SiteinfoModel::all(['lang'=>$lang]);
			$action = $siteinfo ? 'edit' : 'add'; //判断是新增还是编辑
			$result = SiteinfoModel::edit($action);
			if($result < 1) return $result->getError();
			$this->success(lang('操作成功'));
        }		
	}


}

?>