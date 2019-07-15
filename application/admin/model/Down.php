<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\model;
use think\Model;
use think\Db;

class Down extends Model{
    //列表
	static function index(){
		$lang = input('lang');
		$keyword = input('keyword');
		$order = ['sequence'=>'desc','id'=>'desc'];
		$where['lang'] = $lang;
		$pageParam['query']['lang'] = $lang;
		$pageParam['query']['keyword'] = $keyword;
		//视图查询
		$rs = Db::view('down','id,sortid,areaid,lang,sequence,title,seotitle,keyword,description,content1,urlroute')
            ->view('sort',['title'=>'s_title','seotitle'=>'s_seotitle','keyword'=>'s_keyword','description'=>'s_description'],'down.sortid=sort.id')
            ->view('area',['title'=>'a_title'],'down.areaid=area.id')
            ->where($where)->where('down.title|down.seotitle|down.keyword|down.description|down.content1|sort.title|sort.seotitle|sort.keyword|sort.description|area.title','like',"%$keyword%")->order($order)
            ->paginate(20,false,$pageParam);
		return $rs;
	}
	
    //状态
    protected function setStatusAttr(){
		$status = '';
		$status_array=input('post.status/a');
        for($i=0;$i<count($status_array);$i++){
			$i<count($status_array)-1 ? $status.=$status_array[$i]."," : $status.=$status_array[$i];
	    }
		return $status;
    }

    //客户端
    protected function setClientAttr(){
		$client = '';
		$client_array=input('post.client/a');
        for($i=0;$i<count($client_array);$i++){
			$i<count($client_array)-1 ? $client.=$client_array[$i]."," : $client.=$client_array[$i];
	    }
		return $client;
    }
	
	//日期
    protected function setAddtimeAttr(){
	    $addtime=strtotime(input('post.addtime'));
		return $addtime;
    }
	
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$down = Down::get($id);
			$result = $down->allowField(true)->save(input('post.'),['id'=>$id]);
			
		    $attribute = Db::name('Attribute_value');
			//没有属性时，删除对应的属性值
			$where['moduleid'] = 5;
			$where['infoid'] = $id;
			$attValueRs = $attribute->where($where)->find();
			if($attValueRs){
			    $attRs = Db::name('Attribute')->find($attValueRs['attid']);
			    if($attRs == false) $attribute->where("attid=".$attValueRs['attid'])->delete();
			}
			//变更类别及对应的属性
			$sortidRs = Db::name('Down')->find($id);
			$sortid = $sortidRs['sortid'];
			if(input('sortid')!=$sortid){
				$attribute->where("infoid=".$id)->delete();
			}
		}else{//新增
			$down = new Down;
			$result = $down->allowField(true)->save(input('post.'));
		}
		
		//添加或更新属性值
		$attributeValue = new AttributeValue;
		$arrayNum=input("arrayNum");
		if($arrayNum>0){
		    for($i=1;$i<$arrayNum+1;$i++){
			    $attValueId=input("attValueId".$i);
				$postAttValue=input("attvalue".$i."/a");
				$data['attvalue']="";
                for($j=0;$j<count($postAttValue);$j++){
		            $data['attvalue'].=$postAttValue[$j]."|";
	            }
		        if(empty($id) || empty($attValueId)){//新增
					$attributeValue->data(['attvalue'=>$data['attvalue'],'attid'=>input("attid".$i),'moduleid'=>5,'infoid'=>$down->id])->save();
				}else{//更新
					$attributeValue->save(['attvalue'=>$data['attvalue'],'attid'=>input("attid".$i),'moduleid'=>5,'infoid'=>$down->id],['id'=>$attValueId]);
				}
		    }
		}
		//返回控制器
		return $down->id;
	}
}