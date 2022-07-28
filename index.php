<!-- 載入base檔 -->
<?php  include_once "base.php" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>健康促進網</title>
<link href="./css/css.css" rel="stylesheet" type="text/css">
<script src="./js/jquery-3.4.1.min.js"></script>
<script src="./js/js.js"></script>
</head>

<body>
<div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
	<pre id="ssaa"></pre>
</div>
<!-- 這段不要了 -->
<!-- <iframe name="back" style="display:none;"></iframe> -->
	<div id="all">
    	<div id="title">
			<!-- 00 月 00 號 Tuesday | 今日瀏覽: 1 | 累積瀏覽: 36        </div> -->
			<!-- 把上面日期部分刪掉,改寫成下述, 用php的date帶入 -->
			<!-- 今日瀏覽和累積瀏覽內容改為下述 13:08 ~ 13:38 -->
        <?=date("m 月 d 號 l ");?> | 今日瀏覽: <?=$Total->find(['date'=>date("Y-m-d")])['total']; ?> | 累積瀏覽:<?=$Total->math('sum','total');?>
		<a href="index.php" style="float:right">回首頁</a><!-- 新增一個回首頁標籤, 使用float浮於右上角, 此時下面的QRCODE會被推出去,可以不解決 也可以放大後面的背景區塊讓QRCODE吃進背景 -->
		<!-- F12 id為mm的div min-height改為固定高度530px class為hal id為lef和main的改為530px 以上從CSS更改 -->
		</div>
        <div id="title2">
			<!-- 上述改寫成下述 -->
        <div id="title2" title="健康促進網=回首頁" onclick="location.href=index.php">
			<!-- 1.新增主圖片 2.把上面的title2更改 -->
        	<img src="./icon/02B01.jpg" alt="">
        </div>
        <div id="mm">
        	<div class="hal" id="lef">
            	                	    	<a class="blo" href="?do=po">分類網誌</a>
               	                     	    <a class="blo" href="?do=news">最新文章</a>
               	                     	    <a class="blo" href="?do=pop">人氣文章</a>
               	                     	    <a class="blo" href="?do=know">講座訊息</a>
               	                     	    <a class="blo" href="?do=que">問卷調查</a>
               	                </div>
            <div class="hal" id="main">
            	<div>
					<!-- 把下面span18%複製上來改改成marquee80% 不要用82%  因為要保留margin等空間 -->
					<marquee style="width:80%; display:inline-block;">
						跑馬燈內容(見題本)
					</marquee>
            		<!-- 右手邊登入按鈕, 占了18% 所以得知另一塊能用的可以到82% -->
                	<span style="width:18%; display:inline-block;">


					<!-- 把<a href="?do=login">會員登入</a>用SESSION增加判斷式區分 登入登出 -->
					<?php
					if(isset($_SESSION['user'])){ // 有登入資料時顯示
						if($_SESSION['user']==='admin'){
						?>
						歡迎<?=$_SESSION['user'];?>
						<button onclick="location.href='back.php'">管理</button>
						<button onclick="logout()">登出</button>
						<?php
						}else{
						?>
						歡迎<?=$_SESSION['user'];?>
						<button onclick="logout()">登出</button>
						<?php
						}
						}else{
						?>
						<a href="?do=login">會員登入</a>
						<?php
						}
						?>
						
                    	                    	
                    	</span>
						<!-- 挖空的class原本用於js.js內的lo-function 但難用 不要用 -->
                    	<div class="">
						<!-- 直接把上述空class改寫成下述+content -->
                    	<div class="content">
							<?php
								// 關於??的用法如下---------------------------------------
								// if(isset($_GET['do'])){
								// 	$do=$_GET['do'];
								// }else{
								// 	$do='main';
								// }
								// 等同於下述---------------------------------------------
								// $do=isset($_GET['do'])?$_GET['do']:'main';
								// 等同於下述---------------------------------------------
								// $do=$_GET['do']??'main';


								$do=$_GET['do']??'main';// 若有做什麼  若無做什麼
								$file='./front/'.$do.".php";
								// 若該$file存在 就把該$file載入
								if(file_exists($file)){
									include $file;
								}else{
									include "./front/main.php"; // 若不存在 載入另一個寫好的頁面
								}
								// 這裡做完這塊之後將index.php複製一份改為back.php 並在back和front資料夾產生對應的main.php
							?>
                		                        </div>
                </div>
            </div>
        </div>
        <div id="bottom">
    	    本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2012健康促進網社群平台 All Right Reserved 
    		 <br>
    		 服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
        </div>
    </div>

</body></html>