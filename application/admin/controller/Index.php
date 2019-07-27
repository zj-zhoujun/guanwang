<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use think\Db;

class Index extends Base{
    public function index(){
		$lang = input('lang');
		
		$where['lang'] = $lang;
		//产品统计
		$productCount = Db::name('product')->where($where)->count();
		$this->assign('productCount',$productCount);
		
		//新闻
		$newsCount = Db::name('news')->where($where)->count();
		$this->assign('newsCount',$newsCount);
		
		//下载
		$downCount = Db::name('down')->where($where)->count();
		$this->assign('downCount',$downCount);
		
		//单页
		$pageCount = Db::name('about')->where($where)->count();
		$this->assign('pageCount',$pageCount);
		
		//案例
		$projectCount = Db::name('project')->where($where)->count();
		$this->assign('projectCount',$projectCount);
		
		//留言
		$guestbookCount = Db::name('guestbook')->where($where)->count();
		$this->assign('guestbookCount',$guestbookCount);
		
		//评论
		$commentCount = Db::name('comment')->count();
		$this->assign('commentCount',$commentCount);
		
        return $this->fetch();
    }
	
	//清理缓存
    public function delCache(){
        $delCacheDo = delDirAndFile(RUNTIME_PATH,true);
		$delCacheDo ? $this->success(lang('操作成功')) : $this->error(lang('操作失败'));
     }	

	
}
