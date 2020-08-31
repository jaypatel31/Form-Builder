
<?php 
	session_start();
	$msg=false;
	if(isset($_GET["Status"])){
		$msg = $_GET["Status"];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php
	$st = 1596556740;
	$ed = 1599336240;
	$current = time();
	$supreme = "Full Name,Email Address";
	$supreme2 = Array("");
	$supreme = explode(",",$supreme);
	//$supreme2 = explode(",",$supreme2);
	$_SESSION["total-ip"] = $supreme;
	$_SESSION["extra"] = $supreme2;	
	if($current>=$st && $current<=$ed){
 ?>
	
	<form action="../answer.php" method="post" enctype="multipart/form-data">
	<div class="bg-contact2" style="background-image: url('../images/bg-01.jpg');">
		<div class="container-contact2">
			<div class="wrap-contact2">
			<?php 
				if($msg!==false){
					echo "<div class='alert alert-success text-center alert-dismissible fade show'>";
					echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
					echo $msg."</div>";
				}
			?>
				<form class="contact2-form validate-form">
					<span class="contact2-form-title">
						 Contact-US
					</span>
					<div class="fs-20 pb-5">
						 Enter Your Contact Details
					</div><div class="wrap-input2">
								<input class='input2' type='text' name='input[1]'required > 
							<span class="focus-input2" data-placeholder="Full Name"></span>
							</div><div class="wrap-input2">
								<input class='input2' type='email' name='input[2]'required > 
							<span class="focus-input2" data-placeholder="Email Address"></span>
							</div>
							<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn" type="submit">SUBMIT</button>
						</div>
					</div>
							
					
				</form>
			</div>
		</div>
	</div>
</form>

	<?php } 
	else{  ?>
		 <div class="bg-contact2" style="background-image: url('../images/bg-01.jpg');">
				<div class="container-contact2">
				<div class="wrap-contact2 fs-20 text-center">
					User Not Taking response Now :)
				</div>
				</div>
				</div>
	
	<?php } ?>
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag("js", new Date());

	  gtag("config", "UA-23581568-13");
	</script>

</body>
</html>