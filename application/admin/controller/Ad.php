<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Ad as AdModel;
use think\Db;

class Ad extends Base{
    //用分页读取数据
    public function index(){
		$rs = AdModel::index();

		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
    //编辑信息
    public function edit($id=0){
        if(!request()->isPost()){
            $rs = AdModel::get($id);
            $this->assign('rs',$rs);
			
            $this->assign("Module",Db::name('Module')->where('disabled=1')->order('sequence desc,id desc')->select());
			
            return $this->fetch();
        }else{
			$result = AdModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('操作成功'));
        }		
	}
	
	//删除单条数据
    public function delete_one(){
	    $id=input('id');
        $ad = AdModel::get($id);
        $ad->delete();
		$this->success(lang('操作成功'));
    }	
	
	//批量删除数据
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			$ad = AdModel::get($id);
            $ad->delete();
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
            AdModel::update($data);
        }
		
		$this->success(lang('操作成功'));
    }	
	
}

?>