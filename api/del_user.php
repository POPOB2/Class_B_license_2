<?php

include_once "../base.php";

// $_POST['del']=[2,3,4,]; // 傳回後刪掉 所以把該陣列foreach

if(!empty($_POST['del'])){ // POST的del不為空時
    foreach($_POST['del'] as $id){ // 使用foreach把POST的del值 循序塞給$id
        $User->del($id); // $User物件執行del函式(刪除的id)
    }
}



?>