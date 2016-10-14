<!--[if IE]>
<style>
	#MesCon{
		height:420px;
	}
</style>
<![endif]-->
<?php
//偵測瀏覽器  給它應有的懲罰！
$agent = $_SERVER['HTTP_USER_AGENT'];
if(strpos($agent,"Firefox"))//只懲罰Firefox就好
	echo '<style>
		#MesCon{
			height:460px;
		}
		</style>';
?>
<?php
//最新消息
	echo '
	<div id="NewsAll" class="All">
		<div class="BlueLine">';//藍色那條
	echo (@$_SESSION['login']==1)?'<div id="NewsText" class="NewsAdd" style="cursor:pointer"></div>':'<div id="NewsText"></div>';
	echo '</div>
		<div id="NewsClass">
			<div id="NewsClass_02"></div>
			<div id="NewsClass_03"></div>
		</div>
		<div id="NewsHr"></div><div id="NewsCon">';
	//主要消息連SQL
	$num = mysql_num_rows(query("SELECT * FROM `news`"));
	$totle = floor(($num/12)+1);
	if($num%12==0)
		$totle--;
	//每12筆資料一頁
	for($i=1,$bottom=0;$i<=$totle;$i++,$bottom+=12){
		echo "<div class='NewsMain' name='NewsP{$i}'>";
		$SelectResult = query("SELECT * FROM `news` ORDER BY `no` DESC LIMIT {$bottom} , 12");
		while($row=mysql_fetch_array($SelectResult,MYSQL_BOTH)){
			$no=$row['no'];
			$main=$row['_main'];
			$things=$row['_things'];
			$addDate=$row['_addDate'];
			$file=$row['_file'];
			echo"<table class='NewsTable'><tr>
			<td class='NewsTd' name='{$no}' id='R'>".mb_strimwidth($main,0,55,'...','UTF-8')."</td>
			<td style='width:15px;'>";
			if($file)//有附件
				echo'<img src="img/NewsFile.png"/>';
			echo"</td>
			<td width='80px' class='NewsTd' id='L' name='{$addDate}' align='center'>".substr($addDate,0,10).'</td>
			</tr></table>';
		}
		echo '</div>';
	}
	echo'</div>';
	//上下頁
	echo '
		<div class="NewsBottom1">按鍵盤左右鍵也可換頁喔！</div>
		<table border="0" align="center" id="NewsBottom" class="PageBottom"><tr><td align="center" width="120px"><div class="NewsUD" name="up">上一頁</div></td><td><table><tr>';
	//算位數抓寬
	$a=$totle;//暫存變數
	$b=0;
	while($a>=1){
		$a/=10; $b++;//算位數
	}
	//頁碼
	for($i=1,$w=$b*15;$i<=$totle;$i++){
		echo "<td align='center'><div class='NewsTotal' name='{$i}' style='width:{$w}px;'>{$i}</div></td>";
		if($i!=$totle && $i%8!=0) echo '<td align="center">-</td>';
		if($i%8==0)//換行
			echo '</tr><tr>';
	}
	echo '</tr></table></td><td align="center" width="120px"><div class="NewsUD" name="down">下一頁</div></td></tr></table></div>';
//中心介紹
	echo'<div id="IntroductionsAll" class="All">
		<div class="BlueLine"><!--藍色那條-->';
	echo (@$_SESSION['login']==1)?'<div id="IntroductionsText" class="InEdit" style="cursor:pointer;"></div>':'<div id="IntroductionsText"></div>';
	echo '</div>';
	$res=query("SELECT * FROM `intro` WHERE `_class`='intro';");
	$row=mysql_fetch_array($res,MYSQL_BOTH);
	$main=$row['_main'];
	$contect=$row['_contect'];
	$mainColor=$row['_color1'];
	
	$res=query("SELECT * FROM `tvboard` WHERE `_class`='intro' ORDER BY `_order`");
	for($i=1;$row=mysql_fetch_array($res,MYSQL_BOTH);$i++){
		${'dir'.$i}=$row['_dir'];
		${'file'.$i}=$row['_file'];
	}
	echo"<div id='IntroductionsMain'>
		<div id='InMain' style='color:{$mainColor};'>{$main}</div>
		<div id='InImg1' style='padding:0px 0px 1px 1px;'>
			<img src='photos/Intro/{$dir1}/{$file1}' class='InImg'/>
		</div>
		<div id='InText'>".nl2br($contect)."</div>
		<div class='space'></div>
		<table align='center' width='82%'>
			<tr>
				<td id='InImg2' align='left'>
					<img src='photos/Intro/{$dir2}/{$file2}' class='InImg'/>
				</td>
				<td id='InImg3' align='right'>
					<img src='photos/Intro/{$dir3}/{$file3}' class='InImg'/>
				</td>
			</tr>
			<tr>
				<td id='InImg4' align='left'>
					<img src='photos/Intro/{$dir4}/{$file4}' class='InImg'/>
				</td>
				<td id='InImg5' align='right'>
					<img src='photos/Intro/{$dir5}/{$file5}' class='InImg'/>
				</td>
			</tr>
		</table>
	</div>";	
	echo'</div>';
