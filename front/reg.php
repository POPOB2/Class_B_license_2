<fieldset>
    <legend>會員註冊</legend>
    <div style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <!-- table>tr*5>td+(td>input:text) -->
    <table>
        <tr>
            <td class="clo">step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">step3:再次確認</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">step4:信箱(忘記密碼時使用)</td>
            <!-- 這裡type不使用email是為了避免當輸入非email格式時, 跳出錯誤訊息反而要花時間處理(因考試時間限制而這麼做) -->
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <!-- <td>
                <button>註冊</button><button onclick="reset()">清除</button>
            </td> -->
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="$('table input').val('')">清除</button>
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>

<script>
    // 再table下面的input才進行刪除, 限制其範圍, 避免按了清除卻連按鈕內容都被清除
    // function reset(){
    //     $("table input").val("")
    // }


    function reg(){
        let user={
            acc:$("#acc").val(),
            pw:$("#pw").val(),
            pw2:$("#pw2").val(),
            email:$("#email").val()
        }
        // 若user的acc等任一資訊為空 顯示錯誤訊息
        if(user.acc=='' || user.pw=='' || user.pw2=='' || user.email==''){
            alert("不可空白")
        }else if(user.pw!=user.pw2){ // 若user密碼和再次確認不同 顯示錯誤訊息
            alert("密碼錯誤")
        }else{
            // 理論上 post=取得資訊  get=新增資料 這裡只是要發出訊息到資料庫檢查 不影響到資料庫內容 所以使用get 沒有安全性的問題不需用post
            $.get("./api/chk_acc.php",{acc:user.acc},(res)=>{// {欄位:值}==acc資料來自user的acc
                if(parseInt(res)==1){ // 1==有值==代表帳號已存在
                    alert("帳號重複")
                }else{
                    $.post("./api/reg.php",user,(res)=>{ // 正常工作上使用會跳出不同的訊息,這裡因考試需求 皆顯示"註冊完成.歡迎加入"
                        // console.log(res); // 測試後台接收到的回傳值
                        alert("註冊完成,歡迎加入")
                        location.href="?do=login" // 導到登入頁面
                    })
                }
            })
        }
    }
</script>