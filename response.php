<?php 
	session_start();
	require 'vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	
?>
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
	//$last_key = array_key_last($_POST['elem']);;
	//$first_value = array_key_first($_POST['elem']); // First element's value
	$st = strtotime($_POST['st-date']." ".$_POST['st-time']);
	$ed = strtotime($_POST['ed-date']." ".$_POST['ed-time']);
	//echo $first_key;
	//print_r($first_value);
	//echo count($_POST['elem']);
	$current = time();
	$supreme = array();
	$supreme2 = array();
	if($current>=$st && $current<=$ed){
 ?>
	
	<form action="answer.php" method="post" enctype="multipart/form-data">
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
					if(isset($_POST['elem'])){
						foreach ($_POST['elem'] as $i => $value){
							array_push($supreme,htmlentities($_POST['name-'.$i.'']));
					?>
					
					<?php 
						$req=">";
						if(isset($_POST['check-'.$i.''])){
						$req = "required >";
					} ?>
					<?php if(!strpos($_POST['elem'][$i],'file')>0) {					
						echo '<div class="wrap-input2">';
						 echo $_POST['elem'][$i].$req; ?>
						 
						  <span class="focus-input2" data-placeholder="<?php echo htmlentities($_POST['name-'.$i.'']) ?>"></span>
						
					<?php 
					
					 echo "</div>";
					} 
					else{
						echo "<div >";
						echo htmlentities($_POST['name-'.$i.'']);
						 echo $_POST['elem'][$i].$req;
						 echo "</div>";
					}?>
						
						
					<?php } } 
					 ?>
						
						
					<?php 
					if(isset($_POST['radio-gp'])){
						for($i=array_key_first($_POST['radio-gp']);$i<=array_key_last($_POST['radio-gp']);$i++){
							
							$last_key_r = array_key_last($_POST['radio-gp'][$i]);;
							$first_value_r = array_key_first($_POST['radio-gp'][$i]);
							preg_match_all('/name=\W\w+\W\w+\W\d+/',$_POST['radio-gp'][$i][$first_value_r],$match);
							$slice = $match[0][0];
							$slice = substr($slice,(strpos($slice,"'")+1));
							//echo $slice;
							array_push($supreme2,$slice);
							array_push($supreme,htmlentities($_POST['name-'.$i.'']));
					?>
					
					<?php 
						$req=">";
						if(isset($_POST['check-'.$i.''])){
						$req = "required >";
					} ?>	
					<div class="mb-4">
						<label><?php echo htmlentities($_POST['name-'.$i.''])?> </label>
						<?php for($k=$first_value_r;$k<=$last_key_r;$k++){
							
							$value ="value = '".htmlentities($_POST['radio-gp-'.$i.'-name'][$k])."'";

						?>
						<?php 
							echo "<br/>";
							echo $_POST['radio-gp'][$i][$k].$value.$req;
							
							echo htmlentities($_POST['radio-gp-'.$i.'-name'][$k]);
						} ?>
					</div>
						<?php 
						} 
					} 
					$_SESSION['total-ip'] = $supreme;
					$_SESSION['extra'] = $supreme2;					?>
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
<?php
		//$myfile = fopen('hello.php', "w");
		//$txt = file_get_contents('http://localhost/PHPEX/Form%20Builder/response.php');
		//fwrite($myfile, $txt);
		//fclose($myfile);
		$file = time().htmlentities($_POST['heading']).'.xlsx';
	if(!file_exists('$file')){
		//echo "<pre>";
		//print_r($_POST);
		//print_r($_SESSION);
		//print_r($group);
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Hello World !');
		for($i=0;$i<count($_SESSION['total-ip']);$i++){
			$char = chr(65+$i);
			$sheet->setCellValue($char.'1', $_SESSION['total-ip'][$i]);
		}
		$writer = new Xlsx($spreadsheet);
		$writer->save($file);
		$_SESSION['filename'] = $_SERVER['SCRIPT_NAME'].$file;
		$_SESSION['formname'] = $_SERVER['SCRIPT_NAME'];
		
		//header('Location: index.php?success=File Creeated Suucesfully');
	}
?>