//中心介紹--成立宗旨
	echo '<div id="IntroductionsSon1All" class="All">
		<div class="BlueLine">';//藍色那條
	echo (@$_SESSION['login']==1)?"<div id='Introductions1Text' class='InEdit1' style='cursor:pointer;'></div>":"<div id='Introductions1Text'></div>";
	echo'</div>';
	$res=query("SELECT * FROM `intro` WHERE `no`='2';");
	$row=mysql_fetch_array($res);
	$contect=$row['_contect'];
	echo'<div id="Introductions1Main">';
	echo $contect;
	echo'</div></div>';
//中心介紹--服務團隊
	echo'<div id="IntroductionsSon2All" class="All">
	<div class="BlueLine">';
	echo (@$_SESSION['login']==1)?"<div id='Introductions2Text' class='InEdit2' style='cursor:pointer;' name='3'></div>":"<div id='Introductions2Text'></div>";
	echo'</div>
	<div id="Introductions2Main">
		<div id="Intro2Top"></div><!--灰色那條-->';
	$res=query("SELECT * FROM `intro` WHERE `_class`='intro2'");
	while($row=mysql_fetch_array($res)){
		$no=$row['no'];
		$dir=$row['_dir'];
		$photo=$row['_photo'];
		$main=$row['_main'];//名稱
		$position=$row['_position'];//職稱
		$contect=$row['_contect'];//內容
		$email=$row['_email'];//email
		$phone=$row['_phone'];//電話
		$ext=$row['_ext'];//分機
		echo'<table width="98%">
			<tr>';
				echo (@$_SESSION['login']==1)?"<td width='60%' align='left' valign='top' class='InEdit2' id='intro2_1' name='{$no}'  style='cursor:pointer;'>":"<td width='60%' align='left' valign='top'>";
				echo"<div style='margin-top:7px; margin-bottom:7px; font-size:16px; color:#0A008C; font-weight:bold;'>{$main}&nbsp&nbsp{$position}</div>
					<div style='margin-left:12px; font-weight:bold; height:150px;'>".nl2br($contect)."</div>
					<div style='margin-top:7px; margin-bottom:7px; margin-left:14px; color:#644000; font-size:12px;'>Email：{$email}<br/>
					電話：{$phone}&nbspext&nbsp{$ext}</div>
				</td>";
				echo(@$_SESSION['login']==1)?"<td align='center' valign='center' style='background:url(img/intro2Base.png) no-repeat; background-position:center center; width:231px; height:204px; cursor:pointer;' class='InEdit2' id='intro2_2' name='{$no}'>":"<td align='center' valign='center' style='background:url(img/intro2Base.png) no-repeat; background-position:center center; width:231px; height:204px;'>";
				echo"<img src='photos/Intro2/{$dir}/{$photo}' style='width:210px; height:196px;'>
				</td>
			</tr>
		</table>
		<div class='Intro2Hr'></div>";
	}
	echo'</div></div>';
