<?php 
	session_start();
	include('pdo.php');
	if(isset($_SESSION['id'])){
		if(!empty($_SESSION['id'])){
				$sql3 = "SELECT * FROM user_from WHERE user_id = :u_id";
				$stmt3 = $pdo->prepare($sql3);
				$id = $_SESSION['id'];
				$stmt3->execute(array(
					":u_id" => $id
				));
				$rows = $stmt3->fetch(PDO::FETCH_ASSOC);
				if($rows){
					$found=0;
					$notfound=0;
					$i=0;
					foreach($rows as $x => $val){
						//print_r($x."=>".$val);
						if(strpos($x, "form_key")>(-1)){
							if($val==""){
								$notfound = $notfound+1;
							}
							else{
								$found = $found+1;
							}
						} 
					}
				}
				else{
					header('Location: login.php?error=ACCESS INAVLID');
				}
		}
		else{
			header('Location: login.php?error=ACCESS INAVLID');
		}
	}
	else{
		header('Location: login.php?error=ACCESS INAVLID');
	}
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
	
</head>
<style>
	body{
		background-color:antiquewhite;
	}
	.navbar-dark .navbar-nav .nav-item:hover .nav-link{
		border-bottom:2px solid #F67107;
		transition:0.5s ease;
		color:white;
	}
	.navbar-dark .navbar-nav .nav-link{
		color:black;
		font-size:18px;
		border-bottom:2px solid transparent;
	}
	.navbar-dark .navbar-brand{
		font-size:3vw;
		font-family:sofia;
	}
	.navbar-expand-md .navbar-collapse{
		justify-content:flex-end;
	}
	.navbar-expand-md .navbar-nav .nav-link{
		padding :0.5rem 1.5rem;
	}
	@media only screen and (max-width:576px){
		.navbar-expand-md .navbar-collapse{
			justify-content:flex-start;
		}
		.navbar-dark .navbar-brand{
			font-size:10vw;
		}
	}
</style>
<body>
	<header>
		<nav class="navbar navbar-expand-md bg-primary navbar-dark">
			<!-- Brand -->
		  <a class="navbar-brand" href="admin.php">Form-Builder</a>

		  <!-- Toggler/collapsibe Button -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <!-- Navbar links -->
		  <div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
			  <li class="nav-item">
				<a class="nav-link" href="admin.php">Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="admin_forms.php">Forms</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Extra</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="logout.php">Logout</a>
			  </li>
			</ul>
		  </div>
		</nav>
	</header>
	<div class="container">
		<div class="card mt-2 shadow rounded">
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
				<h3><strong>Total Forms Created By User : <?php echo $found; ?></strong></h3>
			</div>
		</div>
		<div class="card mt-2 shadow rounded">
			<div class="card-body">
				<h4>Let's Get Started : <a class="nav-link" href="admin_forms.php">Form Section</a></h4>
			</div>
		</div>
	</div>
</body>
</html>