<form action="./api/news.php" method="post">
<!-- table.tab.cent>tr*2 -->
<table class="tab cent ct">
<!-- <table class="width:80%; margin:auto; text-align:center"> -->
    <tr>
        <th width="10%">編號</th>
        <th width="70%">標題</th>
        <th width="10%">顯示</th>
        <th width="10%">刪除</th>
    </tr>
    <?php
    // 分頁功能
    // 這裡的$News 為base.php的DB(資料表)
    $all=$News->math('count','id'); // 紀錄資料表內的總筆數(假設id有10, 代表總筆數為10)
    $div=3; // 一頁幾筆
    $pages=ceil($all/$div); // 頁數=計算(總比數  除  一頁幾筆)
    $now=$_GET['p']??1; // 辨識自己在哪一頁 預設從1開始
    $start=($now-1)*$div; // 開始頁=(現在頁數-1)乘3
    $rows=$News->all(" limit $start ,$div"); 
    // rows(陣列)=在該DB資料表使用all-function(條件) 找出全部資料, 再由下方foreach把資料吐出來
    // rows=顯示哪些資料, limit=指定顯示的欄位數 第一個值=從哪開始 第二個值=顯示幾筆
    // $rows=$News從索引值開始抓(一頁3筆) // 15:02 


    foreach($rows as $key=>$row){
    ?>
    <tr>
        
        <!-- <td> < ?=$key+1;?> </td>  調整為下述-->
        <td> <?=$key-2+$key;?> </td>
        <td> <?=$row['title'];?> </td>
        <td> <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?> > </td>
        <td> <input type="checkbox" name="del[]" value="<?=$row['id'];?>"> </td>
        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
    </tr>
    <?php
    }
    ?>
</table>
<!-- 分頁頁碼與符號 -->
<div class="ct">
<?php
// 上一頁
if(($now-1)>0){
    echo "<a href='?do=news&p=".($now-1)."'> < </a>";
}
// 頁碼
for($i=1;$i<=$pages;$i++){
    $fontsize=($now==$i)?'24px':'16px';
    echo "<a href='?do=news&p=$i' style='font-size:$$fontsize'>";
    echo $i;
    echo "</a>";
}
// 下一頁
if(($now+1)<=$pages){
    echo "<a href='?do=news&p=".($now+1)."'> > </a>";
}

?>
<!-- 分頁頁碼與符號 END -->


</div>

<div class="ct"><input type="submit" value="確定修改"></div>

</form>
