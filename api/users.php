<?php

include_once "../base.php";

$users=$User->all();
foreach($users as $user){ 
    if($user['acc']!=='admin'){ // 當acc內容不為admin時 顯示acc資料 (隱藏admin)
        echo "<tr>";
        echo "<td>{$user['acc']}</td>";
        echo "<td>".str_repeat("*",strlen($user['pw']))."</td>"; // 字串取代為("*", 長度為$user的pw)
        echo "<td>";
        echo "<input type='checkbox' name='del[]' value='{$user['id']}'>"; // del傳到後台後 陣列有幾個 就刪那幾個
        echo "</td>";
        echo "</tr>";
    }
}
?>