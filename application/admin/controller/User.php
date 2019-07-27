<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\User as UserModel;
use app\admin\model\AuthGroup as AuthGroupModel;
use app\admin\model\AuthGroupAccess as AuthGroupAccessModel;

class User extends Base{
    //添加 / 编辑信息
    public function edit($id=0){
		$lang = input('lang');
		
	    //判断用户组是否存在
	    if(AuthGroupModel::all(['status'=>1])==false) $this->error(lang('清先添加用户组'));
		
	    if(!request()->isPost()){
		    //所属用户组
		    $AuthGroup = AuthGroupModel::all(['status'=>1]);
            $this->assign('AuthGroup',$AuthGroup);
		    //用户-用户组
            $this->assign('AuthGroupAccess',AuthGroupAccessModel::get($id));
            $this->assign('rs',UserModel::get($id));
			
            return $this->fetch();
		}else{
			//操作失败，仅限开发者使用
			$this->error('系统演示，请勿修改');

			$result = UserModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('操作成功'));
		}
    }

    //用分页读取管理员
    public function index($keyword=""){
		$rs = UserModel::index();

		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
	//删除管理员(单条)
    public function delete_one(){
		$id = input('id');
	    if($id==1) $this->error(lang('c_delete_cannot_admin'));
		
		$user = UserModel::get($id);
        $user->delete($id);
		
		//删除用户组的一一对应的关系
		$AuthGroupAccess = AuthGroupAccessModel::get($id);
        $AuthGroupAccess->delete($id);

		$this->success(lang('操作成功'));
    }	
	
	//批量删除管理员
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		$isid = in_array("1",$selectid);
		if($isid) $this->error(lang('c_delete_cannot_admin'));

		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			$user = UserModel::get($id);
            $user->delete();
		    //删除一一对应关系
			$AuthGroupAccess = AuthGroupAccessModel::get($id);
            $AuthGroupAccess->delete();
	    }
		$this->success(lang('操作成功'));
    }	
	
}

?>