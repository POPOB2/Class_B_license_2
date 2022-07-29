<?php
include_once "../base.php";

$a=['acc'=>$_POST['acc'],'pw'=>$_POST['pw'],'email'=>$_POST['email']];
// 等於
$a=['acc'=>$_POST['acc']];
// 等於
$a['acc']=$_POST['acc'];
// 等於
$_POST['acc']="某某某";


$User->save(['acc'=>$_POST['acc'],'pw'=>$_POST['pw'],'email'=>$_POST['email']]); // 可執行, 但容易因一個字或字元或格式錯誤 就產生問題
// $_POST 此時是一個陣列, 上述框號內的內容為 $_POST是一個陣列 這裡指定儲存acc的POST的acc等資訊
// 
unset($_POST['pw2']); // 使用unset清除 名為$_POST的陣列中的 pw2的內容
$User->save($_POST); // 使用save將 名為$_POST的陣列 儲存到資料庫

?>