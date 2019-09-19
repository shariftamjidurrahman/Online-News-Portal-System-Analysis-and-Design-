<?php include'../lib/Session.php';
	Session::init();
?>

<?php include'../lib/Database.php';?>
<?php include'../config/config.php';?>
<?php 
      $db = new Database();
    
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">

		<link rel="stylesheet" href="css/stylelogin.css">


</head>
<body>
<div class="container">
	<div class="col-md-4 col-md-offset-4 colm">
	<section id="content">
		<?php 
			if($_SERVER['REQUEST_METHOD']=="POST"){
				
				$email=mysqli_real_escape_string($db->link,$_POST['email']);
				$pass=mysqli_real_escape_string($db->link,$_POST['pass']);

				$query="SELECT *FROM user where email='$email' and password='$pass'";
				$result=$db->select($query);
				if($result!=false){
					$val= mysqli_fetch_array($result);
					$row = mysqli_num_rows($result);
					if($row>0){
                         Session::set("login",true);
						 Session::set("email",$val['email']);
						 Session::set("id",$val['id']);
						 Session::set("name",$val['name']);
                          Session::set("email",$val['email']);
						 Session::set("role",$val['role']);
						 if(Session::get("role")=="subscriber"){
							 

                                header('Location:../index.php');
						 }else{
                        	 header('Location:index.php');

						 }

					}else{
						echo"<span style='color:#fff;'>Not found </span>";
					}
				}else{
					echo"<span style='color:#fff;'>Not Matched Username or Password </span>";
				}

			}
		
		?>
		<form action="login.php" method="post">
			<h1 class="text-center"> Login</h1>
			
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
				</div>
				<div class="text-center">
				<button type="submit" class="btn btn-default ">Submit</button>
				</div>

		</form>
		<div class="backreg">
			<a href="/news">Back</a> or
			<a href="signup.php">Register</a>
		</div>
	</section>
	</div>
</div>
</body>
</html>