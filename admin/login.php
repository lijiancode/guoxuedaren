<?php
include_once 'include.php';
$name = $_POST['name'];
$pwd = $_POST['pwd'];
if (empty($name) or empty($pwd)) {
    echo "<script>alert('用户名和密码不能为空'); history.go(-1);</script>";
} else {
    $sql = "select * from vip where name='$name'";
    $result = mysql_query($sql, $conn);
    if (mysql_num_rows($result) > 0) {

        while ($row = mysql_fetch_assoc($result)) {
            if ($name == $row['name'] && $pwd == $row['pwd']) {
                $_SESSION["name"] = $name;
                $_SESSION["pwd"] = $pwd;
                echo "<meta http-equiv=\"refresh\" content=\"2;url=admin.php\"/>";
                echo "登陆成功，页面将在两秒中以后跳转。。。";
            } else {
                echo "<script>alert('密码错误，请重新输入'); history.go(-1);</script>";
            }
        }
    } else {
        echo "<script>alert('用户名不存在'); history.go(-1);</script>";
    }
}
mysql_close($conn);