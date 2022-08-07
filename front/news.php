<fieldset>
    <legend>目前位置:首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td width="30%">標題</td>
            <td width="50%">內容</td>
            <td width="20%">人氣</td>
        </tr>
        <!-- 這裡開始用php從後台撈資料 -->
        <?php
        // 計算(條件1.計算方式, 條件2.要計算的地方, 條件3.要計算的地方的要被計算的內容)
        $all=$News->math('count','id',['sh'=>1]);  // 把DB用math計算('算加總幾個','要計算的欄位',['條件2的sh欄位顯示為1的內容']) 算出總共幾筆為顯示
        $div=5; // 幾筆一頁, 5筆分一頁
        $pages=ceil($all/$div); // 計算出總頁數(總顯示數 除 5筆一頁==總共有幾頁)
        $now=$_GET['p']??1; // 作為當前頁的變數=為GET到的['p'] 若沒有p則從1開始算
        $start=($now-1)*$div; // 有了總頁數 跟顯示幾頁 現在設定start作業 從哪一頁開始撈資料
        

        // 所有顯示的文章中符合條件的五筆, 條件為:limit==限制, 從$start這筆資料開始抓, 抓$div的5筆資料
        $rows=$News->all(['sh'=>1], "limit $start,$div"); // 把DB用all尋找所有(['顯示'值為1])的文章
        // 使用foreach把找到的五筆, 用陣列中的內容填入到下列的標題 內容 人氣等選項
        foreach($rows as $row){
        ?>
        <tr>
            <td><?=$row['title'];?></td><!-- 顯示$row的標題title -->
            <td><?=mb_substr($row['text'],0,20);?>...</td> <!-- 顯示$row的內容text, 由於題目只顯示部分文字,所以用mb_substr()來顯示一定的字數 -->
            <!-- mb_substr(條件1.要顯示的內容, 條件2.該內容從第幾字開始, 條件3.顯示幾個字元) -->
            <td>人氣</td>
        </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <?php
        // 頁碼 ($i為第幾筆資料)
        for($i=1; $i<=$pages; $i++){
            $fontsize=($now==$i)?'24px':'18px';  // $fontsize為($當前頁 為 $i時)設定為24px 為否時 18px; 用於下列文字大小
            echo "<a href='?do=news&p={$i}' style='font-size:{$fontsize}'> $i </a>"; // 顯示a標籤內容為$i(所在的5筆內), 連結為當前頁&所在頁為$i, 
        }
        ?>
    </div>
</fieldset>