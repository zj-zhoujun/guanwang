<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

namespace app\admin\controller;

class Databackup extends Base{
    public function index(){
		$lang = input('lang');
        $DataDir = "databak/";
        if(!is_dir($DataDir)) mkdir($DataDir);
        if (input('?get.Action')) {
//			$MySQLReback = new \common\MySQLReback();
            $config = array(
                'host' => config('database.hostname'),
                'port' => config('database.hostport'),
                'userName' => config('database.username'),
                'userPassword' => config('database.password'),
                'dbprefix' => config('database.prefix'),
                'charset' => 'UTF8',
                'path' => $DataDir,
                'isCompress' => 0, //是否开启gzip压缩
                'isDownload' => 0
            );
            $mr = new \common\MySQLReback($config);
            $mr->setDBName(config('database.database'));
            if(input('Action') == 'backup'){
                $mr->backup();
				//备份成功
				$this->success(lang('c_success'));
            }elseif(input('Action') == 'RL'){
		        //操作失败，仅限开发者使用
		        $this->error(lang('c_fail_only_developer'));

                $mr->recover(input('File'));
				//还原成功
				$this->success(lang('c_success'));
            }elseif(input('Action') == 'Del'){
                if (@unlink($DataDir . input('File'))) {
				//删除成功
				$this->success(lang('c_success'));
                }else{
                    $this->error(lang('c_fail'));
                }
            }
            if (input('Action') == 'download') {

                function DownloadFile($fileName) {
                    ob_end_clean();
                    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Length: ' . filesize($fileName));
                    header('Content-Disposition: attachment; filename=' . basename($fileName));
                    readfile($fileName);
                }
                DownloadFile($DataDir . input('file'));
                exit();
            }
        }
        $lists = $this->MyScandir('databak/');
        $this->assign("datadir",$DataDir);
        $this->assign("lists", $lists);
        return $this->fetch();
    }
	
    private function MyScandir($FilePath = './', $Order = 0) {
        $FilePath = opendir($FilePath);
        while (false !== ($filename = readdir($FilePath))) {
            $FileAndFolderAyy[] = $filename;
        }
        $Order == 0 ? sort($FileAndFolderAyy) : rsort($FileAndFolderAyy);
        return $FileAndFolderAyy;
    }

}

?>