//中心介紹--QA
	echo'<div id="IntroductionsSon3All" class="All">
	<div class="BlueLine">';//藍色那條
	if(@$_SESSION['login']==1)
		echo'<div id="Introductions3Text" class="InEdit3" style="cursor:pointer;"></div>';
	else
		echo'<div id="Introductions3Text"></div>';
	echo'</div>
	<div id="Introductions3Main">';
	$res=query("SELECT * FROM `intro` WHERE `_class`='QA' ORDER BY `no`");
	while($row=mysql_fetch_array($res)){
		$main=$row['_main'];
		$contect=$row['_contect'];
		echo '<b style="color:#A00200;">'.nl2br($main).'</b>
		<br/>
		<b>'.nl2br($contect).'</b><hr/>';
	}
	echo'</div></div>';
//服務項目
	echo'<div id="ServiceAll" class="All">
		<div class="BlueLine">';
	if(@$_SESSION['login']==1)
		echo'<div id="ServiceText" class="serEdit2" name="ser" style="cursor:pointer;"></div>';
	else
		echo'<div id="ServiceText"></div>';
	echo'</div><div id="serMain">';
	$res=query("SELECT * FROM `ser` WHERE `_class`='ser' ORDER BY `no` DESC");
	while($row=mysql_fetch_array($res)){//可刪
		$no=$row['no'];
		$main=$row['_main'];
		$content=nl2br($row['_content']);
		echo"<div class='serUp2'>{$main}</div>";
		if(@$_SESSION['login']==1)
			echo"<div class='serEdit3' style='cursor:pointer;' name='{$no}'>{$content}</div><br/>";
		else
			echo"<div>{$content}</div><br/>";
	}
	$res=query("SELECT * FROM `ser` WHERE `_class`='serS' ORDER BY `no`");
	for($i=1;$row=mysql_fetch_array($res);$i++){//不可刪
		$no=$row['no'];
		$main=$row['_main'];
		$content=nl2br($row['_content']);
		echo"<div class='serUp' style='cursor:pointer;' name='{$i}'>{$main}</div>";
		if(@$_SESSION['login']==1)
			echo"<div class='serEdit2' style='cursor:pointer;' name='{$no}'>{$content}</div><br/>";
		else
			echo"<div>{$content}</div><br/>";
	}
	echo'</div>';
	echo'</div>';
//服務項目--讀書會
	echo'<div id="ServiceSon1All" class="All">
		<div class="BlueLine">';
	if(@$_SESSION['login']==1)
		echo'<div id="Service1Text" class="serEdit" name="ser1" style="cursor:pointer;"></div>';
	else
		echo'<div id="Service1Text"></div>';
	//上面按鈕
	echo'</div>
	<div id="ser1TopBtn">
	<div class="ser1TopSelect" id="ser1_1Btn" name="1"></div>
	<div class="ser1TopSelect" id="ser1_2Btn" name="2"></div>
	<div class="ser1TopSelect" id="ser1_3Btn" name="3"></div>
	</div>
	<div class="space"></div>';
	//計畫說明
	echo'<div id="ser1Main1" class="serAll" style="display:none;">';
	$res=query("SELECT * FROM `ser` WHERE `_class`='ser1_1' LIMIT 1");
	$row=mysql_fetch_array($res);
	echo $row['_content'];
	echo'</div>';
	//執行流程
	echo'<div id="ser1Main2" class="serAll" style="display:none;">';
	$res=query("SELECT * FROM `ser` WHERE `_class`='ser1_2' LIMIT 1");
	$row=mysql_fetch_array($res);
	echo $row['_content'];
	echo'</div>';
	//成果發表
	echo'<div id="ser1Main3" class="serAll" style="display:none;">';
		//學年度
	$res=query("SELECT * FROM `ser` WHERE `_class`='ser1_3' ORDER BY `no` DESC");
	//echo'<div style="margin-left:13px; margin-bottom:10px;">';
	echo'<table align="center" style="margin-bottom:5px;"><tr><td>';
	for($i=1;$row=mysql_fetch_array($res);$i++){
		if($i%4==0){//一行四個
			echo"<div class='ser1_3Age' name='{$row['no']}' style='border:none;'>{$row['_main']}</div>";
			echo'<div class="space"></div>';
		}else{
			echo"<div class='ser1_3Age' name='{$row['no']}'>{$row['_main']}</div>";
		}
	}
	echo'</td></tr></table>';
	echo'<div class="space"></div>
	<div id="ser1_3Top"></div>
	<div id="ser1_3Main">
	</div>';
	echo'</div></div>';
