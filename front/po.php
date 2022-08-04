<!-- 分類網誌 -->
<style>
    .type{
        cursor: pointer; /* 游標:手指 */ 
        color: blue;
        margin: 1rem 0 ;
        /* padding-bottom: 0.5rem; */
        max-width: max-content;
    }
    .type:hover{
        /* 都可以用 */
        /* 線離文字近 */
        /* text-decoration: underline; */
        /* 線比文字長, 在上方type新增max-width讓線的長度為文字內容最大長度 */
        border-bottom:  1px solid blue;
        
    }
</style>

<div>目前位置 : 首頁 > 分類網誌 > <span id="header">健康新知</span></div>
<!-- fieldset 帶有block屬性 所以兩個fieldset會產生斷行效果, 為使fieldset並排有兩種方法1.改為inline 2.賦予寬度 -->
<!-- 這裡我們新增div包覆legend並賦予display:flex使他並排 -->
<div style="display:flex">
<fieldset style="width:20%"> <!-- 使用百分比設定寬度, 避免文字過多產生邊框尺寸被擠壓的狀況 -->
    <legend>分類網誌</legend>
    <div class="type">健康新知</div>
    <div class="type">菸害防制</div>
    <div class="type">癌症防治</div>
    <div class="type">慢性病防治</div>
</fieldset>
<fieldset style="width:80%"> <!-- 使用百分比設定寬度, 避免文字過多產生邊框尺寸被擠壓的狀況 -->
    <legend>文章列表</legend>
    <div id="content"></div>
</fieldset>
</div>

<script>
// 畫面一載入就去撈'健康新知'項目的內容 , 把健康新知的內容寫死 作為預設po.php的預設內容
getList('健康新知'); 


    // 設置("class:type")被開啟("開啟方式為click", 執行function){}
    $(".type").on("click",function(){
        // this=當下按的那個標籤, 因為type有很多 這裡使用this來定位是哪個type被點擊
        // 當上面class:type被點的時候,  要拿到被點的type的文字內容
        let type=$(this).text()
        /* 把this取得的type的text 
           放到 "id:header" 的text(type) <=這玩意兒在最上面的span*/
        $("#header").text(type);
        // console.log(type);


        // 讓後台可以拿到該分類的所有文章列表
        getList(type); // click時拿到該type(參數)的文章列表
    })
    // 拿到文章列表的function
    function getList(type){
        $.get("./api/get_list.php",{type},(list)=>{ // 用get取得(該路徑的資料),{用區域變數type給資料},(把type拿到的資料參數給list)給予=>{
            $("#content").html(list) // 將拿到的文章列表放到(id:content)的div區塊內 // 這段看不太懂??????????????????????????????
        }) 
    }

    // 後端api/get_list.php產生的東西, 在前端產生
    function getNews(id){
        $.get("./api/get_news.php",{id},(news)=>{ // 用get到("路徑" , {查找該id} , (把該id的news內容給予)=>{
            $("#content").html(news) // 把上面news拿到的內容放到(id"content")的標籤內    // .html(news)可以解釋為: 覆蓋掉原標籤內容(要做為覆蓋物的內容)
        })
    }
    /* 流程: 把65行的id丟給 路徑指定的後台頁 的$id, 從後台頁的$id作為條件 用find取得資料, 再後台把該資料的[text]的內容echo出來
       而在後台要ceho的內容 , 會透過AJAX 回傳給該前端頁的(news)65行, 再把該news內容放到id:content的標籤內 */

    /* 在解說: 
        function get名稱(用於計算,在後台被作為變數使用的名稱){
        $.get(第一個條件:路徑,  第二個條件:{用尖框號寫下上述get框號設定的執行名稱},  第三個條件:(圓框寫下作為被回傳內容時需賦予的名稱)=>{
            此時第三個條件取的名稱, 會得到後台賦予的內容, 依需求輸入要對內容執行的方式
            這裡執行 $("指定的id或class名稱").覆蓋標籤(覆蓋物 即 條件三的名稱)
        })
    }
    
    */ 
</script>