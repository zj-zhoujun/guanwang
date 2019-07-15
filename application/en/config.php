<?php
//配置文件
return [
    'view_replace_str' => [
        '__PUBLIC__' => '/application/en/view/default/',
    ],
	
    'template' => [
	    'taglib_pre_load' => 'app\common\taglib\Tag',// 预先加载自定义标签库
	    'view_path' => './application/en/view/default/',// 模板路径  --重要，自动切换主题根据这个配置设置主题路径，如果不想设置主题，删除这个配置即可。
    ]       

];