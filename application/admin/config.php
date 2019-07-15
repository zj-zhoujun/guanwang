<?php
			//配置文件
			return [
                //公共配置
                'url_common_param' => true,// URL普通方式参数，多语言后缀获取
				
                'view_replace_str' => [
                    '__ADMIN__' => '/public/admin',
                    '__UEDITOR__' => '/public/ueditor',
                ],
				
                'isdisplay' => [
                    'siteinfo' => 1,
                    'field' => 1,
                    'guestbook' => 1,
                    'chat' => 1,
                    'ad' => 1,
                    'keyword' => 1,
                    'navigation' => 1,
                    'comment' => 1,
                    'area' => 1,
                    'user' => 1,
                    'authgroup' => 1,
                    'authrule' => 1,
                    'language' => 1,
                    'module' => 1,
                    'parameter' => 1,
                    'databackup' => 1,
                ],
	
			    'water' => '0',
			    'waterPosition' => '9',
			    'waterImage' => '/public/img/df81.png',
			    'transparency' => '80',
			    'waterText' => 'df81.com',
			    'waterfont' => '4.ttf',
			    'watercolor' => '#0fb504',
			    'watersize' => '30',
			    'thumb' => '1',
			    'thumbwidth' => '280',
			    'thumbheight' => '280',
			    'imageMaxSize' => '300',
			    'fileMaxSize' => '5',
			    'thumbnail' => '0',
			    'settheme' => '0',
			
            ];