//服務項目--預警輔導
	echo'<div id="ServiceSon2All" class="All">
		<div class="BlueLine">';
	if(@$_SESSION['login']==1)
		echo'<div id="Service2Text" class="serEdit" name="ser2" style="cursor:pointer;"></div>';
	else
		echo'<div id="Service2Text"></div>';
	echo'</div><div id="ser2Main">';
	$res=query("SELECT * FROM `ser` WHERE `_class`='ser2' LIMIT 1");
	$row=mysql_fetch_array($res);
	echo $row['_content'];
	echo'</div></div>';
//服務項目--上課出席率競賽
	echo'<div id="ServiceSon3All" class="All">
		<div class="BlueLine">';
	if(@$_SESSION['login']==1)
		echo'<div id="Service3Text" class="serEdit" name="ser3" style="cursor:pointer;"></div>';
	else
		echo'<div id="Service3Text"></div>';
	echo'</div><div id="ser3Main">';
	$res=query("SELECT * FROM `ser` WHERE `_class`='ser3' LIMIT 1");
	$row=mysql_fetch_array($res);
	echo $row['_content'];
	echo'</div></div>';
//服務項目--學習診斷測驗
	echo'<div id="ServiceSon4All" class="All">
		<div class="BlueLine">';
	if(@$_SESSION['login']==1)
		echo'<div id="Service4Text" class="serEdit" name="ser4" style="cursor:pointer;"></div>';
	else
		echo'<div id="Service4Text"></div>';
	echo'</div><div id="ser4Main">';
	$res=query("SELECT * FROM `ser` WHERE `_class`='ser4' LIMIT 1");
	$row=mysql_fetch_array($res);
	echo $row['_content'];
	echo'</div></div>';
//學習專區
	echo'<div id="ResourcesAll" class="All">
	<div class="BlueLine">';
	if(@$_SESSION['login']==1)
		echo'<div id="ResourcesText" class="ResEdit" style="cursor:pointer;" name="res"></div>';
	else
		echo'<div id="ResourcesText"></div>';
	echo'</div><div id="resMain">';
	$res1=query("SELECT * FROM `res` WHERE `_to`='0' AND `_class`='res'");
	while($row1=mysql_fetch_array($res1)){
		$name1=$row1['_name'];
		$no1=$row1['no'];
		echo"<span style='color:#33D; font-weight:bold;'>{$name1}</span><br/>";
		echo'<table width="100%"><tr>';
		$res2=query("SELECT * FROM `res` WHERE `_to`='{$no1}'");
		for($i=2;$row2=mysql_fetch_array($res2);$i++){
			$name2=$row2['_name'];
			$url2=$row2['_url'];
			if($i%2==0)
				echo'</tr><tr>';
			echo"<td width='50%' align='center' class='resTd'><a href='{$url2}' title='{$url2}' target='_blank'>{$name2}</td>";
		}
		echo'</tr></table><br/>';
	}
	echo'</div></div>';
//學習專區--有效學習
	echo'<div id="ResourcesSon1All" class="All">
	<div class="BlueLine">';
	if(@$_SESSION['login']==1)
		echo'<div id="Resources1Text" class="ResEdit" style="cursor:pointer;" name="res1"></div>';
	else
		echo'<div id="Resources1Text"></div>';
	echo'</div><div id="res1Main">';
	$res1=query("SELECT * FROM `res` WHERE `_to`='0' AND `_class`='res1'");
	while($row1=mysql_fetch_array($res1)){
		$name1=$row1['_name'];
		$no1=$row1['no'];
		echo"<span style='color:#33D; font-weight:bold;'>{$name1}</span><br/>";
		echo'<table width="100%"><tr>';
		$res2=query("SELECT * FROM `res` WHERE `_to`='{$no1}'");
		for($i=2;$row2=mysql_fetch_array($res2);$i++){
			$name2=$row2['_name'];
			$url2=$row2['_url'];
			if($i%2==0)
				echo'</tr><tr>';
			echo"<td width='50%' align='center' class='resTd'><a href='{$url2}' title='{$url2}' target='_blank'>{$name2}</td>";
		}
		echo'</tr></table><br/>';
	}
	echo'</div></div>';
