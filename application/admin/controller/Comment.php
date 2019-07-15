<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Comment as CommentModel;
use think\Db;

class Comment extends Base{
    //用分页读取数据
    public function index(){
		$rs = CommentModel::index();
		
		$this->assign('list',$rs);
		$this->assign('total',count($rs));
		
        return $this->fetch();
    }
	
    //编辑信息
    public function edit($id=0){
        if(!request()->isPost()){
	        $moduleid = input('moduleid');
			$commentView = Db::view('comment','*');
		    switch ($moduleid){
                case 2://新闻模块
		            $rs = $commentView->view('news',['title','id'=>'moduleinfoid'],'comment.infoid=news.id')->find($id);
					$module = "/news";
                    break;
                case 3://下载
		            $rs = $commentView->view('down',['title','id'=>'moduleinfoid'],'comment.infoid=down.id')->find($id);
					$module = "/down";
                    break;
                case 4://单页
		            $rs = $commentView->view('about',['title','id'=>'moduleinfoid'],'comment.infoid=about.id')->find($id);
					$module = "/about";
                    break;
                case 5://案例
		            $rs = $commentView->view('project',['title','id'=>'moduleinfoid'],'comment.infoid=project.id')->find($id);
					$module = "/project";
                    break;
                default://产品模块
		            $rs = $commentView->view('product',['title','id'=>'moduleinfoid'],'comment.infoid=product.id')->find($id);
					$module = "/product";
            }
			
			$LanRs = Db::name('Language')->where("isdefault=1")->find();
			$LanRs['mulu']==$rs['lang'] ? $module="".$module : $module=$rs['lang'].$module;
            $this->assign('rs',$rs);
            $this->assign('module',$module);
			
            return $this->fetch();
        }else{
			$result = CommentModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}
	
	
	
	//删除单条数据
    public function delete_one(){
	    $id=input('id');
        //禁止删除含有子分类的分类
		$hasChild = CommentModel::all(['parentid'=>$id]);
        if($hasChild) $this->error(lang('c_delete_sort_child_first'));
		
        $comment = CommentModel::get($id);
        $comment->delete();
        $this->success(lang('c_success'));
    }	
	
	//批量删除数据
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
            //禁止删除含有子分类的分类
            $hasChild = CommentModel::all(['parentid'=>$id]);
            if($hasChild){
                $this->error(lang('c_delete_sort_child_first'));
				break;
            }
			$comment = CommentModel::get($id);
            $comment->delete();
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
            CommentModel::update($data);
        }
		
		$this->success(lang('c_success'));
    }	
	
	//批量审核
    public function update_pass(){
		$status=input('status/a');
		$id=input('id/a');
		if(empty($id)) $this->error(lang('c_do_check'));
		
		foreach($id as $i => $rs){
            $data['id'] = (int)$id[$i];
            $data['status'] = $status[$i];
            CommentModel::update($data);
        }
		
		$this->success(lang('c_success'));
    }	

	//取消或通过审核
    public function update_status(){
		$id = input('id');
		$status = input('status');
		
        $data['id'] = (int)$id;
        $data['status'] = $status;
        CommentModel::update($data);
		
		$this->success(lang('c_success'));
    }	
	
}


?>