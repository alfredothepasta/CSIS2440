<?php
if(isset($_SESSION['CE08user'])){
    header("Location:/Classexercises/CE08/Dashboard");
}

// I like to keep the php and html separate as much as possible.
function passwordCheck(){
    if(isset($_SESSION['badPass'])){
        echo "<br> Invalid username or password.";
    }
}
?>

<div>
    <form action="CE08/LoginCheck" name="form1" method="post">
        <table align="center" border="0" cellpadding="3" bgcolor="#FFFFFF">

            <tr>
                <td colspan="3"><strong>Member login</strong></td>
            </tr>

            <tr>
                <td width="78">Username (email)</td>
                <td width="6">:</td>
                <td width="294"><input name="myusername" type="text" id="myusername" class="error"></td>
            </tr>

            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="mypassword" type="password">
                    <?php passwordCheck() ?></td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" value="Login" onclick="return loginfilled();"></td>
            </tr>

            <tr>
                <td>
                    <a href="/Classexercises/CE08/NewAccount"> Create an Account</a>
                </td>
            </tr>
        </table>

    </form>
</div>

