<?php
namespace app\index\controller;
use app\index\model\Sort as SortModel;
use app\index\model\Project as ProjectModel;
use app\index\model\Ad as AdModel;
use app\index\model\AttributeValue as AttributeValueModel;
use app\index\model\Siteinfo as SiteinfoModel;
use app\index\model\Module as ModuleModel;
use think\Db;

class Project extends Base{
	//列表页
    public function index(){
		$lang = config('default_lang');
		//三级分类嵌套循环
		$moduleSort = SortModel::sortlist(4,0,$lang);
		$this->assign('moduleSort',$moduleSort);

        //内页banner
		$pageBanner = '';
		$adRs = AdModel::get(['position'=>'project','typeid'=>1,'lang'=>$lang]);
		if($adRs) $pageBanner = $adRs['thumb'];
		
		//网站信息
		$siteRs = SiteinfoModel::get(['lang'=>$lang]);
		if($siteRs){
			$projecttitle = $siteRs['projecttitle'];
			$projectkeyword = $siteRs['projectkeyword'];
			$projectdescription = $siteRs['projectdescription'];
		}
        //SEO标题，关键词，描述
		$sortid = input('sortid');
		if(!empty($sortid)){
            $seoRs =  SortModel::get($sortid);
            $projecttitle = empty($seoRs['seotitle']) ? $seoRs['title'] : $seoRs['seotitle'];
			$projectkeyword = $seoRs['keyword'];
			$projectdescription = $seoRs['description'];
			//内页banner
		    if(!empty($seoRs['thumb'])) $pageBanner = $seoRs['thumb'];
		}
		$this->assign('pagebanner',$pageBanner);//内页banner
		
		$this->assign('projecttitle',$projecttitle);
		$this->assign('projectkeyword',$projectkeyword);
		$this->assign('projectdescription',$projectdescription);
		
		//面包屑导航
		$listnavigation = ProjectModel::listnavigation($lang,4,$sortid);
		$this->assign('listnavigation',$listnavigation);
		
		//关键词描红
		$keyword = input('keyword') ? : '';
		$this->assign('keyword',$keyword);
		
		//案例列表
		$rs = ProjectModel::index();
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());

        return $this->fetch();
    }
	
	//详情页
    public function view(){
		$id = input('id'); $lang = config('default_lang');
        $rs = ProjectModel::get($id);
        $this->assign('rs',$rs);
		
		//SEO标题
		empty($rs['seotitle']) ? $this->assign('seotitle',$rs['title']) : $this->assign('seotitle',$rs['seotitle']);
            
		//更新浏览次数
		Db::name('project')->where('id',$id)->setInc('hits',1);
			
		$sortid = $rs['sortid'];
        //子类找父类，相关案例的查询条件
        $sortidArr = "";
		$sortData = getParentSort(SortModel::all(),$sortid);
        foreach($sortData as $k => $w){
			$k<count($sortData)-1 ? $sortidArr.=$w['id'].',' : $sortidArr.=$w['id'];
        }
		$this->assign('sortidArr',$sortidArr);
		
		//面包屑导航
		$listnavigation = ProjectModel::listnavigation($lang,4,$sortid);
		$this->assign('listnavigation',$listnavigation);

		//三级分类嵌套循环
		$moduleSort = SortModel::sortlist(4,0,$lang);
		$this->assign('moduleSort',$moduleSort);

        //内页banner
		$adRs = AdModel::get(['position'=>'project','typeid'=>1,'lang'=>$lang]);
		if($adRs) $pageBanner = $adRs['thumb'];
		$sortRs =  SortModel::get($sortid);
		if(!empty($sortRs['thumb'])) $pageBanner = $sortRs['thumb'];
		$this->assign('pagebanner',$pageBanner);
			
		//属性
		$this->assign('attribute',AttributeValueModel::index(4,$id));
	        
	    //上一篇
	    $previous = Db::name('project')->where('id','<',$id)->where('lang','=',$lang)->where('sortid','in',$sortidArr)->order('sequence desc,id desc')->limit(1)->find();
	    $pre = !$previous ? lang('c_nodata') : "<a href=\"".url('/'.$previous['urlroute'].'-c'.$previous['id'])."\">".$previous['title']."</a>";
	    $this->assign('pre',$pre);
	    
	    //下一篇
	    $next=Db::name('project')->where('id','>',$id)->where('lang','=',$lang)->where('sortid','in',$sortidArr)->order('sequence desc,id desc')->limit(1)->find();
	    $next = !$next ? lang('c_nodata') : "<a href=\"".url('/'.$next['urlroute'].'-c'.$next['id'])."\">".$next['title']."</a>";
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
