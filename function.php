<?php
//db
function setdb(){
	$hostname = 'localhost';
	$username = 'root';
	$connDb='studentlearn';
	$password = '123';
	$link = mysql_connect($hostname, $username, $password) or die(mysql_error());
	mysql_select_db($connDb) or die("Could not select database");
	mysql_query("SET NAMES utf8");
	mysql_query("SET CHARACTER_SET_CLIENT=utf8"); 
	mysql_query("SET CHARACTER_SET_RESULTS=utf8");
	putenv("TZ=Asia/Taipei");
	return $link;
}
function query($sql){
	return mysql_query($sql,setdb());
}
class js{//JAVASCRIPT
	function usejs($action){
		echo "<script type='text/javascript'>{$action}</script>";
	}
	function alert($msg){//訊框
		echo "<script type='text/javascript'>alert('{$msg}')</script>";
	}
	function location($link){//轉址
		echo "<script type='text/javascript'>location.href='{$link}'</script>";
	}
	function windowClose(){//關視窗
		echo "<script type='text/javascript'>window.close();</script>";
	}
	function back($p=-1){//回上頁
		echo "<script type='text/javascript'>history.go({$p})</script>";
	}
}
//file
function p(){
	$file=fopen("kk.txt","r");
	$a=md5(fgets($file));
	fclose($file);
	return $a;
}
function getip(){//抓取IP
	if (!empty($_SERVER['HTTP_CLIENT_IP']))
	    $ip=$_SERVER['HTTP_CLIENT_IP'];
	else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	else
	    $ip=$_SERVER['REMOTE_ADDR'];
	return $ip;
}
class file{//檔案相關
	function readLine($url){//觀看一行
		$file=fopen($url,'r');
		$content=fgets($file);
		fclose($file);
		return $content;
	}
	function write($url,$content){//重寫檔案
		$file=fopen($url,'w');
		fputs($file,$content);
		fclose($file);
	}
}
//編輯器
require("fckeditor/fckeditor.php");
require("fckeditor/ckfinder/ckfinder.php");
function editor($colContext=NULL,$width=600,$height=300,$name='colContext'){//傳POST['colContext']
	$oFCKeditor = new FCKeditor($name) ;
	$oFCKeditor->BasePath='fckeditor/';
	//設定他編輯視窗的大小
	$oFCKeditor->Width  = $width ;
	$oFCKeditor->Height = $height ;
	//加載外掛
	CKFinder::SetupFCKeditor( $oFCKeditor, 'fckeditor/ckfinder/' ) ;
	//定義一開始他的內容
	$oFCKeditor->Value = $colContext ;
	//呼叫
	$FKeditorPackage=$oFCKeditor->Create();
	// 總結 :  $FKeditorPackage 呼叫編輯器
	return $FKeditorPackage;
}
?>