<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "lijian";
$conn = mysql_connect($servername, $username, $password);
if (! $conn) {
    throw new Exception("Connection failed: " . mysql_connect_error());
} else {
    mysql_select_db($db, $conn);
    mysql_query("SET NAMES 'UTF8'");

}
function db_delete($id){
    $sql="delete * from vote where id=".$id;
    mysql_query($sql,$conn);
}