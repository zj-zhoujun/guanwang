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
use app\admin\model\AuthGroup as AuthGroupModel;
use app\admin\model\AuthGroupAccess as AuthGroupAccessModel;

class AuthGroup extends Base{
    //编辑信息
    public function edit($id=0){
		$lang = input('lang');
		
		if(AuthRuleModel::all()==false) $this->error(lang('c_add_auth_first'),url('AuthRule/edit?lang='.$lang));
		
        if(!request()->isPost()){
            $rs = AuthGroupModel::get($id);
            $this->assign('rs',$rs);
			
            //权限赋值
            $this->assign("AuthRule",getChildSort(AuthRuleModel::all()));
			
			//权限组（部门级别）
            $authgroupData = getChildSort(AuthGroupModel::all());
            $this->assign("authGroup",$authgroupData);
			
            return $this->fetch();
        }else{
			$result = AuthGroupModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}

    //用分页读取数据
    public function index($keyword=""){
		$rs = AuthGroupModel::index();

		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
		//权限分配
        $this->assign("AuthRule",getChildSort(AuthRuleModel::all()));
		
        return $this->fetch();
    }
	
	//删除单条数据
    public function delete_one(){
	    $id=input('id');
		
		//有会员属于该用户组，请先变更会员的用户组
		if(AuthGroupAccessModel::all(['group_id'=>$id])==true) $this->error(lang('c_change_authgroup_first'));
		
        $AuthGroup = AuthGroupModel::get($id);
        $AuthGroup->delete();
		
		$this->success(lang('c_success'));
    }	
	
	//批量删除数据
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));//请选择要删除的数据

		$isid = in_array("1",$selectid);
		if($isid) $this->error(lang('c_delete_cannot_authgroup'));//不可删除创始会员组
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			if(AuthGroupAccessModel::all(['group_id'=>$id])==true) $this->error(lang('c_change_authgroup_first'));
			$AuthGroup = AuthGroupModel::get($id);
            $AuthGroup->delete();
	    }
		$this->success(lang('c_success'));
    }	

	//更新启用
    public function update_status(){
		$id = input('id');
	    $value = input('value');
        
        $data['id'] = (int)$id[$i];
        $data['status'] = $value;
        AuthGroupModel::update($data);

		$this->success(lang('c_success'));
	}
}

?>