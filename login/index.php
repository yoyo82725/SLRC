<?php
session_start();
require('../function.php');
/*if ($_SERVER['PHP_AUTH_USER']!="aa" || md5($_SERVER['PHP_AUTH_PW'])!=p() ) {
	header('WWW-Authenticate: Basic realm="login"'); //認證失敗，繼續認證
	header('HTTP/1.0 401 Unauthorized');
	exit;
}*/
if(@$_SESSION['login']==1){
	$_SERVER['PHP_AUTH_USER']=NULL;
	$_SERVER['PHP_AUTH_PW']=NULL;
	session_destroy();
}
if ($_SERVER['PHP_AUTH_USER']!="aa" || md5($_SERVER['PHP_AUTH_PW'])!=p() ) {
	header('WWW-Authenticate: Basic realm="login"'); //認證失敗，繼續認證
	header('HTTP/1.0 401 Unauthorized');
}else{
	$_SESSION['login']=1;
}
?>
<script type='text/javascript'>
location.href='../../studentlearn';
</script>