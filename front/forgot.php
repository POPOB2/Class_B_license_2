
<fieldset>
    <legend>忘記密碼</legend>
    <div>請輸入信箱以查詢密碼</div>
    <div><input type="text" name="email" id="email"></div>
    <div id="result"></div>  <!-- result回傳到該div內 -->
    <div><button onclick="findPw()">尋找</button></div><!-- 這個div用於斷行 -->
</fieldset>

<script>
    // 只是要拿到結果 所以不須宣告變數 
    function findPw(){
        $.get("./api/find_pw.php",{email:$("#email").val()},(result)=>{
            $("#result").html(result)
        })
    }
</script>










