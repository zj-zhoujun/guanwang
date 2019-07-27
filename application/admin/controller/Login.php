<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Lang;

class Login extends Controller {
    public function index(){
		$licenseDomain = $_SERVER['SERVER_NAME'];
		if(!request()->isPost()){

			Lang::load(APP_PATH . 'admin\\lang\\'.config('default_lang').'.php');//加载默认语言
            //右上角欢迎词

            $helloWords="当问题发生时寻找解决方法，而不是找代罪羔羊。**永远战战兢兢，永远如履薄冰。**只有淡季的思想，没有淡季的市场。**领导在与不在，企业照样良性运转。**听多数人的意见，跟少数人商量，一个人说了算。**黑猫，白猫，能抓老鼠的就是好猫。**有理想在的地方，地狱都是天堂。**千里之行，始于足下。";
            if(config('default_lang')=="en" or input('get.lang')=="en") $helloWords="A thousand-li journey is started by taking the first step.**Little stone fell great oaks.**Where there is a will, there is a way.**Do one thing at a time, and do well.";
            $helloWords=explode("**", $helloWords);
            $helloChosen=$helloWords[mt_rand(0,(count($helloWords)-1))];
            $this->assign('helloChosen', $helloChosen);
            //判断春夏秋冬显示背景
            $month=date("n");
            if($month==3 or $month==4 or $month==5){
                $season="spring";
            }elseif($month==6 or $month==7 or $month==8){
                $season="summer";
            }elseif($month==9 or $month==10 or $month==11){
                $season="autumn";
            }else{
                $season="winter";
            }
            $this->assign('season', $season);
            //登录语言选择
            $this->assign('langlist', getTableList('Language',10));
            //版权信息
            $this->assign('system_url',$licenseDomain);
            $this->assign('system_version','v5.0.7_20170429');
            return $this->fetch();
		}else{
            $username = input('post.username'); $password = input('post.password'); $verify = input('post.verify');
            //验证码是否正确
            $captcha = new \think\captcha\Captcha();
            if(!$captcha->check($verify)) $this->error(lang('验证码错误'));

            //账号密码是否正确
            $userWhere['username'] = $username; $userWhere['password'] = md5($password);
            $user = Db::name('user')->where($userWhere)->find();
            if(!$user) $this->error(lang('用户名或密码错误'));
		
            $userid = $user['id'];
            //写入session
            session('userid',$userid);
            session('username',$user['username']);
            session('realname',$user['realname']);
            session('email',$user['email']);
            session('avatar',$user['avatar']);
		
            $groupRs = Db::name("Auth_group_access")->find($userid);
            $groupid = $groupRs['group_id'];
            $rulesRs = Db::name("Auth_group")->find($groupid);
            $rules = $rulesRs['rules'];
            
            $arr_rules=explode(',',$rules);
            session('groupid',$groupid);
            session('rules',$arr_rules);
            request()->isMobile() ? session('ismobile','yes') : session('ismobile','');//判断手机版还是电脑版
            session('system_url',$licenseDomain);//授权URL
            session('system_version','v5.0.7_20170429');//系统版本
            //重定向到首页
            $this->success(lang('登陆成功'),url('Index/index?lang='.input('lang')));
		}
    }

	//退出登录
    public function logout(){
        session(null);
		//重定向到登录界面
        $this->redirect(url('Login/index'));
    }
}