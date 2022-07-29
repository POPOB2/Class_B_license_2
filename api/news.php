<?php
include_once "../base.php";

if(isset($_POST['del'])){ // 若它存在 表示有資料要被刪除
    foreach($_POST['del'] as $id){ // 這些資料是要刪除的
        $News->del($id);
    }
}

$rows=$News->all(); // 先拿出所有資料

foreach($rows as $row){ // 一筆一筆檢查 檢查id有無傳回 有的話顯示 沒有的話不顯示
    if(in_array($row['id'],$_POST['sh'])){ // 檢查該陣列row內的id 有無在POST內的sh
        $row['sh']=1; // 若有設為1  若無設為0
    }else{
        $row['sh']=0;
    }

    $News->save($row);
}
to("../back.php?do=news");
?>