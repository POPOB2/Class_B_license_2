<?php

include_once "../base.php";
$user=$User->find(['email'=>$_GET['email']]); // 如果是拿到這筆資料 代表一個陣列, 若無資料 代表拿到一個空陣列==沒拿到資料
// 若不為空陣列 表示有內容
if(!empty($user)){
    echo "您的密碼為:".$user['pw'];
}else{
    echo "查無此資料";
}


?>