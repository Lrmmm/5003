<?php
include "functions.php";
$username=$_POST["username"];
$password=$_POST["password"];
// if(strcmp($username,"admin")==0 && strcmp($password,"123456" )==0)
// {

// 	echo"<script>";
// 	echo"alert('登录成功');";
// 	echo "location.href='index.php';"; 
// 	echo"</script>";
// }else{
// 	echo"<script>";
// 	echo"alert('账号或密码错误');";
// 	echo "location.href='index2.php';"; 
// 	echo"</script>";
// }
function getInfoByUsername($username,$password) {
	global $db_conn;
	$cmdstr = "select * from account where username = '$username'";
	$statement = OCIParse($db_conn, $cmdstr);
	if (!$statement) {
        $e = OCI_Error($db_conn)['message'];
        echo "
            <div class='alert alert-danger' role='alert'>
                Cannot parse the following command: $cmdstr<br>$e
            </div>
        ";
    }
	$r = OCIExecute($statement, OCI_DEFAULT);
    if (!$r) {
        $e = oci_error($statement)['message'];
        echo "
            <div class='alert alert-danger' role='alert'>
                Cannot execute the following command: $cmdstr<br>$e
            </div>
        ";
    }

	if (($row = oci_fetch_row($statement)) != false) {
		// var_dump($row[1]);
		// var_dump($password);
		if(strcmp($row[1],$password)==0){
			echo"<script>";
			echo"alert('Login successful!');";
			echo "location.href='index.php';"; 
			echo"</script>";
		}
		else{
			echo"<script>";
			echo"alert('password is not correct!');";
			echo "location.href='login.php';"; 
			echo"</script>";
		}
	}
	else {
		echo"<script>";
		echo"alert('Username not exist!');";
		echo "location.href='login.php';"; 
		echo"</script>";
	}
	// while (($row = oci_fetch_row($statement)) != false) {
	// 	echo $row[0];
    // }
}
if (connectToDB()) {
	getInfoByUsername($username,$password);
	OCICommit($db_conn);
    disconnectFromDB();
}


?>