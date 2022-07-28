<?php
include_once "../base.php";
// POST傳進來的acc
// $acc=$_POST['acc'];
// echo $User->math('count','id',['acc'=>$acc]); // 回傳1或0

// 上述兩行可以縮到下述一行
echo $User->math('count','id',['acc'=>$_POST['acc']]);

?>