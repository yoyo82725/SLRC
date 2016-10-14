-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Aug 16, 2012, 03:07 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `studentlearn`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `act`
-- 

CREATE TABLE `act` (
  `no` int(20) unsigned NOT NULL auto_increment,
  `_main` varchar(150) default NULL,
  `_content` text,
  `_dir` varchar(30) default NULL,
  `_file` varchar(255) default NULL,
  `_to` int(20) default '0',
  `_actDate` date default NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活動集錦' AUTO_INCREMENT=26 ;

-- 
-- 列出以下資料庫的數據： `act`
-- 

INSERT INTO `act` VALUES (13, '讀書會第01組-美好的未來(第1次聚會)', '聚讀書籍：線性代數\r\n聚讀進度：第1.1-1.4節\r\n聚讀時間：2012/03/21\r\n聚讀地點：圖書館510室\r\n', NULL, NULL, 0, '2012-08-14');
INSERT INTO `act` VALUES (14, '', NULL, '2558686f5568736', '110_1_調整大小.jpg', 13, NULL);
INSERT INTO `act` VALUES (15, '', NULL, 'e8ccf16de19fa82', '110_2_調整大小.jpg', 13, NULL);
INSERT INTO `act` VALUES (16, '', NULL, 'f3b190523c236a8', '110_3_調整大小.jpg', 13, NULL);
INSERT INTO `act` VALUES (17, '', NULL, 'a8040f283b89f78', '110_4_調整大小.jpg', 13, NULL);
INSERT INTO `act` VALUES (18, '讀書會第02組-行雲流水 (第1次聚會)', '聚讀書籍：文學<君乘車>\r\n聚讀進度：老師帶領--<君乘車>\r\n聚讀時間：2012/03/26\r\n聚讀地點：台北人文空間\r\n', NULL, NULL, 0, '2012-08-14');
INSERT INTO `act` VALUES (19, '', NULL, '33653efb5ef03df', 'IMAG0293_調整大小.jpg', 18, NULL);
INSERT INTO `act` VALUES (20, '', NULL, '5c53e08be77566e', 'IMAG0273_調整大小.jpg', 18, NULL);
INSERT INTO `act` VALUES (21, '', NULL, '90ef16a6de1d1f5', 'IMAG0286_調整大小.jpg', 18, NULL);
INSERT INTO `act` VALUES (22, '', NULL, '1f9fdc76c4d9901', 'IMAG0277_調整大小.jpg', 18, NULL);
INSERT INTO `act` VALUES (23, '', NULL, '8d2c72dc224d1a0', 'IMAG0284_調整大小.jpg', 18, NULL);
INSERT INTO `act` VALUES (24, '', NULL, 'e3be319c72d910e', 'IMAG0282_調整大小.jpg', 18, NULL);
INSERT INTO `act` VALUES (25, '', NULL, '099645536208bb4', 'IMAG0281_調整大小.jpg', 18, NULL);

-- --------------------------------------------------------

-- 
-- 資料表格式： `dow`
-- 

CREATE TABLE `dow` (
  `no` int(10) unsigned NOT NULL auto_increment,
  `_main` varchar(255) default NULL,
  `_how` varchar(255) default NULL,
  `_dir` varchar(30) default NULL,
  `_file` varchar(255) default NULL,
  `_to` int(10) default '0',
  `_editDate` timestamp NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='表單下載' AUTO_INCREMENT=11 ;

-- 
-- 列出以下資料庫的數據： `dow`
-- 

INSERT INTO `dow` VALUES (1, '表單下載範例', '這裡是說明', '9f009f66c4a8fad', 'word測試.doc', 3, '2012-08-14 20:41:45');
INSERT INTO `dow` VALUES (2, 'test', 'testaa', '08e28f1748c653a', '學生讀書會滿意度_問卷統計.xls', 3, '2012-08-14 20:41:45');
INSERT INTO `dow` VALUES (3, '測試範例', NULL, NULL, NULL, 0, '2012-08-14 21:52:25');

-- --------------------------------------------------------

-- 
-- 資料表格式： `intro`
-- 

CREATE TABLE `intro` (
  `no` int(4) unsigned NOT NULL auto_increment,
  `_main` varchar(255) default NULL,
  `_contect` text,
  `_position` varchar(60) default NULL,
  `_email` varchar(120) default NULL,
  `_phone` varchar(30) default NULL,
  `_ext` varchar(10) default NULL,
  `_dir` varchar(60) default NULL,
  `_photo` varchar(255) default NULL,
  `_color1` varchar(10) default NULL,
  `_color2` varchar(10) default NULL,
  `_class` varchar(20) default NULL,
  `_order` varchar(10) default NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='中心介紹' AUTO_INCREMENT=19 ;

-- 
-- 列出以下資料庫的數據： `intro`
-- 

INSERT INTO `intro` VALUES (1, '學生學習資源中心', '六樓的高度，正好遠望水平的海，\r\n遠處的山，如同張開雙臂擁抱你。\r\n學資中心，歡迎大家有空常來坐坐喔！\r\n			\r\n　　為提升學生學習動機、增進學習效能，本校配合教學卓越計畫成立「學生學習資源中心」。\r\n　　我們舉辦「晨間閱讀」、「引領人培訓工作坊」等活動，以及學生自組「約翰人—聚讀聚落讀書會」，培養良好的讀書習慣，深化在校園中自主學習的能力。\r\n　　推動「同儕課輔」，舉辦「課輔小老師培訓」課程，協助激發學業低成就學生之學習動機，提升學習成效與增進學習成就。\r\n　　針對預警需求提供客製化學習諮詢輔導，引導自我探索與了解學習相關的因素，透過學習診斷測驗，協助學習歷程及身心適應覺察，規畫後續輔導諮詢，協助修正學習方法。', '', '', '', '', '', '', '#7733bb', '', 'intro', '');
INSERT INTO `intro` VALUES (2, '', '<p>　　本校於2006年始獲教育部獎勵大學卓越教學之補助，經由整體制度面之改革與建置，提升全校教學品質與效能，是年3月份成立「學生學習資源中心」專責單位，作為學生成長聚落，中心設有主任，聘任專任輔噵教師2位、工讀生1位，提供個人學習小間、學習輔導晤談室、客製化輔導服務、軟硬體設備借用、讀書小組空間。<br />\r\n<br />\r\n　　建置專門的學習輔導空間，協助處理學習困擾問題、減少因學習挫敗而自我放棄的情形、研擬適合個人需求的客製化輔導方案，協助累積學習成功經驗，以增進其自我效能，規劃學生自主學習之現代環境建構工程，使學生在校園中獲得學習學習之效率與快樂。<br />\r\n<br />\r\n　　建置「效率學習量表」平台，提供學生透過學生入口網web網頁問卷，探討自己的學習心態、學習習慣、學習專注、自我檢視、學習方法、資源使用六個構面的表現情形，了解自己學習的優劣勢，提供有效學習之競賽與活動，協助提升學習動機，並覺察與掌握自己的學習歷程，達成學習目標，累積成功經驗。</p>', '', '', '', '', '', '', '', '', '宗旨', '');
INSERT INTO `intro` VALUES (3, 'Q. 學資中心位在哪裡？', '　　圖資大樓六樓', '', '', '', '', '', '', '', '', 'QA', '');
INSERT INTO `intro` VALUES (4, 'Q. 學資中心服務時間？', '　　早上八點二十分至下午五點', '', '', '', '', '', '', '', '', 'QA', '');
INSERT INTO `intro` VALUES (8, 'Q. 一定要有學習困難才能去嗎？', '　　學資中心的空間和資源是屬於全校學生的，歡迎大家有事沒事進來打滾。這裡的空間除了提供向各系申請免費課輔諮詢、影片欣賞、讀書會、個別諮詢外，也提供您考試期間不同於家裡、宿舍或圖書館的環境；若是平日課堂中間不知道要去哪裡落腳，也歡迎大家進來；想找個地方安靜一下，看個書，悠閒度過美好的一天，也歡迎您來。', '', '', '', '', '', '', '', '', 'QA', '');
INSERT INTO `intro` VALUES (12, '鄧桂薰', '業務範圍：\r\n　1.學生學習動機營造計畫規劃執行統籌\r\n　2.學生學習輔導業務統籌\r\n　3.學生學習相關活動業務統籌\r\n　4.學生學習資源中心行政相關業務統籌', '主任', 'khteng@mail.sju.edu.tw', '2801-3131', '6790', 'ba8638db0f87c80', '鄧桂薰.png', '', '', 'intro2', '1');
INSERT INTO `intro` VALUES (13, '賴韻雯', '業務範圍：\r\n　1.學生學習動機營造計畫規劃與執行\r\n　2.學生學習預警輔導相關業務\r\n　3.學生學習輔導活動及講座規劃與執行\r\n　4.學生學習輔導晤談及測驗相關業務\r\n　5.學生學習資源中心行政相關業務', '學習輔導老師', 'cyndia62@mail.sju.edu.tw', '2801-3131', '6896', '3e1511f9ea56fec', '賴韻雯.png', '', '', 'intro2', '');
INSERT INTO `intro` VALUES (18, '林祝如', '業務範圍：\r\n　1.學生學習動機營造計畫規劃與執行\r\n　2.學生學習晨間閱讀相關業務\r\n　3.學生學習讀書會相關業務\r\n　4.學生學習輔導活動及講座規劃與執行\r\n　5.學生學習資源中心行政相關業務', '學習輔導老師', 'faylin921@mail.sju.edu.tw', '2801-3131', '6892', '2b6ab2a1a8ab1d6', 'fay照片.jpg', NULL, NULL, 'intro2', NULL);

-- --------------------------------------------------------

-- 
-- 資料表格式： `message`
-- 

CREATE TABLE `message` (
  `no` int(20) unsigned NOT NULL auto_increment,
  `_main` varchar(255) default NULL,
  `_content` text,
  `_name` varchar(60) default NULL,
  `_email` varchar(255) default NULL,
  `_reTo` int(20) default '0',
  `_dir` varchar(60) default NULL,
  `_file` varchar(255) default NULL,
  `_size` varchar(255) default NULL,
  `_editDate` timestamp NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `_addDate` varchar(30) default NULL,
  `_ip` varchar(60) default NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='留言版' AUTO_INCREMENT=4 ;

-- 
-- 列出以下資料庫的數據： `message`
-- 

INSERT INTO `message` VALUES (1, '留言範例', '若要修改跑馬燈請點擊跑馬燈即可\r\n\r\n若要刪除文章請點主題旁的(刪除)即可\r\n\r\n感恩', 'XX維', '100406090@stud.sju.edu.tw', 0, '0f5da7605dd99f7', 'word測試.doc', '26112', '2012-08-14 11:56:52', '2012-08-14', '120.102.163.83');
INSERT INTO `message` VALUES (2, 'reTo：留言範例', '回覆文章範例', 'XX維', '100406090@stud.sju.edu.tw', 1, '88c20f138083a96', 'word測試.doc', '26112', '2012-08-14 11:57:33', '2012-08-14', '120.102.163.83');
INSERT INTO `message` VALUES (3, 'reTo：留言範例', 'aa', 'aa', '', 1, '', '', '', '2012-08-14 14:17:31', '2012-08-14', '10.20.8.211');

-- --------------------------------------------------------

-- 
-- 資料表格式： `met`
-- 

CREATE TABLE `met` (
  `no` int(10) unsigned NOT NULL auto_increment,
  `_main` varchar(90) default NULL,
  `_how` text COMMENT '內容',
  `_dir` varchar(30) default NULL,
  `_file` varchar(255) default NULL,
  `_editDate` timestamp NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='相關辦法' AUTO_INCREMENT=2 ;

-- 
-- 列出以下資料庫的數據： `met`
-- 

INSERT INTO `met` VALUES (1, '相關辦法範例', '這裡是說明', '29ca110f3119e1a', 'word測試.doc', '2012-08-14 12:34:10');

-- --------------------------------------------------------

-- 
-- 資料表格式： `news`
-- 

CREATE TABLE `news` (
  `no` int(20) unsigned NOT NULL auto_increment,
  `_class` varchar(30) default '活動訊息',
  `_main` varchar(255) default NULL,
  `_things` text,
  `_file` varchar(255) default NULL,
  `_dir` varchar(30) default NULL,
  `_size` varchar(255) default NULL,
  `_addDate` date default NULL,
  `_editDate` timestamp NULL default CURRENT_TIMESTAMP,
  `_ip` varchar(30) default NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='最新消息' AUTO_INCREMENT=9 ;

-- 
-- 列出以下資料庫的數據： `news`
-- 

INSERT INTO `news` VALUES (8, '一般訊息', '歡迎101-1新生入學~歡迎新生舊生共同使用學資中心資源~', '<p class="yiv1669085292MsoNormal" style="margin: 0cm 0cm 0pt;"><font size="3"><span>歡迎同學進入聖約翰這個大家庭</span><span lang="EN-US"><font face="Times New Roman">~</font></span></font></p>\r\n<p><font size="3"><span>學資中心位在圖資大樓</span><span lang="EN-US"><font face="Times New Roman">6</font></span><span>樓，</span></font><span><font size="3">空間開放舒適，並有許多書籍和媒體資源</font></span></p>\r\n<p><span><font size="3">歡迎使用這裡的空間和資源，幫助你提高學習效率，讓自己在這裡沉澱，再出發！</font></span></p>\r\n<p><font size="3"><span>另外，我們舉辦「晨間閱讀」、「約翰人聚讀聚落讀書會」、「上課出席率競賽」、「同儕課業輔導精進競賽」等好康活動，歡迎來參加</span><span lang="EN-US"><font face="Times New Roman">~</font></span></font></p>\r\n<p><font size="3"><span>學資中心歡迎你</span><span lang="EN-US"><font face="Times New Roman">~</font></span></font></p>', '', '', '', '2012-08-15', '2012-08-15 09:08:44', '10.20.8.16');
INSERT INTO `news` VALUES (2, '活動訊息', '學資中心邀請早起的你~晨讀拿餐券!', '<p>100-2新學期開始，歡迎同學來學資中心唸書！</p>\r\n<p>即日起，每天早上8:20-11:00前到學資中心，<br />\r\n唸書滿30分鐘以上可集1點，集滿2點可兌換餐券，<br />\r\n讓你/妳在唸書的同時有餐券可拿，一舉數得，超好康！<br />\r\n我們在圖資大樓6樓等你/妳喔！(與國際會議廳同一棟)</p>\r\n<p>有任何疑問，請洽學資中心 韻雯老師(分機6896)</p>', '', '', '', '2012-08-15', '2012-08-15 08:39:17', '10.20.8.16');
INSERT INTO `news` VALUES (3, '活動訊息', '學資中心--「100-2約翰人聚讀聚落讀書會」~ 等你揪團來報名!', '<p>你想找個地方好好念書嗎？<br />\r\n你讀書時常靜不下心、容易懈怠或無法持續嗎？<br />\r\n歡迎揪團共組讀書會，一起讀出好成績。<br />\r\n學資中心將提供經費補助喔~ 名額有限，敬請把握！</p>\r\n<p>欲知活動詳情，請參加「約翰人聚讀聚落讀書會」說明會。<br />\r\n(PS. 強烈建議同學參加喔! 以免報名時繳交資料不全，而錯失參加機會喔!)</p>\r\n<p>說明會時、地：101.3.7(三), 12:10~12:50，圖資大樓6樓學資中心，請自備午餐<br />\r\n報名時間：即日起至3/6(二), 17:00<br />\r\n報名方式：請至學資中心登記<br />\r\n活動負責人：祝如老師(分機6892)</p>\r\n<p> </p>', '', '', '', '2012-08-15', '2012-08-15 08:41:16', '10.20.8.16');
INSERT INTO `news` VALUES (4, '活動訊息', '好康又來了~歡迎報名「100-2聰明的讀書技巧」講座(學資中心)', '<p>好康的又來囉~</p>\r\n<p>你想好好唸書，卻總是讀不懂、唸不完，心有餘而力不足嗎？<br />\r\n學資中心特別邀請專家教導你聰明的讀書技巧！<br />\r\n讓你覺察自己的學習優勢，發揮學習潛能，找到適合自己的讀書方法；<br />\r\n並學習聰明的讀書策略與技巧，有效增加學習力，讓讀書變得輕鬆、有效無負擔！</p>\r\n<p>為提升學習成效，學資中心特別辦理了「大學生了沒—聰明的讀書技巧」講座，詳細如下：</p>\r\n<p>----------------------------------------------------------------------------------------<br />\r\n時間：101年3月28日(三)，班週會時間(14:55~15:40)<br />\r\n地點：沈祖海國際會議廳，圖資大樓8樓<br />\r\n主題：「大學生了沒—聰明的讀書技巧」講座<br />\r\n內容：協助覺察自己的學習優勢，發揮學習潛能，找到適合的讀書方法；並學習聰明的讀書策略與技巧，有效地提升學習成效！<br />\r\n講師：張雅雯諮商心理師<br />\r\n報名方式：請填寫附件「報名表」，3/27(二)16:30前e-mail或交至學資中心<br />\r\n----------------------------------------------------------------------------------------</p>\r\n<p>額滿為止，請把握機會喔！<br />\r\n如有疑問，歡迎洽詢學資中心賴韻雯老師(分機6896，<a href="mailto:cyndia62@mail.sju.edu.tw">cyndia62@mail.sju.edu.tw</a>)。</p>\r\n<p>學習中心歡迎你~</p>\r\n<p> </p>', '', '', '', '2012-08-15', '2012-08-15 08:43:00', '10.20.8.16');
INSERT INTO `news` VALUES (5, '活動訊息', '好康即將截止！快來參加學資中心「100-2上課出席率競賽」，7-11禮卷等你拿~', '<p>「100-2一個都不能少！提升上課出席率」競賽開始報名囉！</p>\r\n<p>得獎班級可獲得7-11的4,000至10,000元禮券，超好康！<br />\r\n獎品豐富，機會難得，歡迎同學快快報名參加！</p>\r\n<p>報名時間：即日起至3/16(五)<br />\r\n報名方式：列印一份連署簽名表單(附件)，請三門專業必修課的老師、導師、系主任、同學連署簽名，交至學資中心(圖資大樓6樓)<br />\r\n競賽期間：3/19~5/25，共8週(扣除校際活動週及期中考週)</p>\r\n<p>如有疑問，歡迎洽詢學資中心 賴韻雯老師(分機6896)</p>', '', '', '', '2012-08-15', '2012-08-15 08:44:26', '10.20.8.16');
INSERT INTO `news` VALUES (6, '活動訊息', '快來學資中心領歐趴糖~~~祝福你期中考順利!', '<p>各位同學好，歡迎在每天08:20-17:00來學資中心唸書！</p>\r\n<p>另外，100-2期中考就要到了，<br />\r\n學資中心除了舒適的讀書環境外，即日起至4/20，還準備了精美歐趴糖，歡迎領取~ <br />\r\n讓你在念書時補充能量，祝福你考試順利、科科All Pass喔！</p>\r\n<p>期中考加油~ 學資中心關心你~</p>', '', '', '', '2012-08-15', '2012-08-15 08:46:24', '10.20.8.16');
INSERT INTO `news` VALUES (7, '活動訊息', '(學資中心) "100-2一個都不能少!提升上課出席率競賽活動" 獲獎公告', '<p>感謝大家參與學資中心的"100-2一個都不能少!提升上課出席率競賽活動"<br />\r\n活動已圓滿落幕，獲獎班級如下：</p>\r\n<p>名次 班級    獲獎禮券<br />\r\n1 資管三美    10000元<br />\r\n2 資管一美    10000元<br />\r\n3 資工三善    8000元<br />\r\n4 工管二善    8000元<br />\r\n5 休健二真    8000元<br />\r\n6 電通三善    6000元<br />\r\n7 電子一善    6000元<br />\r\n8 電機二真    6000元<br />\r\n9 機械一美    4000元<br />\r\n10 行流一真    4000元<br />\r\n11 應英二真    4000元<br />\r\n12 數位一真    4000元</p>\r\n<p>請獲獎班級負責人，6/12(二)前，至學資中心領取表單<br />\r\n6/15(五)前，完成表單與領獎<br />\r\n逾期不候，請把握權益喔！</p>\r\n<p><br />\r\n恭喜得獎班級，請將團隊督促學習的精神持續下去！<br />\r\n未獲獎班級不需氣餒，過程中必有收穫，未來請再接再厲！</p>\r\n<p><br />\r\n如有問題，歡迎與學資中心賴韻雯老師(分機6896)聯繫。</p>', '', '', '', '2012-08-15', '2012-08-15 08:47:32', '10.20.8.16');

-- --------------------------------------------------------

-- 
-- 資料表格式： `res`
-- 

CREATE TABLE `res` (
  `no` int(20) unsigned NOT NULL auto_increment,
  `_name` varchar(255) default NULL,
  `_url` varchar(255) default NULL,
  `_to` int(20) default '0',
  `_class` varchar(20) default NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='學習專區' AUTO_INCREMENT=125 ;

-- 
-- 列出以下資料庫的數據： `res`
-- 

INSERT INTO `res` VALUES (1, '【考試相關資訊網站】', '', 0, 'res');
INSERT INTO `res` VALUES (2, '財團法人語言訓練測驗中心', 'http://www.lttc.ntu.edu.tw/', 1, 'res');
INSERT INTO `res` VALUES (3, '多益測驗(TOEIC)', 'http://www.toeic.com.tw/', 1, 'res');
INSERT INTO `res` VALUES (11, '【就業資訊網站】', '', 0, 'res');
INSERT INTO `res` VALUES (9, '託福(TOEFL)', 'http://www.toefl.com.tw/', 1, 'res');
INSERT INTO `res` VALUES (10, '日本語能力試驗(JLPT)', 'http://www.lttc.ntu.edu.tw/JLPT.htmu.tw/JLPT.htm    ', 1, 'res');
INSERT INTO `res` VALUES (12, '職訓局就業服務網', 'http://www.ejob.gov.tw/', 11, 'res');
INSERT INTO `res` VALUES (13, '新北市人力網', 'http://www.goodjob.nat.gov.tw/main/index.aspx?site=main/', 11, 'res');
INSERT INTO `res` VALUES (14, '1111人力銀行', 'http://www.1111.com.tw/', 11, 'res');
INSERT INTO `res` VALUES (15, '104人力銀行', 'http://www.104.com.tw/index.htm', 11, 'res');
INSERT INTO `res` VALUES (16, '台北人力銀行(國家考試)', 'http://www.okwork.gov.tw/', 11, 'res');
INSERT INTO `res` VALUES (17, '全國就業e網', 'http://www.ejob.gov.tw/', 11, 'res');
INSERT INTO `res` VALUES (18, '+7全民打工網', 'http://www.7partime.cc/', 11, 'res');
INSERT INTO `res` VALUES (19, '【校園資訊網】', '', 0, 'res1');
INSERT INTO `res` VALUES (20, '學生入口網e-Portfolio', 'http://sjusip.sju.edu.tw/Sjusip/', 19, 'res1');
INSERT INTO `res` VALUES (21, '【學習相關網站】', '', 0, 'res1');
INSERT INTO `res` VALUES (23, '國立中央圖書館台灣分館', 'http://www.ntl.edu.tw/mp.asp?mp=1', 21, 'res1');
INSERT INTO `res` VALUES (24, '【他校學資中心】', '', 0, 'res2');
INSERT INTO `res` VALUES (25, '輔仁大學', 'http://stlc.dsa.fju.edu.tw/', 24, 'res2');
INSERT INTO `res` VALUES (26, '東吳大學', 'http://www.scu.edu.tw/sr/', 24, 'res2');
INSERT INTO `res` VALUES (27, '逢甲大學', 'http://student.csal.fcu.edu.tw/wSite/mp?mp=219105', 24, 'res2');
INSERT INTO `res` VALUES (119, '【有效學習方法】', NULL, 0, 'res1');
INSERT INTO `res` VALUES (74, 'SJU微型課程大綱', 'http://sjuportal.sju.edu.tw/Sjucourse/SJU_Sbj_Micro.aspx', 69, 'res1');
INSERT INTO `res` VALUES (42, '【語文學習網站】', NULL, 0, 'res1');
INSERT INTO `res` VALUES (43, '線上英文自學中心', 'http://ce.etweb.fju.edu.tw/self_learning.html', 42, 'res1');
INSERT INTO `res` VALUES (44, '空中英語教室', 'http://studioclassroom.com/default.php', 42, 'res1');
INSERT INTO `res` VALUES (45, '中大英語英語學習資料庫', 'http://www.ncu.edu.tw/~wenchi/english/index.html', 42, 'res1');
INSERT INTO `res` VALUES (46, '小笨霖英語筆記本', 'http://som.twbbs.org/klee/notebook/index.html', 42, 'res1');
INSERT INTO `res` VALUES (47, '時代雜誌', 'http://www.time.com/time/', 42, 'res1');
INSERT INTO `res` VALUES (48, 'Live ABC 互動全語', 'http://www.liveabc.com/index.asp', 42, 'res1');
INSERT INTO `res` VALUES (49, '日語自遊行', 'http://www.rthk.org.hk/elearning/gogojapan/', 42, 'res1');
INSERT INTO `res` VALUES (50, '英語聽力練習', 'http://www.esl-lab.com/', 42, 'res1');
INSERT INTO `res` VALUES (51, '商業英文學習網', 'http://www.business-english.com/', 42, 'res1');
INSERT INTO `res` VALUES (52, '中小企業網路大學課程/企業英語', 'http://www.smelearning.org.tw/', 42, 'res1');
INSERT INTO `res` VALUES (53, 'Hi2ez語言學習網', 'http://www.hi2ez.com.tw/main.htm', 42, 'res1');
INSERT INTO `res` VALUES (54, '每日英文短篇(Breaking New English)', 'http://www.breakingnewsenglish.com/', 42, 'res1');
INSERT INTO `res` VALUES (55, '俚語字典', 'http://www.peevish.co.uk/slang/search.htm', 42, 'res1');
INSERT INTO `res` VALUES (56, '全真英語', 'http://www.icansay.com/', 42, 'res1');
INSERT INTO `res` VALUES (57, 'Movie Sounds(有聲電影對白)', 'http://www.moviesounds.com/#nowplay', 42, 'res1');
INSERT INTO `res` VALUES (58, '英語新聞網站', 'http://www.taiwannews.com.tw/etn/index_en.php', 42, 'res1');
INSERT INTO `res` VALUES (59, '多功能線上英語字典', 'http://dictionary.reference.com/', 42, 'res1');
INSERT INTO `res` VALUES (60, '國立教育廣播電台', 'http://realner.ner.gov.tw/list.php?linkdir=C%AD^%BBy  ', 42, 'res1');
INSERT INTO `res` VALUES (69, '【校園資訊網】', NULL, 0, 'res1');
INSERT INTO `res` VALUES (70, '學生入口網e-Portfolio', 'http://sjusip.sju.edu.tw/Sjusip/', 69, 'res1');
INSERT INTO `res` VALUES (71, '學生手冊', 'http://aca.sju.edu.tw/96student_manual/student_manual.html', 69, 'res1');
INSERT INTO `res` VALUES (73, '歷屆考古題-研究所', 'http://www.lib.sju.edu.tw/index/%e8%80%83%e5%8f%a4%e9%a1%8c.asp', 69, 'res1');
INSERT INTO `res` VALUES (72, '圖書館館藏目錄', 'http://163.21.66.231:8080/toread/opac', 69, 'res1');
INSERT INTO `res` VALUES (75, '大學教育理念講座', 'http://ttlrc.sju.edu.tw/sjutext/index.php?register=movie1', 69, 'res1');
INSERT INTO `res` VALUES (76, '效率學習量表', 'http://sjuportal.sju.edu.tw//Sjuquestionary/', 69, 'res1');
INSERT INTO `res` VALUES (77, '學習知識網', 'http://www.cceskb.sju.edu.tw/xms/', 69, 'res1');
INSERT INTO `res` VALUES (78, '【學習相關網站】', NULL, 0, 'res1');
INSERT INTO `res` VALUES (79, '國家圖書館', 'http://www.ncl.edu.tw/mp.asp?mp=2', 78, 'res1');
INSERT INTO `res` VALUES (80, '國立中央圖書館台灣分館', 'http://www.ntl.edu.tw/mp.asp?mp=1', 78, 'res1');
INSERT INTO `res` VALUES (81, '北市立圖書館', 'http://www.tpml.edu.tw/', 78, 'res1');
INSERT INTO `res` VALUES (82, '新北市立圖書館 淡水分館', 'http://www.tphcc.gov.tw/library/Lib01.asp?id=89', 78, 'res1');
INSERT INTO `res` VALUES (83, '淡水鎮立圖書館', 'http://superspace.moc.gov.tw/index.aspx', 78, 'res1');
INSERT INTO `res` VALUES (84, 'Bilingual student post雙語學生郵報', 'http://www.studentpost.com.tw/', 78, 'res1');
INSERT INTO `res` VALUES (85, '讓學習活起來', 'http://www.dsej.gov.mo/cappee/booklet/activity/index_acti.htm', 78, 'res1');
INSERT INTO `res` VALUES (86, '讀書妙招', 'http://www.hou.com.tw/html/032read-main.htm', 78, 'res1');
INSERT INTO `res` VALUES (87, '中日、英日翻釋', 'http://www.excite.co.jp/world/', 78, 'res1');
INSERT INTO `res` VALUES (88, '免費的線上語言翻譯器', 'http://www.worldlingo.com/zh_tw/microsoft/computer_translation.html', 78, 'res1');
INSERT INTO `res` VALUES (89, '全國法規資料庫', 'http://law.moj.gov.tw/', 78, 'res1');
INSERT INTO `res` VALUES (90, '天下遠見讀書俱樂部', 'http://rs.bookzone.com.tw/', 78, 'res1');
INSERT INTO `res` VALUES (91, '長春藤網路書局', 'http://www.ivy.com.tw/', 78, 'res1');
INSERT INTO `res` VALUES (93, '國立臺北護理健', 'http://140.131.85.13/nlearn/aboutus.asp', 24, 'res2');
INSERT INTO `res` VALUES (94, '義守大學', 'http://www.isu.edu.tw/site/035/2', 24, 'res2');
INSERT INTO `res` VALUES (95, '長榮大學', 'http://www.cjcu.edu.tw/~stlearning/', 24, 'res2');
INSERT INTO `res` VALUES (96, '萬能科技大學', 'http://et.vnu.edu.tw/student/', 24, 'res2');
INSERT INTO `res` VALUES (97, '國立東華大學', 'http://cte.ndhu.edu.tw/cte/cen2/intro.htm', 24, 'res2');
INSERT INTO `res` VALUES (98, '華梵大學', 'http://cslr.hfu.edu.tw/main.php', 24, 'res2');
INSERT INTO `res` VALUES (99, '國立臺南大學', 'http://web.nutn.edu.tw/ctld/lga/07_01.htm', 24, 'res2');
INSERT INTO `res` VALUES (100, '淡江大學', 'http://sls.tku.edu.tw/info.htm', 24, 'res2');
INSERT INTO `res` VALUES (101, '建國科技大學', 'http://trdc.ctu.edu.tw/files/11-1091-3029.php', 24, 'res2');
INSERT INTO `res` VALUES (102, '國立空中大學 台北', 'http://taipei.nou.edu.tw/2.htm', 24, 'res2');
INSERT INTO `res` VALUES (103, '世新大學', 'http://osa.shu.edu.tw/plan/students_study.htm', 24, 'res2');
INSERT INTO `res` VALUES (104, '亞洲大學', 'http://cdec.asia.edu.tw/', 24, 'res2');
INSERT INTO `res` VALUES (105, '佛光大學', 'http://irc.fguweb.fgu.edu.tw/front/bin/home.phtml', 24, 'res2');
INSERT INTO `res` VALUES (106, '【資源共享】', NULL, 0, 'res2');
INSERT INTO `res` VALUES (107, '線上自學通', 'http://www.nttlrc.scu.edu.tw/mp.aspx?mp=6', 106, 'res2');
INSERT INTO `res` VALUES (108, '台大演講網', 'http://speech.ntu.edu.tw/sng/ci/', 106, 'res2');
INSERT INTO `res` VALUES (109, '獎勵大學教學卓越計畫', 'http://www.csal.fcu.edu.tw/Edu/program_index.asp', 106, 'res2');
INSERT INTO `res` VALUES (110, '區域教學資源中心', 'http://www.csal.fcu.edu.tw/Edu/resources_index.asp', 106, 'res2');
INSERT INTO `res` VALUES (111, '北一區區域教學資源中心', 'http://www.nttlrc.scu.edu.tw/mp.aspx?mp=1', 106, 'res2');
INSERT INTO `res` VALUES (112, '北二區區域教學資源中心', 'http://juang.bst.ntu.edu.tw/N2/index.htm', 106, 'res2');
INSERT INTO `res` VALUES (113, '北區區域教學資源中心', 'http://www.ctle.ntut.edu.tw/', 106, 'res2');
INSERT INTO `res` VALUES (114, '中區區域教學資源中心', 'http://www.tlrcct.yuntech.edu.tw/', 106, 'res2');
INSERT INTO `res` VALUES (115, '雲嘉南區區域教學資源中心', 'http://yct.acad.ncku.edu.tw/bin/home.php', 106, 'res2');
INSERT INTO `res` VALUES (116, '南區區域教學資源中心', 'http://sttlrc.kuas.edu.tw/main.php', 106, 'res2');
INSERT INTO `res` VALUES (117, '高高屏區區域教學資源中心', 'http://kkp.nknu.edu.tw/', 106, 'res2');
INSERT INTO `res` VALUES (118, '東區區域教學資源中心', 'http://etrc.ndhu.edu.tw/cht/', 106, 'res2');
INSERT INTO `res` VALUES (120, '提升學習效率的七種方法', 'http://www.epochtimes.com/b5/8/9/10/n2257778.htm', 119, 'res1');
INSERT INTO `res` VALUES (121, '有效學習的技巧秘訣', 'http://www.epochtimes.com/b5/11/11/9/n3425629.htm有效學習的技巧秘訣 ', 119, 'res1');
INSERT INTO `res` VALUES (122, '古人讀書經驗談 ', 'http://www.epochtimes.com/b5/11/8/5/n3335786.htm古人讀書經驗談-學貴有恆-', 119, 'res1');
INSERT INTO `res` VALUES (123, '提高成績的好方法', 'http://www.epochtimes.com/b5/9/12/31/n2772015.htm ', 119, 'res1');
INSERT INTO `res` VALUES (124, '練好基本功 機會自然來', 'http://www.epochtimes.com/b5/9/4/18/n2499313.htm', 119, 'res1');

-- --------------------------------------------------------

-- 
-- 資料表格式： `ser`
-- 

CREATE TABLE `ser` (
  `no` int(10) unsigned NOT NULL auto_increment,
  `_main` varchar(150) default NULL,
  `_content` text,
  `_leader` varchar(150) default NULL,
  `_teacher` varchar(150) default NULL,
  `_dir` varchar(30) default NULL,
  `_file` varchar(255) default NULL,
  `_class` varchar(20) default NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='服務項目' AUTO_INCREMENT=33 ;

-- 
-- 列出以下資料庫的數據： `ser`
-- 

INSERT INTO `ser` VALUES (1, '', '<p><span style="font-family:&quot;新細明體&quot;,&quot;serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#C00000;\r\nborder:solid windowtext 1.0pt;mso-border-alt:solid windowtext .5pt;padding:\r\n0cm">預警輔導</span></p>\r\n<p class="MsoNormal" style="line-height:12.0pt"><span style="mso-bidi-font-size:\r\n12.0pt;font-family:標楷體;mso-ascii-font-family:Calibri;mso-hansi-font-family:\r\nCalibri;mso-font-kerning:0pt">學資中心於每學期初，針對上學期末考科達二分之一以上不及格而有退學危機者，經導師初步關心，視情形轉介學資中心進行學習診斷測驗及後續輔導追蹤。此外，並針對期中考專業科目得分末</span><span lang="EN-US">5%</span><span style="mso-bidi-font-size:12.0pt;\r\nfont-family:標楷體;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;\r\nmso-font-kerning:0pt">的同學，關懷並協助使用同儕課輔資源，於學期中即提早介入進行學習輔導。<br />\r\n</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="line-height:12.0pt"><span style="mso-bidi-font-size:\r\n12.0pt;font-family:標楷體;mso-ascii-font-family:Calibri;mso-hansi-font-family:\r\nCalibri;mso-font-kerning:0pt">同儕課輔資源方面，學資中心協助各系招募成績優良且具服務熱誠的同學擔任課輔小老師，並舉辦課輔小老師培訓課程，增進課輔服務品質與成效。</span><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;mso-font-kerning:0pt">同時全方位整合學生、導師、系所主管、家長、任課教師、相關單位等資源，以即時協助因「學習適應困難」所造成「學習成就低落」學生，提供「因材施教」、「適性化教學」之同儕課輔或補救教學，培養學生主動積極克服困難之學習態度，</span><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;mso-ascii-font-family:Calibri">提升學習成效與</span><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;mso-font-kerning:0pt">競爭力，有效</span><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;mso-ascii-font-family:Calibri">改善校園學習風氣。<br />\r\n<br type="_moz" />\r\n</span></p>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;\r\nmso-font-kerning:0pt">相關表單下載：</span></p>\r\n<p class="MsoNormal"><span lang="EN-US" style="mso-bidi-font-size:12.0pt;\r\nfont-family:標楷體;color:blue;mso-font-kerning:0pt">101</span><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;color:blue;mso-font-kerning:\r\n0pt">年各系執行<span lang="EN-US">1C</span>計畫建議流程與方法<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;\r\ncolor:blue;mso-font-kerning:0pt">上簽附件<span lang="EN-US">1--</span><a href="/studentlearn/fckeditor/_Files/01_pagefile/files/Doc1.doc">計劃表</a><span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;\r\ncolor:blue;mso-font-kerning:0pt">上簽附件<span lang="EN-US">2--</span><a href="/studentlearn/fckeditor/_Files/01_pagefile/files/Book1.xls">基本資料表</a><span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;\r\ncolor:blue;mso-font-kerning:0pt">學習診斷測驗報名表<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;\r\ncolor:blue;mso-font-kerning:0pt">成果用<span lang="EN-US">--</span><a href="/studentlearn/fckeditor/_Files/01_pagefile/files/Doc1.pdf">滿意度問卷</a><span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;\r\ncolor:blue;mso-font-kerning:0pt">核銷附件<span lang="EN-US">1--</span>媒合名單<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;\r\ncolor:blue;mso-font-kerning:0pt">核銷附件<span lang="EN-US">2--</span>簽到表<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;\r\ncolor:blue;mso-font-kerning:0pt">核銷附件<span lang="EN-US">3--</span>紀錄表<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p>&nbsp;</p>', '', '', '', '', 'ser2');
INSERT INTO `ser` VALUES (2, '', '<p>&nbsp;<span style="color: rgb(192, 0, 0); font-family: 新細明體, serif; line-height: 12pt; ">上課出席率競賽<br />\r\n<br type="_moz" />\r\n</span></p>\r\n<p class="MsoNormal" style="line-height:12.0pt"><span style="mso-bidi-font-size:\r\n12.0pt;font-family:標楷體;mso-ascii-font-family:Arial;mso-bidi-font-family:Arial">學資中心每學期辦理「一個都不能少！提升上課出席率競賽」活動，開放本校日間部學生以班級為單位參加，以課堂出席率與上課動機為獎勵標準，藉此提升學生上課出席率，增進課程專業知識學習效能，並提升班級團隊凝聚力。<br />\r\n<br type="_moz" />\r\n</span></p>\r\n<p class="MsoNormal" style="line-height:12.0pt"><span lang="EN-US" style="mso-bidi-font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;\r\nmso-fareast-font-family:標楷體;mso-hansi-font-family:標楷體"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;\r\nmso-ascii-font-family:Arial;mso-bidi-font-family:Arial">相關表單下載：</span></p>\r\n<p class="MsoNormal"><span lang="EN-US" style="mso-bidi-font-size:12.0pt;\r\nfont-family:標楷體;color:blue;mso-font-kerning:0pt">101-1</span><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;color:blue;mso-font-kerning:\r\n0pt">上課出席率競賽活動簡章暨報名表<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span lang="EN-US" style="mso-bidi-font-size:12.0pt;\r\nfont-family:標楷體;color:blue;mso-font-kerning:0pt">101-1</span><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;color:blue;mso-font-kerning:\r\n0pt">上課出席率競賽課堂學習動機評分表<span lang="EN-US"><o:p></o:p></span></span></p>', '', '', '', '', 'ser3');
INSERT INTO `ser` VALUES (3, '', '<p>&nbsp;<span style="color: rgb(192, 0, 0); font-family: 新細明體, serif; line-height: 12pt; ">學習診斷測驗與客製化學習諮詢輔導<br />\r\n<br />\r\n<br type="_moz" />\r\n</span></p>\r\n<p class="MsoNormal" style="line-height:12.0pt"><span style="mso-bidi-font-size:\r\n12.0pt;font-family:標楷體;mso-ascii-font-family:Arial;mso-bidi-font-family:Arial">學資中心於每學期初，透過學習診斷測驗協助學生覺察自身學習歷程與身心適應狀態，提供個別化輔導諮詢：在學習困擾方面，協助學生修正學習方法，提供課輔資源；並針對測驗結果顯示需關懷者，連結導師與諮輔資源主動追蹤，釐清與處理影響課業的原因，協助良好的身心適應，以達到有效的學習。</span><span lang="EN-US" style="mso-bidi-font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;\r\nmso-fareast-font-family:標楷體;mso-hansi-font-family:標楷體"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;\r\nmso-ascii-font-family:Arial;mso-bidi-font-family:Arial">另外，也提供「學習效率量表」供學生自我評量與分析學習成效，以及「網路成癮線上問卷」評估使用網路的狀況是否影響學習與生活，協助自我了解，並可作為諮詢師長時之參考。</span><span lang="EN-US" style="mso-bidi-font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;\r\nmso-fareast-font-family:標楷體;mso-hansi-font-family:標楷體"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span lang="EN-US" style="color:blue">&nbsp;</span></p>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;\r\nmso-ascii-font-family:Arial;mso-bidi-font-family:Arial">相關連結：</span></p>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;\r\nmso-ascii-font-family:Arial;mso-bidi-font-family:Arial"><a href="http://sjuportal.sju.edu.tw/Sjuquestionary/questionary_index.aspx?ID=OTg0MDEwMzQ=">學習效率量表</a></span><span style="mso-bidi-font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:\r\n標楷體;mso-hansi-font-family:標楷體">&nbsp;</span></p>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:12.0pt;font-family:標楷體;\r\nmso-ascii-font-family:Arial;mso-bidi-font-family:Arial">網路成癮線上問卷</span><span style="mso-bidi-font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:\r\n標楷體;mso-hansi-font-family:標楷體">&nbsp;</span></p>', '', '', '', '', 'ser4');
INSERT INTO `ser` VALUES (4, '', '<p>\r\n<p>&nbsp;<span style="color: rgb(192, 0, 0); font-family: 新細明體, serif; ">約翰人聚讀聚落讀書會</span></p>\r\n<p class="MsoNormal" style="line-height: 12pt; "><span style="font-family: 標楷體; ">平常自己一個人沒什麼動力自發讀書，想找幾個同學，利用課餘時間，組一個讀書會，增強大家的學習動能。學資中心推動互動式分享與閱讀活動，深化學生自主學習動機，營造書香校園氛圍。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="line-height: 12pt; "><span lang="EN-US">&nbsp;</span></p>\r\n<p class="MsoNormal" style="margin-left: 18pt; text-indent: -18pt; line-height: 12pt; "><span style="font-family: 標楷體; ">☆自組讀書會申請：</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">選定閱讀書籍，揪團</span><span lang="EN-US">5-10</span><span style="font-family: 標楷體; ">人。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">推派一人或輪流擔任讀書會小組長。指導教授：可有可無。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">擬定「讀書會計畫書」，審核通過即可進行。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="line-height: 12pt; "><span style="font-family: 標楷體; ">☆讀書會運作方式：</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">讀書會聚會<b>至少</b></span><b><span lang="EN-US">6</span></b><b><span style="font-family: 標楷體; ">次</span></b><span style="font-family: 標楷體; ">，每次</span><span lang="EN-US">60</span><span style="font-family: 標楷體; ">分鐘。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">補助包含：教學材料費（書籍）、膳食費（餐點）、印刷費（講義</span><span lang="EN-US">/</span><span style="font-family: 標楷體; ">印刷</span><span lang="EN-US">/</span><span style="font-family: 標楷體; ">裝訂）、雜支（文具品項）。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">聚會時間（</span><u><span lang="EN-US">11:00-14:00</span></u><span style="font-family: 標楷體; ">、</span><u><span lang="EN-US">17:00-20:00</span></u><span style="font-family: 標楷體; ">）</span><span style="font-family: 標楷體; ">得申請膳食費補助；不得一次結用。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 35.45pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;</span></span><span style="font-family: 標楷體; background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">每週請款需具備<b><u>發票</u></b>或<b><u>收據</u></b>（<b>學校統編</b></span><b><span lang="EN-US" style="background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">37301400</span></b><span style="font-family: 標楷體; background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">）、<b><u>簽到</u></b></span><b><u><span lang="EN-US" style="background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">&amp;</span></u></b><b><u><span style="font-family: 標楷體; background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">記錄表</span></u></b><span style="font-family: 標楷體; background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">、當次<b><u>讀書會照片</u></b></span><span style="font-family: 標楷體; background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">。</span><span style="background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">&nbsp;</span><span style="font-family: 標楷體; background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">核銷書籍費用需另附<b><u>書籍簽領表</u></b>。</span><span lang="EN-US" style="background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; "><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="line-height: 12pt; "><span style="font-family: 標楷體; ">☆讀書會大功告成：</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">推派代表參與期中期末組長會議，及引領人培訓。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">每位成員填寫「活動滿意度調查表」（最後一次讀書會組長收齊繳回）</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">完成「成果報告書」（每位成員繳交</span><span lang="EN-US">300-500</span><span style="font-family: 標楷體; ">字心得，由組長彙整、撰寫）</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; line-height: 12pt; "><span lang="EN-US">&nbsp;</span></p>\r\n<p class="MsoNormal" style="line-height: 12pt; "><span lang="EN-US">&nbsp;</span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; ">【相關表單下載】<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">讀書會經費編列注意事項<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件一<span lang="EN-US">...</span>讀書會計畫書&nbsp;<span lang="EN-US">(</span>自組讀書會申請時填寫<span lang="EN-US">)<o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件二<span lang="EN-US">...</span>書籍簽領表<span lang="EN-US">&nbsp;&nbsp; (</span>核銷書籍費用時需檢附<span lang="EN-US">)<o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件三<span lang="EN-US">...</span>簽到暨記錄表<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件四<span lang="EN-US">...</span>成果報告書<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件五<span lang="EN-US">...</span>期末滿意度調查問卷<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span lang="EN-US" style="font-family: 標楷體; color: blue; ">&nbsp;</span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; ">【讀書會<span lang="EN-US">(</span>各系<span lang="EN-US">)</span>】<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">各系執行讀書會建議流程與方法<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件一<span lang="EN-US">...</span>各組讀書會計畫書<span lang="EN-US">(</span>學生申請時填寫<span lang="EN-US">)<o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件二<span lang="EN-US">...</span>各組讀書會紀錄暨簽到表<span lang="EN-US">(</span>學生填寫，核銷時要檢附<span lang="EN-US">)<o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; ">【結案程序<span lang="EN-US">(</span>各系<span lang="EN-US">)</span>】<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件三<span lang="EN-US">...</span>各組讀書會成果報告書<span lang="EN-US">(</span>學生填寫<span lang="EN-US">)<o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件四<span lang="EN-US">...</span>讀書會滿意度問卷<span lang="EN-US">(</span>學生填寫<span lang="EN-US">)<o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件五<span lang="EN-US">...</span>讀書會量化數據統計報告<span lang="EN-US">(</span>承辦單位填寫<span lang="EN-US">)</span></span></p>\r\n</p>', '', '', '', '', 'ser1_1');
INSERT INTO `ser` VALUES (5, '約翰人聚讀聚落讀書會', '　約翰人聚讀聚落讀書會--簡介', '', '', '', '', 'serS');
INSERT INTO `ser` VALUES (6, '預警輔導', '　預警輔導--簡介', '', '', '', '', 'serS');
INSERT INTO `ser` VALUES (7, '上課出席率競賽', '　上課出席率競賽--簡介', '', '', '', '', 'serS');
INSERT INTO `ser` VALUES (8, '學習診斷測驗', '　學習診斷測驗--簡介', '', '', '', '', 'serS');
INSERT INTO `ser` VALUES (11, '新增項目範例', '　新增項目簡介', '', '', '', '', 'ser');
INSERT INTO `ser` VALUES (15, NULL, '<p>&nbsp;<span style="color: rgb(192, 0, 0); font-family: 新細明體, serif; ">約翰人聚讀聚落讀書會a</span></p>\r\n<p class="MsoNormal" style="line-height: 12pt; "><span style="font-family: 標楷體; ">平常自己一個人沒什麼動力自發讀書，想找幾個同學，利用課餘時間，組一個讀書會，增強大家的學習動能。學資中心推動互動式分享與閱讀活動，深化學生自主學習動機，營造書香校園氛圍。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="line-height: 12pt; "><span lang="EN-US">&nbsp;</span></p>\r\n<p class="MsoNormal" style="margin-left: 18pt; text-indent: -18pt; line-height: 12pt; "><span style="font-family: 標楷體; ">☆自組讀書會申請：</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">選定閱讀書籍，揪團</span><span lang="EN-US">5-10</span><span style="font-family: 標楷體; ">人。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">推派一人或輪流擔任讀書會小組長。指導教授：可有可無。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">擬定「讀書會計畫書」，審核通過即可進行。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="line-height: 12pt; "><span style="font-family: 標楷體; ">☆讀書會運作方式：</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">讀書會聚會<b>至少</b></span><b><span lang="EN-US">6</span></b><b><span style="font-family: 標楷體; ">次</span></b><span style="font-family: 標楷體; ">，每次</span><span lang="EN-US">60</span><span style="font-family: 標楷體; ">分鐘。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">補助包含：教學材料費（書籍）、膳食費（餐點）、印刷費（講義</span><span lang="EN-US">/</span><span style="font-family: 標楷體; ">印刷</span><span lang="EN-US">/</span><span style="font-family: 標楷體; ">裝訂）、雜支（文具品項）。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">聚會時間（</span><u><span lang="EN-US">11:00-14:00</span></u><span style="font-family: 標楷體; ">、</span><u><span lang="EN-US">17:00-20:00</span></u><span style="font-family: 標楷體; ">）</span><span style="font-family: 標楷體; ">得申請膳食費補助；不得一次結用。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 35.45pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;</span></span><span style="font-family: 標楷體; background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">每週請款需具備<b><u>發票</u></b>或<b><u>收據</u></b>（<b>學校統編</b></span><b><span lang="EN-US" style="background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">37301400</span></b><span style="font-family: 標楷體; background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">）、<b><u>簽到</u></b></span><b><u><span lang="EN-US" style="background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">&amp;</span></u></b><b><u><span style="font-family: 標楷體; background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">記錄表</span></u></b><span style="font-family: 標楷體; background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">、當次<b><u>讀書會照片</u></b></span><span style="font-family: 標楷體; background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">。</span><span style="background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">&nbsp;</span><span style="font-family: 標楷體; background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; ">核銷書籍費用需另附<b><u>書籍簽領表</u></b>。</span><span lang="EN-US" style="background-color: rgb(217, 217, 217); background-position: initial initial; background-repeat: initial initial; "><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="line-height: 12pt; "><span style="font-family: 標楷體; ">☆讀書會大功告成：</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">推派代表參與期中期末組長會議，及引領人培訓。</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">每位成員填寫「活動滿意度調查表」（最後一次讀書會組長收齊繳回）</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; text-indent: -18pt; line-height: 12pt; "><span lang="EN-US" style="font-family: Wingdings; "><span style="font-size: 7pt; line-height: normal; font-family: ''Times New Roman''; ">&nbsp;●</span></span><span style="font-family: 標楷體; ">完成「成果報告書」（每位成員繳交</span><span lang="EN-US">300-500</span><span style="font-family: 標楷體; ">字心得，由組長彙整、撰寫）</span><span lang="EN-US"><o:p></o:p></span></p>\r\n<p class="MsoNormal" style="margin-left: 36pt; line-height: 12pt; "><span lang="EN-US">&nbsp;</span></p>\r\n<p class="MsoNormal" style="line-height: 12pt; "><span lang="EN-US">&nbsp;</span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; ">【相關表單下載】<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">讀書會經費編列注意事項<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件一<span lang="EN-US">...</span>讀書會計畫書&nbsp;<span lang="EN-US">(</span>自組讀書會申請時填寫<span lang="EN-US">)<o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件二<span lang="EN-US">...</span>書籍簽領表<span lang="EN-US">&nbsp;&nbsp; (</span>核銷書籍費用時需檢附<span lang="EN-US">)<o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件三<span lang="EN-US">...</span>簽到暨記錄表<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件四<span lang="EN-US">...</span>成果報告書<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件五<span lang="EN-US">...</span>期末滿意度調查問卷<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span lang="EN-US" style="font-family: 標楷體; color: blue; ">&nbsp;</span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; ">【讀書會<span lang="EN-US">(</span>各系<span lang="EN-US">)</span>】<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">各系執行讀書會建議流程與方法<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件一<span lang="EN-US">...</span>各組讀書會計畫書<span lang="EN-US">(</span>學生申請時填寫<span lang="EN-US">)<o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件二<span lang="EN-US">...</span>各組讀書會紀錄暨簽到表<span lang="EN-US">(</span>學生填寫，核銷時要檢附<span lang="EN-US">)<o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; ">【結案程序<span lang="EN-US">(</span>各系<span lang="EN-US">)</span>】<span lang="EN-US"><o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件三<span lang="EN-US">...</span>各組讀書會成果報告書<span lang="EN-US">(</span>學生填寫<span lang="EN-US">)<o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件四<span lang="EN-US">...</span>讀書會滿意度問卷<span lang="EN-US">(</span>學生填寫<span lang="EN-US">)<o:p></o:p></span></span></p>\r\n<p class="MsoNormal"><span style="font-family: 標楷體; color: blue; ">附件五<span lang="EN-US">...</span>讀書會量化數據統計報告<span lang="EN-US">(</span>承辦單位填寫<span lang="EN-US">)</span></span></p>\r\n<p>&nbsp;</p>', NULL, NULL, NULL, NULL, 'ser1_2');
INSERT INTO `ser` VALUES (16, '98-1', NULL, NULL, NULL, NULL, NULL, 'ser1_3');
INSERT INTO `ser` VALUES (18, 'MMa', 'ME', 'LL', 'TT', '04f11a58f3d909b', 'word測試.doc', '16');
INSERT INTO `ser` VALUES (20, 'aax', 'bb', 'cc', 'dd', '45790ddce17aeab', 'word測試.doc', '16');
INSERT INTO `ser` VALUES (24, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aa\r\naa\r\naa', 'aaaaa', 'aaa', '', '', '16');
INSERT INTO `ser` VALUES (25, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', '', '16');

-- --------------------------------------------------------

-- 
-- 資料表格式： `tvboard`
-- 

CREATE TABLE `tvboard` (
  `no` int(20) unsigned NOT NULL auto_increment,
  `_dir` varchar(30) default NULL,
  `_file` varchar(255) default NULL,
  `_size` varchar(255) default NULL,
  `_addDate` date default NULL,
  `_class` varchar(20) default NULL,
  `_order` smallint(5) default NULL,
  `_how` varchar(255) default NULL,
  `_ip` varchar(30) default NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='電視牆' AUTO_INCREMENT=58 ;

-- 
-- 列出以下資料庫的數據： `tvboard`
-- 

INSERT INTO `tvboard` VALUES (41, '263cbd98068f8ec', '136_1.jpg', '9458', '2012-07-16', 'index', 1, '', '127.0.0.1');
INSERT INTO `tvboard` VALUES (35, 'cc4bc37d4710d47', '136_4.jpg', '9786', '2012-06-30', 'index', 2, '', '127.0.0.1');
INSERT INTO `tvboard` VALUES (55, '7471d44151fea13', '113_16_調整大小.jpg', '25560', '2012-08-14', 'intro', 3, '文章下方的圖片—右上', '10.20.9.75');
INSERT INTO `tvboard` VALUES (57, 'cdbeeee82e42177', '113_15.jpg', '2116127', '2012-08-14', 'intro', 4, '文章下方的圖片—左下', '10.20.9.75');
INSERT INTO `tvboard` VALUES (56, '5d094079401bff3', 'DSC01199.JPG', '3165283', '2012-08-14', 'intro', 5, '文章下方的圖片—右下', '10.20.9.75');
INSERT INTO `tvboard` VALUES (53, '6eca750e564811f', 'DSC01189.JPG', '3549938', '2012-08-14', 'intro', 1, '文章右邊的圖片', '10.20.9.75');
INSERT INTO `tvboard` VALUES (54, '3ae0dcf89ce459d', '113_10_調整大小.jpg', '26149', '2012-08-14', 'intro', 2, '文章下方的圖片—左上', '10.20.9.75');
