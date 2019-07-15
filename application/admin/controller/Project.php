<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Project as ProjectModel;
use app\admin\model\Sort as SortModel;
use app\admin\model\Area as AreaModel;
use think\Db;

class Project extends Base{
    //编辑信息
    public function edit($id=0){
		$lang = input('lang'); $moduleid = input('moduleid');
		
		//分类是否存在
		$isSort = SortModel::all(['moduleid'=>$moduleid,'lang'=>$lang]);
		if(empty($isSort)) $this->error(lang('c_add_sort_first'),url('Sort/index?moduleid='.$moduleid.'&lang='.$lang));
		//地区是否存在
		$isArea = AreaModel::all(['lang'=>$lang]);
		if(empty($isArea)) $this->error(lang('c_add_area'),url('Area/Index?lang='.$lang));
		
        if(!request()->isPost()){
            $rs = ProjectModel::get($id);
            $this->assign('rs',$rs);
			
			$morepicsNum = 2;
            if(!empty($rs['morepics'])){
			    $rs_array=explode('|',$rs['morepics']);
				$this->assign('morepics',$rs_array);
				$morepicsNum = count($rs_array)-1;
            }
			$this->assign('morepicsNum',$morepicsNum);

            //分类赋值
			$langWhere['lang'] = $lang;
			$sortWhere['moduleid'] = $moduleid;
            $this->assign('Sort',getChildSort(Db::name('sort')->where($sortWhere)->where($langWhere)->select()));
			
		    //地区
			$areaArr=json_encode(getAreaArr('Area',0,$lang));
            $this->assign('areaArr',$areaArr);
		
		    //编辑信息时获取地区ID
			$a = ""; $b = ""; $c = ""; $d = "";
            $areaRs =  getParentSort(Db::name('area')->select(),$rs['areaid']);
			foreach($areaRs as $k => $v){
				$abcd = $v['id'];
				switch($k){
                    case 0:
		                $a = $abcd;
                        break;
                    case 1:
		                $b = $abcd;
                        break;
                    case 2:
		                $c = $abcd;
                        break;
                    case 3:
		                $d = $abcd;
                        break;
                }
			}
			$this->assign('a',$a); $this->assign('b',$b); $this->assign('c',$c); $this->assign('d',$d);

            return $this->fetch();
        }else{
			//表单验证
			$checkResult = $this->validate(input('post.'),'Project');
			if($checkResult !== true) $this->error($checkResult);

			$result = ProjectModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}

    //用分页读取数据
    public function index($keyword=""){
		$rs = ProjectModel::index();

		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
	//删除单条数据
    public function delete_one(){
	    $id=input('id');
        $project = ProjectModel::get($id);
        $project->delete();
		//删除对应属性值
		Db::name("Attribute_value")->where("infoid=".$id)->delete();
		
		$this->success(lang('c_success'));
    }	
	
	//批量删除数据
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			$project = ProjectModel::get($id);
            $project->delete();
		    //删除对应属性值
		    Db::name("Attribute_value")->where("infoid=".$id)->delete();
	    }
		$this->success(lang('c_success'));
    }	

	//地区Ajax
    public function getArea(){
        $id = input('id');
		$where['parentid'] = $id;
		$area =  Db::name('Area')->where($where)->order('sequence desc,id desc')->select();
		
		foreach($area as &$rs){
		    $categories[] = $rs;
		}
        if(empty($categories)){
		    return false;
		}else{
		    echo json_encode($categories);
		}
    }	

	//批量更新排序
    public function update_all(){
		$id = input('id/a');
        $sequence = input('sequence/a');
        
		foreach($id as $i => $rs){
            $data['id'] = (int)$id[$i];
            $data['sequence'] = $sequence[$i];
            ProjectModel::update($data);
        }
		
		$this->success(lang('c_success'));
    }	
}

?>