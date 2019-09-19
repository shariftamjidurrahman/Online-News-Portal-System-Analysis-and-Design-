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
<title>Sign Up</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">

		<link rel="stylesheet" href="css/stylelogin.css">


</head>
<body>
<div class="container">
	<div class="col-md-4 col-md-offset-4 colm">
	<section id="content">
		<?php 
			if($_SERVER['REQUEST_METHOD']=="POST"){
				$name=mysqli_real_escape_string($db->link,$_POST['name1']);
				$email=mysqli_real_escape_string($db->link,$_POST['email']);
				$pass=mysqli_real_escape_string($db->link,$_POST['pass']);
                $role="subscriber";
                $details=$name.'\n'.$email;

				$query="INSERT INTO user (name,email,password,role,details)
                VALUES ('$name','$email','$pass','$role','$details')";
				$inserted_rows=$db->insert1($query);
	          if($inserted_rows){
                    echo "<span class='success'>User created Successfully.<br/> Please Login </span>";

                }else{
					echo"<span style='color:#fff;'>Not found </span>";
				}
				

			}
		
		?>
		<form action="signup.php" method="post">
			<h1 class="text-center"> SIGN UP </h1>
			    <div class="form-group">
					<label for="">Name</label>
					<input type="text" class="form-control" id="" placeholder="name" name="name1">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
				</div>
                

				<div class="text-center">
				<button type="submit" class="btn btn-default ">Sign Up</button>
				</div>

		</form>
		<div class="backreg">
			<a href="/news/admin/login.php">Back</a> 
		</div>
	</section>
	</div>
</div>
</body>
</html>