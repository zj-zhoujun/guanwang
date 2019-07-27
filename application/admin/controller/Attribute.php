<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Module as ModuleModel;
use app\admin\model\Sort as SortModel;
use app\admin\model\Attribute as AttributeModel;
use think\Db;

class Attribute extends Base{
    //编辑信息
    public function edit($id=0){
		$lang = input('lang'); $moduleid = input('moduleid');
		
		$haveSort = SortModel::all(['moduleid'=>$moduleid,'lang'=>$lang]);
		if($haveSort==false) $this->error(lang('清先添加分类'),url('Sort/index?moduleid='.$moduleid.'&lan='.$lang));//分类不存在
		
        if(!request()->isPost()){
            $rs = AttributeModel::get($id);
            $this->assign('rs',$rs);
			
            $this->assign("Sort",getChildSort(SortModel::all(['moduleid'=>$moduleid,'lang'=>$lang])));
			$this->assign('moduleid',$moduleid);
            $this->assign("module",ModuleModel::all());

            return $this->fetch();
        }else{
			$result = AttributeModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('操作成功'));
        }		
	}

    //用分页读取数据
    public function index($keyword=""){
		$lang = input('lang'); $moduleid = input('moduleid');

		$rs = AttributeModel::index();

		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());

		$this->assign('moduleid',$moduleid);
		
        return $this->fetch();
    }
	
	//删除单条数据
    public function delete_one(){
	    $id=input('id');
        $attribute = AttributeModel::get($id);
        $attribute->delete();
		//删除对应属性值
		Db::name("Attribute_value")->where("attid=".$id)->delete();
		
		$this->success(lang('操作成功'));
    }	
	
	//批量删除数据
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			$attribute = AttributeModel::get($id);
            $attribute->delete();
		    //删除对应属性值
		    Db::name("Attribute_value")->where("attid=".$id)->delete();
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
            AttributeModel::update($data);
        }
		
		$this->success(lang('操作成功'));
    }	

    //Ajax分类对应属性
    public function getAttribute(){
	    //添加状态获取分类对应的属性名和属性值
	    $sortid=input('sortid');
        $att = Db::name('Attribute');
        $where['sortid'] = $sortid;
        $attribute = $att->where($where)->order('sequence desc,id desc')->select();
		
        //编辑状态获取分类对应的属性值
		$infoid=input('infoid');
        $key = '';
        foreach($attribute as $i=>&$rs){
//			if(!empty($infoid)){
		        $attWhere['infoid'] = $infoid;
		        $attWhere['attid'] = $rs['id'];
		        $attValueTable = Db::name('Attribute_value')->where($attWhere);
				$attRs =   $attValueTable->find();
//		    }
			
		    $key=$i+1;
			echo "    <div class=\"form-group\">";
            echo "    <label class=\"control-label col-md-3\">".$rs['attname']."</label>";
            echo "    <div class=\"col-md-5\">";
			echo "        <input type=\"hidden\" name=\"attValueId".$key."\" value=\"".$attRs['id']."\"><input type=\"hidden\" name=\"attid".$key."\" value=\"".$rs['id']."\">";
			$attValue=explode('|',$rs['attvalue']);
			switch ($rs['fieldtype']){
                case 2:
				    foreach($attValue as $v){
					    $attValueArray=explode("|",$attRs['attvalue']);
						$v2 = str_replace("*","",$v);//替换默认值的*号
						if(empty($infoid)){
						    strpos($v,"*") <1 ? $valueChecked="value=\"".$v2."\" checked=\"checked\"" : $valueChecked="value=\"".$v2."\"";
						}else{
						    in_array($v2,$attValueArray) ? $valueChecked="value=\"".$v2."\" checked=\"checked\"" : $valueChecked="value=\"".$v2."\"";
						}
						echo "<label class=\"checkbox-inline\">";
                        echo "    <input type=\"checkbox\" name=\"attvalue".$key."[]\" ".$valueChecked." />".$v2."&nbsp;&nbsp;";
						echo "</label>";
					}
                    break;
                case 3:
                    echo "<input type=\"text\" name=\"attvalue".$key."\" value=\"".$attRs['attvalue']."\" class=\"form-control\" />";
                    break;
                case 4:
                    echo "<textarea name=\"attvalue".$key."\" class=\"form-control\" rows=\"5\">".$attRs['attvalue']."</textarea>";
                    break;
                default:
                    echo "<select name=\"attvalue".$key."\" class=\"form-control\">";
					foreach($attValue as $v){
						$v2 = str_replace("*","",$v);//替换默认值的*号
						$selected="";
						if($attRs['attvalue']==$v2){
						    $selected=" selected=\"selected\"";
						}elseif(empty($attRs['attvalue'])){
						    if(strpos($v,"*")>0) $selected=" selected=\"selected\"";
						}
					    echo "<option value=\"".$v2."\"".$selected.">".$v2."</option>";
					}
					echo "</select>";
            }
			echo "    </div></div>";
	    }
        echo "<input type=\"hidden\" name=\"arrayNum\" value=\"".$key."\">";
    }

}

?>