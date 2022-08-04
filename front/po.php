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
<fieldset>
    <legend>分類網誌</legend>
    <div class="type">健康新知</div>
    <div class="type">菸害防制</div>
    <div class="type">癌症防治</div>
    <div class="type">慢性病防治</div>
</fieldset>
<fieldset>
    <legend>文章列表</legend>
    <div id="content"></div>
</fieldset>
</div>

<script>
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
</script>