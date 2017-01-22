<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.7.2.js" ></script>
<script type="text/javascript">
<!--
$(document).ready(function(){
	//全部的送出按鈕
	$('input:submit').add('input:button').css({fontSize:'16px',padding:'5px',fontWeight:'bold'});
	//新增最新消息標題區
	$('input[name=main]').css({border:'1px solid #000',width:'600px'});
	//留言板標題
	$('.MSIT').css({border:'1px solid #000',width:'480px'});
	//ESC關頁
	document.onkeydown=mm;//改onkeydown的定義
	function mm(evt){//firefox可用需要
		if(evt.keyCode==27){//ESC
			window.close();
		}
	}
});
-->
</script>
<style type="text/css">
/*最新消息*/
	body{
		background:url(img/body.png) repeat-x #F7FAFF;
		/*font-family:微软雅黑,微軟正黑體,新細明體;*/
		font-weight:bold;
		word-wrap:break-word;
	}
	.tablee{
		background:#FFF;
		border:1px solid #000;
	}
	td{
		border:1px solid #000;
	}
	.tdL{
		background:#EEE;
	}
	.tdSp{
		Color:#A00200;
		/*font-size:large;*/
	}
	textarea{
		border:1px solid #000;
		height:300px;
		width:630px;
	}
	.selectMain{
		/*font-size:large;*/
	}
	.selectMain:hover{
		color:#00F;
		cursor:pointer;
	}
/*TV*/
	.aa5_0{
		background:#FCFCFC;
		border:double 7px #000;
		padding:20px;
		margin:auto;
	}
/*QA*/
	.QATA{/*textarea*/
		border:1px solid #000;
		width:530px;
		height:50px;
	}
/*留言板*/
	.aa10_0{/*頂樓*/
		border:double 7px #282;
		background:#EAEFDC;
	}
	.aa10_1{/*td無邊框*/
		border:none;
	}
	.aa10_2{/*回覆Frame*/
		width:490px;
		background:#FCFCFC;
		border:double 3px #000;
		padding:20px;
		margin:auto;
		margin-top:5px;
	}
	.MSTA{/*textarea*/
		border:1px solid #000;
		width:530px;
		height:250px;
	}
	.MSRE{/*回覆input text欄位*/
		border:dotted 1px #000;
	}
	.MSRE2{/*回覆textarea欄位*/
		border:dotted 1px #000;
		width:484px;
		height:100px;
	}
/*成員修改*/
	.aa12_td{
		background:#FFF;
	}
	.aa12_table{
		background:#020302;
	}
	.aa12_TA{
		width:320px;
		height:150px;
		border:solid 1px #000;
	}
	.aa12_IT{/*input text*/
		border:solid 1px #000;
	}
/*相關辦法*/
	.b5_Frame{
		border: #EAE8E3 5px solid;
		margin:auto;
		padding:20px;
		background:#FFF;
		width:600px;
		font-family: arial, sans-serif;
		font-weight:normal;
	}
	.L_file{/*檔案*/
		list-style-image: url(img/bullet_doc_y.gif);
	}
/*活動集錦*/
	.b6_Frame{
		width:650px;
		background:#FCFCFC;
		border:double 3px #000;
		padding:20px;
		margin:auto;
	}
/*服務項目*/
	.aa17_IT{/*有邊框+內距5*/
		border:1px solid #000;
		padding:5px;
	}
