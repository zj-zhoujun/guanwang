<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Guestbook as GuestbookModel;

class Guestbook extends Base{
    //编辑信息
    public function edit($id=0){
        if(!request()->isPost()){
            $rs = GuestbookModel::get($id);
            $this->assign('rs',$rs);

            return $this->fetch();
        }else{
			$result = GuestbookModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}

    //用分页读取数据
    public function index($keyword=""){
		$rs = GuestbookModel::index();

		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
	//删除单条数据
    public function delete_one(){
	    $id=input('id');
        $guestbook = GuestbookModel::get($id);
        $guestbook->delete();
		$this->success(lang('c_success'));
    }	
	
	//批量删除数据
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			$guestbook = GuestbookModel::get($id);
            $guestbook->delete();
	    }
		$this->success(lang('c_success'));
    }	

}

?>