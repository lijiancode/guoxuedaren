<?php
    include_once 'include.php';
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];
    $pwd1 = $_POST['pwd1'];
    $mail = $_POST['mail'];

    $sql = "insert into vip values('','$name','$pwd','$mail')";
    if (mysql_query($sql, $conn)) {
        echo "<script>alert('添加管理员成功'); history.go(-1);</script>";
    } else {
        echo "<script>alert('添加管理员失败，请重新添加'); history.go(-1);</script>";
    }
    mysql_close($conn);