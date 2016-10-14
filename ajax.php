<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
<!--
$(document).ready(function(){
	//成果發表編輯
	$('.ser1_3Edit').click(function(){
		a=$(this).attr('name');
		MM_openBrWindow('window.php?aa=18&no='+a);
	});
	function MM_openBrWindow(theURL,winName,win_width,win_height) {//開新視窗 
		winName = winName || '_window';
		win_width = win_width || 780;
		win_height = win_height || 600;
		var PosX = (screen.availWidth-win_width)/2; 
		var PosY = (screen.availHeight-win_height)/2;
		features = "width="+win_width+",height="+win_height+",top="+PosY+",left="+PosX+",scrollbars=yes,location=no"; 
		var newwin = window.open(theURL,winName,features); 
	} 
});
-->
</script>
<style>
body{
	word-wrap:break-word;
}
.aa1_frame{
	border:#9D9D9D 2px solid;
	background:#FEFFED;
	width:505px;
	margin-top:10px;
	margin-left:13px;
}
.aa1_table{
	border-bottom:#9D9D9D 1px solid;
}
.aa1_table:hover{
	background:#EFEFEF;
}
.aa1_td{
	border-right:#9D9D9D 1px solid;
	text-align:center;
}
</style>
</head>
<body>
<?
require('function.php');
$aa=$_GET['aa'];
if($aa == 1){//ser1_3 表格 (成果發表
	@$no=$_GET['no'];
	$res=query("SELECT * FROM `ser` WHERE `_class`='{$no}' ORDER BY `no`");
	echo '<div class="aa1_frame">';
	if(mysql_num_rows($res)>0){
		while($row=mysql_fetch_array($res)){
			$no=$row['no'];
			$main=$row['_main'];//組名
			$leader=$row['_leader'];//組長
			$teacher=$row['_teacher'];//老師
			$member=nl2br($row['_content']);//成員
			$dir=$row['_dir'];
			$file=$row['_file'];
			echo'<table width="100%" align="center" class="aa1_table">
			<tr>';
				if(@$_SESSION['login']==1)//修改刪除
					echo'<td class="aa1_td ser1_3Edit" style="width:103px; cursor:pointer; color:#33D;" name="'.$no.'">';
				else
					echo'<td class="aa1_td">';
				echo'<div style="width:160px;">'.$main.'</div>';
				echo'</td>
				<td class="aa1_td"><div style="width:60px;">'.$leader.'</div></td>
				<td class="aa1_td"><div style="width:60px;">'.$teacher.'</div></td>
				<td class="aa1_td"><div style="width:12em; font-size:14px; text-align:left;">'.$member.'</div></td>';
				if($file)//有檔案
					echo"<td class='aa1_td' width='7%' style='cursor:pointer; border-right:none;' onClick='window.open(\"files/ser1_3/{$dir}/{$file}\")' title='{$file}'><img src='img/NewsFile.png'/></td>";
				else
					echo'<td class="aa1_td" style="border-right:none;" width="7%">&nbsp;</td>';
			echo'</tr>
			</table>';
		}
	}else{//無資料
		echo'<table width="100%" align="center">
		<tr class="aa1_table">
			<td class="aa1_td" style="border-right:none;">目前尚無資料</td>
		</tr>
		</table>';
	}
	echo'</div>';
}
?>
</body>