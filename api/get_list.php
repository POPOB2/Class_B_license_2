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
// posts=$News變數執行all-function([''])???????????????
$posts=$News->all(['type'=>$type]);

foreach($posts as $post){
    
}
?>