//學習專區--他校資源
	echo'<div id="ResourcesSon2All" class="All">
		<div class="BlueLine">';
	if(@$_SESSION['login']==1)
		echo'<div id="Resources2Text" class="ResEdit" style="cursor:pointer;" name="res2"></div>';
	else
		echo'<div id="Resources2Text"></div>';
	echo'</div><div id="res2Main">';
	$res1=query("SELECT * FROM `res` WHERE `_to`='0' AND `_class`='res2'");
	while($row1=mysql_fetch_array($res1)){
		$name1=$row1['_name'];
		$no1=$row1['no'];
		echo"<span style='color:#33D; font-weight:bold;'>{$name1}</span><br/>";
		echo'<table width="100%"><tr>';
		$res2=query("SELECT * FROM `res` WHERE `_to`='{$no1}'");
		for($i=2;$row2=mysql_fetch_array($res2);$i++){
			$name2=$row2['_name'];
			$url2=$row2['_url'];
			if($i%2==0)
				echo'</tr><tr>';
			echo"<td width='50%' align='center' class='resTd'><a href='{$url2}' title='{$url2}' target='_blank'>{$name2}</td>";
		}
		echo'</tr></table><br/>';
	}
	echo'</div></div>';
//活動集錦
	echo'<div id="ActivitiesAll" class="All">
		<div class="BlueLine">';
	if(@$_SESSION['login']==1)
		echo'<div id="ActivitiesText" class="ActEdit" style="cursor:pointer;"></div>';
	else
		echo'<div id="ActivitiesText"></div>';
	echo'</div><div id="Act0Main">
		<div id="ActTop"></div><div class="ActTop2"></div><div id="ActCon">';
	$res=query("SELECT * FROM `act` WHERE `_to`=0");
	$numA = mysql_num_rows($res);
	$totleCoA=9;//每頁有幾筆資料
	$totleA = floor(($numA/$totleCoA)+1);
	if($numA%$totleCoA==0)
		$totleA--;
	for($iA=1,$bottomA=0;$iA<=$totleA;$iA++,$bottomA+=$totleCoA){
		echo "<div class='ActMain' name='ActP{$iA}'>";
		$resA = query("SELECT * FROM `act` WHERE `_to`=0 ORDER BY `no` DESC LIMIT {$bottomA} , {$totleCoA};");
		while($row=mysql_fetch_array($resA,MYSQL_BOTH)){
			$no=$row['no'];
			$main=$row['_main'];
			$content=$row['_content'];
			$actDate=$row['_actDate'];
			echo"<table width='85%' align='center' class='ActTable'>
				<tr>
					<td align='left' style='font-size:15px;' name='{$no}' class='ActTi' title='{$content}'>".mb_strimwidth($main,0,43,'...','UTF-8')."</td>
					<td style='font-size:15px; color:#4F4F4F; width:85px;' align='left'>{$actDate}</td>
				</tr>
			</table>";
		}
		echo '</div>';
	}
	echo'</div><div class="ActBot"></div>';
	//上下頁
	echo '
		<div class="ActBottom1">按鍵盤左右鍵也可換頁喔！</div>
		<table border="0" align="center" id="ActBottom" class="PageBottom"><tr><td align="center" width="120px"><div class="ActUD" name="up">上一頁</div></td><td><table><tr>';
	//算位數抓寬
	$a=$totleA;//暫存變數
	$b=0;
	while($a>=1){
		$a/=10; $b++;//算位數
	}
	//頁碼
	for($iA=1,$wA=$b*15;$iA<=$totleA;$iA++){
		echo "<td align='center'><div class='ActTotal' name='{$iA}' style='width:{$wA}px;'>{$iA}</div></td>";
		if($iA!=$totleA && $iA%8!=0) echo '<td align="center">-</td>';
		if($iA%8==0)
			echo '</tr><tr>';
	}
	echo '</tr></table></td><td align="center" width="120px"><div class="ActUD" name="down">下一頁</div></td></tr></table>';
	//底層照片
	$res=query("SELECT `_main`,`_dir`,`_file` FROM `act` WHERE `_to`<>0 ORDER BY `no` DESC LIMIT 4");
	echo'<table width="100%" align="center" style="margin-top:7px;"><tr>';
	while($row=mysql_fetch_array($res)){
		$link="photos/act/{$row['_dir']}/{$row['_file']}";
		echo"<td align='center'><a href='{$link}' target='_blank'><img src='{$link}' style='width:130px; height:130px;' title='{$row['_main']}'/></a></td>";
	}
	echo'</tr></table>';
	echo'</div></div>';
