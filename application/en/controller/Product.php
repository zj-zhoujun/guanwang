<?php
namespace app\en\controller;
use app\en\model\Sort as SortModel;
use app\en\model\Product as ProductModel;
use app\en\model\Ad as AdModel;
use app\en\model\AttributeValue as AttributeValueModel;
use app\en\model\Siteinfo as SiteinfoModel;
use app\en\model\Module as ModuleModel;
use think\Db;

class Product extends Base{
	//列表页
    public function index(){
		$lang = 'en';
		//三级分类嵌套循环
		$moduleSort = SortModel::sortlist(1,0,$lang);
		$this->assign('moduleSort',$moduleSort);

        //内页banner
		$adRs = AdModel::get(['position'=>'product','typeid'=>1,'lang'=>$lang]);
		if($adRs) $pageBanner = $adRs['thumb'];
 		
		//网站信息
		$siteRs = SiteinfoModel::get(['lang'=>$lang]);
		if($siteRs){
			$producttitle = $siteRs['producttitle'];
			$productkeyword = $siteRs['productkeyword'];
			$productdescription = $siteRs['productdescription'];
		}
       //SEO标题，关键词，描述
		$sortid = input('sortid');
		if(!empty($sortid)){
            $seoRs =  SortModel::get($sortid);
            $producttitle = empty($seoRs['seotitle']) ? $seoRs['title'] : $seoRs['seotitle'];
			$productkeyword = $seoRs['keyword'];
			$productdescription = $seoRs['description'];
			//内页banner
		    if(!empty($seoRs['thumb'])) $pageBanner = $seoRs['thumb'];
		}
		$this->assign('pagebanner',$pageBanner);//内页banner
		
		$this->assign('producttitle',$producttitle);
		$this->assign('productkeyword',$productkeyword);
		$this->assign('productdescription',$productdescription);
		
		//面包屑导航
		$listnavigation = ProductModel::listnavigation($lang,1,$sortid);
		$this->assign('listnavigation',$listnavigation);
		
		//关键词描红
		$keyword = input('keyword') ? : '';
		$this->assign('keyword',$keyword);
		
		//产品列表
		$rs = ProductModel::index();
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
	//详情页
    public function view(){
		$id = input('id'); $lang = 'en';
        $rs = ProductModel::get($id);
        $this->assign('rs',$rs);
		
		//更多图片
		$this->assign('morepics',explode('|',$rs['morepics']));
		
		//SEO标题
		empty($rs['seotitle']) ? $this->assign('seotitle',$rs['title']) : $this->assign('seotitle',$rs['seotitle']);
            
		//更新浏览次数
		Db::name('product')->where('id',$id)->setInc('hits',1);
			
		$sortid = $rs['sortid'];
        //子类找父类，相关产品的查询条件
        $sortidArr = "";
		$sortData = getParentSort(SortModel::all(),$sortid);
        foreach($sortData as $k => $w){
			$k<count($sortData)-1 ? $sortidArr.=$w['id'].',' : $sortidArr.=$w['id'];
        }
		$this->assign('sortidArr',$sortidArr);
		
		//面包屑导航
		$listnavigation = ProductModel::listnavigation($lang,1,$sortid);
		$this->assign('listnavigation',$listnavigation);

		//三级分类嵌套循环
		$moduleSort = SortModel::sortlist(1,0,$lang);
		$this->assign('moduleSort',$moduleSort);

        //内页banner
		$adRs = AdModel::get(['position'=>'product','typeid'=>1,'lang'=>$lang]);
		if($adRs) $pageBanner = $adRs['thumb'];
		$sortRs =  SortModel::get($sortid);
		if(!empty($sortRs['thumb'])) $pageBanner = $sortRs['thumb'];
		$this->assign('pagebanner',$pageBanner);
			
		//属性
		$this->assign('attribute',AttributeValueModel::index(1,$id));
		
		//显示新品、热销
		/* 1表示是，0否*/
		$new = in_array('new',explode(',',$rs['status'])) ? 1 : 0;
		$hot = in_array('hot',explode(',',$rs['status'])) ? 1 : 0;
		$this->assign('new',$new);
		$this->assign('hot',$hot);

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
