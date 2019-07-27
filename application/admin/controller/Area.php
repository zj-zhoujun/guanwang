<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Area as AreaModel;
use app\admin\model\Product as ProductModel;
use app\admin\model\News as NewsModel;
use app\admin\model\About as AboutModel;
use app\admin\model\Project as ProjectModel;
use app\admin\model\Down as DownModel;
use think\Db;

class Area extends Base{
    //用分页读取数据
    public function index(){
		$rs = AreaModel::index();
		
		$this->assign('list',$rs);
		$this->assign('total',count($rs));
		
        return $this->fetch();
    }

    //编辑信息
    public function edit($id=0){
        if(!request()->isPost()){
            $rs = AreaModel::get($id);
            $this->assign('rs',$rs);
			
			$where['lang'] = input('lang');
            $this->assign('Area',getChildSort(Db::name('area')->where($where)->select()));

            return $this->fetch();
        }else{
			$result = AreaModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('操作成功'));
        }		
	}
	
	//删除单条数据
    public function delete_one(){
		$id = input('id');
		//请先删除该地区下的信息
		//产品
		$product = ProductModel::all(['areaid'=>$id]);
        if($product) $this->error(lang('c_delete_area_info_first'));
		//新闻
		$news = NewsModel::all(['areaid'=>$id]);
        if($news) $this->error(lang('c_delete_area_info_first'));
		//下载
		$down = DownModel::all(['areaid'=>$id]);
        if($down) $this->error(lang('c_delete_area_info_first'));
		//单页
		$about = AboutModel::all(['areaid'=>$id]);
        if($about) $this->error(lang('c_delete_area_info_first'));
		//案例
		$project = ProjectModel::all(['areaid'=>$id]);
        if($project) $this->error(lang('c_delete_area_info_first'));
        //禁止删除含有子地区的地区
		$hasChild = AreaModel::all(['parentid'=>$id]);
        if($hasChild) $this->error(lang('c_delete_area_child_first'));

        $area = AreaModel::get($id);
		$area->delete();
        $this->success(lang('操作成功'));
    }	
	
	//批量删除数据
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			//请先删除该分类下的信息
		    //产品
			$product = ProductModel::all(['areaid'=>$id]);
            if($product){
                $this->error(lang('c_delete_area_info_first'));
				break;
            }
		    //新闻
            $news = NewsModel::all(['areaid'=>$id]);
            if($news){
                $this->error(lang('c_delete_area_info_first'));
				break;
            }
		    //下载
            $down = DownModel::all(['areaid'=>$id]);
            if($down){
                $this->error(lang('c_delete_area_info_first'));
				break;
            }
		    //单页
            $about = AboutModel::all(['areaid'=>$id]);
            if($about){
                $this->error(lang('c_delete_area_info_first'));
				break;
            }
		    //案例
            $project = ProjectModel::all(['areaid'=>$id]);
            if($project){
                $this->error(lang('c_delete_area_info_first'));
				break;
            }
            //禁止删除含有子分类的分类
            $hasChild = AreaModel::all(['parentid'=>$id]);
            if($hasChild){
                $this->error(lang('c_delete_area_child_first'));
				break;
            }
			
			$area = AreaModel::get($id);
            $area->delete();
	    }
		$this->success(lang('操作成功'));
    }	
	
	//批量更新
    public function update_all(){
		$id = input('id/a');
        $sequence = input('sequence/a');
        
		foreach($id as $i => $rs){
            $data['id'] = (int)$id[$i];
            $data['sequence'] = $sequence[$i];
            AreaModel::update($data);
        }
		
		$this->success(lang('操作成功'));
    }	
	
}


?>