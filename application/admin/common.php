<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @ df81.com 版权所有
// +----------------------------------------------------------------------
// | 作者: 符工@邦明 邮箱：1062129401@qq.com
// +----------------------------------------------------------------------

use think\Db;

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

//通用无限分类数组（父级->子级），如：地区
function getAreaArr($table,$id=0,$lang){ 
    $where['parentid']=$id;
    $where['lang']=$lang;
	$tableArr = Db::name($table)->field('title,id')->where($where)->select();
    $arr = array(); 
    foreach ($tableArr as $k => $rs) {
        $rs[] = getAreaArr($table,$rs['id'],$lang);
        $arr[] = $rs; //组合数组
    } 
    return $arr; 
} 

//获取数据集
function getTableList($table='Language',$num=10){
    if($table == 'Language') $where['status'] = 1;
    $talbeList = Db::name($table)->where($where)->order('sequence desc,id desc')->limit($num)->select();
	return $talbeList;
}

//权限赋值，添加编辑权限组模板页面用到
function authRule($rules_array){
	$authRuleTable = Db::name('Auth_rule');
	$authruleWhere['parentid'] = 0;
	$authruleWhere['modulesign'] = 'web';
	
	$authruleData = $authRuleTable->where($authruleWhere)->order('sequence desc,id desc')->select();
	foreach ($authruleData as $k => $v){
		in_array($v['id'],$rules_array) ? $checked = "checked=\"checked\"" : $checked = "";
		echo "<div class=\"panel-group accordion faq-content\" id=\"accordion1\">";
		echo "    <div class=\"panel panel-default\">";
		echo "        <div class=\"panel-heading\">";
		echo "            <h4 class=\"panel-title\">";
		echo "                <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse_".($k+1)."\">";
		echo "                    &nbsp;<span class=\"fl\">".($k+1)." ".$v['title']."</span>";
		$childWhere['parentid'] = $v['id'];
		$childData = $authRuleTable->where($childWhere)->select();
		if($childData) echo "     <span class=\"fr\">+</span>";
		echo "                </a>";
		echo "            </h4>";
		echo "        </div>";
		if($childData){
		    echo "    <div id=\"collapse_".($k+1)."\" class=\"panel-collapse collapse\">";
		    echo "        <div class=\"panel-body\">";
			echo "            <div class=\"icheck-inline\">";
			echo "                <label><input name=\"rules[]\" type=\"checkbox\" value=\"".$v['id']."\" $checked /> ".$v['title']."</label>";
			foreach ($childData as $k => $w){
				in_array($w['id'],$rules_array) ? $childChecked = "checked=\"checked\"" : $childChecked = "";
				echo "            <label><input name=\"rules[]\" type=\"checkbox\" value=\"".$w['id']."\" $childChecked /> ".$w['title']."</label>";
			}
			echo "            </div>";
		    echo "        </div>";
		    echo "    </div>";
		}
		echo "    </div>";
		echo "</div>";
	}
}

/**清除缓存
 * 删除目录及目录下所有文件或删除指定文件
 * @param str $path   待删除目录路径
 * @param int $delDir 是否删除目录，1或true删除目录，0或false则只删除文件保留目录（包含子目录）
 * @return bool 返回删除状态
 */
function delDirAndFile($path,$delDir=false){
    $handle = opendir($path);
    if($handle){
        while(false !== ( $item = readdir($handle) )) {
            if($item != "." && $item != "..") is_dir("$path/$item") ? delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
        }
        closedir($handle);
        if($delDir) return rmdir($path);
    }else{
        if(file_exists($path)){
            return unlink($path);
        }else{
            return false;
        }
    }
}	

//数据库备份****处理方法
function rmdirr($dirname) {
    if (!file_exists($dirname)) {
        return false;
    }
    if (is_file($dirname) || is_link($dirname)) {
        return unlink($dirname);
    }
    $dir = dir($dirname);
    if ($dir) {
        while (false !== $entry = $dir->read()) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            //递归
            rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
        }
    }
}

//数据库备份****公共函数
//获取文件修改时间
function getfiletime($file, $DataDir) {
    $a = filemtime($DataDir . $file);
    $time = date("Y-m-d H:i:s", $a);
    return $time;
}

//数据库备份****获取文件的大小
function getfilesize($file, $DataDir) {
    $perms = stat($DataDir . $file);
    $size = $perms['size'];
    // 单位自动转换函数
    $kb = 1024;         // Kilobyte
    $mb = 1024 * $kb;   // Megabyte
    $gb = 1024 * $mb;   // Gigabyte
    $tb = 1024 * $gb;   // Terabyte

    if ($size < $kb) {
        return $size . " B";
    } else if ($size < $mb) {
        return round($size / $kb, 2) . " KB";
    } else if ($size < $gb) {
        return round($size / $mb, 2) . " MB";
    } else if ($size < $tb) {
        return round($size / $gb, 2) . " GB";
    } else {
        return round($size / $tb, 2) . " TB";
    }
}
