<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php
	//echo "<pre>";
	//print_r($_POST);
	//print_r($_POST['radio-gp'][3]);
	//echo "</pre>";
	$last_key = array_key_last($_POST['elem']);;
	$first_value = array_key_first($_POST['elem']); // First element's value
	$st = strtotime($_POST['st-date']." ".$_POST['st-time']);
	$ed = strtotime($_POST['ed-date']." ".$_POST['ed-time']);
	//echo $first_key;
	//print_r($first_value);
	//echo count($_POST['elem']);
	$current = time();
	if($current>=$st && $current<=$ed){
 ?>
	
	<form enctype="multipart/form-data">
	<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact2">
			<div class="wrap-contact2">
				<form class="contact2-form validate-form">
					<span class="contact2-form-title">
						<?php echo htmlentities($_POST['heading']); ?>
					</span>
					<div class="fs-20 pb-5">
						<?php echo htmlentities($_POST['description']); ?>
					</div>
					<?php 
						foreach ($_POST['elem'] as $i => $value){
					?>
					
					<?php 
						$req=">";
						if(isset($_POST['check-'.$i.''])){
						$req = "required >";
					} ?>
					<?php if(!strpos($_POST['elem'][$i],'file')>0) {					
						echo '<div class="wrap-input2">';
					}
					else{
						echo "<div>";
					}?>
						<?php echo $_POST['elem'][$i].$req?>
						<span class="focus-input2" data-placeholder="<?php echo htmlentities($_POST['name-'.$i.'']) ?>"></span>
					</div>
						<?php } ?>
						
						
					<?php 
						for($i=array_key_first($_POST['radio-gp']);$i<=array_key_last($_POST['radio-gp']);$i++){
							
							$last_key_r = array_key_last($_POST['radio-gp'][$i]);;
							$first_value_r = array_key_first($_POST['radio-gp'][$i]);
					?>
					
					<?php 
						$req=">";
						if(isset($_POST['check-'.$i.''])){
						$req = "required >";
					} ?>	
					<div class="mb-4">
						<label><?php echo htmlentities($_POST['name-'.$i.''])?> :</label>
						<?php for($k=$first_value_r;$k<=$last_key_r;$k++){
							
						?>
						<?php 
							
							echo $_POST['radio-gp'][$i][$k].$req;
							echo htmlentities($_POST['radio-gp-'.$i.'-name'][$k]);
						} ?>
					</div>
						<?php 
						} ?>
				<button class="btn btn-primary" type="submit">SUBMIT</button>
				</form>
			</div>
		</div>
	</div>
</form>

	<?php } 
	else{  ?>
		 <div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
				<div class="container-contact2">
				<div class="wrap-contact2 fs-20 text-center">
					User Not Taking response Now :)
				</div>
				</div>
				</div>
	
	<?php } ?>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

</body>
</html>
