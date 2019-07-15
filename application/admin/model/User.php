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

class User extends Model{
    //列表
	static function index(){
		$lang = input('lang');
		$keyword = input('keyword');
		$order = ['sequence'=>'desc','id'=>'desc'];
		$pageParam['query']['lang'] = $lang;
		if(empty($keyword)){
		    $rs = Db::view('user','*')
                ->view('auth_group_access','*','user.id=auth_group_access.uid')
                ->view('auth_group',['id'=>'Auth_group_id','status','rules','title'],'auth_group_access.group_id=auth_group.id')
                ->order($order)
                ->paginate(20,false,$pageParam);
		}else{//关键词搜索
			$pageParam['query']['keyword'] = $keyword;
			//视图查询
		    $rs = Db::view('user','*')
                ->view('auth_group_access','*','user.id=auth_group_access.uid')
                ->view('auth_group',['id'=>'Auth_group_id','status','rules','title'],'auth_group_access.group_id=auth_group.id')
                ->where('user.realname|user.nation|user.address|user.mobile|user.telephone|user.email|user.qq','like',"%$keyword%")->order($order)
                ->paginate(20,false,$pageParam);
		}
		return $rs;
	}

	//日期
    protected function setAddtimeAttr(){
	    $addtime=strtotime(date('Y-m-d H:i:s'));
		return $addtime;
    }

	//密码
    protected function setPasswordAttr(){
		$password = input("password");
		return md5($password);
    }
	
    //新增编辑
	static function edit($id){
		$groupid = input("groupid");
		$AuthGroupAccess = new AuthGroupAccess;
	    if($id>0){//编辑
		    $password = input('password');
			$user = User::get($id);
			if(empty($password)){//密码为空时，只写入以下字段值（不更新密码字段）
			    $result = $user->allowField(['id','username','realname','avatar'])->save(input('post.'),['id'=>$id]);
			}else{
			    $result = $user->allowField(true)->save(input('post.'),['id'=>$id]);
			}
			//更新auth_group_access表
			$AuthGroupAccess->save(['group_id'=>$groupid],['uid'=>$user->id]);
		}else{//新增
			$user = new User;
			$result = $user->allowField(true)->save(input('post.'));
			//添加auth_group_access表
            $AuthGroupAccess->data(['group_id'=>$groupid,'uid'=>$user->id])->save();
		}
		
		return $user->id;
	}
}