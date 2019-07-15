<?php
namespace app\en\controller;
use app\en\model\Sort as SortModel;
use app\en\model\About as AboutModel;
use app\en\model\Ad as AdModel;
use app\en\model\AttributeValue as AttributeValueModel;
use app\en\model\Guestbook as GuestbookModel;
use app\en\model\Siteinfo as SiteinfoModel;
use app\en\model\Module as ModuleModel;
use think\Db;

class About extends Base{
	//列表页
    public function index(){
		$lang = 'en';

		//单页分类嵌套循环：三级
		$moduleSort = AboutModel::sortlist(0,$lang);
		$this->assign('moduleSort',$moduleSort);

        //内页banner
		$pageBanner = '';
		$adRs = AdModel::get(['position'=>'about','typeid'=>1,'lang'=>$lang]);
		if($adRs) $pageBanner = $adRs['thumb'];
		
		//网站信息
		$siteRs = SiteinfoModel::get(['lang'=>$lang]);
		if($siteRs){
			$abouttitle = $siteRs['abouttitle'];
			$aboutkeyword = $siteRs['aboutkeyword'];
			$aboutdescription = $siteRs['aboutdescription'];
		}
        //SEO标题，关键词，描述
		$sortid = input('sortid');
		if(!empty($sortid)){
            $seoRs =  SortModel::get($sortid);
            $abouttitle = empty($seoRs['seotitle']) ? $seoRs['title'] : $seoRs['seotitle'];
			$aboutkeyword = $seoRs['keyword'];
			$aboutdescription = $seoRs['description'];
			//内页banner
		    if(!empty($seoRs['thumb'])) $pageBanner = $seoRs['thumb'];
		}
		$this->assign('pagebanner',$pageBanner);//内页banner
		
		$this->assign('abouttitle',$abouttitle);
		$this->assign('aboutkeyword',$aboutkeyword);
		$this->assign('aboutdescription',$aboutdescription);
		
		//面包屑导航
		$listnavigation = AboutModel::listnavigation($lang,3,$sortid);
		$this->assign('listnavigation',$listnavigation);
		
		//关键词描红
		$keyword = input('keyword') ? : '';
		$this->assign('keyword',$keyword);
		
		//单页列表
		$rs = AboutModel::index();
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());

        return $this->fetch();
    }
	
	//详情页
    public function view(){
		$id = input('id'); $lang = 'en';
        $rs = AboutModel::get($id);
        $this->assign('rs',$rs);
		
		//SEO标题
		empty($rs['seotitle']) ? $this->assign('seotitle',$rs['title']) : $this->assign('seotitle',$rs['seotitle']);
            
		//更新浏览次数
		Db::name('about')->where('id',$id)->setInc('hits',1);
			
		$sortid = $rs['sortid'];
        //子类找父类，相关单页的查询条件
        $sortidArr = "";
		$sortData = getParentSort(SortModel::all(),$sortid);
        foreach($sortData as $k => $w){
			$k<count($sortData)-1 ? $sortidArr.=$w['id'].',' : $sortidArr.=$w['id'];
        }
		$this->assign('sortidArr',$sortidArr);
		
		//面包屑导航
		$viewNavigation = AboutModel::viewNavigation($lang,$id);
		$this->assign('viewNavigation',$viewNavigation);


		//单页分类嵌套循环：三级
		$moduleSort = AboutModel::sortlist(0,$lang);
		$this->assign('moduleSort',$moduleSort);

        //内页banner
		$adRs = AdModel::get(['position'=>'about','typeid'=>1,'lang'=>$lang]);
		if($adRs) $pageBanner = $adRs['thumb'];
		$aboutRs = AboutModel::get($id);
		if(!empty($aboutRs['thumb'])) $pageBanner = $aboutRs['thumb'];
		$this->assign('pagebanner',$pageBanner);
			
		//属性
		$this->assign('attribute',AttributeValueModel::index(3,$id));
	        
	    //上一篇
	    $previous = Db::name('about')->where('id','<',$id)->where('lang','=',$lang)->where('sortid','in',$sortidArr)->order('sequence desc,id desc')->limit(1)->find();
	    $pre = !$previous ? lang('c_nodata') : "<a href=\"".url('/'.$previous['urlroute'].'-a'.$previous['id'])."\">".$previous['title']."</a>";
	    $this->assign('pre',$pre);
	    
	    //下一篇
	    $next=Db::name('about')->where('id','>',$id)->where('lang','=',$lang)->where('sortid','in',$sortidArr)->order('sequence desc,id desc')->limit(1)->find();
	    $next = !$next ? lang('c_nodata') : "<a href=\"".url('/'.$next['urlroute'].'-a'.$next['id'])."\">".$next['title']."</a>";
	    $this->assign('next',$next);
		
		//插件
		$guestbook = in_array('guestbook',explode(',',$rs['plugin'])) ? 1 : 0;
		$this->assign('guestbook',$guestbook);

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
	
	//详情页
    public function guestbook($id=0){
        if(request()->isPost()){
            $verify = input('post.verify');
            //验证码是否正确
            $captcha = new \think\captcha\Captcha();
            if(!$captcha->check($verify)) $this->error(lang('c_error_verify'));

			$result = GuestbookModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
		}else{
		    $this->error(lang('c_illegal_request'));	
		}
		
	}

}
