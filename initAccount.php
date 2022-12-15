<?php 
include "functions.php";
function init() {
    global $db_conn;
    $file = file_get_contents('account.sql');
    $queries = explode(';', $file);
    
    foreach ($queries as $query) {
        executeSQL($query);
    }
    echo"<script>";
	echo"alert('init');"; 
	echo"</script>";
    OCICommit($db_conn);
}
if (connectToDB()) {
    echo"<script>";
	echo"alert('连接数据库成功');"; 
	echo"</script>";
    init();
    disconnectFromDB();
}
?>