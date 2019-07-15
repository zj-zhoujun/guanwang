<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Field as FieldModel;

class Field extends Base{
    //编辑信息
    public function edit($id=0){
		if(!request()->isPost()){
            $rs = FieldModel::get($id);
            $this->assign('rs',$rs);
			return $this->fetch();
        }else{
			//表单验证
			$checkResult = $this->validate(input('post.'),'Field');
			if($checkResult !== true) $this->error($checkResult);
			
			$lang = input('lang'); $fieldlabel = input('fieldlabel');
			$fieldNum = FieldModel::where(['lang'=>$lang,'fieldlabel'=>$fieldlabel])->count();
			if(($fieldNum>1 and $id>0) or ($fieldNum>0 and $id<1)) $this->error(lang('y_condition_fieldlabel'));
				
			$result = FieldModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}

    //用分页读取数据
    public function index(){
		$rs = FieldModel::index();
		
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
	//删除单条数据
    public function delete_one(){
	    $id=input('id');
        $field = FieldModel::get($id);
        $field->delete();
		$this->success(lang('c_success'));
    }	
	
	//批量删除数据
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			$field = FieldModel::get($id);
            $field->delete();
	    }
		$this->success(lang('c_success'));
    }	
	
	//批量更新数据
    public function update_all(){
		$id = input('id/a');
        $fieldtext = input('fieldtext/a');
        $sequence = input('sequence/a');
        
		foreach($id as $i => $rs){
            $data['id'] = (int)$id[$i];
            $data['fieldtext'] = $fieldtext[$i];
            $data['sequence'] = $sequence[$i];
            FieldModel::update($data);
        }
		
		$this->success(lang('c_success'));
    }	

}

?>