</style>
<title>聖約翰科技大學-學生學習資源中心__按ESC鍵可觀閉視窗</title>
</head>
<body>
<?php
require('function.php');
@$adAction=$_GET['b'];
if(@$_SESSION['login']==1){//管理權限
	@$action=$_GET['aa'];
	if($action == 1){//NEWS新增文章
		@$main = $_SESSION['_main'];
		@$things = $_SESSION['_things'];
		echo '<form action="window.php?aa=3" method="post" enctype="multipart/form-data">
		<table width="95%" align="center" class="tablee">
		<tr>
			<td class="tdL" width="8%" align="center">類別</td>
			<td style="padding:5px;">
				<select name="cls">
					<option value="活動訊息" selected="selected">活動訊息</option>
					<option value="一般訊息">一般公告</option>
					<option value="重要訊息">重要訊息</option>
				</select>
			</td>
		</tr>';
		echo"
		<tr>
			<td class='tdL' align='center'>標題</td>
			<td class='td' style='padding:5px;'><input type='text' name='main' value='{$main}'></td>
		</tr>
		<tr>
			<td class='tdL' align='center'>內容</td>
			<td class='td' valign='top'>".editor($things,'100%',350,'things')."</td>
		</tr>
		<tr>
			<td class='tdL' align='center'>附檔</td>
			<td class='td' style='padding:5px;'><input type='file' name='userfile'/>(最大".ini_get('upload_max_filesize').")</td>
		</tr>
		</table>
		<center><input type='submit' value='　預覽文章　'></center>
		</form>";
	}
	else if($action == 2){//處理服務項目1234
		$t=$_GET['t'];//ser1 ser2 ser3
		if($t=='ser1_3'){//ser1_3成果發表
			echo'<div class="aa10_2">
			<form action="action.php?aa=3&n=1" method="POST">新增學年：<input type="text" name="_main"/><input type="submit" value="新增"></form>
			請點擊學年進行編輯<br/>======================================================<br/>';
			$res=query("SELECT * FROM `ser` WHERE `_class`='ser1_3' ORDER BY `no` DESC");
			while($row=mysql_fetch_array($res)){
				$main=$row['_main'];
				$no=$row['no'];//大項的no
				echo"
				<table width='100%' style='border-bottom:1px dashed #000;'>
					<tr>
						<td class='aa10_1'><a href='window.php?aa=17&no={$no}'>{$main}</a></td>
						<td class='aa10_1' align='right'><form action='action.php?aa=3&n=6' method='POST'>
						<input type='hidden' name='no' value='{$no}'/>
						<input type='button' value='刪除' onClick='if(confirm(\"確認刪除？\")){submit();}'/>
						</form></td>
					</tr>
				</table>";
			}
			echo'======================================================</div>';
		}
		else{
			$res=query("SELECT * FROM `ser` WHERE `_class`='{$t}' LIMIT 1");
			if($row=mysql_fetch_array($res)){
				$content=$row['_content'];
				$no=$row['no'];
				echo'<!--[if IE]>';
				echo'(若IE無法修改，請換其他瀏覽器！)';
				echo'<![endif]-->';
				echo'<form action="action.php?aa=3&t='.$t.'" method="POST"><center>
					<input type="hidden" name="no" value="'.$no.'"/>';
				echo editor($content,600,450,'content');
				echo'<br/>';
				echo"<input type='button' value='　修改　' onClick='if(confirm(\"確認修改？\")){submit();}'/>";
				echo'</center></form>';
			}
		}
	}
	else if($action == 3){//NEWS預覽文章
		@$main=$_POST['main'];
		@$things=$_POST['things'];
		@$cls=$_POST['cls'];
		@$t=$_GET['t'];//修改文章需
		@$no=$_GET['no'];//修改文章需
		if(!$main)//標題為空
			echo "<script type='text/javascript'> alert('標題不可為空！'); history.go(-1)</script>";
		else if(!$things)//內容為空
			echo "<script type='text/javascript'> alert('內容不可為空！'); history.go(-1)</script>";
		else if(!$cls)//類別為空
			echo "<script type='text/javascript'> alert('類別不可為空！'); history.go(-1)</script>";
		$date = date("Y-m-d");
		@$_SESSION['_main'] = $main;
		@$_SESSION['_things'] = $things;
		if($t=='ed'){//修改要給它dir&file的值
			$res=query("SELECT `_dir`,`_file`,`_size` FROM `news` WHERE `no`='{$no}' LIMIT 1");
			$row=mysql_fetch_array($res);
			$dir=$row['_dir'];
			$fileName=$row['_file'];
			$size=$row['_size'];
			$path = 'files/'.$dir.'/'.$fileName;
		}
		@$file = $_FILES['userfile']['tmp_name'];
		if($file){
			@$fileName = $_FILES['userfile']['name'];
			@$size = $_FILES['userfile']['size'];
			$dir = substr(md5(date("m.d.y H:i:s")),1,15);//亂名
			@mkdir("files/".$dir);//新建目錄
			@$path = 'files/'.$dir.'/'.$fileName;
			if(is_uploaded_file($file))
				move_uploaded_file($file,iconv('utf-8','big5',$path));
			else
				js::usejs('alert("檔案請重新上傳！"); history.go(-1)');
		}
		echo "<table width='95%' align='center' class='tablee'>
		<tr>
			<td class='tdL' width='8%' height='30px' align='center'>類別</td>
			<td class='tdSp' style='padding:5px;'>{$cls}</td>
		</tr>
		<tr>
			<td class='tdL' height='30px' align='center'>標題</td>
			<td class='tdSp'><div style='width:640px; padding:5px; color:#0002FF;'>{$main}</div></td>
		</tr>
		<tr>
			<td class='tdL' align='center' height='220'>內容</td>
			<td class='td' valign='top'><div style='width:640px; padding-left:5px;'>{$things}</div></td>
		</tr>
		<tr>
			<td class='tdL' align='center'>附檔</td>
			<td class='td'><div style='width:640px; padding:5px;'>";
			if($fileName)
				echo"<a href='{$path}' target='_blank'>{$fileName}</a>　　(".round(($size/1024),2)." KB)";
			else
				echo'無';
		echo "</div></td>
		</tr>
		<tr>
			<td class='tdL' align='center'>日期</td>
			<td style='padding:5px;'>{$date}</td>
		</tr>
		</table>
		<table border='0' align='center'>
		<tr>
			<td style='border:0px;'>";
			if($file)//有上傳檔案_刪檔
				echo "<form action='action.php?aa=4' method='post'>
				<input type='hidden' name='path' value='{$path}'>
				<input type='hidden' name='dir' value='files/{$dir}'>
				<input type='submit' value='　返回修改　'>
				</form>";
			else
				echo "<input type='button' value='　返回修改　' onClick='history.go(-1);'>";
		echo '</td>
		<td style="border:0px;">';
		echo ($t=='ed')?"<form action='action.php?aa=7&no={$no}' method='POST'>":'<form action="action.php?aa=5" method="POST">';//7=修改，5=新增
		echo @"
		<input type='hidden' name='dir' value='{$dir}'>
		<input type='hidden' name='fileName' value='{$fileName}'>
		<input type='hidden' name='path' value='{$path}'>
		<input type='hidden' name='main' value='{$main}'>
		<input type='hidden' name='things' value='{$things}'>
		<input type='hidden' name='date' value='{$date}'>
		<input type='hidden' name='size' value='{$size}'>
		<input type='hidden' name='cls' value='{$cls}'>
		<input type='button' value='　確認送出　' Onclick='if(confirm(\"確定送出？\")){submit();}'></form>
		</td>
		</tr></table>";
	}
	else if($action == 4){//新增活動集錦
		$date=date('Y-m-d');
		echo'<div class="b6_Frame">
		<form action="action.php?aa=1&t=5" method="POST">
		活動日期(輸入格式:Y-m-d  如2012-08-09)<br/>
		<input type="text" name="date" style="padding:5px; width:350px;" value="'.$date.'" maxlength="10"/><br/>
		活動名稱<br/>
		<input type="text" name="_main" style="padding:5px; width:350px;"/><br/>
		活動概要<br/>
		<textarea name="content" class="MSRE2"></textarea><br/>
		(若要上傳照片請在新增完後進入文章上傳)
		<hr/>
		<center>
		<input type="button" value="　新增　" onClick="if(confirm(\'確認新增？\')){submit();}"/>
		</center>
		</form>
		</div>';
	}
	else if($action == 5){//新增表單下載
		$t=$_GET['t'];//1新增大項2修改+刪除3新增小項
		if($t==1){//新增大項
			echo'<div class="aa10_2"><form action="action.php?aa=13&t=4" method="POST">新增大項：<input type="text" name="name"/><input type="submit" value="新增"></form>
			請點擊大項目進行編輯<br/>======================================================<br/>';
			$res=query("SELECT * FROM `dow` WHERE `_to`='0'");
			while($row=mysql_fetch_array($res)){
				$main=$row['_main'];
				$no=$row['no'];
				echo"
				<table width='100%' style='border-bottom:1px dashed #000;'>
					<tr>
						<td class='aa10_1'><a href='window.php?aa=5&no={$no}&t=3'>{$main}</a></td>
						<td class='aa10_1' align='right'><form action='action.php?aa=13&t=6' method='POST'>
						<input type='hidden' name='no' value='{$no}'/>
						<input type='button' value='刪除' onClick='if(confirm(\"確認刪除？\")){submit();}'/>
						</form></td>
					</tr>
				</table>";
			}
			echo'======================================================</div>';
		}
		else if($t==2){//修改+刪除_main頁面
			$no=$_GET['no'];
			$res=query("SELECT * FROM `dow` WHERE `no`='{$no}' LIMIT 1");
			if($row=mysql_fetch_array($res)){//有資料
				$main=$row['_main'];
				$how=$row['_how'];
				$dir=$row['_dir'];
				$file=$row['_file'];//fileName
				echo'<div class="aa10_2">
				<h3>修改&刪除&nbsp表單下載</h3>
				<form action="action.php?aa=13&t=2" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="no" value="'.$no.'"/>
				標題：<span style="color:#999;">(顯示在標題說明列)</span><br/><input type="text" name="_main" style="width:400px; padding:7px;" value="'.$main.'"/><br/>
				說明：<span style="color:#999;">(顯示在上方區塊)</span><br/>
				<input type="text" name="how" style="padding:7px; width:400px;" value="'.$how.'"/><br/>
				檔案：<span style="color:#999;">(上傳新的將會附蓋舊的檔案)</span><br/>';
				echo"<div style='padding:7px;'><a href='files/downloads/{$dir}/{$file}'>{$file}</a></div>";
				echo'<input type="file" name="userfile" style="padding:7px;"/><span style="color:#999;">(最大'.ini_get('upload_max_filesize').')</span>
				<br/><hr/><center><input type="button" value="　修改　" onClick="if(confirm(\'確認修改？\')){submit();}"/>
				</form>
				<form action="action.php?aa=13&t=3" method="POST">
				<input type="hidden" name="no" value="'.$no.'"/>
				<input type="button" value="　刪除　" onClick="if(confirm(\'確認刪除？\')){submit();}"/>
				</form>
				</center>
				</div>';
			}
		}
		else if($t==3){//新增小項
			@$no=$_GET['no'];//大項的no
			$res=query("SELECT * FROM `dow` WHERE `no`='{$no}' LIMIT 1");
			if($row=mysql_fetch_array($res)){
				$main=$row['_main'];
				echo'<div class="aa10_2">
				<button onClick="history.go(-1)">回上頁</button>';
				echo"<form action='action.php?aa=13&t=5' method='POST'>
				<span style='color:#33D; font-weight:bold;'>{$main}</span><br/>
				<input type='text' name='_main' value='{$main}'/>
				<input type='hidden' name='no' value='{$no}'/>
				<input type='submit' value='修改'/>
				</form><br/>";
				echo'<h3>新增表單下載</h3>
				<form action="action.php?aa=13&t=1" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="no" value="'.$no.'"/>
				標題：<span style="color:#999;">(顯示在標題說明列)</span><br/><input type="text" name="_main" style="width:400px; padding:7px;"/><br/>
				說明：<span style="color:#999;">(顯示在上方區塊)</span><br/>
				<input type="text" name="how" style="padding:7px; width:400px;"/><br/>
				檔案：<br/>
				<input type="file" name="userfile" style="padding:7px;"/><span style="color:#999;">
		(最大'.ini_get('upload_max_filesize').')</span><br/><hr/>
				<center><input type="button" value="　新增　" onClick="if(confirm(\'確認新增？\')){submit();}"/></center>
				</form>
				</div>';
			}
		}
	}
	else if($action == 6){//修改NEWS
		@$no=$_GET['no'];
		$select=query("SELECT * FROM `news` WHERE `no` = '{$no}' LIMIT 1");
		list($no,$cls,$main,$things,$file,$dir,$size,$addDate,$editDate,$ip) = mysql_fetch_array($select,MYSQL_BOTH);
		echo "<form action='window.php?aa=3&t=ed&no={$no}' method='post' enctype='multipart/form-data'>
		<table width='95%' align='center' class='tablee'>
		<tr>
			<td class='tdL' width='8%' align='center'>類別</td>
			<td class='td' style='padding:5px;'>
			<select name='cls'>
				<option value='{$cls}' selected>{$cls}</option>
				<option value='活動訊息'>活動訊息</option>
				<option value='一般訊息'>一般公告</option>
				<option value='重要訊息'>重要訊息(標題以紅色呈現)</option>
			</select></td>
		</tr>
		<tr>
			<td class='tdL' align='center'>標題</td>
			<td class='td' style='padding:5px;'><input type='text' name='main' value='{$main}'></td>
		</tr>
		<tr>
			<td class='tdL' align='center'>內容</td>
			<td class='td'>".editor($things,'100%',350,'things')."</td>
		</tr>
		<tr>
			<td class='tdL' align='center'>附檔</td>
			<td class='td' style='padding:5px;'>";
			if($file)
				echo"<a href='files/{$dir}/{$file}' target='_blank'>{$file}</a>　　(".round(($size/1024),2)." KB)　<input type='button' value='刪檔' onClick='if(confirm(\"一旦刪除後將無法還原，還是要刪除嗎？\")){location.href=\"action.php?aa=7&no={$no}&t=file\";}'>";
			else
				echo'<input type="file" name="userfile">(最大'.ini_get('upload_max_filesize').')';
		echo '</td>
		</tr>
		</table>
		<center>
			<input type="button" value="　返回上頁　" onClick="history.go(-1);"><input type="submit" value="　預覽文章　">
		</center>
		</form>';
	}
	else if($action == 7){//修改中心介紹+照片
		$res=query("SELECT * FROM `intro` WHERE `_class`='intro';");
		$row=mysql_fetch_array($res,MYSQL_BOTH);
		$main=$row['_main'];
		$contect=$row['_contect'];
		$mainColor=$row['_color1'];
		$no=$row['no'];
		echo"<form action='action.php?aa=8' method='POST'>
		<table width='95%' align='center' class='tablee'>
		<tr>
			<td class='tdL' width='8%' align='center'>頂端</td>
			<td class='td'><input type='color' name='mainColor' value='{$mainColor}'/><br/><input type='text' name='main' value='{$main}'/></td>
		</tr>
		<tr>
			<td class='tdL' align='center'>內容</td>
			<td class='td' valign='top'><textarea name='contect'>{$contect}</textarea></td>
		</tr>
		</table>
		<input type='hidden' name='no' value='{$no}'/>
		<center><input type='button' value='　確認修改　' onClick='if(confirm(\"確認修改？\")){submit();}'></center>
		</form>";
		//照片
		$res=query("SELECT * FROM `tvboard` WHERE `_class`='intro' ORDER BY `_order`");
		echo"<div class='aa5_0'文字右方的照片><br/>";
			echo'<center><b style="font-size:large;">相片編輯</b><br/>
			<span style="color:#666;">(相片會自動調整為200x160的大小)</span></center>';
			while($row=mysql_fetch_array($res,MYSQL_BOTH)){
				$no=$row['no'];
				$dir=$row['_dir'];
				$file=$row['_file'];
				$order=$row['_order'];
				$how=$row['_how'];
				echo"{$how}<br/>
				<img src='photos/intro/{$dir}/{$file}' style='width:200px; height:160px;'/><br/>
				<form action='action.php?aa=9' method='POST' enctype='multipart/form-data'>
				<input type='file' name='userfile' /><br/>
				<input type='hidden' name='class' value='intro'>
				<input type='hidden' name='typ' value='Intro'>
				<input type='hidden' name='no' value='{$no}'>
				<input type='hidden' name='dir' value='{$dir}'>
				<input type='hidden' name='file' value='{$file}'>
				<input type='hidden' name='how' value='{$how}'>
				<input type='hidden' name='order' value='{$order}'>
				<input type='button' value='修改' onClick='if(confirm(\"一旦修改後將會覆蓋原來的圖片，確認送出？\")){submit();}'>
				</form>
				<hr/>";
			}
		echo'</div>';
	}
	else if($action == 8){//成立宗旨編輯
		$res=query("SELECT * FROM `intro` WHERE `no`='2';");
		if($row=mysql_fetch_array($res,MYSQL_BOTH)){
			$contect=$row['_contect'];
			echo'<form action="action.php?aa=10" method="POST">';
			echo'<center><div>'.editor($contect,600,400).'</div>';
			echo"<input type='button' value='　確認修改　'  onClick='if(confirm(\"確認修改？\")){submit();}'/></center>
			</form>";
		}
	}
	else if($action == 9){//QA編輯
		$res=query("SELECT * FROM `intro` WHERE `_class`='QA' ORDER BY `no`");
		echo'<div class="aa5_0">';
		//新增
		echo"<div>
		<center><h3>新增資料</h3></center>
		<form action='action.php?aa=11&t=3' method='POST'>
			<div style='float:right; margin-top:37px;'>
				<input type='button' value='　新增　' onClick='if(confirm(\"確認新增？\")){submit();}'/>
			</div>
			Q：<textarea name='main' class='QATA'></textarea><br/>
			A：<textarea name='contect' class='QATA'></textarea>
		</form>
		</div>
		<center><h3>修改&刪除</h3></center>";
		while($row=mysql_fetch_array($res)){
			$no=$row['no'];
			$main=$row['_main'];
			$contect=$row['_contect'];
			echo"<div style='float:right;'>
				<form action='action.php?aa=11&t=1' method='POST'>
				<input type='hidden' name='no' value='{$no}'/>
				<input type='button' value='　刪除　' onClick='if(confirm(\"一但刪除將無法還原，確認刪除？\")){submit();}'/>
				</form>
				</div>";//刪除
			echo'<b style="color:#A00200;">'.nl2br($main).'</b>
			<br/>
			<b>'.nl2br($contect).'</b>';//Q+A
			echo'<div class="space"></div>';//space
			echo"<form action='action.php?aa=11&t=2' method='POST'>
				<div style='float:right; margin-top:37px;'>
				    <input type='button' value='　修改　' onClick='if(confirm(\"確認修改？\")){submit();}'/>
				</div>
				Q：<textarea name='main' class='QATA'>{$main}</textarea><br/>
				A：<textarea name='contect' class='QATA'>{$contect}</textarea>
				<input type='hidden' name='no' value='{$no}'/>
				</form>";
			echo'<hr/>';
		}
		echo'</div>';
	}
	else if($action == 10){//新增相關辦法
		echo'<div class="b5_Frame">
		<center><h3>新增辦法</h3></center>
		<form action="action.php?aa=12&t=1" method="POST" enctype="multipart/form-data">
		<div style="font-weight:bold; font-size:18px; padding-top:10px; padding-bottom:10px;">
			<input type="text" name="_main" style="padding:5px; width:500px;"/>
		</div>
		<div style="color:#4B4B4B; font-size:12px;">
			<li>最後修訂日期：0000-00-00&nbsp00:00:00</li>
		</div>
		<div style="padding-top:30px; padding-bottom:30px;">
			<textarea name="how" style="width:580px; height:150px; padding:5px;"></textarea>
		</div>
		<li class="L_file"><span style="font-size:15px; border-bottom: 1px dotted #969599;">相關附件：
		<input type="file" name="userfile"/>(最大'.ini_get("upload_max_filesize").')
		</span></li>
		<center><br/>
		<input type="button" value="　完成　" onClick="if(confirm(\'確認新增？\')){submit();}"/>
		</center>
		</div></form>';
	}
	else if($action == 11){//修改相關辦法
		$no=$_GET['no'];
		$res=query("SELECT * FROM `met` WHERE `no`='{$no}' LIMIT 1");
		if($row=mysql_fetch_array($res)){//有資料
			$no=$row['no'];
			$main=$row['_main'];
			$how=$row['_how'];
			$file=$row['_file'];
			$dir=$row['_dir'];
			echo'<div class="b5_Frame">
			<form action="action.php?aa=12&t=2" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="no" value="'.$no.'"/>
			<div style="font-weight:bold; font-size:18px; padding-top:10px; padding-bottom:10px;">';
				echo"<input type='text' name='_main' style='padding:5px; width:500px;' value='{$main}'/>";
			echo'</div>
			<div style="color:#4B4B4B; font-size:12px;">
				<li>最後修訂日期：0000-00-00&nbsp00:00:00</li>
			</div>
			<div style="padding-top:30px; padding-bottom:30px;">
				<textarea name="how" style="width:580px; height:150px; padding:5px;">'.$how.'</textarea>
			</div>
			<li class="L_file"><span style="font-size:15px; border-bottom: 1px dotted #969599;">相關附件：';
			if($file){//已有檔案
				echo"<a href='files/methods/{$dir}/{$file}'>{$file}</a>
				<input type='button' value='刪檔' onClick='if(confirm(\"刪除檔案？\")){location.href=\"action.php?aa=12&t=4&no={$no}\";}'/>";
			}else{
				echo'<input type="file" name="userfile"/>(最大'.ini_get("upload_max_filesize").')';
			}
			echo'</span></li>
			<center><br/>
			<input type="button" value="　完成　" onClick="if(confirm(\'確認修改？\')){submit();}"/>
			<input type="button" value="　返回　" onClick="history.go(-1);"/>
			</center></form>
			</div>';
		}
	}
	else if($action == 12){//編輯服務團隊
		@$t1=$_GET['t1'];//1是內容2是照片3是新增
		if($t1=='intro2_1'){//修改內容
			@$t2=$_GET['t2'];//哪筆資料的編號
			$res=query("SELECT * FROM `intro` WHERE `no`='{$t2}' LIMIT 1");
			$row=mysql_fetch_array($res);
			$main=$row['_main'];//名稱
			$position=$row['_position'];//職稱
			$contect=$row['_contect'];//內容
			$email=$row['_email'];//email
			$phone=$row['_phone'];//電話
			$ext=$row['_ext'];//分機
			echo"<form action='action.php?aa=15&no={$t2}&t=1' method='POST'>
			<center>
			<table class='aa12_table'>
				<tr>
					<td class='aa12_td'>名稱</td>
					<td class='aa12_td' align='left'><input type='text' name='name' value='{$main}'></td>
				</tr>
				<tr>
					<td class='aa12_td'>職稱</td>
					<td class='aa12_td' align='left'><input type='text' name='position' value='{$position}'></td>
				</tr>
				<tr>
					<td class='aa12_td'>內容</td>
					<td class='aa12_td' align='left'><textarea class='aa12_TA' name='contect'>{$contect}</textarea></td>
				</tr>
				<tr>
					<td class='aa12_td'>信箱</td>
					<td class='aa12_td' align='left'><input type='text' name='email' value='{$email}'></td>
				</tr>
				<tr>
					<td class='aa12_td'>電話</td>
					<td class='aa12_td' align='left'><input type='text' name='phone' value='{$phone}'></td>
				</tr>
				<tr>
					<td class='aa12_td'>分機</td>
					<td class='aa12_td' align='left'><input type='text' name='ext' value='{$ext}'></td>
				</tr>
			</table>
			<input type='button' value='　確認修改　' onClick='if(confirm(\"確認修改？\")){submit();}'/>
			</form>
			<form action='action.php?aa=15&no={$t2}&t=4' method='POST'>
			<input type='button' value='　刪除職員　' onClick='if(confirm(\"確認刪除？\")){submit();}'/></center>
			</form>";
		}
		else if($t1=='intro2_2'){//修改照片
			@$t2=$_GET['t2'];//哪筆資料的編號
			echo"<div class='aa10_2'>
				<form action='action.php?aa=15&no={$t2}&t=2' method='POST' enctype='multipart/form-data'>
				(照片將會被調整成210x196的大小)<br/>
				<input type='file' name='userfile' />(最大".ini_get('upload_max_filesize').")
				<input type='button' value='　修改　' onClick='if(confirm(\"確認修改？\")){submit();}'/>
				</form>
			</div>";
		}
		else if($t1=='Introductions2Text'){//新增
			echo"<center><form action='action.php?aa=15&t=3' method='POST' enctype='multipart/form-data'>
			<table class='aa12_table'>
				<tr>
					<td class='aa12_td' colspan='2' align='center'>新增一名職員</td>
				</tr>
				<tr>
					<td class='aa12_td'>相片</td>
					<td class='aa12_td' align='left'>(照片將會被調整成210x196的大小)<br/><input type='file' name='userfile'/>(最大".ini_get('upload_max_filesize').")</td>
				</tr>
				<tr>
					<td class='aa12_td'>名稱</td>
					<td class='aa12_td' align='left'><input type='text' name='name' class='aa12_IT'/></td>
				</tr>
				<tr>
					<td class='aa12_td'>職稱</td>
					<td class='aa12_td' align='left'><input type='text' name='position' class='aa12_IT'/></td>
				</tr>
				<tr>
					<td class='aa12_td'>內容</td>
					<td class='aa12_td' align='left'><textarea class='aa12_TA' name='contect'></textarea></td>
				</tr>
				<tr>
					<td class='aa12_td'>信箱</td>
					<td class='aa12_td' align='left'><input type='text' name='email' class='aa12_IT'/></td>
				</tr>
				<tr>
					<td class='aa12_td'>電話</td>
					<td class='aa12_td' align='left'><input type='text' name='phone' class='aa12_IT'/></td>
				</tr>
				<tr>
					<td class='aa12_td'>分機</td>
					<td class='aa12_td' align='left'><input type='text' name='ext' class='aa12_IT'/></td>
				</tr>
			</table>
			<input type='button' value='　確定　' onClick='if(confirm(\"確認新增？\")){submit();}'/>
			</form>
			</center>";
		}
	}
	else if($action == 13){//編輯學習資源大項
		@$t=$_GET['t'];//res res1 res2 ...
		echo'<div class="aa10_2">
		<form action="action.php?aa=16&n=1&t='.$t.'" method="POST">新增大項：<input type="text" name="name"/><input type="submit" value="新增"></form>
		請點擊大項目進行編輯<br/>======================================================<br/>';
		$res=query("SELECT * FROM `res` WHERE `_to`='0' AND `_class`='{$t}'");
		while($row=mysql_fetch_array($res)){
			$name=$row['_name'];
			$no=$row['no'];
			echo"
			<table width='100%' style='border-bottom:1px dashed #000;'>
				<tr>
					<td class='aa10_1'><a href='window.php?aa=14&no={$no}&t={$t}'>{$name}</a></td>
					<td class='aa10_1' align='right'><form action='action.php?aa=16&n=2&t={$t}' method='POST'>
					<input type='hidden' name='no' value='{$no}'/>
					<input type='button' value='刪除' onClick='if(confirm(\"確認刪除？\")){submit();}'/>
					</form></td>
				</tr>
			</table>";
		}
		echo'======================================================</div>';
	}
	else if($action == 14){//學習資源大項以下
		@$no=$_GET['no'];//大項的no
		@$t=$_GET['t'];//res res1 res2 ...
		$res=query("SELECT * FROM `res` WHERE `no`='{$no}' AND `_class`='{$t}' LIMIT 1");
		if($row=mysql_fetch_array($res)){
			$name=$row['_name'];
			echo'<div class="aa10_2"><button onClick="history.go(-1)">回上頁</button><br/>';
			echo"<form action='action.php?aa=16&n=3&t={$t}' method='POST'>
			<span style='color:#33D; font-weight:bold;'>{$name}</span><br/>
			<input type='text' name='name' value='{$name}'/>
			<input type='hidden' name='no' value='{$no}'/>
			<input type='submit' value='修改'/>
			</form><br/>";
			echo'<center>新增連結</center>';
			echo"<form action='action.php?aa=16&n=4&t={$t}' method='POST'>";
			echo'名稱：<input type="text" name="name"/>網址：<input type="text" name="url"/><input type="submit" value="新增"/>
			<input type="hidden" name="to" value="'.$no.'">
			</form>
			======================================================<br/>';
			$res=query("SELECT * FROM `res` WHERE `_to`='{$no}' AND `_class`='{$t}'");
			if(mysql_num_rows($res)==0){
				echo'<center>無</center>';
			}else{
				while($row=mysql_fetch_array($res)){
					$name=$row['_name'];
					$url=$row['_url'];
					$no=$row['no'];
					echo"<form action='action.php?aa=16&n=6&t={$t}' method='POST'>
						<a href='{$url}' title='{$url}' target='_blank'>{$name}</a>
						<input type='hidden' name='no' value='{$no}'/>
						<input type='button' value='刪除' onClick='if(confirm(\"確認刪除？\")){submit();}'/>
						</form>
						<form action='action.php?aa=16&n=5&t={$t}' method='POST'>
						名稱：<input type='text' name='name' value='{$name}'/>
						網址：<input type='text' name='url' value='{$url}'/>
						<input type='hidden' name='no' value='{$no}'/>
						<input type='submit' value='修改'/>";
					echo'</form><hr/>';
				}
			}
			echo'======================================================</div>';
		}
	}
	else if($action == 15){//處理服務項目
		$t=$_GET['t'];//1編輯簡介2新增簡介3編輯可刪的簡介
		if($t==1){//編輯簡介
			$no=$_GET['no'];
			$res=query("SELECT * FROM `ser` WHERE `no`='{$no}' LIMIT 1");
			if($row=mysql_fetch_array($res)){
				echo "<div class='aa10_2'>
				<center><h3>{$row['_main']}</h3><h3>簡介修改
				<form action='action.php?aa=3&t=ser' method='POST'>
				<textarea class='MSRE2' name='content'>{$row['_content']}</textarea><br/>
				<input type='hidden' name='no' value='{$no}'/>
				<input type='button' value='　修改　' onClick='if(confirm(\"確認修改？\")){submit();}'/>
				</form></h3>
				</center>
				</div>";
			}
		}
		else if($t==2){//新增簡介
			echo'<div class="aa10_2">
			<center><h3>新增簡介</h3></center>
			<form action="action.php?aa=3&t=ser" method="POST">
			簡介標題:<input type="text" name="_main" class="MSRE" style="padding:5px; width:300px;"/><br/>
			簡介內容:<br/><textarea class="MSRE2" name="content"></textarea><br/>
			<center><input type="button" value="　新增　" onClick="if(confirm(\'確認新增？\')){submit();}"/></center>
			</form>
			</div>';
		}
		else if($t==3){//編輯可刪的簡介
			$no=$_GET['no'];
			$res=query("SELECT * FROM `ser` WHERE `no`='{$no}' LIMIT 1");
			if($row=mysql_fetch_array($res)){
				echo "<div class='aa10_2'>
				<center><form action='action.php?aa=17&t=1' method='POST'><h3>名稱<br/>
				<input type='text' name='_main' class='MSRE' value='{$row['_main']}' style='padding:7px;'/></h3><h3>簡介<br/>
				<textarea class='MSRE2' name='content'>{$row['_content']}</textarea></h3>
				<input type='hidden' name='no' value='{$no}'/>
				<input type='button' value='　修改　' onClick='if(confirm(\"確認修改？\")){submit();}'/>
				</form>
				<form action='action.php?aa=17&t=2' method='POST'>
				<input type='hidden' name='no' value='{$no}'/>
				<input type='button' value='　刪除　' onClick='if(confirm(\"確認刪除？\")){submit();}'/>
				</form>
				</center>
				</div>";
			}
		}
	}
	else if($action == 16){//編輯活動集錦文章
		@$no=$_POST['no'];
		$res=query("SELECT * FROM `act` WHERE `no`='{$no}' LIMIT 1");
		if($row=mysql_fetch_array($res)){
			$no=$row['no'];
			$main=$row['_main'];
			$date=$row['_actDate'];
			$content=$row['_content'];
			echo'<div class="b6_Frame">
			<form action="action.php?aa=1&t=3" method="POST">';
			echo'活動日期(輸入格式:Y-m-d  如2012-08-09)<br/>
			<input type="text" name="date" style="padding:5px; width:350px;" value="'.$date.'" maxlength="10"/><br/>';
			echo"<div style='padding:5px 0px 10px 0px; font-weight:bold; color:#339; font-size:18px;'>{$main}<br/>
			<input type='text' name='_main' value='{$main}' style='padding:5px; width:350px;'/>
			</div>
			<div>";
			echo nl2br($content);
			echo'</div>
			<textarea name="content" class="MSRE2">'.$content.'</textarea>
			<hr/>
			<input type="hidden" name="no" value="'.$no.'"/>
			<center>
			<input type="button" value="　修改　" onClick="if(confirm(\'確認修改？\')){submit();}"/>
			<input type="button" value="　返回　" onClick="history.go(-1);"/>
			</center>
			</form></div>';
		}
	}
	else if($action == 17){//成果發表大項以下
		$no=$_GET['no'];//大項的no
		$res=query("SELECT * FROM `ser` WHERE `no`='{$no}' AND `_class`='ser1_3' LIMIT 1");
		if($row=mysql_fetch_array($res)){
			$main=$row['_main'];
			echo'<div class="aa10_2"><button onClick="history.go(-1)">回上頁</button><br/>';
			echo"<form action='action.php?aa=3&n=2' method='POST'>
			<span style='color:#33D; font-weight:bold;'>{$main}</span><br/>
			<input type='text' name='_main' value='{$main}'/>
			<input type='hidden' name='no' value='{$no}'/>
			<input type='submit' value='修改'/>
			</form><br/>";
			echo'<center>新增資料</center>';
			echo'<form action="action.php?aa=3&n=3" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="no" value="'.$no.'">';
			echo'組名：　　<input type="text" name="_main" class="aa17_IT"/><br/>
			小組長：　<input type="text" name="leader" class="aa17_IT"/><br/>
			指導老師：<input type="text" name="teacher" class="aa17_IT"/><br/>
			成員：<br/><textarea name="content" class="aa12_TA"></textarea><br/>
			成果展示：<input type="file" name="userfile" />(最大'.ini_get("upload_max_filesize").')<br/>
			======================================================<br/>
			<center><input type="button" value="　新增　" onClick="if(confirm(\'確認新增？\')){submit();}"/></center>
			</form>
			</div>';
		}
	}
	else if($action == 18){//成果發表內容修改&刪除
		$no=$_GET['no'];
		$res=query("SELECT * FROM `ser` WHERE `no`='{$no}' LIMIT 1");
		if($row=mysql_fetch_array($res)){
			$no=$row['no'];
			$main=$row['_main'];
			$content=$row['_content'];
			$leader=$row['_leader'];
			$teacher=$row['_teacher'];
			$dir=$row['_dir'];
			$file=$row['_file'];
			echo'<div class="aa10_2">';
			echo'<center>修改資料</center>';
			echo'<form action="action.php?aa=3&n=4" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="no" value="'.$no.'">';
			echo'組名：　　<input type="text" name="_main" class="aa17_IT" value="'.$main.'"/><br/>
			小組長：　<input type="text" name="leader" class="aa17_IT" value="'.$leader.'"/><br/>
			指導老師：<input type="text" name="teacher" class="aa17_IT" value="'.$teacher.'"/><br/>
			成員：<br/><textarea name="content" class="aa12_TA" value="'.$content.'">'.$content.'</textarea><br/>
			成果展示：';
			if($file)//有檔案
				echo"<a href='files/ser1_3/{$dir}/{$file}' target='_blank'>{$file}</a>&nbsp&nbsp&nbsp<input type='button' value='刪除' onclick='if(confirm(\"確認刪除？\")){location.href=\"action.php?aa=3&n=7&no={$no}\";}'/><br/>";
			echo'<input type="file" name="userfile" /><span style="color:#999;">(最大'.ini_get('upload_max_filesize').')</span><br/>
			======================================================<br/>
			<center><input type="button" value="　修改　" onClick="if(confirm(\'確認修改？\')){submit();}"/>
			</form>
			<form action="action.php?aa=3&n=5" method="POST">
			<input type="hidden" name="no" value="'.$no.'"/>
			<input type="button" value="　刪除　" onClick="if(confirm(\'確認刪除？\')){submit();}"/>
			</form></center>
			</div>';
		}
	}
}
if($adAction == 1){//看NEWS文章
	@$no=$_GET['no'];
	$select=query("SELECT * FROM `news` WHERE `no` = '{$no}' LIMIT 1");
	list($no,$cls,$main,$things,$file,$dir,$size,$addDate,$editDate,$ip) = mysql_fetch_array($select,MYSQL_BOTH);
	
	echo "<table width='95%' align='center' class='tablee'>
	<tr>
		<td class='tdL' width='8%' height='30px' align='center'>類別</td><td class='tdSp' style='padding:5px;'>{$cls}</td>
	</tr>
	<tr>
		<td class='tdL' height='30px' align='center'>標題</td><td class='tdSp' style='color:#0002FF;'><div style='width:640px; padding:5px; padding-left:5px;'>{$main}</div></td>
	</tr>
	<tr>
		<td class='tdL' align='center' height='220'>內容</td>
		<td class='td' valign='top'><div style='width:640px; padding-left:5px;'>".$things.'</div></td>
	</tr>
	<tr>
		<td class="tdL" align="center" style="padding:5px;">附檔</td>
		<td class="td" style="padding:5px;">';
		if($file)//有無附檔
			echo "<div style='width:640px'><a href='files/".$dir."/".$file."' target='_blank'>".$file."</a>　　(".round(($size/1024),2)." KB)</div>";
		else
			echo '無';
		echo "</td>
	</tr>
	<tr>
		<td class='tdL' align='center'>日期</td><td style='padding:5px'>{$addDate}</td>
	</tr>
	</table>
	<center><form action='javascript:window.close();'><input type='submit' value='　關閉視窗　'></form>";
	if(@$_SESSION['login']==1)//修改、刪除
		echo "
		<form action='action.php?aa=6' method='POST'>
		<input type='button' value='　修改文章　' onClick='location.href=\"window.php?aa=6&no={$no}\";'>
		<input type='hidden' name='no' value='{$no}'>
		<input type='hidden' name='file' value='{$file}'>
		<input type='hidden' name='dir' value='{$dir}'>
		<input type='button' value='　刪除文章　' Onclick='if(confirm(\"確定刪除？\")){submit();}'>";
	echo '</center>';
}
else if($adAction == 2){//搜索NEWS
	@$t = $_GET['t'];
	@$v = ($_GET['v'])?$_GET['v']:$_POST['v'];
	$SelectResault = query("SELECT * FROM `news` WHERE `{$t}` like '%{$v}%' ORDER BY `no` DESC");
	echo "<center>
	<form action='window.php?b=2&t=_main' method='POST'>搜索所有公告內容：
	<input type='text' name='v' size='70'>
	<input type='submit' value='搜索'>
	</form>
	</center>
	<table width='88%' align='center' class='tablee'>";
	if(mysql_num_rows($SelectResault)==0)//查無資料
		echo '<tr><td align="center">查無資料！</td></tr>';
	else
		while($row=mysql_fetch_array($SelectResault,MYSQL_BOTH)){
			$no=$row['no'];
			$class=$row['_class'];
			$main=$row['_main'];
			$file=$row['_file'];
			$things=$row['_things'];
			$addDate=$row['_addDate'];
			echo "<tr>
			<td width='12%' align='center'>{$class}</td>
			<td width='60%' class='selectMain' onClick='location=href=\"window.php?b=1&no={$no}\"'>".mb_strimwidth($main,0,51,'...','UTF-8')."</td><td width='4%' align='center'>";
			if($file)
				echo'<img src="img/NewsFile.png">';
			echo"</td><td width='12%' align='center'>".substr($addDate,0,10).'</td>
			</tr>';
		}

	echo '</table>';
}
else if($adAction == 3){//看留言板文章
	@$no=$_GET['no'];
	$res=query("SELECT * FROM `message` WHERE `no`='{$no}' LIMIT 1;");
	if($row=mysql_fetch_array($res)){//有資料
		$no=$row['no'];
		$main=$row['_main'];
		$content=$row['_content'];
		$name=$row['_name'];
		$email=$row['_email'];
		$reTo=$row['_reTo'];
		$file=$row['_file'];
		if($file){//有檔案
			$dir=$row['_dir'];
			$size=round($row['_size']/1024,2);
		}
		$editDate=$row['_editDate'];
	}else
		exit;
	echo"<table width='70%' class='aa10_0' align='center' border='0'>
		<tr>
			<td class='aa10_1'><div style='width:520px;'>主題：<span style='color:#0202EE;'>{$main}</span>";
			if(@$_SESSION['login']==1){//刪文
				echo"&nbsp(<a href='#' onClick='if(confirm(\"確認刪除？\")){location.href=\"action.php?aa=14&no={$no}\"}'>刪除</a>)";
			}
	echo"</div></td></tr>
		<tr>
			<td class='aa10_1' align='right' style='color:#777;'>發表時間:{$editDate}</td>
		</tr>
		<tr>
			<td class='aa10_1' style='background:#FFF; height:150px; border-top:solid 1px #AAA;' valign='top' align='left'><div style='width:520px'>".nl2br($content)."</div></td>
		</tr>
		<tr>
			<td class='aa10_1' style='border-top:solid 1px #AAA;'>附件：";
			if($file){//有檔案
				echo"<a href='files/message/{$dir}/{$file}' target='_blank'>{$file}</a>({$size}KB)";
			}else{
				echo"無";
			}
			echo"</td>
		</tr>
		<tr>
			<td class='aa10_1' align='right'>留言者：{$name}";
			if($email){//有填信箱
				echo"(<a href='mailto:{$email}'>{$email}</a>)";
			}
			echo'</td>
		</tr>';
		if(@$_SESSION['login']==1){//管理者看IP
			@$ip=$row['_ip'];
			echo"
			<tr>
				<td class='aa10_1' align='right'>IP:&nbsp{$ip}</td>
			</tr>";
		}
	echo'</table>';
	//回覆
	$amount=mysql_num_rows(query("SELECT `no` FROM `message` WHERE `_reTo`={$no}"));
	echo"<div class='aa10_2'>
	<span style='color:#941'>回覆({$amount})</span>";
	if($amount>0){//印出回覆
		$res=query("SELECT * FROM `message` WHERE `_reTo`={$no} ORDER BY `no`");
		while($row=mysql_fetch_array($res)){
			$no=$row['no'];
			$name=$row['_name'];
			$email=$row['_email'];
			$content=$row['_content'];
			$editDate=$row['_editDate'];
			$file=$row['_file'];
			if($file){//有檔案
				$dir=$row['_dir'];
				$size=round($row['_size']/1024,2);
			}
			echo "<div class='space'></div><div style='float:right;'><span style='color:#888;'>{$editDate}</span>";
			if(@$_SESSION['login']==1){//刪文
				echo"&nbsp(<a href='#' onClick='if(confirm(\"確認刪除？\")){location.href=\"action.php?aa=14&no={$no}\"}'>刪除</a>)";
			}
			echo"</div>
			<hr/><div style='padding-top:3px;'><span style='color:#11E;'>{$name}</span>";
			if($email){//有填信箱
				echo"(<a href='mailto:{$email}'>{$email}</a>)";
			}
			echo '&nbsp說';
			if(@$_SESSION['login']==1){//管理者看IP
				@$ip=$row['_ip'];
				echo"&nbsp(IP:&nbsp{$ip})";
			}
			echo '</div><div>'.nl2br($content).'</div>';
			if($file){//有檔案
				echo"<br/><span style='color:#999;'>附件</span>:&nbsp<a href='files/message/{$dir}/{$file}' target='_blank'>{$file}</a>({$size}KB)";
			}
		}
	}
	$no=$_GET['no'];
	//新增回覆
	echo"<hr/>
		<center><h3>快速回覆</h3></center>
		<form action='action.php?b=14' method='post' enctype='multipart/form-data'>
		<input type='hidden' name='no' value='{$no}'/>
		<input type='hidden' name='main' value='reTo：{$main}'/>
		名稱<input type='text' name='name' class='MSRE'/><br/>
		信箱<input type='text' name='email' class='MSRE' size='53'/>(可不填)<br/>
		附件<input type='file' name='userfile'/>(最大".ini_get('upload_max_filesize').")<br/>
		內容<br/>
		<textarea name='content' class='MSRE2'></textarea><br/>
		<center>
		<input type='button' value='　確認送出　' onClick='if(confirm(\"確認送出？\")){submit();}'>
		</center>
		</form>";
	echo'</div>';
}
else if($adAction == 4){//新增留言
	echo'<form action="action.php?b=14" method="POST" enctype="multipart/form-data">
	<table width="70%" class="aa10_0" align="center" border="0">
		<tr>
			<td class="aa10_1">主題：<input type="text" name="main" class="MSIT" maxlength="60"/></td>
		</tr>
		<tr>
			<td class="aa10_1" align="right" style="color:#777;">發表時間:0000-00-00 00:00:00</td>
		</tr>
		<tr>
			<td class="aa10_1" style="background:#FFF; height:100px; border-top:solid 1px #AAA;" valign="top" align="left"><textarea name="content" class="MSTA"></textarea></td>
		</tr>
		<tr>
			<td class="aa10_1" style="border-top:solid 1px #AAA;">附件：<input type="file" name="userfile"/>(最大'.ini_get("upload_max_filesize").')</td>
		</tr>
		<tr>
			<td class="aa10_1" align="right">留言者：<input type="text" name="name" style="border:1px solid #000;" maxlength="4"/></td>
		</tr>
	</table>
	<center>
	信箱(可不填)：<input type="text" name="email" size="56"/><br/>';
	echo"<input type='button' value='　確認送出　' onClick='if(confirm(\"確認送出？\")){submit();}'>
	</center>
	</form>";
}
else if($adAction == 5){//看相關辦法
	$no=$_GET['no'];
	$res=query("SELECT * FROM `met` WHERE `no`='{$no}' LIMIT 1");
	if(mysql_num_rows($res)==1){
		$row=mysql_fetch_array($res);
		$no=$row['no'];
		$main=$row['_main'];
		$how=nl2br($row['_how']);
		$editDate=$row['_editDate'];
		@$dir=$row['_dir'];
		@$file=$row['_file'];
		echo'<div class="b5_Frame">';
		echo"
		<div style='font-weight:bold; font-size:18px; padding-top:10px; padding-bottom:10px;'>{$main}</div>
		<div style='color:#4B4B4B; font-size:12px; padding-left:15px;'><li>最後修訂日期：{$editDate}</li></div>
		<div style='padding-top:30px; padding-bottom:30px;'>{$how}</div>";
		echo'<div style="padding-left:30px;"><li class="L_file"><span style="font-size:15px; border-bottom: 1px dotted #969599;">相關附件：';
		if($file)
			echo"<a href='files/methods/{$dir}/{$file}'>{$file}</a>";
		else//沒檔案
			echo'無';
		echo'</span></li></div>';
		echo'</div>';
		if(@$_SESSION['login']==1){//修改、刪除
			echo'<table align="center"><tr><td class="aa10_1">
				<form action="window.php?aa=11&no='.$no.'" method="POST">';
			echo'<input type="submit" value="　修改　"/>
				</form></td><td class="aa10_1">
				
				<form action="action.php?aa=12&t=3" method="POST">';
			echo"<input type='hidden' name='no' value='{$no}'/>";
			echo'<input type="button" value="　刪除　" onClick="if(confirm(\'確認刪除？\')){submit();}"/>
				</form></td></tr></table>';
		}
	}else//錯誤
		exit;
}
else if($adAction == 6){//看活動集錦
	$no=$_GET['no'];
	$res=query("SELECT * FROM `act` WHERE `no`='{$no}' LIMIT 1");
	if($row=mysql_fetch_array($res)){//有資料
		$no=$row['no'];
		$main=$row['_main'];
		$content=nl2br($row['_content']);
		//敘述
		if(@$_SESSION['login']==1){//改文、刪文
			echo'<table align="center">
				<tr>
					<td class="aa10_1">
						<form action="window.php?aa=16" method="POST">
						<input type="hidden" name="no" value="'.$no.'"/>
						<input type="submit" value="修改敘述"/>
						</form>
					</td>
					<td class="aa10_1">
						<form action="action.php?aa=1&t=4" method="POST">
						<input type="hidden" name="no" value="'.$no.'"/>
						<input type="button" value="刪除此篇" onClick="if(confirm(\'確認刪除？\')){submit();}"/>
						</form>
					</td>
				</tr>
			</table>';
		}
		echo'<div class="b6_Frame">';
		if(@$_SESSION['login']==1){//新照
			echo"<div style='float:right;'>
					<form action='action.php?aa=1&t=1' method='POST' enctype='multipart/form-data'>
					照片描述(可不填)<input type='text' name='_main'/><br/>
					<input type='hidden' name='no' value='{$no}'/>
					<input type='file' name='userfile' />
					<input type='submit' value='上傳'/>
					</form>
				</div>";
		}
		echo"<div style='padding:5px 0px 10px 0px; font-weight:bold; color:#339; font-size:18px;'>{$main}</div>
			<div>{$content}</div><hr/>";
		//圖片
		$res=query("SELECT * FROM `act` WHERE `_to`='{$no}'");
		if(mysql_num_rows($res)>0){
			echo'<table width="100%" align="center"><tr>';
			for($i=4;$row=mysql_fetch_array($res);$i++){
				$no=$row['no'];
				if($i%4==0)//換行
					echo'</tr><tr><td align="center" class="aa10_1">';
				else
					echo'<td align="center" class="aa10_1">';
				echo"<a href='photos/act/{$row['_dir']}/{$row['_file']}' target='_blank'><img src='photos/act/{$row['_dir']}/{$row['_file']}' style='width:150px; height:150px;' title='{$row['_main']}'/></a>";//圖
				if(@$_SESSION['login']==1){//刪圖
					echo"<form action='action.php?aa=1&t=2' method='POST'>
					<input type='hidden' name='no' value='{$no}'/>
					<input type='button' value='刪除' onClick='if(confirm(\"刪除？\")){submit();}'/>
					</form>";
				}
				echo'</td>';
			}
			echo'</tr></table>';
		}else
			echo'<center>無圖片</center>';
		echo'</div>';
	}
}
?>
</body>