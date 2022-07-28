<?php
include_once "../base.php";

// 在acc檢查後面加上 ,'pw'=>$_POST['pw'] , 並賦值給$chk
$chk=$User->math('count','id',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

if($chk){
    $_SESSION['user']=$_POST['acc']; // 登入成功在後台留下一個SESSION紀錄, 後續的功能使用該SESSION來做使用
    echo 1;
}else{
    echo 0; 
}
?>