//留言板
	echo'<div id="MessageAll" class="All">
		<div class="BlueLine">
			<div id="MessageText"></div>
		</div>
		<div id="MessageMain">';
	//跑馬燈
		$text=file::readLine('text/MesTop.txt');
		$width=mb_strwidth($text)*27;
		if(@$_SESSION['login']==1)
			echo'<div id="MesTop" style="overflow:hidden; border:1px solid #000; cursor:pointer;" class="MesTxEdit">';
		else
			echo'<div id="MesTop" style="overflow:hidden; border:1px solid #000;">';
		echo'<table id="MesLite" style="width:'.$width.'px;">
			<tr>
				<td id="MesLite1">
					<table>
						<tr>
							<td id="MesTx">'.$text.'</td>
						</tr>
					</table>
				</td>
				<td id="MesLite2"></td>
				<td id="MesLite3"></td>
			</tr>
		</table>
		</div>';
	//留言
		echo'<table width="100%" align="center" id="MesTitle">
				<tr>
					<td width="15%" style="color:#F7F7F7;">時間</td>
					<td width="60%" style="color:#F7F7F7;">主題</td>
					<td width="15%" style="color:#F7F7F7;">發言者</td>
					<td width="10%" style="color:#F7F7F7;">回覆</td>
				</tr>
			</table><div id="MesCon">';
	$res=query("SELECT * FROM `message` WHERE `_reTo`=0;");
	$numM = mysql_num_rows($res);
	$totleDataM=16;//每頁有幾筆資料
	$totleM = floor(($numM/$totleDataM)+1);
	if($numM%$totleDataM==0)
		$totleM--;
	for($iM=1,$bottomM=0;$iM<=$totleM;$iM++,$bottomM+=$totleDataM){
		echo "<div class='MesMain' name='MesP{$iM}'>";
		$resM = query("SELECT * FROM `message` WHERE `_reTo`=0 ORDER BY `_editDate` DESC LIMIT {$bottomM} , {$totleDataM};");
		while($row=mysql_fetch_array($resM,MYSQL_BOTH)){
			$no=$row['no'];
			$main=$row['_main'];
			$name=$row['_name'];
			$file=$row['_file'];
			$editDate=$row['_editDate'];
			$amount=mysql_num_rows(query("SELECT `no` FROM `message` WHERE `_reTo`={$no}"));
			echo"<table width='100%' align='center' class='MesContect'>
				<tr>
					<td width='17%' align='center' style='color:#5F5F5F; border-left:#4F4F4F double 3px; font-size:15px;'>".substr($editDate,0,10)."</td>
					<td align='left' name='{$no}' class='MeMain'>".mb_strimwidth($main,0,33,'...','UTF-8')."</td>
					<td width='4%' align='left'>";
					if($file)
						echo'<img src="img/NewsFile.png"/>';
					else
						echo'&nbsp';
					echo"</td>
					<td width='15%' align='center'><div style='width:70px;'>{$name}</div></td>
					<td width='10%' align='center' style='color:#4F4F4F; border-right:#4F4F4F double 3px;'>{$amount}</td>
				</tr>
			</table>";
		}
		echo '</div>';
	}
	echo'</div>';
	//上下頁
	echo '
		<div class="MesBottom1">按鍵盤左右鍵也可換頁喔！</div>
		<table border="0" align="center" id="MesBottom" class="PageBottom"><tr><td align="center" width="120px"><div class="MesUD" name="up">上一頁</div></td><td><table><tr>';
	//算位數抓寬
	$a=$totle;//暫存變數
	$b=0;
	while($a>=1){
		$a/=10; $b++;//算位數
	}
	//頁碼
	for($iM=1,$wM=$b*15;$iM<=$totleM;$iM++){
		echo "<td align='center'><div class='MesTotal' name='{$iM}' style='width:{$wM}px;'>{$iM}</div></td>";
		if($iM!=$totleM && $iM%8!=0) echo '<td align="center">-</td>';
		if($iM%8==0)//換行
			echo '</tr><tr>';
	}
	echo '</tr></table></td><td align="center" width="120px"><div class="MesUD" name="down">下一頁</div></td></tr></table>';
	echo'
			<center>
				<input type="button" value="　我要留言　" style="padding:5px; font-weight:bold; margin-top:10px;" class="MesAdd"/>
			</center>
		</div>
	</div>';
