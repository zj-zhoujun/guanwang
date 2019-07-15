<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\AuthRule as AuthRuleModel;

class AuthRule extends Base{
    //用分页读取数据
    public function index(){
		$rs = AuthRuleModel::index();

		$this->assign('list',$rs);
		$this->assign('total',count($rs));
		
        return $this->fetch();
    }

    //编辑信息
    public function edit($id=0){
        if(request()->isPost()){
			$result = AuthRuleModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }else{
            $rs = AuthRuleModel::get($id);
            $this->assign('rs',$rs);
			
            $this->assign("AuthRule",getChildSort(AuthRuleModel::all(['modulesign'=>'web'])));
			
            return $this->fetch();
        }		
	}
	
	//删除单条数据
    public function delete_one($id){
        //禁止删除含有子权限的权限
        $hasChild = AuthRuleModel::all(['parentid'=>'id']);
        if($hasChild) $this->error(lang('c_delete_child_auth_first'));

        $AuthRule = AuthRuleModel::get($id);
        $AuthRule->delete();
		
        $this->success(lang('c_success'));
    }	
	
	//批量删除数据
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
            //禁止删除含有子权限的权限
            $hasChild = AuthRuleModel::all(['parentid'=>'id']);
            if($hasChild){
                $this->error(lang('c_delete_child_auth_first'));
				break;
            }
			$AuthRule = AuthRuleModel::get($id);
            $AuthRule->delete();
	    }
		$this->success(lang('c_success'));
    }	
	
	
}


?>