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
</fieldset>

<script>
    // 列表顯示資料庫內的帳號資料
    $.get("./api/users.php",(users)=>{
        $("#users").html(users)
    })


    function del(){
        let ids=new Array(); //  用了new=宣告一個物件,這裡new Array==宣告一個陣列物件

        $("table input[type='checkbox']:checked").each((idx,box)=>{
            ids.push($(box).val()) // 抓box的val 使用push塞到ids陣列內容裡面去
        })
        
        // 因為刪除資料為謹慎動作 所以用post的方式
        $.post("./api/del_user.php",{del:ids},()=>{ // 將del陣列的ids內容
            $.get("./api/users.php",(users)=>{
                $("#users").html(users)
            })
        }) 
    }
</script>