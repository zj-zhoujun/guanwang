<?php

//无限级别分类（父级->子级）
function getChildSort($data,$parentid=0,$html="|---",$level=0){
	$temp = array();
	foreach ($data as $k => $v) {
		if($v['parentid'] == $parentid){
			$str = str_repeat($html, $level);
			$v['html'] = $str;
			$temp[] = $v;
			$temp = array_merge($temp,getChildSort($data,$v['id'],'|---',$level+1));
		}
	}
	return $temp;
}

//无限级别分类（子级->父级）
function getParentSort($data,$id,$html="|---",$level=0){
	$temp = array();
	foreach ($data as $k => $v) {
		if($v['id'] == $id){
			$str = str_repeat($html, $level);
			$v['html'] = $str;
			$temp[] = $v;
			$temp = array_merge(getParentSort($data,$v['parentid'],'|---',$level+1),$temp);
		}
	}
	return $temp;
}

//截取中文字符串
/*
模板调用：{$rs.title|msubstr=0,10}
*/
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true){
    if(function_exists("mb_substr")){
        $slice= mb_substr($str, $start, $length, $charset);
    }elseif(function_exists('iconv_substr')) {
        $slice= iconv_substr($str,$start,$length,$charset);
    }else{
        $re['utf-8'] = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
        $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
        $re['gbk'] = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
        $re['big5'] = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
    }    
    $fix='';
    if(strlen($slice) < strlen($str)){
        $fix='...';
    }
    return $suffix ? $slice.$fix : $slice;
}
