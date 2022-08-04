<?php
include_once "../base.php";

// $array['健康新知']=1;
// $array['菸害防制']=2;
// $array['癌症防治']=3;
// $array['慢性病防治']=4;

// 設置陣列  放文章列表, 這裡把字串和數字寫法 , 讓傳進來的參數變成key值 => 後面的數字變成陣列元素的值
$array=["健康新知"=>"1","菸害防制"=>"2","癌症防治"=>"3","慢性病防治"=>"4"];
// type改為從陣列資料撈的值 , $type=從$array陣列拿到[GET進來的[值]]
$type=$array[$_GET['type']];
// rows=$News變數執行all-function(['獲得的type值' 為 $type值(news資料表的type值) ])
$rows=$News->all(['type'=>$type]);

foreach($rows as $row){ // rows(news資料表的type值)  轉到  $row
    // 當該連結被點時, 執行js的get拿 變數News的(文章的id)
    echo "<a href='javascript:getNews({$row['id']})' style='display:block'>"; // 設置block 使a標籤內容換行
    echo $row['title']; // 會把news資料表的type值對應到的title欄的內容顯示出來
    echo "</a>";
}
?>