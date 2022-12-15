<?php
$username=$_POST["username"];
$password1=$_POST["password1"];
$password2=$_POST["password2"];
// echo $username;
// echo $password1;
// echo $password2;
include "functions.php";
function check($username) {
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
        return false;
	}
	else {
        return true;
	}
}
function register($username,$password){
    global $db_conn;
	$cmdstr = "insert into account values ('$username','$password')";
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
    OCICommit($db_conn);
    echo"<script>";
	echo"alert('register successful!');"; 
	echo"</script>";
}
if (connectToDB()) {

	if(check($username)){
        if(strcmp($password1,$password2)==0){
            register($username,$password2);
            echo"<script>";
            echo "location.href='login.php';"; 
            echo"</script>"; 
        }
        else {
            echo"<script>";
            echo"alert('Two passwords are different!');"; 
            echo "location.href='register.php';"; 
            echo"</script>"; 
        }
    }
    else {
        echo"<script>";
        echo"alert('Username is already exist!');"; 
        echo "location.href='register.php';"; 
        echo"</script>";
    }
	OCICommit($db_conn);
    disconnectFromDB();
}
?>