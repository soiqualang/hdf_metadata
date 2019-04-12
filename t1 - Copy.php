<?php
function getOBJECT($arr){
	$def=explode('NUM_VAL',$arr);
	$tmp1=str_replace('=','',$def[0]);
	$tmp1=str_replace('"','',$tmp1);
	$kq=preg_replace('/\s+/', '', $tmp1);
	return $kq;
	//return str_replace(' ','',$tmp1);
	
}
function getVALUE($arr){
	$def=explode('VALUE',$arr);
	$tmp1=str_replace('=','',$def[1]);
	$tmp1=str_replace('"','',$tmp1);
	$kq=preg_replace('/\s+/', '', $tmp1);
	return $kq;
	//return str_replace(' ','',$tmp1);
}
function array_push_assoc($array, $key, $value){
	$array[$key] = $value;
	return $array;
}



$t1=file_get_contents('t3.txt');
$def=explode ('END_OBJECT',$t1);
//echo count($def);
//echo '<br>';

$arr=array();

for($i=0;$i<(count($def)-1);$i++){
	$tmp1=$def[$i];
	$def1=explode ('OBJECT',$tmp1);
	//echo $def1[1];
	/* $arr['OBJECT']=getOBJECT($def1[1]);
	echo $arr['OBJECT'];
	$arr['VALUE']=getVALUE($def1[1]);
	echo $arr['VALUE'];
	echo '<br>'; */
	//$arr[getOBJECT($def1[1])]=getVALUE($def1[1]);
	$arrkey=getOBJECT($def1[1]);
	$arrvalue=getVALUE($def1[1]);
	$arr=array_push_assoc($arr,$arrkey,$arrvalue);
}
//echo var_dump($arr);
echo $arr['PROCESSINGENVIRONMENT'];


?>