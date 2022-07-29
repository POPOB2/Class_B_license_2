<fieldset>
    <legend>帳號管理</legend>
    <!-- table>tr*2>td*3 -->
    <table>
        <tr>
            <td>帳號</td>
            <td>密碼</td>
            <td>刪除</td>
        </tr>

        <!-- 下列為重複內容的地方 -->
<tbody id="users">

</tbody>
    </table>
    <div class="ct">
        <button>確定刪除</button>
        <button>清空選取</button>
    </div>
</fieldset>

<script>
    // 列表顯示資料庫內的帳號資料
    $.get("./api/users.php",(users)=>{
        $("#users").html(users)
    })
</script>