<?php
include_once "../base.php";
// POST傳進來的acc
// $acc=$_POST['acc'];
// echo $User->math('count','id',['acc'=>$acc]); // 回傳1或0

// 上述兩行可以縮到下述一行
// echo $User->math('count','id',['acc'=>$_POST['acc']]);

// 因註冊檢查使用get所以這裡需要改成get
$acc=$_POST['acc']??$_GET['acc'];
echo $User->math('count','id',['acc'=>$acc]);
?>