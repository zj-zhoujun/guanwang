<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\About as AboutModel;
use app\admin\model\Sort as SortModel;
use app\admin\model\Area as AreaModel;
use think\Db;

class About extends Base{
    //编辑信息
    public function edit($id=0){
		$lang = input('lang'); $moduleid = input('moduleid');
		//分类是否存在
		$isSort = SortModel::all(['moduleid'=>$moduleid,'lang'=>$lang]);
		if(empty($isSort)) $this->error(lang('清先添加分类'),url('Sort/index?moduleid='.$moduleid.'&lang='.$lang));
		//地区是否存在
		$isArea = AreaModel::all(['lang'=>$lang]);
		if(empty($isArea)) $this->error(lang('清先添加地区'),url('Area/Index?lang='.$lang));
		
        if(!request()->isPost()){
            $rs = AboutModel::get($id);
            $this->assign('rs',$rs);
			
			//所属父级
			$aboutWhere['lang'] = $lang;
            $this->assign('aboutParent',getChildSort(Db::name('about')->where($aboutWhere)->select()));

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
			$checkResult = $this->validate(input('post.'),'About');
			if($checkResult !== true) $this->error($checkResult);

			$result = AboutModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('操作成功'));
        }		
	}

    //用分页读取数据
    public function index(){
		$rs = AboutModel::index();

		$this->assign('list',$rs);
		$this->assign('total',count($rs));
		
        return $this->fetch();
    }
	
	//删除单条数据
    public function delete_one(){
	    $id=input('id');
		
        //禁止删除含有子分类的分类
		$hasChild = AboutModel::all(['parentid'=>$id]);
        if($hasChild) $this->error(lang('清先删除该分类下的子分类'));

        $about = AboutModel::get($id);
        $about->delete();

		//删除对应属性值
		Db::name("Attribute_value")->where("infoid=".$id)->delete();
		
		$this->success(lang('操作成功'));
    }	
	
	//批量删除数据
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			
            //禁止删除含有子分类的分类
            $hasChild = AboutModel::all(['parentid'=>$id]);
            if($hasChild){
                $this->error(lang('清先删除该分类下的子分类'));
				break;
            }

			$about = AboutModel::get($id);
            $about->delete();
		    //删除对应属性值
		    Db::name("Attribute_value")->where("infoid=".$id)->delete();
	    }
		$this->success(lang('操作成功'));
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

	//批量更新
    public function update_all(){
		$id = input('id/a');
        $sequence = input('sequence/a');
        
		foreach($id as $i => $rs){

            $data['id'] = (int)$id[$i];
            $data['sequence'] = $sequence[$i];
            AboutModel::update($data);
        }
		
		$this->success(lang('操作成功'));
    }	
}

?>