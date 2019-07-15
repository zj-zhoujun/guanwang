<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Sort as SortModel;
use app\admin\model\Product as ProductModel;
use app\admin\model\News as NewsModel;
use app\admin\model\About as AboutModel;
use app\admin\model\Project as ProjectModel;
use app\admin\model\Down as DownModel;
use think\Db;

class Sort extends Base{
    //用分页读取数据
    public function index(){
		$moduleid = input('moduleid');
	    if(empty($moduleid)) $this->error(lang('c_error_parameter'));//所属模块不存在

		$rs = SortModel::index();
		
		$this->assign('list',$rs);
		$this->assign('total',count($rs));
		$this->assign('moduleid',$moduleid);
		
        return $this->fetch();
    }

    //编辑信息
    public function edit($id=0){
		$lang = input('lang');
		$moduleid = input('moduleid');
		
	    if(empty($moduleid)) $this->error(lang('c_error_parameter'));//所属模块不存在

        if(!request()->isPost()){
            $rs = SortModel::get($id);
            $this->assign('rs',$rs);
			
			$where['lang'] = input('lang');
			$where['moduleid'] = input('moduleid');
            $this->assign('Sort',getChildSort(Db::name('sort')->where($where)->select()));
			$this->assign('moduleid',$moduleid);
			
			return $this->fetch();
        }else{
			//表单验证
			$checkResult = $this->validate(input('post.'),'Sort');
			if($checkResult !== true) $this->error($checkResult);

			$result = SortModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}
	
	//删除单条数据
    public function delete_one(){
		$id = input('id');
		//请先删除该分类下的信息
		//产品
		$product = ProductModel::all(['sortid'=>$id]);
        if($product) $this->error(lang('c_delete_sort_info_first'));
		//新闻
		$news = NewsModel::all(['sortid'=>$id]);
        if($news) $this->error(lang('c_delete_sort_info_first'));
		//下载
		$down = DownModel::all(['sortid'=>$id]);
        if($down) $this->error(lang('c_delete_sort_info_first'));
		//单页
		$about = AboutModel::all(['sortid'=>$id]);
        if($about) $this->error(lang('c_delete_sort_info_first'));
		//案例
		$project = ProjectModel::all(['sortid'=>$id]);
        if($project) $this->error(lang('c_delete_sort_info_first'));
		
        //禁止删除含有子分类的分类
		$hasChild = SortModel::all(['parentid'=>$id]);
        if($hasChild) $this->error(lang('c_delete_sort_child_first'));
		
		//删除该分类下的属性
		Db::name('Attribute')->where('sortid='.$id)->delete();
		
        $rs=Db::name('Sort')->delete($id);
        $rs ? $this->success(lang('c_success')) : $this->error(lang('c_fail'));
    }	
	
	//批量删除数据
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			//请先删除该分类下的信息
		    //产品
			$product = ProductModel::all(['sortid'=>$id]);
            if($product){
                $this->error(lang('c_delete_sort_info_first'));
				break;
            }
		    //新闻
            $news = NewsModel::all(['sortid'=>$id]);
            if($news){
                $this->error(lang('c_delete_sort_info_first'));
				break;
            }
		    //下载
            $down = DownModel::all(['sortid'=>$id]);
            if($down){
                $this->error(lang('c_delete_sort_info_first'));
				break;
            }
		    //单页
            $about = AboutModel::all(['sortid'=>$id]);
            if($about){
                $this->error(lang('c_delete_sort_info_first'));
				break;
            }
		    //案例
            $project = ProjectModel::all(['sortid'=>$id]);
            if($project){
                $this->error(lang('c_delete_sort_info_first'));
				break;
            }
            //禁止删除含有子分类的分类
            $hasChild = SortModel::all(['parentid'=>$id]);
            if($hasChild){
                $this->error(lang('c_delete_sort_child_first'));
				break;
            }
		    //删除该分类下的属性
		    Db::name('Attribute')->where('sortid='.$id)->delete();
			
			$sort = SortModel::get($id);
            $sort->delete();
	    }
		$this->success(lang('c_success'));
    }	
	
	//批量更新
    public function update_all(){
		$id = input('id/a');
        $sequence = input('sequence/a');
        
		foreach($id as $i => $rs){
            $data['id'] = (int)$id[$i];
            $data['sequence'] = $sequence[$i];
            SortModel::update($data);
        }
		
		$this->success(lang('c_success'));
    }	
	
}


?>