<?php
	session_start();
	include('pdo.php');
	
	if(isset($_POST['submit'])){
		$email = (!empty($_POST['email'])) ? htmlentities($_POST['email']) : "";
		$pwd = (!empty($_POST['pwd'])) ? htmlentities($_POST['pwd']) : "";
		
		if($email!="" && $pwd!=""){
			$sql = "SELECT * FROM user_master WHERE user_email = :email";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(
				":email" => $email
				
			));
			$rows = $stmt->fetch(PDO::FETCH_ASSOC);
			if($rows){
				$msg = "User Already Exist";
				header('Location: login.php?error='.$msg);
			}
			else{
				$sql2 = "INSERT INTO user_master (user_email,user_pwd,user_forms) VALUES (:u_email, :u_pwd, :u_form)";
				$stmt2 = $pdo->prepare($sql2);
				$form = 0;
				$stmt2->execute(array(
					":u_email" => $email,
					":u_pwd" => $pwd,
					":u_form" => $form
				));
				$sql = "SELECT * FROM user_master WHERE user_email = :email";
				$stmt = $pdo->prepare($sql);
				$stmt->execute(array(
					":email" => $email
				));
				$rows = $stmt->fetch(PDO::FETCH_ASSOC);
				$id = $rows['user_id'];
				$sql3 = "INSERT INTO user_from (user_id) VALUES (:u_id)";
				$stmt3 = $pdo->prepare($sql3);
				$stmt3->execute(array(
					":u_id" => $id
				)); 
				$msg = "Succesfully Registerd";
				header('Location: login.php?msg='.$msg);
			}
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
		width:100%
		
	}
	.invalid-tooltip{
		top:auto;
		left:auto;
	}
</style>
<body>
	<div class="full-w">
		<div class="container m-auto">
			<div class="card">
			  <div class="card-header p-2 bg-primary">
				<h3 class="text-center text-white">Signup</h3>
			  </div>
			  <div class="card-body">
				<form  method="post" id="r_form">
				  <div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" class="form-control" name="email" placeholder="Enter email" id="email" required>
				  </div>
				  <div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" onkeyup="regen(event)" name="pwd" placeholder="Enter password" id="pwd" required>
				  </div>
				  <div class="form-group" id="re_enter">
					<label for="repwd">ReEnter Password:</label>
					<input type="password" class="form-control" onkeyup="pwdCheck(event)" name="repwd" placeholder="ReEnter password" id="repwd" required>
					<div class="invalid-tooltip">
						Password Do Not Match
					</div>
				  </div>
				  <div style="display:flex;justify-content:center;">
				  <input type="submit" value="Register" name="submit" class="btn btn-primary w-75 m-auto">
				  </div>
				</form>
			  </div>
			</div>
		</div>
	</div>
</body>
<script>
	let error =0;
	$('#re_enter').hide();
	function regen(event){
		if(event.target.value!==""){
			$('#re_enter').show();
		}
		else{
			$('#re_enter').hide();
		}
	}
	function pwdCheck(event){
		let re = event.target.value;
		let pwd = document.getElementById("pwd").value;
		if(re==pwd){
			$('#repwd').addClass('is-valid');
			$('#repwd').removeClass('is-invalid')
			error =0;
		}
		else{
			error =1;
			$('#repwd').addClass('is-invalid')
			
		}
	}
	$('#r_form').submit(function(event){
		if(error!=0){
			event.preventDefault();
		}
	});
</script>
</html>