//表單下載
	echo'<div id="DownloadsAll" class="All">
		<div class="BlueLine">';
	if(@$_SESSION['login']==1)
		echo'<div id="DownloadsText" class="dowAdd" style="cursor:pointer;">';
	else
		echo'<div id="DownloadsText">';
	echo'</div></div><div id="dowMain">
		<div id="DowTop"></div>';
	//頂端DIV
	echo'<div id="DowTopDiv" style="border:1px solid #000; width:470px; margin-left:27px; margin-top:3px; padding:5px;">滑鼠移上項目後出現說明</div>';
	echo'<div class="DowTop2"></div>';
	$res0=query("SELECT * FROM `dow` WHERE `_to`='0'");
	while($row0=mysql_fetch_array($res0)){
		$no0=$row0['no'];
		$main=$row0['_main'];
		echo'<table width="90%" align="center" style="border-bottom:1px solid #BDBDBD;">
			<tr>
				<td style="font-weight:bold; color:#33D;">'.$main.'</td>
			</tr>
		</table>';
		$res=query("SELECT * FROM `dow` WHERE `_to`='{$no0}' ORDER BY `no`");
		for($i=1;$row=mysql_fetch_array($res);$i++){
			$no=$row['no'];
			$main=$row['_main'];
			$how=$row['_how'];//說明
			$file=$row['_file'];
			$dir=$row['_dir'];
			$editDate=substr($row['_editDate'],0,10);
			echo'<table width="90%" align="center" style="border-bottom:1px solid #BDBDBD;">
			<tr>';
				if(@$_SESSION['login']==1)//修改、刪除
					echo'<td style="width:48px; cursor:pointer; color:#00E;" class="dowEdit" align="center" name="'.$no.'">'.$i.'</td>';
				else
					echo'<td style="width:48px;" align="center">'.$i.'</td>';
				echo'<td class="dowTi" title="'.$file.'" name="'.$how.'" id="'.$dir.'"><div style="width:330px; word-wrap:break-word;">'.$main.'</div></td>
				<td style="width:18%;">'.$editDate.'</td>
			</tr>
			</table>';
		}
	}
	echo'<div class="ActBot"></div></div></div>';
//相關辦法
	echo'<div id="MethodsAll" class="All">
		<div class="BlueLine">';
	if(@$_SESSION['login']==1)
		echo'<div id="MethodsText" class="MetEdit" style="cursor:pointer;">';
	else
		echo'<div id="MethodsText">';
	echo'</div></div><div id="metMain">
	<div style="border:#4F4F4F 1px solid; box-shadow:#AAA 5px 5px 5px;">
		<div style="background:#616161; color:#F8F8FF; padding:7px;">相關辦法&nbsp-&nbsp總覽列表</div>
		<table width="100%" style="background:#D9D9D9; color:#4A4A4A; font-weight:bold; font-size:13px; padding:3px 7px 3px 7px;">
			<tr>
				<td>活動辦法</td>
				<td align="right">最後修訂日期</td>
			</tr>
		</table>';
	$res=query("SELECT * FROM `met` ORDER BY `_editDate` DESC");
	if(mysql_num_rows($res)>0){
		while($row=mysql_fetch_array($res)){
			$no=$row['no'];
			$main=mb_strimwidth($row['_main'],0,60,'...','UTF-8');
			$editDate=substr($row['_editDate'],0,10);
			echo"<table width='100%' class='metCon'>
				<tr>
					<td><a name='{$no}' class='metLook'>{$main}</a></td>
					<td align='right'>{$editDate}</td>
				</tr>
			</table>";
		}
	}else{//無資料
		echo'<table width="100%" class="metCon">
			<tr>
				<td align="center">暫無資料！</td>
			</tr>
		</table>';
	}
	echo'</div></div></div>';
?>