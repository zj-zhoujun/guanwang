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

class About extends Model{
    //列表
	static function index(){
		$lang = input('lang');
		$keyword = input('keyword');
		$order = ['sequence'=>'desc','id'=>'desc'];
		$where['lang'] = $lang;
		//视图查询
		$rs = Db::view('about','id,sortid,parentid,areaid,lang,sequence,title,seotitle,keyword,description,content1,urlroute')
            ->view('sort',['title'=>'s_title','seotitle'=>'s_seotitle','keyword'=>'s_keyword','description'=>'s_description'],'about.sortid=sort.id')
            ->view('area',['title'=>'a_title'],'about.areaid=area.id')
            ->where($where)->where('about.title|about.seotitle|about.keyword|about.description|about.content1|sort.title|sort.seotitle|sort.keyword|sort.description|area.title','like',"%$keyword%")->order($order)
            ->select();
			//下面这段竟然是为了数据表不存在的html字段赋值，待改进
		$rs = getChildSort($rs);
		return $rs;
	}

    //插件
    protected function setPluginAttr(){
		$plugin = '';
	    $plugin_array=input('post.plugin/a');
        for($i=0;$i<count($plugin_array);$i++){
			$i<count($plugin_array)-1 ? $plugin.=$plugin_array[$i]."," : $plugin.=$plugin_array[$i];
	    }
		return $plugin;
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
			$about = About::get($id);
			$result = $about->allowField(true)->save(input('post.'),['id'=>$id]);
			
		    $attribute = Db::name('Attribute_value');
			//没有属性时，删除对应的属性值
			$where['moduleid'] = 3;
			$where['infoid'] = $id;
			$attValueRs = $attribute->where($where)->find();
			if($attValueRs){
			    $attRs = Db::name('Attribute')->find($attValueRs['attid']);
			    if($attRs == false) $attribute->where("attid=".$attValueRs['attid'])->delete();
			}
			//变更类别及对应的属性
			$sortidRs = Db::name('About')->find($id);
			$sortid = $sortidRs['sortid'];
			if(input('sortid')!=$sortid){
				$attribute->where("infoid=".$id)->delete();
			}
		}else{//新增
			$about = new About;
			$result = $about->allowField(true)->save(input('post.'));
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
					$attributeValue->data(['attvalue'=>$data['attvalue'],'attid'=>input("attid".$i),'moduleid'=>3,'infoid'=>$about->id])->save();
				}else{//更新
					$attributeValue->save(['attvalue'=>$data['attvalue'],'attid'=>input("attid".$i),'moduleid'=>3,'infoid'=>$about->id],['id'=>$attValueId]);
				}
		    }
		}
		//返回控制器
		return $about->id;
	}


}