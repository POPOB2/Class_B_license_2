<fieldset>
    <legend>帳號管理</legend>
    <!-- table>tr*2>td*3 -->
    <table>
        <tr>
            <td class="clo">帳號</td>
            <td class="clo">密碼</td>
            <td class="clo">刪除</td>
        </tr>

        <!-- 下列為重複內容的地方 -->
<tbody id="users">

</tbody>
    </table>
    <div class="ct">
        <button onclick="del()">確定刪除</button>
        <!--  -->
        <button onclick="$('table input').prop('checked',false)">清空選取</button> 
    </div>
<!-- --------------------------START貼到這裡,並在這去除fieldset的頭, 因為上面已有-------------------------------- -->
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
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="$('table input').val('')">清除</button>
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>
<!-- --------------------------END貼到這裡,並在這保留fieldset的尾, 接續上面已有的頭-------------------------------- -->
<script>
    getUsers();
// --------------------------START另一段貼到這裡--------------------------------
    function reg(){
        let user={
            acc:$("#acc").val(),
            pw:$("#pw").val(),
            pw2:$("#pw2").val(),
            email:$("#email").val()
        }
        
        if(user.acc=='' || user.pw=='' || user.pw2=='' || user.email==''){
            alert("不可空白")
        }else if(user.pw!=user.pw2){ 
            alert("密碼錯誤")
        }else{
            
            $.get("./api/chk_acc.php",{acc:user.acc},(res)=>{
                if(parseInt(res)==1){ 
                    alert("帳號重複")
                }else{
                    $.post("./api/reg.php",user,(res)=>{ 
                        getUsers(); // 新增這一行執行getUsers-function
                        // alert("註冊完成,歡迎加入")  // 清除這一行
                        // location.href="?do=login"  // 清除這一行
                    })
                }
            })
        }
    }

    
    // 列表顯示資料庫內的帳號資料
    // $.get("./api/users.php",(users)=>{
    //     $("#users").html(users)
    // })
    // 上述一直再重複, 把這段寫成function如下


    // 新增一個 getUsers-function 簡化下方重複的部分 
    function getUsers(){
        $.get("./api/users.php",(users)=>{
        $("#users").html(users)
    })
    }


    function del(){
        let ids=new Array(); 

        $("table input[type='checkbox']:checked").each((idx,box)=>{
            ids.push($(box).val())
        })

        $.post("./api/del_user.php",{del:ids},()=>{
            // $.get("./api/users.php",(users)=>{
            //     $("#users").html(users)
            // }) 
            // 換成下列function
            getUsers()
        }) 
    }
</script>