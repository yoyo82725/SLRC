<?php
//左上電視牆
echo '<div id="TV">';
$res=query("SELECT `_main`,`_dir`,`_file` FROM `act` WHERE `_to`<>0 ORDER BY `no` DESC LIMIT 10");
if(mysql_num_rows($res)>0){//有照片
	while($row=mysql_fetch_array($res))
		echo "<img src='photos/act/{$row['_dir']}/{$row['_file']}' style='width:150px; height:160px;' title='{$row['_main']}'/>";
}else
	echo '<img src="img/TVdefault.png" style="width:150px; height:160px;" />';
echo '</div>';
?>