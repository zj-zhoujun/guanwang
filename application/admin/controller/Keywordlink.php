<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Keywordlink as KeywordlinkModel;
use think\Db;

class Keywordlink extends Base{
    //用分页读取数据
    public function index(){
		$rs = KeywordlinkModel::index();
		
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
    //编辑信息
    public function edit($id=0){
        if(!request()->isPost()){
            $rs = Db::name('keywordlink')->find($id);
            $this->assign('rs',$rs);
			return $this->fetch();
        }else{
			//表单验证
			$checkResult = $this->validate(input('post.'),'Keywordlink');
			if($checkResult !== true) $this->error($checkResult);
				
			$result = KeywordlinkModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('操作成功'));
        }		
	}
	
	//删除单条数据
    public function delete_one(){
	    $id=input('id');
        $keywordlink = KeywordlinkModel::get($id);
        $keywordlink->delete();
		$this->success(lang('操作成功'));
    }	
	
	//批量删除数据
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			$keywordlink = KeywordlinkModel::get($id);
            $keywordlink->delete();
	    }
		$this->success(lang('操作成功'));
    }	
	
	//批量更新排序
    public function update_all(){
		$id = input('id/a');
        $sequence = input('sequence/a');
        
		foreach($id as $i => $rs){
            $data['id'] = (int)$id[$i];
            $data['sequence'] = $sequence[$i];
            KeywordlinkModel::update($data);
        }
		$this->success(lang('操作成功'));
    }	
	
}


?>