<?php
session_start();
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
require('function.php');
@$b = $_GET['b'];
if(@$_SESSION['login']==1){//登入認證
	@$aa = $_GET['aa'];
	if($aa == 1){//活動集錦處理
		$t=$_GET['t'];//1新增照2刪照3改文4刪文5新增文
		if($t==1){//新增照
			$file=$_FILES['userfile']['tmp_name'];
			if(is_uploaded_file($file)){
				@$main=$_POST['_main'];
				@$no=$_POST['no'];
				$dir=substr(md5(date("m.d.y H:i:s")),1,15);//亂名
				$fileName=$_FILES['userfile']['name'];
				mkdir("photos/act/{$dir}");//新建目錄
				if(move_uploaded_file($file,iconv('utf-8','big5',"photos/act/{$dir}/{$fileName}")))
					query("INSERT INTO `act`(`_main`,`_dir`,`_file`,`_to`) VALUES('{$main}','{$dir}','{$fileName}','{$no}')");
				js::usejs("opener.location.href='index.php?act'; location.href='window.php?b=6&no={$no}';");
			}else
				js::usejs('history.go(-1);');
		}
		else if($t==2){//刪照
			@$no=$_POST['no'];
			$res=query("SELECT * FROM `act` WHERE `no`='{$no}' LIMIT 1");
			if($row=mysql_fetch_array($res)){
				$dir=$row['_dir'];
				$file=$row['_file'];
				if(unlink(iconv('utf-8','big5',"photos/act/{$dir}/{$file}")) && RmDir("photos/act/{$dir}"))
					query("DELETE FROM `act` WHERE `no`='{$no}' LIMIT 1");
			}
			js::usejs('opener.location.href="index.php?act"; history.go(-1);');
		}
		else if($t==3){//改文
			@$date=$_POST['date'];
			@$no=$_POST['no'];
			if(preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/",$date)){
				@$main=$_POST['_main'];
				@$content=$_POST['content'];
				if($main && $content){
					if(query("UPDATE `act` SET `_main`='{$main}',`_content`='{$content}',`_actDate`='{$date}' WHERE `no`='{$no}' LIMIT 1;"))
						js::usejs("alert('修改成功！'); opener.location.href='index.php?act'; location.href='window.php?b=6&no={$no}';");
					else
						js::usejs('alert("修改失敗！請聯絡網站設計人員！"); history.go(-1);');
				}else
					js::usejs('alert("不可有空欄位！"); history.go(-1);');
			}else
				js::usejs('alert("日期格式不符合！"); location');
		}
		else if($t==4){//刪文+內照片
			@$no=$_POST['no'];
			$res=query("SELECT * FROM `act` WHERE `_to`='{$no}'");
			while($row=mysql_fetch_array($res)){//刪照
				$dir=$row['_dir'];
				$file=$row['_file'];
				unlink(iconv('utf-8','big5',"photos/act/{$dir}/{$file}"));
				RmDir("photos/act/{$dir}");
				query("DELETE FROM `act` WHERE `no`='{$row['no']}' LIMIT 1");
			}
			if(query("DELETE FROM `act` WHERE `no`='{$no}' LIMIT 1"))
				js::usejs("alert('刪除成功！'); opener.location.href='index.php?act'; window.close();");
			else
				js::usejs('alert("刪除失敗！請聯絡網站設計人員！aa1t4_2"); history.go(-1);');
		}
		else if($t==5){//新增文
			@$date=$_POST['date'];
			if(preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/",$date)){
				@$main=$_POST['_main'];
				@$content=$_POST['content'];
				if($main && $content){
					if(query("INSERT INTO `act`(`_main`,`_content`,`_actDATE`) VALUES('{$main}','{$content}','{$date}')"))
						js::usejs("alert('新增成功！'); opener.location.href='index.php?act'; window.close();");
					else
						js::usejs('alert("新增失敗！請聯絡網站設計人員！"); history.go(-1);');
				}else
					js::usejs('alert("不可有空欄位！"); history.go(-1)');
			}else
				js::usejs('alert("日期格式不符合！"); history.go(-1)');
		}
	}
	else if($aa == 2){//改留言板跑馬燈文字
		$tx=$_GET['tx'];//要改的文字
		if(mb_strwidth($tx)<30){//寬度太少
			js::usejs('alert("請至少有10個中文字的寬度！"); location.href="index.php?mes";');
		}else{
			file::write('text/MesTop.txt',$tx);
			js::usejs('location.href="index.php?mes";');
		}
	}
	else if($aa == 3){//服務項目01234編輯+新增+ser1_3成果
		@$n=$_GET['n'];//ser1_3成果 1新增大項2修改大項3新增小項4修改小項5刪除小項6刪除大項7刪成果檔案
		if($n){//ser1_3成果發表
			if($n==1){//新增學年(大項)
				@$main=$_POST['_main'];
				query("INSERT INTO `ser`(`_main`,`_class`) VALUES('{$main}','ser1_3')");
				js::usejs('opener.location.href="index.php?ser1_3"; history.go(-1);');
			}
			else if($n==2){//修改大項
				@$main=$_POST['_main'];
				@$no=$_POST['no'];
				query("UPDATE `ser` SET `_main`='{$main}' WHERE `no`='{$no}'");
				js::usejs('opener.location.href="index.php?ser1_3"; history.go(-1);');
			}
			else if($n==3){//新增小項
				@$no=$_POST['no'];
				@$main=$_POST['_main'];//組名
				@$leader=$_POST['leader'];
				@$teacher=$_POST['teacher'];
				@$content=$_POST['content'];//組員
				@$file=$_FILES['userfile']['tmp_name'];
				if(is_uploaded_file($file)){//有檔案
					$dir=substr(md5(date("m.d.y H:i:s")),1,15);//亂名
					$fileName=$_FILES['userfile']['name'];
					mkdir("files/ser1_3/{$dir}");//新建目錄
					move_uploaded_file($file,iconv('utf-8','big5',"files/ser1_3/{$dir}/{$fileName}"));
				}else{
					@$dir=NULL; @$fileName=NULL;
				}
				if(query("INSERT INTO `ser`(`_main`,`_content`,`_leader`,`_teacher`,`_dir`,`_file`,`_class`) VALUES('{$main}','{$content}','{$leader}','{$teacher}','{$dir}','{$fileName}','{$no}')"))
					js::usejs('alert("新增成功！"); opener.location.href="index.php?ser1_3"; location.href="window.php?aa=17&no='.$no.'";');
				else
					js::usejs('alert("新增失敗！請聯絡網站設計人員！"); history.go(-1);');
			}
			else if($n==4){//修改小項
				@$no=$_POST['no'];
				@$main=$_POST['_main'];//組名
				@$leader=$_POST['leader'];
				@$teacher=$_POST['teacher'];
				@$content=$_POST['content'];//組員
				@$file=$_FILES['userfile']['tmp_name'];
				if(is_uploaded_file($file)){//有上傳檔案
					//先刪舊的檔案
					$res=query("SELECT * FROM `ser` WHERE `no`='{$no}' LIMIT 1");
					if($row=mysql_fetch_array($res)){
						$dir=$row['_dir'];
						$fileName=$row['_file'];
						if($dir){
							unlink(iconv('utf-8','big5',"files/ser1_3/{$dir}/{$fileName}"));//刪檔
							RmDir("files/ser1_3/{$dir}");//刪目錄
						}
					}else
						exit;
					//上傳新檔
					$dir=substr(md5(date("m.d.y H:i:s")),1,15);//亂名
					$fileName=$_FILES['userfile']['name'];
					mkdir("files/ser1_3/{$dir}");//新建目錄
					move_uploaded_file($file,iconv('utf-8','big5',"files/ser1_3/{$dir}/{$fileName}"));
					//改資料庫
					if(query("UPDATE `ser` SET `_main`='{$main}',`_content`='{$content}',`_leader`='{$leader}',`_teacher`='{$teacher}',`_dir`='{$dir}',`_file`='{$fileName}' WHERE `no`='{$no}' LIMIT 1"))
						js::usejs('alert("修改成功！"); opener.location.href="index.php?ser1_3"; window.close();');
					else
						js::usejs('alert("修改失敗！請聯絡網站設計人員！aa3n4_1"); history.go(-1);');
				}else{//沒上傳檔案 只改資料庫
					if(query("UPDATE `ser` SET `_main`='{$main}',`_content`='{$content}',`_leader`='{$leader}',`_teacher`='{$teacher}' WHERE `no`='{$no}' LIMIT 1"))
						js::usejs('alert("修改成功！"); opener.location.href="index.php?ser1_3"; window.close();');
					else
						js::usejs('alert("修改失敗！請聯絡網站設計人員！aa3n4_2"); history.go(-1);');
				}
			}
			else if($n==5){//刪除小項
				@$no=$_POST['no'];
				$res=query("SELECT * FROM `ser` WHERE `no`='{$no}' LIMIT 1");
				if($row=mysql_fetch_array($res)){
					$dir=$row['_dir'];
					if($dir){//有檔案
						$fileName=$row['_file'];
						unlink(iconv('utf-8','big5',"files/ser1_3/{$dir}/{$fileName}"));
						RmDir("files/ser1_3/{$dir}");
					}
					//刪資料庫
					if(query("DELETE FROM `ser` WHERE `no`='{$no}' LIMIT 1"))
						js::usejs('alert("刪除成功！"); opener.location.href="index.php?ser1_3"; window.close();');
					else
						js::usejs('alert("刪除失敗！請聯絡網站設計人員！"); history.go(-1);');
				}else//無資料
					exit;
			}
			else if($n==6){//刪除大項
				@$no=$_POST['no'];
				//刪小項
				$res=query("SELECT * FROM `ser` WHERE `_class`='{$no}'");
				while($row=mysql_fetch_array($res)){//刪小項+檔案
					$no2=$row['no'];
					$dir=$row['_dir'];
					$fileName=$row['_file'];
					unlink(iconv('utf-8','big5',"files/ser1_3/{$dir}/{$fileName}"));
					RmDir("files/ser1_3/{$dir}");
					query("DELETE FROM `ser` WHERE `no`='{$no2}' LIMIT 1");
				}
				//刪大項
				query("DELETE FROM `ser` WHERE `no`='{$no}' LIMIT 1");
				js::usejs('opener.location.href="index.php?ser1_3"; history.go(-1);');
			}
			else if($n==7){//刪成果檔案
				if($no=$_GET['no']){
					$res=query("SELECT * FROM `ser` WHERE `no`='{$no}' LIMIT 1");
					if($row=mysql_fetch_array($res)){
						//刪檔案
						$dir=$row['_dir'];
						$fileName=$row['_file'];
						unlink(iconv('utf-8','big5',"files/ser1_3/{$dir}/{$fileName}"));
						RmDir("files/ser1_3/{$dir}");
						//改資料庫
						if(query("UPDATE `ser` SET `_dir`='',`_file`='' WHERE `no`='{$no}' LIMIT 1"))
							js::usejs('alert("修改成功！"); opener.location.href="index.php?ser1_3"; window.close();');
						else
							js::usejs('alert("修改失敗！請聯絡網站設計人員！aa3n4_2"); history.go(-1);');
					}
				}
			}
		}
		else{//服務項目01234編輯+新增
			@$t=$_GET['t'];//ser1 ser2 ser3
			@$no=$_POST['no'];
			if($no){//是修改
				@$content=$_POST['content'];
				if(query("UPDATE `ser` SET `_content`='{$content}' WHERE `no`='{$no}' LIMIT 1"))
					js::usejs("alert('修改成功！'); opener.location.href='index.php?{$t}'; window.close();");
				else
					js::usejs('alert("修改失敗！請聯絡網站設計人員！"); history.go(-1);');
			}
			else{//新增
				@$main=$_POST['_main'];
				@$content=$_POST['content'];
				if($main && $content){
					if(query("INSERT INTO `ser`(`_main`,`_content`,`_class`) VALUES('{$main}','{$content}','ser')"))
						js::usejs("alert('新增成功！'); opener.location.href='index.php?{$t}'; window.close();");
					else
						js::usejs('alert("新增失敗！請聯絡網站設計人員！"); history.go(-1);');
				}else
					js::usejs('alert("不可有空欄位！"); history.go(-1);');
			}
		}
	}
	else if($aa == 4){//預覽文章返回(刪除檔案)
		@$path = $_POST['path'];
		@$dir = $_POST['dir'];//files/dir
		@unlink(iconv('utf-8','big5',"{$path}"));
		@RmDir("{$dir}");
		js::location('window.php?aa=1');
	}
	else if($aa == 5){//文章確認送出
		@$dir=$_POST['dir'];
		@$fileName=$_POST['fileName'];
		@$main=$_POST['main'];
		@$things=$_POST['things'];
		@$date=$_POST['date'];
		@$size=$_POST['size'];
		@$cls=$_POST['cls'];
		$ip=getip();
		if(query("INSERT INTO `news`(`_class`,`_main`,`_things`,`_file`,`_dir`,`_size`,`_addDate`,`_ip`) VALUES('{$cls}','{$main}','{$things}','{$fileName}','{$dir}','{$size}','{$date}','{$ip}')"))
			js::usejs("opener.location.href='index.php?news'; alert('公告已發佈！'); window.close();");
		else
			js::usejs("alert('公告發佈失敗！請聯絡網站設計人員！'); window.close();");
	}
	else if($aa == 6){//刪除news
			@$no=$_POST['no'];
			@$file=$_POST['file'];
			@$dir=$_POST['dir'];
			@$delete="delete from news where no='{$no}'";
			if($dir){//刪除目錄+檔案
				unlink(iconv('utf-8','big5',"files/{$dir}/{$file}"));
				RmDir("files/{$dir}");
			}
			if(query($delete))
				js::usejs("opener.location.href='index.php?news'; alert('公告刪除成功！'); window.close();");
			else
				js::usejs("alert('公告刪除失敗！請聯絡網站設計人員！'); window.close();");
	}
	else if($aa == 7){//修改news
		@$t=$_GET['t'];
		@$no=$_GET['no'];
		if($t=='file'){//刪除檔案
			$select=query("SELECT * FROM `news` WHERE `no` = '{$no}' LIMIT 1");
			list($no,$cls,$main,$things,$file,$dir,$size,$addDate,$editDate,$ip) = mysql_fetch_array($select,MYSQL_BOTH);
			unlink(iconv('utf-8','big5',"files/{$dir}/{$file}"));
			RmDir("files/{$dir}");
			query("UPDATE `news` SET `_file`='',`_dir`='',`_size`='' WHERE `no`='{$no}' LIMIT 1");
			js::usejs("alert('刪除成功！'); location.href='window.php?aa=6&no={$no}';");
		}else{//正常修改
			@$dir=$_POST['dir'];
			@$fileName=$_POST['fileName'];
			@$main=$_POST['main'];
			@$things=$_POST['things'];
			@$size=$_POST['size'];
			@$cls=$_POST['cls'];
			$ip=getip();
			if(query("UPDATE `news` SET `_class`='{$cls}',`_main`='{$main}',`_things`='{$things}',`_file`='{$fileName}',`_dir`='{$dir}',`_size`='{$size}',`_ip`='{$ip}' WHERE `no`='{$no}'"))
				js::usejs("opener.location.href='index.php?news'; alert(\"公告修改成功！\"); window.close();");
			else
				js::usejs("alert('公告修改失敗！請聯絡網站設計人員！'); window.close();");
		}
	}
	else if($aa == 8){//修改中心介紹
		@$main=$_POST['main'];
		@$contect=$_POST['contect'];
		@$mainColor=$_POST['mainColor'];
		@$no=$_POST['no'];
		if(query("UPDATE `intro` SET `_main`='{$main}',`_contect`='{$contect}',`_color1`='{$mainColor}' WHERE `no`='{$no}'"))
			js::usejs("opener.location.href='index.php?intro'; alert('修改成功！'); window.close();");
		else
			js::usejs("alert('修改失敗！請聯絡網站設計人員！'); window.close();");
	}
	else if($aa == 9){//修改中心介紹相片
		@$file=$_FILES['userfile']['tmp_name'];
		if(is_uploaded_file($file)){
			//刪除原來的
			@$no=$_POST['no'];
			@$dir=$_POST['dir'];
			@$fileName=$_POST['file'];
			@$typ=$_POST['typ'];
			if($dir){
				unlink(iconv('utf-8','big5',"photos/{$typ}/{$dir}/{$fileName}"));
				RmDir("photos/{$typ}/{$dir}");
			}
			query("DELETE FROM `tvboard` WHERE `no`='{$no}'");
			//建立新的
			@$class=$_POST['class'];
			@$order=$_POST['order'];
			@$how=$_POST['how'];
			$ip=getip();
			$dir=substr(md5(date("m.d.y H:i:s")),1,15);//亂名
			$date=date("Y-m-d");
			$fileName=$_FILES['userfile']['name'];
			$size=$_FILES['userfile']['size'];
			mkdir("photos/{$typ}/".$dir);//建目錄
			if(move_uploaded_file($file,iconv('utf-8','big5',"photos/{$typ}/{$dir}/{$fileName}"))){//建檔
				query("INSERT INTO `tvboard`(`_dir`,`_file`,`_size`,`_addDate`,`_class`,`_order`,`_how`,`_ip`) VALUES('{$dir}','{$fileName}','{$size}','{$date}','{$class}','{$order}','{$how}','{$ip}')");//寫入資料庫
				js::usejs("alert('修改成功！'); opener.location.href='index.php?intro'; location.href='window.php?aa=7'");
			}else
				js::usejs("alert('修改失敗！請聯絡網站設計人員！'); location.href='window.php?aa=7'");
		}else
			js::usejs("alert('請選擇相片！'); history.go(-1);");
	}
	else if($aa == 10){//修改成立宗旨
		@$contect=$_POST['colContext'];
		if(!$contect){
			js::usejs('alert("內容不可為空！"); history.go(-1);');
		}else{
			if(query("UPDATE `intro` SET `_contect`='{$contect}' WHERE `no`='2';"))
				js::usejs('alert("修改成功！"); opener.location.href="index.php?intro1"; window.close();');
			else
				js::usejs('alert("修改失敗！請聯絡網站設計人員！"); history.go(-1);');
		}
	}
	else if($aa == 11){//處理QA
		@$no=$_POST['no'];
		@$t=$_GET['t'];//1刪除2修改3新增
		if($t==1){//刪除
			if(query("DELETE FROM `intro` WHERE `no`='{$no}'"))
				js::usejs('alert("刪除成功！");');
			else
				js::usejs('alert("刪除失敗！請聯絡網站設計人員！"); history.go(-1);');
		}
		else if($t==2){//修改
			@$main=$_POST['main'];
			@$contect=$_POST['contect'];
			if($main && $contect){//都有內容
				if(query("UPDATE `intro` SET `_main`='{$main}',`_contect`='{$contect}' WHERE `no`='{$no}';"))
					js::usejs('alert("修改成功！");');
				else
					js::usejs('alert("修改失敗！請聯絡網站設計人員！"); history.go(-1);');
			}else{
				js::usejs('alert("不可有空欄位！"); history.go(-1);');
			}
		}
		else if($t==3){//新增
			@$main=$_POST['main'];
			@$contect=$_POST['contect'];
			if($main && $contect){//都有內容
				if(query("INSERT INTO `intro`(`_main`,`_contect`,`_class`) VALUES('{$main}','{$contect}','QA')"))
					js::usejs('alert("新増成功！");');
				else
					js::usejs('alert("新增失敗！請聯絡網站設計人員！"); history.go(-1);');
			}else{
				js::usejs('alert("不可有空欄位！"); history.go(-1);');
			}
		}
		js::usejs('opener.location.href="index.php?intro3"; history.go(-1); ');
	}
	else if($aa == 12){//處理相關辦法
		$t=$_GET['t'];//1新增2修改3刪除4修改刪檔
		if($t==1){//新增
			@$main=$_POST['_main'];
			@$how=$_POST['how'];
			if($main && $how){//都有值
				$file=$_FILES['userfile']['tmp_name'];
				if(is_uploaded_file($file)){
					$fileName=$_FILES['userfile']['name'];
					$dir=substr(md5(date("m.d.y H:i:s")),1,15);//亂名
					mkdir("files/methods/{$dir}");
					move_uploaded_file($file,iconv('utf-8','big5',"files/methods/{$dir}/{$fileName}"));
				}
				if(query("INSERT INTO `met`(`_main`,`_how`,`_dir`,`_file`) VALUES('{$main}','{$how}','{$dir}','{$fileName}');"))
					js::usejs('alert("新增成功！"); opener.location.href="index.php?met"; window.close();');
				else
					js::usejs('alert("新增失敗！請聯絡網站設計人員！"); history.go(-1);');
			}else
				js::usejs('alert("不可有空欄位！"); history.go(-1);');
		}
		else if($t==2){//修改
			@$no=$_POST['no'];
			@$how=$_POST['how'];
			@$main=$_POST['_main'];
			if($how && $main){//都有內容
				$file=$_FILES['userfile']['tmp_name'];
				if(is_uploaded_file($file)){//有上傳檔案
					$dir=substr(md5(date("m.d.y H:i:s")),1,15);//亂名
					$fileName=$_FILES['userfile']['name'];
					mkdir("files/methods/{$dir}");
					if(move_uploaded_file($file,iconv('utf-8','big5',"files/methods/{$dir}/{$fileName}"))){
						if(query("UPDATE `met` SET `_how`='{$how}',`_main`='{$main}',`_dir`='{$dir}',`_file`='{$fileName}' WHERE `no`='{$no}' LIMIT 1")){
							js::usejs("alert('修改成功！'); opener.location.href='index.php?met'; location.href='window.php?b=5&no={$no}'");
						}else
							js::usejs("alert('修改失敗！請聯絡網站設計人員！_F1_DB0'); history.go(-1);");
					}else{//檔案上傳失敗
						js::usejs("alert('檔案上傳失敗！'); history.go(-1);");
					}
				}else{
					if(query("UPDATE `met` SET `_how`='{$how}',`_main`='{$main}' WHERE `no`='{$no}' LIMIT 1")){
						js::usejs("alert('修改成功！'); opener.location.href='index.php?met'; location.href='window.php?b=5&no={$no}'");
					}else
						js::usejs("alert('修改失敗！請聯絡網站設計人員！'); history.go(-1);");
				}
			}else
				js::usejs("alert('不可有空欄位！'); history.go(-1);");
		}
		else if($t==3){//刪除
			@$no=$_POST['no'];
			if(query("DELETE FROM `met` WHERE `no`='{$no}' LIMIT 1")){
				js::usejs("alert('刪除成功！'); opener.location.href='index.php?met'; window.close();");
			}else
				js::usejs("alert('刪除失敗！請聯絡網站設計人員！'); history.go(-1);");
		}
		else if($t==4){//修改刪檔
			$no=$_GET['no'];
			$res=query("SELECT `_dir`,`_file` FROM `met` WHERE `no`='{$no}' LIMIT 1");
			$row=mysql_fetch_array($res);
			$dir=$row['_dir'];
			$file=$row['_file'];
			unlink(iconv('utf-8','big5',"files/methods/{$dir}/{$file}"));
			RmDir("files/methods/{$dir}");
			query("UPDATE `met` SET `_dir`=NULL,`_file`=NULL WHERE `no`='{$no}'");
			js::usejs("location.href='window.php?aa=11&no={$no}'");
		}
	}
	else if($aa == 13){//處理表單下載
		$t=$_GET['t'];//1新增小項2修改3刪除4新增大項5修改大項6刪除大項
		if($t==1){//新增小項
			@$main=$_POST['_main'];
			@$how=$_POST['how'];
			@$no=$_POST['no'];
			if($main && $how && $no){//皆有填
				$file=$_FILES['userfile']['tmp_name'];
				if(is_uploaded_file($file)){
					$dir=substr(md5(date("m.d.y H:i:s")),1,15);//亂名
					$fileName=$_FILES['userfile']['name'];
					mkdir("files/downloads/{$dir}");//新建目錄
					if(move_uploaded_file($file,iconv('utf-8','big5',"files/downloads/{$dir}/{$fileName}"))){//存檔
						if(query("INSERT INTO `dow`(`_main`,`_how`,`_dir`,`_file`,`_to`) VALUES('{$main}','{$how}','{$dir}','{$fileName}','{$no}')"))//進資料庫
							js::usejs('alert("新增成功！"); opener.location.href="index.php?dow"; window.close();');
						else
							js::usejs('alert("新增失敗！檔案成功上傳，但資料庫寫入失敗，所以您將會看不到這筆資料；請聯絡網站設計人員。"); history.go(-1);');
					}else
						js::usejs('alert("檔案上傳失敗！可能是檔案太大，若縮小檔案還是無法解決請聯絡網站設計人員！"); history.go(-1);');
				}else
					js::usejs('alert("請上傳檔案"); history.go(-1);');
			}else
				js::usejs('alert("不可有空欄位！"); history.go(-1);');
		}
		else if($t==2){//修改
			@$main=$_POST['_main'];
			@$how=$_POST['how'];
			if($main && $how){//皆有填
				@$no=$_POST['no'];
				$file=$_FILES['userfile']['tmp_name'];
				if(is_uploaded_file($file)){//有上傳檔案
					//先刪舊的檔案
					$res=query("SELECT * FROM `dow` WHERE `no`='{$no}' LIMIT 1");
					if($row=mysql_fetch_array($res)){
						$dir=$row['_dir'];
						$fileName=$row['_file'];
						unlink(iconv('utf-8','big5',"files/downloads/{$dir}/{$fileName}"));//刪檔
						RmDir("files/downloads/{$dir}");//刪目錄
					}else
						exit;
					//上傳新檔
					$dir=substr(md5(date("m.d.y H:i:s")),1,15);//亂名
					$fileName=$_FILES['userfile']['name'];
					mkdir("files/downloads/{$dir}");//新建目錄
					move_uploaded_file($file,iconv('utf-8','big5',"files/downloads/{$dir}/{$fileName}"));
					//改資料庫
					if(query("UPDATE `dow` SET `_main`='{$main}',`_how`='{$how}',`_dir`='{$dir}',`_file`='{$fileName}' WHERE `no`='{$no}' LIMIT 1"))
						js::usejs('alert("修改成功！"); opener.location.href="index.php?dow"; window.close();');
					else
						js::usejs('alert("修改失敗！請聯絡網站設計人員！aa13t2_1"); history.go(-1);');
				}else{
					//純改資料庫
					if(query("UPDATE `dow` SET `_main`='{$main}',`_how`='{$how}' WHERE `no`='{$no}' LIMIT 1"))
						js::usejs('alert("修改成功！"); opener.location.href="index.php?dow"; window.close();');
					else
						js::usejs('alert("修改失敗！請聯絡網站設計人員！aa13t2_2"); history.go(-1);');
				}
			}else
				js::usejs('alert("不可有空欄位！"); history.go(-1);');
		}
		else if($t==3){//刪除
			@$no=$_POST['no'];
			$res=query("SELECT * FROM `dow` WHERE `no`='{$no}' LIMIT 1");
			if($row=mysql_fetch_array($res)){
				$dir=$row['_dir'];
				$fileName=$row['_file'];
				if(unlink(iconv('utf-8','big5',"files/downloads/{$dir}/{$fileName}")) && RmDir("files/downloads/{$dir}")){//刪檔+目錄
					//刪資料庫
					if(query("DELETE FROM `dow` WHERE `no`='{$no}' LIMIT 1"))
						js::usejs('alert("刪除成功！"); opener.location.href="index.php?dow"; window.close();');
					else
						js::usejs('alert("刪除失敗！請聯絡網站設計人員！aa13t3_2"); history.go(-1);');
				}else
					js::usejs('alert("刪除失敗！請聯絡網站設計人員！aa13t3_1"); history.go(-1);');
			}else//無資料
				exit;
		}
		else if($t==4){//新增大項
			if($name=$_POST['name']){
				query("INSERT INTO `dow`(`_main`,`_to`) VALUES('{$name}','0')");
				js::usejs('opener.location.href="index.php?dow"; history.go(-1);');
			}else
				js::usejs('history.go(-1);');
		}
		else if($t==5){//修改大項
			@$no=$_POST['no'];
			@$main=$_POST['_main'];
			query("UPDATE `dow` SET `_main`='{$main}' WHERE `no`='{$no}'");
			js::usejs('opener.location.href="index.php?dow"; history.go(-1);');
		}
		else if($t==6){//刪除大項
			@$no=$_POST['no'];
			//刪小項
			$res=query("SELECT * FROM `dow` WHERE `_to`='{$no}'");
			while($row=mysql_fetch_array($res)){//刪小項+檔案
				$no2=$row['no'];
				$dir=$row['_dir'];
				$fileName=$row['_file'];
				unlink(iconv('utf-8','big5',"files/downloads/{$dir}/{$fileName}"));
				RmDir("files/downloads/{$dir}");
				query("DELETE FROM `dow` WHERE `no`='{$no2}' LIMIT 1");
			}
			//刪大項
			query("DELETE FROM `dow` WHERE `no`='{$no}' LIMIT 1");
			js::usejs('opener.location.href="index.php?dow"; history.go(-1);');
		}
	}
	else if($aa == 14){//刪除留言
		@$no=$_GET['no'];
		//刪檔
		$res=query("SELECT * FROM `message` WHERE `_reTo`='{$no}' AND `_file` IS NOT NULL");
		if(mysql_num_rows($res)>0){
			while($row=mysql_fetch_array($res)){
				$dir=$row['_dir'];
				$file=$row['_file'];
				if($dir){//刪除目錄+檔案
					unlink(iconv('utf-8','big5',"files/message/{$dir}/{$file}"));
					RmDir("files/message/{$dir}");
				}
			}
		}
		$res=query("SELECT * FROM `message` WHERE `no`='{$no}' LIMIT 1");
		$row=mysql_fetch_array($res);
		$file=$row['_file'];
		if($file){//有檔案
			$dir=$row['_dir'];
			if($dir){//刪除目錄+檔案
				unlink(iconv('utf-8','big5',"files/message/{$dir}/{$file}"));
				RmDir("files/message/{$dir}");
			}
		}
		//刪資料庫
		$reTo=$row['_reTo'];
		if($reTo==0){//若是刪主題
			if(query("DELETE FROM `message` WHERE `_reTo`='{$no}'")){
				if(query("DELETE FROM `message` WHERE `no`='{$no}'")){
					js::usejs('alert("刪除成功！"); opener.location.href="index.php?mes"; window.close();');
				}else{
					js::usejs('alert("刪除失敗！請聯絡網站管理員！(err:aa14&mes2)"); window.close();');
				}
			}else{
				js::usejs('alert("刪除失敗！請聯絡網站管理員！(err:aa14&mes1)"); window.close();');
			}
		}else{//若是刪回應
			if(query("DELETE FROM `message` WHERE `no`='{$no}'")){
				js::usejs('alert("刪除成功！"); opener.location.href="index.php?mes"; history.go(-1);');
			}else{
				js::usejs('alert("刪除失敗！請聯絡網站管理員！(err:aa14&mes3)"); history.go(-1);');
			}
		}
	}
	else if($aa == 15){//修改成員介紹
		$t=$_GET['t'];//1內容2照片3新增4刪除
		@$no=$_GET['no'];
		if($t==1){//內容
			@$main=$_POST['name'];//名稱
			@$position=$_POST['position'];//職稱
			@$contect=$_POST['contect'];//內容
			@$email=$_POST['email'];//email
			@$phone=$_POST['phone'];//電話
			@$ext=$_POST['ext'];//分機
			if(query("UPDATE `intro` SET `_main`='{$main}',`_position`='{$position}',`_contect`='{$contect}',`_email`='{$email}',`_phone`='{$phone}',`_ext`='{$ext}' WHERE `no`='{$no}'")){
				js::usejs('alert("修改成功！"); opener.location.href="index.php?intro2"; window.close();');
			}else{
				js::usejs('alert("修改失敗！請聯絡網站設計人員！"); history.go(-1);');
			}
		}
		else if($t==2){//照片
			//刪除舊的照片
			$res=(query("SELECT `_dir`,`_photo` FROM `intro` WHERE `no`='{$no}'"));
			$row=mysql_fetch_array($res);
			$dir=$row['_dir'];
			$photo=$row['_photo'];
			if($dir){
				@unlink(iconv('utf-8','big5',"photos/Intro2/{$dir}/{$photo}"));
				@RmDir("photos/Intro2/{$dir}");
			}
			//上傳新的
			$dir=substr(md5(date("m.d.y H:i:s")),1,15);//亂名
			$file=$_FILES['userfile']['tmp_name'];
			if(is_uploaded_file($file)){
				$fileName=$_FILES['userfile']['name'];
				mkdir("photos/Intro2/{$dir}");//新建目錄
				move_uploaded_file($file,iconv('utf-8','big5',"photos/Intro2/{$dir}/{$fileName}"));
			}
			//改資料庫
			if(query("UPDATE `intro` SET `_dir`='{$dir}',`_photo`='{$fileName}' WHERE `no`='{$no}'")){
				js::usejs('alert("修改成功！"); opener.location.href="index.php?intro2"; window.close();');
			}else{
				js::usejs('alert("修改失敗！請聯絡網站設計人員！"); history.go(-1);');
			}
		}
		else if($t==3){//新增
			$file=$_FILES['userfile']['tmp_name'];
			if(is_uploaded_file($file)){
				$main=$_POST['name'];//名稱
				$position=$_POST['position'];//職稱
				$contect=$_POST['contect'];//內容
				$email=$_POST['email'];//email
				$phone=$_POST['phone'];//電話
				$ext=$_POST['ext'];//分機
				$dir=substr(md5(date("m.d.y H:i:s")),1,15);//目錄亂名
				$fileName=$_FILES['userfile']['name'];
				mkdir("photos/Intro2/{$dir}");//新建目錄
				move_uploaded_file($file,iconv('utf-8','big5',"photos/Intro2/{$dir}/{$fileName}"));
				if(query("INSERT INTO `intro`(`_main`,`_position`,`_contect`,`_email`,`_phone`,`_ext`,`_dir`,`_photo`,`_class`) VALUES('{$main}','{$position}','{$contect}','{$email}','{$phone}','{$ext}','{$dir}','{$fileName}','intro2')")){
					js::usejs('alert("新增成功！"); opener.location.href="index.php?intro2"; window.close();');
				}else{
					js::usejs('alert("新增失敗！請聯絡網站設計人員！"); history.go(-1);');
				}
			}else{
				js::usejs('alert("請上傳照片！"); history.go(-1);');
			}
		}
		else if($t==4){//刪除
			if(query("DELETE FROM `intro` WHERE `no`='{$no}' LIMIT 1"))
				js::usejs('alert("刪除成功！"); opener.location.href="index.php?intro2"; window.close();');
			else
				js::usejs('alert("刪除失敗！請聯絡網站設計人員！"); history.go(-1);');
		}
	}
	else if($aa == 16){//處理學習資源
		$n=$_GET['n'];//1新增大項2刪除大項3修改大項4新增小項5修改小項6刪除小項
		$t=$_GET['t'];//res res1 res2 ...
		if($n==1){//新增大項
			@$name=$_POST['name'];
			if($name)//不為空
				query("INSERT INTO `res`(`_name`,`_to`,`_class`) VALUES('{$name}','0','{$t}')");
			else
				js::usejs('alert("欄位不可為空！"); history.go(-1);');
		}
		else if($n==2){//刪除大項
			@$no=$_POST['no'];
			query("DELETE FROM `res` WHERE `_to`='{$no}'");
			query("DELETE FROM `res` WHERE `no`='{$no}'");
		}
		else if($n==3){//修改大項
			@$no=$_POST['no'];
			@$name=$_POST['name'];
			if($name)
				query("UPDATE `res` SET `_name`='{$name}' WHERE `no`='{$no}' LIMIT 1");
			else
				js::usejs('alert("欄位不可為空！"); history.go(-1);');
		}
		else if($n==4){//新增小項
			@$name=$_POST['name'];
			@$url=$_POST['url'];
			@$to=$_POST['to'];
			if($name && $url)
				query("INSERT INTO `res`(`_name`,`_url`,`_to`,`_class`) VALUES('{$name}','{$url}','{$to}','{$t}')");
			else
				js::usejs('alert("欄位不可為空！"); history.go(-1);');
		}
		else if($n==5){//修改小項
			@$name=$_POST['name'];
			@$url=$_POST['url'];
			@$no=$_POST['no'];
			if($name && $url)
				query("UPDATE `res` SET `_name`='{$name}',`_url`='{$url}' WHERE `no`='{$no}' LIMIT 1");
			else
				js::usejs('alert("欄位不可為空！"); history.go(-1);');
		}
		else if($n==6){//刪除小項
			@$no=$_POST['no'];
			query("DELETE FROM `res` WHERE `no`='{$no}'");
		}
		js::usejs("opener.location.href='index.php?{$t}'; history.go(-1);");
	}
	else if($aa == 17){//修改、刪除新的服務項目
		$t=$_GET['t'];//1修改2刪除
		if($t==1){//修改
			@$main=$_POST['_main'];
			@$content=$_POST['content'];
			@$no=$_POST['no'];
			if(query("UPDATE `ser` SET `_main`='{$main}',`_content`='{$content}' WHERE `no`='{$no}'"))
				js::usejs("alert('修改成功！'); opener.location.href='index.php?ser'; window.close();");
			else
				js::usejs('alert("修改失敗！請聯絡網站設計人員！"); history.go(-1);');
		}
		else if($t==2){//刪除
			@$no=$_POST['no'];
			if(query("DELETE FROM `ser` WHERE `no`='{$no}' LIMIT 1"))
				js::usejs("alert('刪除成功！'); opener.location.href='index.php?ser'; window.close();");
			else
				js::usejs('alert("刪除失敗！請聯絡網站設計人員！"); history.go(-1);');
		}
	}
}
if($b == 14){//新增留言
	@$main=$_POST['main'];
	@$content=$_POST['content'];
	@$name=$_POST['name'];
	if($main && $content && $name){//都有填寫
		@$email=$_POST['email'];
		if($email){
			if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/",$email)){
				$check=1;
			}else{
				js::usejs('alert("信箱格式不符！"); history.go(-1)');
			}
		}
		if(@$email==NULL || @$check==1){//未填或過驗證
			@$file = $_FILES['userfile']['tmp_name'];
			if($file){//有檔案
				$size=$_FILES['userfile']['size'];
				$fileName=$_FILES['userfile']['name'];
				$dir=substr(md5(date("m.d.y H:i:s")),1,15);//亂名
				@mkdir("files/message/{$dir}");//新建目錄
				@$path = "files/message/{$dir}/{$fileName}";
				if(is_uploaded_file($file))
					move_uploaded_file($file,iconv('utf-8','big5',$path));
				else
					js::usejs('alert("檔案請重新上傳！"); history.go(-1)');
			}else{
				$size=NULL; $fileName=NULL; $dir=NULL;
			}
			$date=date("Y-m-d");
			$ip=getip();
			if(!@$reTo=$_POST['no'])//回覆
				$reTo=0;
			if(query("INSERT INTO `message`(`_main`,`_content`,`_name`,`_email`,`_reTo`,`_dir`,`_file`,`_size`,`_addDate`,`_ip`) VALUES('{$main}','{$content}','{$name}','{$email}','{$reTo}','{$dir}','{$fileName}','{$size}','{$date}','{$ip}')")){
				if($reTo!=0){//回覆的情況
					js::usejs("alert('回覆成功！'); opener.location.href='index.php?mes'; location.href='window.php?b=3&no={$reTo}'");
				}
				else
					js::usejs('alert("留言成功！"); opener.location.href="index.php?mes"; window.close();');
			}else
				js::usejs('alert("留言失敗！請通知網站管理員！"); window.close();');
		}
	}else{
		js::usejs('alert("有空欄位未填寫！"); history.go(-1)');
	}
}
//----------------------------
//echo "<script type='text/javascript'> location.href='../studentlearn';</script>";
exit;
?>