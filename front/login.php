<!-- fieldset+legend == 文字壓邊功能 -->
<fieldset>
    <legend>會員登入</legend>

    <table>
        <!-- class="clo"==工具:底部灰色 -->
        <tr>
            <td class="clo">帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>
                <button onclick="login()">登入</button>
                <button onclick="reset()">清除</button>
            </td>
            <!-- class="r" == 工具:文字置右  "l"==置左 -->
            <td class="r">
                <!-- ?==當前頁 -->
                <a href="?do=forgot">忘記密碼</a>
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function login(){
        let acc=$("#acc").val(); // 設置一個帳號acc 裡面的值為("#id:acc)的值
        let pw=$("#pw").val(); // 這裡的值來自於表單內容
        $.post("./api/chk_acc.php",{acc},(res)=>{ //用post{變數:帳號}傳過去給指定路徑 處理完之後 由(res)收回來 這裡的{},()是函式 發出和回傳的固定寫法
            // console.log('acc',res) // 顯示回傳值
            // 使用parseInt 避免用到字串的數字
            if(parseInt(res)===1){ // 當res的內容為數字1時,代表存在
                $.post("./api/chk_pw.php",{acc,pw},(res)=>{ // 同上述帳號檢測 這裡改為密碼
                    // console.log('pw',res); // // 顯示回傳值
                    if(parseInt(res)===1){
                        if(acc==='admin'){ // 帳號為管理者且正確 導引到back.php
                            location.href='back.php'
                        }else{ // 否則導引到首頁
                            location.href='index.php'
                        }
                    }else{
                        alert("密碼錯誤");
                    }
                })
            }else{ // 不存在時顯示錯誤訊息
                alert("查無帳號")
            }
        })
    }
</script>