<!--
// JavaScript Document
$(document).ready(function(){
	//電視牆、手頁、留言板跑馬燈
		$(window).load(function(){
			$('#TV').orbit();
		//服務項目讀書會首頁
			$('#ser1_1Btn').click();
		//ser1_3首頁 (服務項目子項1按鈕3
			$('.ser1_3Age').first().click();
		//刷新後頁面位置
			a=window.location.toString().split('?')[1];//網址?後
			switch(a){//該在哪頁
				case 'mes'://留言板
					$('#Message').click();
					break;
				case 'intro'://介紹
					$('#Introductions').click();
					break;
				case 'intro1'://介紹1
					$('#IntroductionsSon1').click();
					break;
				case 'intro2'://介紹2
					$('#IntroductionsSon2').click();
					break;
				case 'intro3'://介紹3
					$('#IntroductionsSon3').click();
					break;
				case 'ser'://服務
					$('#Service').click();
					break;
				case 'ser1': case 'ser1_1'://服務1
					$('#ServiceSon1').click();
					break;
				case 'ser1_2'://服務1_2
					$('#ServiceSon1').click();
					$('#ser1_2Btn').click();
					break;
				case 'ser1_3'://服務1_3
					$('#ServiceSon1').click();
					$('#ser1_3Btn').click();
					break;
				case 'ser2'://服務2
					$('#ServiceSon2').click();
					break;
				case 'ser3'://服務3
					$('#ServiceSon3').click();
					break;
				case 'ser4'://服務4
					$('#ServiceSon4').click();
					break;
				case 'res'://學習區
					$('#Resources').click();
					break;
				case 'res1'://學習區1
					$('#ResourcesSon1').click();
					break;
				case 'res2'://學習區2
					$('#ResourcesSon2').click();
					break;
				case 'act'://活動
					$('#Activities').click();
					break;
				case 'dow'://下載
					$('#Downloads').click();
					break;
				case 'met'://辦法
					$('#Methods').click();
					break;
				default:
					$('#News').click();//首頁
			}
		//留言板跑馬燈
			var speed=15;//越小越快
			var timer;//接收setInterval的值
			var i=0;//捲軸
			$('#MesLite2').get(0).innerHTML = $('#MesLite1').get(0).innerHTML ;//複製
			$('#MesLite3').get(0).innerHTML = $('#MesLite1').get(0).innerHTML ;//複製
			function _marquee(){//跑馬燈
				$('#MesLite').css('margin-left',i+'px');
				if(i<($('#MesLite1').get(0).offsetWidth)*-1)//實際寬超過卷軸
					i=0;
				else
					i--;
			}
			timer=setInterval(_marquee,speed);//運行
			$('#MesTop').mouseenter(function(){//滑鼠移入停止
				clearInterval(timer);
			}).mouseleave(function(){//移出繼續
				timer=setInterval(_marquee,speed);
			});
		});
	//左右鍵換頁
		document.onkeydown=mm;//改onkeydown的定義
		function mm(evt){//firefox可用需要
			if(evt.keyCode=='37'){//左鍵
				if(c=='News')
					$('.NewsUD[name=up]').click();
				else if(c=='Message')
					$('.MesUD[name=up]').click();
				else if(c=='Activities')
					$('.ActUD[name=up]').click();
			}else if(evt.keyCode=='39'){//右鍵
				if(c=='News')
					$('.NewsUD[name=down]').click();
				else if(c=='Message')
					$('.MesUD[name=down]').click();
				else if(c=='Activities')
					$('.ActUD[name=down]').click();
			}else if(evt.keyCode=='38' || evt.keyCode=='40'){//上鍵下鍵
				if(c=='News')
					NewsPage(evt.keyCode);
				else if(c=='Message')
					MesPage(evt.keyCode);
				else if(c=='Activities')
					ActPage(evt.keyCode);
			}
		}
	//TOP超連結
		target("#HF_011","http://www.sju.edu.tw/");
		target("#HF_013","http://sta.sju.edu.tw/bin/home.php");
		$('#HF_02').add('#HF_03').click(function(){
			location.href='../studentlearn';
		});
	//LEFT超連結
		target("#LeftLink01","http://tep.sju.edu.tw/");//教卓
		target("#LeftLink02","http://ttlrc.sju.edu.tw/teacher_center/");//教資
		target("#LeftLink03","http://career.sju.edu.tw/Career/");//職資
		target("#LeftLink04","http://www.dac.sju.edu.tw/");//數位藝文中心
	//選單切頁
		var fatherOff=0;//不觸發母項開關
		$('.selector').add('.LeftSelector').click(function(){
			if(fatherOff==0){
				$('.All').hide();//全隱藏
				c=$(this).attr("id");
				$('#'+c+'All').show("fast");
			}
			fatherOff=0;
		});
	//子項切頁
		$('.IntroductionsSon').add('.ServiceSon').add('.ActivitiesSon').add('.ResourcesSon').click(function(){
			$('.All').hide();//全隱藏
			c=$(this).attr("id");
			$('#'+c+'All').show("fast");
			fatherOff=1;
		});
	//子選單滑鼠移入移出動畫
		$('.selector').mouseenter(function(){
			a=$(this).attr("id");
			$('#'+a+'Son').fadeIn('fast');
		}).mouseleave(function(){
			a=$(this).attr("id");
			$('#'+a+'Son').hide();
		});
	//NEWS新增文章
		newWindow1('.NewsAdd','window.php?aa=1');
	//NEWS開視窗看文章&搜索時間
		$('.NewsTd').click(function(){
			a=$(this).attr('name');
			b=$(this).attr('id');
			if(b=='L'){//時間
				MM_openBrWindow('window.php?b=2&t=_addDate&v='+a);
			}else{//文章
				MM_openBrWindow('window.php?b=1&no='+a);
			}
		});
	//修改中心介紹
		newWindow1('.InEdit','window.php?aa=7');
		newWindow1('.InEdit1','window.php?aa=8');
		$('.InEdit2').click(function(){
			a=$(this).attr('id');
			b=$(this).attr('name');
			MM_openBrWindow('window.php?aa=12&t1='+a+'&t2='+b);
		});
		newWindow1('.InEdit3','window.php?aa=9');
	//服務項目編輯
		$('.serEdit').click(function(){
			a=$(this).attr('name');
			if(a=='ser1')
				a='ser1_'+ser1Edit;//讀書會的哪一頁
			MM_openBrWindow('window.php?aa=2&t='+a);
		});
	//服務項目點標題換頁
		$('.serUp').click(function(){
			a=$(this).attr('name');
			$('#ServiceSon'+a).click();
		});
	//服務項目修改簡介&新增簡介
		$('.serEdit2').click(function(){
			a=$(this).attr('name');
			if(a=='ser')
				MM_openBrWindow('window.php?aa=15&t=2');
			else
				MM_openBrWindow('window.php?aa=15&no='+a+'&t=1');
		});
		$('.serEdit3').click(function(){//可刪的
			a=$(this).attr('name');
			MM_openBrWindow('window.php?aa=15&no='+a+'&t=3');
		});
	//服務項目讀書會換頁
		$('.ser1TopSelect').click(function(){
			ser1Edit=$(this).attr('name');//取得編號
			//改CSS
			$('.ser1TopSelect').attr('style','');
			$(this).attr('style','background:url(img/ser1_btn'+ser1Edit+'_1.png) no-repeat; background-position:center center;');
			//換頁
			$('.serAll').hide();//全隱藏
			$('#ser1Main'+ser1Edit).fadeIn();
		});

	//服務項目讀書會成果發表點年度
		$('.ser1_3Age').click(function(){
			a=$(this).attr('name')//年度的no
			$('.ser1_3Age').css('color','#000')//CSS字色消除
			$(this).css('color','#33D');//上字色
			/*$.ajax({//ajax
				type: "POST",
				url: 'ajax.php?aa=1',
				data: 'no='+a,
				dataType: "html",
				processData: false,
				success: function(html_content){
					$('#ser1_3Main').hide();
					$('#ser1_3Main').html(html_content);					
					$('#ser1_3Main').fadeIn();
				}
			});*/
			$('#ser1_3Main').hide();
			$('#ser1_3Main').load('ajax.php?aa=1&no='+a+'&rad='+Math.random());
			$('#ser1_3Main').fadeIn();
		});
	//學習資源修改
		$('.ResEdit').click(function(){
			a=$(this).attr('name');
			MM_openBrWindow('window.php?aa=13&t='+a);
		});
	//NEWS換頁
		var nowpage=1;
		$('.NewsTotal').click(function(){
			$('.NewsMain').hide();//全隱藏
			$('.NewsTotal[name='+nowpage+']').css({color:'#ff7E00',fontSize:'16px'});//css復原
			nowpage=$(this).attr("name");
			$('.NewsMain[name=NewsP'+nowpage+']').fadeIn();
			$(this).css({color:'#229',fontSize:'18px'});
		});
		$('.NewsMain[name=NewsP'+nowpage+']').fadeIn();
		$('.NewsTotal[name='+nowpage+']').css({color:'#229',fontSize:'18px'});
		//上下頁
		$('.NewsUD').click(function(){
			var cc=0;//防止過度換頁
			$('.NewsTotal[name='+nowpage+']').css({color:'#ff7E00',fontSize:'16px'});//css復原
			b=$(this).attr('name');
			if(b=='up'){
				nowpage--;
				if(nowpage<1){
					nowpage=1; cc=1;
				}
			}else if(b=='down'){
				nowpage++;
				if(nowpage>($('.NewsMain').length)){
					nowpage=($('.NewsMain').length); cc=1;
				}
			}
			if(cc==1){//過度換頁
			}else{
				$('.NewsMain').hide();
				$('.NewsMain[name=NewsP'+nowpage+']').fadeIn();
			}
			$('.NewsTotal[name='+nowpage+']').css({color:'#229',fontSize:'18px'});
		});
		//8頁移動(上下鍵)
		function NewsPage(K){
			$('.NewsTotal[name='+nowpage+']').css({color:'#ff7E00',fontSize:'16px'});//css復原
			if(K=='38'){//上
				if(nowpage!=1){//不是第一頁
					nowpage-=8;
					if(nowpage<1){
						nowpage=1;
					}
					$('.NewsMain').hide();
					$('.NewsMain[name=NewsP'+nowpage+']').fadeIn();
				}
			}else if(K=='40'){//下
				if(nowpage!=($('.NewsMain').length)){//不是末頁
					nowpage+=8;
					if(nowpage>($('.NewsMain').length)){
						nowpage=($('.NewsMain').length); cc=1;
					}
					$('.NewsMain').hide();
					$('.NewsMain[name=NewsP'+nowpage+']').fadeIn();
				}
			}
			$('.NewsTotal[name='+nowpage+']').css({color:'#229',fontSize:'18px'});
		}
		//換頁裝飾(左右鍵提醒)
		$('.PageBottom').mouseenter(function(){
			a=$(this).attr('id');
			$('.'+a+'1').fadeIn();
		}).mouseleave(function(){
			a=$(this).attr('id');
			$('.'+a+'1').fadeOut();
		});
	//活動集錦換頁
		var nowpageA=1;
		$('.ActTotal').click(function(){
			$('.ActMain').hide();//全隱藏
			$('.ActTotal[name='+nowpageA+']').css({color:'#ff7E00',fontSize:'16px'});//css復原
			nowpageA=$(this).attr("name");
			$('.ActMain[name=ActP'+nowpageA+']').fadeIn();
			$(this).css({color:'#229',fontSize:'18px'});
		});
		$('.ActMain[name=ActP'+nowpageA+']').fadeIn();
		$('.ActTotal[name='+nowpageA+']').css({color:'#229',fontSize:'18px'});
		//上下頁
		$('.ActUD').click(function(){
			var cc=0;//防止過度換頁
			$('.ActTotal[name='+nowpageA+']').css({color:'#ff7E00',fontSize:'16px'});//css復原
			b=$(this).attr('name');
			if(b=='up'){
				nowpageA--;
				if(nowpageA<1){
					nowpageA=1; cc=1;
				}
			}else if(b=='down'){
				nowpageA++;
				if(nowpageA>($('.ActMain').length)){
					nowpageA=($('.ActMain').length); cc=1;
				}
			}
			if(cc==1){//過度換頁
			}else{
				$('.ActMain').hide();
				$('.ActMain[name=ActP'+nowpageA+']').fadeIn();
			}
			$('.ActTotal[name='+nowpageA+']').css({color:'#229',fontSize:'18px'});
		});
		//8頁移動(上下鍵)
		function ActPage(K){
			$('.ActTotal[name='+nowpageA+']').css({color:'#ff7E00',fontSize:'16px'});//css復原
			if(K=='38'){//上
				if(nowpageA!=1){//不是第一頁
					nowpageA-=8;
					if(nowpageA<1){
						nowpageA=1;
					}
					$('.ActMain').hide();
					$('.ActMain[name=ActP'+nowpageA+']').fadeIn();
				}
			}else if(K=='40'){//下
				if(nowpageA!=($('.ActMain').length)){//不是末頁
					nowpageA+=8;
					if(nowpageA>($('.ActMain').length)){
						nowpageA=($('.ActMain').length); cc=1;
					}
					$('.ActMain').hide();
					$('.ActMain[name=ActP'+nowpageA+']').fadeIn();
				}
			}
			$('.ActTotal[name='+nowpageA+']').css({color:'#229',fontSize:'18px'});
		}
	//活動集錦點標題
		$('.ActTi').click(function(){
			a=$(this).attr('name');
			MM_openBrWindow('window.php?b=6&no='+a);
		});
	//活動集錦新增
		newWindow1('.ActEdit','window.php?aa=4');
	//留言板換頁
		var nowpageM=1;
		$('.MesTotal').click(function(){
			$('.MesMain').hide();//全隱藏
			$('.MesTotal[name='+nowpageM+']').css({color:'#ff7E00',fontSize:'16px'});//css復原
			nowpageM=$(this).attr("name");
			$('.MesMain[name=MesP'+nowpageM+']').fadeIn();
			$(this).css({color:'#229',fontSize:'18px'});
		});
		$('.MesMain[name=MesP'+nowpageM+']').fadeIn();
		$('.MesTotal[name='+nowpageM+']').css({color:'#229',fontSize:'18px'});
		//上下頁
		$('.MesUD').click(function(){
			var cc=0;//防止過度換頁
			$('.MesTotal[name='+nowpageM+']').css({color:'#ff7E00',fontSize:'16px'});//css復原
			b=$(this).attr('name');
			if(b=='up'){
				nowpageM--;
				if(nowpageM<1){
					nowpageM=1; cc=1;
				}
			}else if(b=='down'){
				nowpageM++;
				if(nowpageM>($('.MesMain').length)){
					nowpageM=($('.MesMain').length); cc=1;
				}
			}
			if(cc==1){//過度換頁
			}else{
				$('.MesMain').hide();
				$('.MesMain[name=MesP'+nowpageM+']').fadeIn();
			}
			$('.MesTotal[name='+nowpageM+']').css({color:'#229',fontSize:'18px'});
		});
		//8頁移動(上下鍵)
		function MesPage(K){
			$('.MesTotal[name='+nowpageM+']').css({color:'#ff7E00',fontSize:'16px'});//css復原
			if(K=='38'){//上
				if(nowpageM!=1){//不是第一頁
					nowpageM-=8;
					if(nowpageM<1){
						nowpageM=1;
					}
					$('.MesMain').hide();
					$('.MesMain[name=MesP'+nowpageM+']').fadeIn();
				}
			}else if(K=='40'){//下
				if(nowpageM!=($('.MesMain').length)){//不是末頁
					nowpageM+=8;
					if(nowpageM>($('.MesMain').length)){
						nowpageM=($('.MesMain').length); cc=1;
					}
					$('.MesMain').hide();
					$('.MesMain[name=MesP'+nowpageM+']').fadeIn();
				}
			}
			$('.MesTotal[name='+nowpageM+']').css({color:'#229',fontSize:'18px'});
		}
	//留言板跑馬燈修改
		$('.MesTxEdit').click(function(){
			a=$('#MesTx').get(0).innerHTML;
			if(a=prompt('請輸入內容', a))
				location.href='action.php?aa=2&tx='+a;
		});
	//留言板點標題
		$('.MeMain').click(function(){
			a=$(this).attr('name');
			MM_openBrWindow('window.php?b=3&no='+a);
		});
	//留言板新增留言
		newWindow1('.MesAdd','window.php?b=4');
	//表單下載頂端DIV
		$('.dowTi').mouseenter(function(){
			a=$(this).attr('name');
			$('#DowTopDiv').html(a);//賦值
		});
	//表單下載點標題
		$('.dowTi').click(function(){
			a=$(this).attr('id');//dir
			b=$(this).attr('title');//file
			window.open('files/downloads/'+a+'/'+b);
		});
	//表單下載新增
		newWindow1('.dowAdd','window.php?aa=5&t=1');
	//表單下載修改、刪除
		$('.dowEdit').click(function(){
			a=$(this).attr('name');//no
			MM_openBrWindow('window.php?aa=5&no='+a+'&t=2');
		});
	//相關辦法點標題
		$('.metLook').click(function(){
			a=$(this).attr('name');
			MM_openBrWindow('window.php?b=5&no='+a);
		});
	//相關辦法新增
		newWindow1('.MetEdit','window.php?aa=10');
	//函數庫
	function target(id,link){/*超連結開新視窗*/
		$(id).click(function(){
			window.open(link);
		});
	}
	function newWindow1(id,url){//點後開新視窗
		$(id).click(function(){
			MM_openBrWindow(url);
		});
	}
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