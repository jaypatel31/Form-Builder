<?php
	session_start();
	include('pdo.php')
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Form-Builder</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
 	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
	<link rel="stylesheet" href="main.css">
</head>
<style>
	.full-w{
		position:relative;
		display:flex;
		height: 100vh;
		align-items: center;
	}
	.full-w > div.container{
		width:400px;
		
	}
</style>
<body>
	<div class="full-w">
		<div class="container m-auto">
			<div class="card">
			  <div class="card-header p-2 bg-primary">
				<h3 class="text-center text-white">Login/Signup</h3>
			  </div>
			  <div class="card-body">
			  <?php
				if(isset($_GET['success'])){
					if(!empty($_GET['success'])){
						$msg = '  <div class="alert alert-success alert-dismissible fade show">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									'.$_GET['success'].'.
								  </div>';
						echo $msg;
					}
				}
				else if(isset($_GET['error'])){
					if(!empty($_GET['error'])){
						$msg = '   <div class="alert alert-danger alert-dismissible fade show">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									 '.$_GET['error'].'.
									</div>';
						echo $msg;
					}
				}
			  ?>
				<form action="login_verify.php" method="post">
				  <div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" class="form-control" name="email" placeholder="Enter email" id="email" required>
				  </div>
				  <div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" name="pwd" placeholder="Enter password" id="pwd" required>
				  </div>
				  <div class="clearfix">
				  <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
				  <a href="registration.php" class="btn btn-primary float-left">New Registeration</a>
				  </div>
				</form>
			  </div>
			</div>
		</div>
	</div>
</body>
</html>