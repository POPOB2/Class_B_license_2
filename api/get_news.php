<?php
include_once "../base.php";


// 設置陣列  放文章列表, 這裡把字串和數字寫法 , 讓傳進來的參數變成key值 => 後面的數字變成陣列元素的值
// $array=["健康新知"=>"1","菸害防制"=>"2","癌症防治"=>"3","慢性病防治"=>"4"];


// $id=[GET到的[id]]
$id=$_GET['id'];
// 用find查DB new的單筆資料(查上述的GET到的該筆id)
$news=$News->find($id);

echo $news['text']; // 將$news(news表)的[text欄]的內容, 用上述的GET到的該筆id去找到它

// echo nl2br($news['text']);  // nl2br簡易排版 斷行
/* 非考題需求的調整 排版 : 用PHP的function的 nl2br(內容) ,
   即newline too br 把該檔案windows斷行符號(newline) 轉換成網頁再用的<br>進行斷行 */


// 上述三行縮寫成一行---------------------------------------------------------------------------------
// echo $News->find($_GET['id'])['text'];
// 印出 從DB new 查單筆(從前台GET到的id) [該id的text內容]
?>