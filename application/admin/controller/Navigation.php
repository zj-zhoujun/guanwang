<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Navigation as NavigationModel;

class Navigation extends Base{
    //用分页读取数据
    public function index(){
		$rs = NavigationModel::index();
		
		$this->assign('list',$rs);
		$this->assign('total',count($rs));
		
        return $this->fetch();
    }

    //编辑信息
    public function edit($id=0){
			$lang = input('lang');
        if(!request()->isPost()){
            $rs = NavigationModel::get($id);
            $this->assign('rs',$rs);
			
            $this->assign("Navigation",getChildSort(NavigationModel::all(['lang'=>$lang])));
			
			return $this->fetch();
        }else{
			$result = NavigationModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'),url('navigation/index?lang='.$lang));
        }		
	}
	
	//删除单条数据
    public function delete_one(){
		$id = input('id');
        //禁止删除含有子分类的分类
        $hasChild = NavigationModel::all(['parentid'=>$id]);
        if($hasChild) $this->error(lang('c_delete_sort_child_first'));
		
		$navigation = NavigationModel::get($id);
        $navigation->delete($id);
        $this->success(lang('c_success'));
    }	
	
	//批量删除数据
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
        for($i=0;$i<count($selectid);$i++){
		    $id=$selectid[$i];
			
            //禁止删除含有子分类的分类
            $hasChild = NavigationModel::all(['parentid'=>$id]);
            if($hasChild){
                $this->error(lang('c_delete_sort_child_first'));
				break;
            }
			
			$navigation = NavigationModel::get($id);
            $navigation->delete($id);
	    }
        $this->success(lang('c_success'));
    }	
	
	//批量更新排序
    public function update_all(){
		$id = input('id/a');
        $sequence = input('sequence/a');

		foreach($id as $i => $rs){
            $data['id'] = (int)$id[$i];
            $data['sequence'] = $sequence[$i];
            NavigationModel::update($data);
        }
		
		$this->success(lang('c_success'));
    }	
	
}

?>