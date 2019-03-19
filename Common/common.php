<?php
//check param
function check_post($arr,$num){
	if(count($arr) != $num){
		return out2arr(101,'参数格式错误');
	}
	foreach($arr as $k => $v){
		if(strlen($v) == 0){
			return out2arr(101,'参数不能为空');
		}
	}
	return out2arr(0,'正常');
}
//check param name
function check_name($a1,$a2){
	ksort($a1);
	asort($a2);
	$str1 = '';$str2 = '';
	foreach($a1 as $k => $v){
		$str1 .= $k;
	}
	foreach($a2 as $v){
		$str2 .= $v;
	}
	if($str1 === $str2){
		return out2arr(0, '正常');
	}else{
		return out2arr(101, '参数名称错误');
	}
}
/***
 * turn data
 * trans data
 * out status
 * json to array
 */
//trans data
function out2arr($s,$d){
	return array(
		'status' => $s,
		'data' => $d
	);
}
//out status
function output($s,$d){
	echo json_encode(out2arr($s,$d));
}
//json to array
function json2arr($d){
	return json_decode($d,true);
}
function a($k,$v){
	return array(
		$k => $v
	);
}
/****
 * about database
 */
//make data to insert format
function a2k($arr){
	$str = '';
	foreach($arr as $k => $v){
		$str .= "$k,";
	}
	return rtrim($str,',');
}
function a2v($arr){
	$str = '';
	foreach($arr as $k => $v){
		$str .= "'$v',";
	}
	return rtrim($str,',');
}
//make data to update format
function a2s($arr){
	$str = '';
	foreach($arr as $k => $v){
		$str .= $k.'='.'"'.$v.'"'.',';
	}
	return rtrim($str,',');
}
//...
?>
?>