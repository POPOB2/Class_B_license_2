<?php

include_once "../base.php";

if(!empty($_POST['subject'])){
    $Que->save(['text'=>$_POST['subject'],'count'=>0,'subject_id'=>0]);

    $subject_id=$Que->find(['text'=>$_POST['subject']])['id'];
    
    if(!empty($_POST['option'])){
        foreach($_POST['option'] as $opt){
            // 先把主題寫進資料庫 在拿出主題的id ....漏寫7/29-16:20... 附上他主題的id
            $Que->save(['text'=>$opt,'count'=>0,'subject_id'=>$subject_id]);
        }
    }
}





to("../back.php?do=que");
?>