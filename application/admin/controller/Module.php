<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Module as ModuleModel;
use app\admin\model\Attribute as AttributeModel;
use app\admin\model\Sort as SortModel;

class Module extends Base{
    //编辑信息
    public function edit($id=0){
        if(request()->isPost()){
			//表单验证
			$checkResult = $this->validate(input('post.'),'Module');
			if($checkResult !== true) $this->error($checkResult);
				
			$result = ModuleModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }else{
            $rs = ModuleModel::get($id);
            $this->assign('rs',$rs);
			return $this->fetch();
        }		
	}

    //用分页读取数据
    public function index(){
		$rs = ModuleModel::index();
		
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
	//删除单条数据
    public function delete_one(){
	    $id=input('id');
        $module = ModuleModel::get($id);
		
		if(AttributeModel::all(['id'=>$id])==true) $this->error(lang('c_delete_module_att_first'));
		if(SortModel::all(['id'=>$id])==true) $this->error(lang('c_delete_module_sort_first'));
		
        $module->delete();
		$this->success(lang('c_success'));
    }	
	
	//批量删除数据
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			$module = ModuleModel::get($id);
			
		    if(AttributeModel::all(['id'=>$id])==true) $this->error(lang('c_delete_module_att_first'));
		    if(SortModel::all(['id'=>$id])==true) $this->error(lang('c_delete_module_sort_first'));
			
            $module->delete();
	    }
		$this->success(lang('c_success'));
    }	

	//更新启用
    public function update_disabled(){
	    $id = input('id');
	    $value = input('value');
		
	    $CountDisabled = ModuleModel::all(['disabled'=>1])->count();
	    $RsDisabled = ModuleModel::get($id);
	    if($value==0 and $RsDisabled['disabled']==1 and $CountDisabled<2) $this->error(lang('c_atleast_enable'));

        $data['id'] = (int)$id;
        $data['disabled'] = $value;
        ModuleModel::update($data);

	    $this->success(lang('c_success'));
	}

	//批量更新排序
    public function update_all(){
		$id = input('id/a');
        $sequence = input('sequence/a');
 		$listnum = input('listnum/a');
       
		foreach($id as $i => $rs){
            $data['id'] = (int)$id[$i];
            $data['sequence'] = $sequence[$i];
            $data['listnum'] = $listnum[$i];
            ModuleModel::update($data);
        }
		$this->success(lang('c_success'));
    }	
}

?>