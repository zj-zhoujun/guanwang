<?php
namespace app\en\controller;
use app\en\model\Sort as SortModel;
use app\en\model\News as NewsModel;
use app\en\model\Ad as AdModel;
use app\en\model\AttributeValue as AttributeValueModel;
use app\en\model\Siteinfo as SiteinfoModel;
use app\en\model\Module as ModuleModel;
use think\Db;

class News extends Base{
	//列表页
    public function index(){
		$lang = 'en';
		//三级分类嵌套循环
		$moduleSort = SortModel::sortlist(2,0,$lang);
		$this->assign('moduleSort',$moduleSort);

        //内页banner
		$pageBanner = '';
		$adRs = AdModel::get(['position'=>'news','typeid'=>1,'lang'=>$lang]);
		if($adRs) $pageBanner = $adRs['thumb'];
 		
		//网站信息
		$siteRs = SiteinfoModel::get(['lang'=>$lang]);
		if($siteRs){
			$newstitle = $siteRs['newstitle'];
			$newskeyword = $siteRs['newskeyword'];
			$newsdescription = $siteRs['newsdescription'];
		}
        //SEO标题，关键词，描述
		$sortid = input('sortid');
		if(!empty($sortid)){
            $seoRs =  SortModel::get($sortid);
            $newstitle = empty($seoRs['seotitle']) ? $seoRs['title'] : $seoRs['seotitle'];
			$newskeyword = $seoRs['keyword'];
			$newsdescription = $seoRs['description'];
			//内页banner
		    if(!empty($seoRs['thumb'])) $pageBanner = $seoRs['thumb'];
		}
		$this->assign('pagebanner',$pageBanner);//内页banner
		
		$this->assign('newstitle',$newstitle);
		$this->assign('newskeyword',$newskeyword);
		$this->assign('newsdescription',$newsdescription);
		
		//面包屑导航
		$listnavigation = NewsModel::listnavigation($lang,2,$sortid);
		$this->assign('listnavigation',$listnavigation);
		
		//关键词描红
		$keyword = input('keyword') ? : '';
		$this->assign('keyword',$keyword);
		
		//新闻列表
		$rs = NewsModel::index();
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());

        return $this->fetch();
    }
	
	//详情页
    public function view(){
		$id = input('id'); $lang = 'en';
        $rs = NewsModel::get($id);
        $this->assign('rs',$rs);
		
		//SEO标题
		empty($rs['seotitle']) ? $this->assign('seotitle',$rs['title']) : $this->assign('seotitle',$rs['seotitle']);
            
		//更新浏览次数
		Db::name('news')->where('id',$id)->setInc('hits',1);
			
		$sortid = $rs['sortid'];
        //子类找父类，相关新闻的查询条件
        $sortidArr = "";
		$sortData = getParentSort(SortModel::all(),$sortid);
        foreach($sortData as $k => $w){
			$k<count($sortData)-1 ? $sortidArr.=$w['id'].',' : $sortidArr.=$w['id'];
        }
		$this->assign('sortidArr',$sortidArr);
		
		//面包屑导航
		$listnavigation = NewsModel::listnavigation($lang,2,$sortid);
		$this->assign('listnavigation',$listnavigation);

		//三级分类嵌套循环
		$moduleSort = SortModel::sortlist(2,0,$lang);
		$this->assign('moduleSort',$moduleSort);

        //内页banner
		$adRs = AdModel::get(['position'=>'news','typeid'=>1,'lang'=>$lang]);
		if($adRs) $pageBanner = $adRs['thumb'];
		$sortRs =  SortModel::get($sortid);
		if(!empty($sortRs['thumb'])) $pageBanner = $sortRs['thumb'];
		$this->assign('pagebanner',$pageBanner);
			
		//属性
		$this->assign('attribute',AttributeValueModel::index(2,$id));
	        
	    //上一篇
	    $previous = Db::name('news')->where('id','<',$id)->where('lang','=',$lang)->where('sortid','in',$sortidArr)->order('sequence desc,id desc')->limit(1)->find();
	    $pre = !$previous ? lang('c_nodata') : "<a href=\"".url('/'.$previous['urlroute'].'-n'.$previous['id'])."\">".$previous['title']."</a>";
	    $this->assign('pre',$pre);
	    
	    //下一篇
	    $next=Db::name('news')->where('id','>',$id)->where('lang','=',$lang)->where('sortid','in',$sortidArr)->order('sequence desc,id desc')->limit(1)->find();
	    $next = !$next ? lang('c_nodata') : "<a href=\"".url('/'.$next['urlroute'].'-n'.$next['id'])."\">".$next['title']."</a>";
	    $this->assign('next',$next);

        //详细内容站内链接
        $Replace = controller("Replace");
        $Replace ->content($rs['content1']);
		
		//模块是否启用内链
		$moduleRs = ModuleModel::get(2);
		$isdisplay_array = explode(',',$moduleRs['isdisplay']);
		$content1 = in_array('keywordlink',$isdisplay_array) ? $Replace : $rs['content1'];
		//详细内容
		$this->assign('content1',$content1);
		
        return $this->fetch();
	}

}
