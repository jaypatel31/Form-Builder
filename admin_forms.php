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
	if(isset($_GET['delete'])){
		if(!empty($_GET['delete'])){
			$form = htmlentities($_GET['delete']);
			$sql4 = "UPDATE user_from SET ".$form." = :null WHERE user_id = :u_id";
			$stmt4 = $pdo->prepare($sql4);
			$clear = NULL;
			$stmt4->execute(array(
				":u_id" => $id,
				":null" => $clear
			));
			
			$sql5 = "UPDATE user_master SET user_forms = user_forms - :add WHERE user_id = :u_id";
			$stmt5 = $pdo->prepare($sql5);
			$add = 1;
			$stmt5->execute(array(
				":add" => $add,
				":u_id" => $id
			));
			$fname = htmlentities($_GET['form']);
			unlink("Forms/".$fname.".php");
			unlink("Forms/".$fname.".xlsx");
			//exit;
			header("Location: admin.php?success=Succesfully Deleted Form");
		}
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
		<?php
			$found=0;
			$notfound=0;
			$i=1;
			$msg = "";
			foreach($rows as $x => $val){
				if(strpos($x, "form_key")>(-1)){
							
							if($val!=NULL){
								$path = substr($_SERVER['SCRIPT_FILENAME'],0,strpos($_SERVER['SCRIPT_FILENAME'],"admin"))."Forms/";
								
								$msg .= '<div class="card mt-2 shadow rounded">
											<div class="card-header text-white font-weight-bold bg-primary text-center" style="font-size:20px">Form-'.$i.'</div>
											<div class="card-body" style="font-size:18px">
												<div>
												<span>Link to the Form : </span><a href="'.$path.$val.'.php"><strong>'.$path.$val.'.php</strong></a>
												</div>
												<div>
												<span>Link to the Excel File : </span><a href="'.$path.$val.'.xlsx"><strong>'.$path.$val.'.xlsx</strong></a>
												</div>
												<a href="admin_forms.php?delete='.$x.'&form='.$val.'" class="btn btn-danger mt-2" onclick="userconfirm(event)">Delete</a>
											</div>
										</div>';
								$i++;
								$found = $found+1;
								
							}
							else{
								
							}
				} 
			}
			
			if($found==0){
				$slogan= "No Froms Found";	
			}
			else{
				$slogan = "No of Remaning Forms ".(5-$found);
			}
			$card = '<div class="card mt-2 shadow rounded">
							<div class="card-body">
								<h3><strong>'.$slogan.' :</strong><a class="nav-link" href="index.php">Create Form</a></h3>
							</div>
						</div>';
				echo $card;
				echo $msg;
		?>
	</div>
</body>
<script>
	function userconfirm(event,form){
		if (confirm("Do You Want To Delete?")){
			
		}
		else{
			event.preventDefault();
		}
	}
</script>
</html>