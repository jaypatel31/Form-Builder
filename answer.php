<?php
	session_start();
	echo "<pre>";
	print_r($_POST);
	print_r($_FILES);
	print_r($_SESSION);
	$group = array();	
	$user_ip = array();
	$fname = urldecode(basename($_SERVER['HTTP_REFERER']));
	$fname = substr($fname,0,strpos($fname,"."));
		for($i=0;$i<count($_SESSION['total-ip']);$i++){
			
			if(isset($_POST['input'][$i+1])){
				echo $_SESSION['total-ip'][$i]." = ".$_POST['input'][$i+1];
				echo "<br>";
				if($_POST['input'][$i+1]!==""){
					array_push($user_ip,$_POST['input'][$i+1]);
				}
				else{
					array_push($user_ip,"NULL");
				}
			}
			else{
				array_push($group,$_SESSION['total-ip'][$i]);
			}
	}
		//print_r($group);
	if(isset($_FILES)){
		if(!empty($_FILES)){
			$target = 'Forms/Images/'.$fname;
			foreach($_FILES as $key =>$values){
				foreach($values as $id=>$faname){
					if($id=='name'){
						
						$tp = $faname;
					}
					if($id=='tmp_name'){
						move_uploaded_file($faname, $target.$tp);
						$dest = $target.$tp;
						echo $dest;
					}
				}
			}
			array_push($user_ip,$dest);
		}
	}
		foreach($_POST as $key => $value){
					if($key!=='input'){
						for($j=0;$j<count($_SESSION['extra']);$j++){
							
							if($key == $_SESSION['extra'][$j]){
								if(is_array($value)){
									echo $group[$j]." = ";
									$empty = "";
									foreach($value as $check){	
										echo $check." ,";
										$empty .= $check.",";
										
									}
									array_push($user_ip,$empty);
								}
								else{
									echo $group[$j]." = ";
									array_push($user_ip,$value);
									echo $value;
								}
								echo "<br/>";
								break;
								
							}
							
						}
					}
				}
				if(count($_SESSION['total-ip']) !== count($user_ip)){
					array_push($user_ip,"NULL");
				}
				print_r($user_ip);
				echo "<pre>";
				
				$fname = "Forms/".$fname.".xlsx";
				echo $fname;
				print_r($_SERVER);
				//exit;
				
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;






$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load($fname);
for($k=1;$k<=10;$k++){
	$cellValue = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $k)->getValue();
	if(empty($cellValue)){
		$last = $k;
		break;
	}
	//echo $cellValue;
}
//echo $last;
/*

for($i=0;$i<count($_SESSION['total-ip']);$i++){
	$char = chr(65+$i);
	$sheet->setCellValue($char.'1', $_SESSION['total-ip'][$i]);
}*/

$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$sheet = $spreadsheet->getActiveSheet();
$spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(30);
for($j=0;$j<count($user_ip);$j++){
	$char = chr(65+$j);
	$sheet->setCellValue($char.$last, $user_ip[$j]);
}
$writer->save($fname);
header('Location: '.$_SERVER['HTTP_REFERER']."?Status=Succesfully Sent Your Response");
/*
$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');
$writer->save('hello world.xlsx');*/
?>