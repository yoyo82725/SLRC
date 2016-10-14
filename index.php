<?php
	session_start();
	require('function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="學資中心, 學生學習資源中心, 聖約翰科技大學, 學習資源, 學習" />
<meta name="description" content="聖約翰科技大學-學生學習資源中心" />
<!--css-->
<link rel="stylesheet" type="text/css" href="css/Sstyle1.css"/>
<link rel="stylesheet" type="text/css" href="css/orbit-1.2.3.css"/>
<!--JQ-->
<script type="text/javascript" src="js/jquery-1.7.2.js" ></script>
<script type="text/javascript" src="js/jquery.orbit-1.2.3.min.js"></script>	
<script type="text/javascript" src="js/SJS1.js" ></script>
<title>聖約翰科技大學-學生學習資源中心</title>
</head>
<body>
<div id='MainFrame'>
	<div id='HeaderFrame'>
		<div id='HF_01'><!--左上綠色那塊-->
			<div id='HF_011'></div>
			<div id='HF_012'></div>
			<div id='HF_013'></div>
		</div>
		<div id='HF_02'></div><!--中文LOGO-->
		<div id='HF_03'></div><!--英文LOGO-->
		<div id='HF_selector'><!--主選單-->
			<div id='News' class='selector'></div><!--最新消息-->
			<div id='Introductions' class='selector'><!--中心介紹-->
				<div class='SonSelector' id='IntroductionsSon'>
					<div id='IntroductionsSon1' class='IntroductionsSon'></div>
					<div id='IntroductionsSon2' class='IntroductionsSon'></div>
					<div id='IntroductionsSon3' class='IntroductionsSon'></div>
				</div>
			</div>
			<div id='Service' class='selector'><!--服務-->
				<div class='SonSelector' id='ServiceSon'>
					<div id='ServiceSon1' class='ServiceSon'></div>
					<div id='ServiceSon2' class='ServiceSon'></div>
					<div id='ServiceSon3' class='ServiceSon'></div>
					<div id='ServiceSon4' class='ServiceSon'></div>
				</div>
			</div>
			<div id='Resources' class='selector'><!--資源-->
				<div class='SonSelector' id='ResourcesSon'>
					<div id='ResourcesSon1' class='ResourcesSon'></div>
					<div id='ResourcesSon2' class='ResourcesSon'></div>
				</div>
			</div>
			<div id='Activities' class='selector'><!--活動-->
				<!--<div class='SonSelector' id='ActivitiesSon'>
					<div id='ActivitiesSon1' class='ActivitiesSon'></div>
					<div id='ActivitiesSon2' class='ActivitiesSon'></div>
				</div>子項目-->
			</div>
			<div id='Message' class='selector'><!--留言板-->
			</div>
			<!--<div id='HF_selector2'></div>--><!--選單英文名-->
		</div>
	</div>
	<div id='CenterFrame'>
		<div id='CF_L'>
			<!-- 電視牆150X160-->
			<div id='CF_L_01'>
				<?php require('TV.php')?>
			</div>
			<!-- 左選單-->
			<div id='CF_L_02'>
				<div id='LeftLogo'></div>
				<div id='Downloads' class='LeftSelector'></div>
				<div id='Methods' class='LeftSelector'></div>
				<div id='LeftLink01'></div>
				<div id='LeftLink02'></div>
				<div id='LeftLink03'></div>
				<div id='LeftLink04'></div>
			</div>
		</div>
		<!-- 內容-->
		<div id='CF_C'>
			<?php
				require('main.php');
			?>
		</div>
		<!-- COPYRIGHT-->
		<div class='space'></div>
		<div id='FooterFrame'>
			<div id='Footer_01'></div>
			<div id='Footer_02'>
			<table border='0' id='FooterText' width='100%'><tr><td class='FooTd' align='center'>Copyright&copy;聖約翰科技大學_夢工場製作</td></tr><tr><td class='FooTd' align='center'>

251新北市淡水區淡金路四段499號 電話:02-2801-3131轉6892</td></tr><tr><td class='FooTd' align='center'>

Address: 499,Sec. 4, Tam King Road Tamsui, Taipei, Taiwan R.O.C</td></tr></table>
			</div>
			<div id='Footer_03'></div>
		</div>
	</div>
</div>
</body>
</html>