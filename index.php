<?php
session_start();
include_once ('core/config.php'); ?>
<?php 
if(isset($_POST['submit'])){
		$username	=	$_POST['username'];
		$password	=	$_POST['password'];
		$password	=	md5(md5(sha1(md5($password))));
		$con 		=	mysql_connect(DB_HOST,DB_USER,DB_PASS);
		if(!$con){
			die('Connection Failed'.mysql_error());
			}else{
				
					mysql_select_db(DB_NAME,$con);
					$query	=	"SELECT ad_username, ad_password FROM tb_admin WHERE ad_password ='$password' AND ad_username ='$username'";
					$result = mysql_query($query);
					if($result){
						$row = mysql_fetch_array($result);
						if( ($row["ad_username"] == $username) && ($row["ad_password"]==$password) ){
								session_start();
								$_SESSION['login'] = "1";
								header("Location: ".base_url."dashboard.php");
							}else{
									$error	="Enter correct username and password";
								}
						
					}else{
							
							$username	=	"";
							$password	=	"";			
						
						}
				
				}
	}else{
			$username	=	"";
			$password	=	"";
		}
if(isset($_SESSION['login'])){
	header("Location: ".base_url."dashboard.php");
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Leisure Center</title>
<link href="<?=base_url?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url?>css/signin.css" rel="stylesheet">
</head>

<body>

<div class="container">

      <form role="form" action="index.php" class="form-signin" method="post" enctype="multipart/form-data">
        <h2 class="form-signin-heading">Sign in</h2>
        <input type="text" name="username" id="username" autofocus required placeholder="Username" class="form-control">
        <input type="password" required name="password" id="password" placeholder="Password" class="form-control">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <?php if(isset($error)){ ?>
        	<div class="alert alert-danger"><?=$error?></div>
            <?php } ?>
        <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
      </form>

    </div>

</body>
</html>
