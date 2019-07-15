<?php
namespace app\index\controller;
use app\index\model\Sort as SortModel;
use app\index\model\Down as DownModel;
use app\index\model\Ad as AdModel;
use app\index\model\AttributeValue as AttributeValueModel;
use app\index\model\Siteinfo as SiteinfoModel;
use app\index\model\Module as ModuleModel;
use think\Db;

class Down extends Base{
	//列表页
    public function index(){
		$lang = config('default_lang');
		//三级分类嵌套循环
		$moduleSort = SortModel::sortlist(5,0,$lang);
		$this->assign('moduleSort',$moduleSort);

        //内页banner
		$pageBanner = '';
		$adRs = AdModel::get(['position'=>'down','typeid'=>1,'lang'=>$lang]);
		if($adRs) $pageBanner = $adRs['thumb'];
  		
		//网站信息
		$siteRs = SiteinfoModel::get(['lang'=>$lang]);
		if($siteRs){
			$downtitle = $siteRs['downtitle'];
			$downkeyword = $siteRs['downkeyword'];
			$downdescription = $siteRs['downdescription'];
		}
       //SEO标题，关键词，描述
		$sortid = input('sortid');
		if(!empty($sortid)){
            $seoRs =  SortModel::get($sortid);
            $downtitle = empty($seoRs['seotitle']) ? $seoRs['title'] : $seoRs['seotitle'];
			$downkeyword = $seoRs['keyword'];
			$downdescription = $seoRs['description'];
			//内页banner
		    if(!empty($seoRs['thumb'])) $pageBanner = $seoRs['thumb'];
		}
		$this->assign('pagebanner',$pageBanner);//内页banner
		
		$this->assign('downtitle',$downtitle);
		$this->assign('downkeyword',$downkeyword);
		$this->assign('downdescription',$downdescription);
		
		//面包屑导航
		$listnavigation = DownModel::listnavigation($lang,5,$sortid);
		$this->assign('listnavigation',$listnavigation);
		
		//关键词描红
		$keyword = input('keyword') ? : '';
		$this->assign('keyword',$keyword);
		
		//案例列表
		$rs = DownModel::index();
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());

        return $this->fetch();
    }
	
	//详情页
    public function view(){
		$id = input('id'); $lang = config('default_lang');
        $rs = DownModel::get($id);
        $this->assign('rs',$rs);
		
		//SEO标题
		empty($rs['seotitle']) ? $this->assign('seotitle',$rs['title']) : $this->assign('seotitle',$rs['seotitle']);
            
		//更新浏览次数
		Db::name('down')->where('id',$id)->setInc('hits',1);
			
		$sortid = $rs['sortid'];
        //子类找父类，相关案例的查询条件
        $sortidArr = "";
		$sortData = getParentSort(SortModel::all(),$sortid);
        foreach($sortData as $k => $w){
			$k<count($sortData)-1 ? $sortidArr.=$w['id'].',' : $sortidArr.=$w['id'];
        }
		$this->assign('sortidArr',$sortidArr);
		
		//面包屑导航
		$listnavigation = DownModel::listnavigation($lang,5,$sortid);
		$this->assign('listnavigation',$listnavigation);

		//三级分类嵌套循环
		$moduleSort = SortModel::sortlist(5,0,$lang);
		$this->assign('moduleSort',$moduleSort);

        //内页banner
		$adRs = AdModel::get(['position'=>'down','typeid'=>1,'lang'=>$lang]);
		if($adRs) $pageBanner = $adRs['thumb'];
		$sortRs =  SortModel::get($sortid);
		if(!empty($sortRs['thumb'])) $pageBanner = $sortRs['thumb'];
		$this->assign('pagebanner',$pageBanner);
			
		//属性
		$this->assign('attribute',AttributeValueModel::index(5,$id));
	        
	    //上一篇
	    $previous = Db::name('down')->where('id','<',$id)->where('lang','=',$lang)->where('sortid','in',$sortidArr)->order('sequence desc,id desc')->limit(1)->find();
	    $pre = !$previous ? lang('c_nodata') : "<a href=\"".url('/'.$previous['urlroute'].'-d'.$previous['id'])."\">".$previous['title']."</a>";
	    $this->assign('pre',$pre);
	    
	    //下一篇
	    $next=Db::name('down')->where('id','>',$id)->where('lang','=',$lang)->where('sortid','in',$sortidArr)->order('sequence desc,id desc')->limit(1)->find();
	    $next = !$next ? lang('c_nodata') : "<a href=\"".url('/'.$next['urlroute'].'-d'.$next['id'])."\">".$next['title']."</a>";
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
	
	//点击下载
    public function down(){
        $id = input('id');
		//更新浏览次数
		Db::name('down')->where('id',$id)->setInc('hits',1);

        $rs = DownModel::get($id);
		
		//下载文件
        $file = '.'.$rs['fileurl'];
        if(file_exists($file)){    
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file ));    
            header('Content-Transfer-Encoding: binary');
	        header('Expires: 0');
	        header('Cache-Control: must-revalidate');
	        header('Pragma: public');
		    header('Content-Length: '.filesize($file));
			ob_clean();
			flush ();
			readfile($file);
		}else{
		    $this->error(lang('c_file_notexists'));	
		}
	}

}
