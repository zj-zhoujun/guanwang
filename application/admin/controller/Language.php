<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Language as LanguageModel;

class Language extends Base{
    //编辑信息
    public function edit($id=0){
        if(!request()->isPost()){
            $rs = LanguageModel::get($id);
            $this->assign('rs',$rs);
			return $this->fetch();
        }else{
			//操作失败，仅限开发者使用
			$this->error(lang('操作失败，仅限开发者'));
			
			//表单验证
			$checkResult = $this->validate(input('post.'),'Language');
			if($checkResult !== true) $this->error($checkResult);
				
			$result = LanguageModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('操作成功'));
        }		
	}

    //用分页读取数据
    public function index(){
		$rs = LanguageModel::index();
		
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
	//删除单条数据
    public function delete_one(){
		//操作失败，仅限开发者使用
		$this->error(lang('操作失败，仅限开发者'));
			
	    $id=input('id');
        $language = LanguageModel::get($id);
        if($language['isdefault']==1) $this->error(lang('c_delete_cannot_default_language'));

        $language->delete();
		$this->success(lang('操作成功'));
    }	
	
	//批量删除数据
    public function delete_all(){
		//操作失败，仅限开发者使用
		$this->error(lang('操作失败，仅限开发者'));
			
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			$language = LanguageModel::get($id);
            if($language['isdefault']==1){
			    $this->error(lang('c_delete_cannot_default_language'));
				break;
			}
            $language->delete();
	    }
		$this->success(lang('操作成功'));
    }	
	
	//批量更新数据
    public function update_all(){
		//操作失败，仅限开发者使用
		$this->error(lang('操作失败，仅限开发者'));
			
		$id = input('id/a');
        $sequence = input('sequence/a');
		$admintitle=input('admintitle/a');
		$viewtitle=input('viewtitle/a');
        
		foreach($id as $i => $rs){
            $data['id'] = (int)$id[$i];
            $data['sequence'] = $sequence[$i];
            $data['admintitle'] = $admintitle[$i];
            $data['viewtitle'] = $viewtitle[$i];
			
			if(empty($admintitle[$i])){
			    $this->error(lang('c_require_admintitle'));
				break;
			}
			if(empty($viewtitle[$i])){
			    $this->error(lang('c_require_viewtitle'));
				break;
			}
			if(!preg_match("/^\d+$/",$sequence[$i])){
			    $this->error(lang('排序必须为0或正整数'));
				break;
			}

            LanguageModel::update($data);
        }
		$this->success(lang('操作成功'));
    }	
	
	//更新启用或默认
    public function update_status_default(){
		//操作失败，仅限开发者使用
		$this->error(lang('操作失败，仅限开发者'));
			
		$id = input('id');
		$field = input('field');
		$value = input('value');
		if($field=='status'){//启用处理
            $CountStatus = LanguageModel::all(['status'=>1])->count();
			$RsStatus = LanguageModel::get($id);
			if($value==0 and $RsStatus['isdefault']==1) $this->error(lang('c_cancel_language_default_first'));
			if($value==0 and $RsStatus['status']==1 and $CountStatus<2) $this->error(lang('至少启用一项'));
            $data['id'] = (int)$id[$i];
            $data['status'] = $value;
			LanguageModel::update($data);
		}
		if($field=='isdefault'){//默认处理
			$RsDefault = LanguageModel::all();
			if($value==1){//设为默认
			    $data['isdefault'] = 1;
				$data['status'] = 1;//设为默认的同时启用
                $data['id'] = (int)$id[$i];
			    LanguageModel::update($data);
				$DataNo['isdefault'] = 0;//其他语言取消默认
                $DataNo['id'] = (int)$id[$i];
			    LanguageModel::update($DataNo);
			}
		}
		$this->success(lang('操作成功'));
    }	

}

?>