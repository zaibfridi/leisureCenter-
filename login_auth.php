<?php
include_once ('core/config.php');

$username = $_POST["username"];
$password = $_POST["password"];
if(empty($username) && empty($password)){
	header("Location:login.php");
	}

// Connect to the database
$password	=	 md5(md5(sha1(md5($password))));
$con = mysql_connect(DB_HOST,DB_USER,DB_PASS);
// Make sure we connected succesfully
if(! $con)
{
    die('Connection Failed'.mysql_error());
}

// Select the database to use
mysql_select_db(DB_NAME,$con);

$query	=	"SELECT ad_username, ad_password FROM tb_admin WHERE ad_password ='$password' AND ad_username ='$username'";
$result = mysql_query($query);
if($result){
$row = mysql_fetch_array($result);

if($row["ad_username"]==$username && $row["ad_password"]==$password)
    echo"You are a validated user.";
else
    echo"Sorry, your credentials are not valid, Please try again.";
}else{
	echo "<pre>"; print_r($query); echo "</pre>";
	
	}

 ?>