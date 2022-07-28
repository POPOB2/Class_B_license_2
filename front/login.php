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