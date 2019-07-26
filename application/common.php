<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//百度翻译api
function language($value, $from = "auto", $to = "auto")
{
    $rt = ['err'=>'', 'data'=>''];

    #您注册的API(appid,Key)
    $appid = '20180413000145913';
    $key = 'roPMlVFN4cvXEbpkJ_hN';
    if(empty($appid) || empty($key)) {
        $rt['err'] = 'invalid bdfy_appid or bdfy_key';
    } else {
        $query = is_array($value) ? join("\n", $value) : $value; //首先对要翻译的文字进行 urlencode 处理
        $salt = mt_rand(); //随机数
        #生成签名
        $sign = md5($appid.$query.$salt.$key);
        #生成翻译API的URL GET地址
        $languageurl = "http://api.fanyi.baidu.com/api/trans/vip/translate";
        $post_data = array(
            'appid' => $appid,
            'salt' => $salt,
            'q' => $query,
            'sign' => $sign,
            'from' => $from,
            'to' => $to,
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $languageurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // post数据
        curl_setopt($ch, CURLOPT_POST, 1);
        // post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        curl_close($ch);

        if($output === FALSE) { //请求失败
            $rt['err'] = 'cURL Error:'.curl_error($ch);
        } else { //请求成功
            $text = json_decode($output);
            if(!empty($text->error_msg)) { //翻译失败
                $rt['err'] = 'Error: '.$text->error_msg;
            } else { //翻译成功
                $text = $text->trans_result;
                if(!is_array($value)) {
                    $rt['data'] = $text[0]->dst;
                } else {
                    foreach($text as $data) {
                        $rt['data'][$data->src] = $data->dst;
                    }
                }
            }
        }
    }

    return $rt;
}