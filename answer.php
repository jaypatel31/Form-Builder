<?php
	session_start();
	echo "<pre>";
	print_r($_POST);
	print_r($_FILES);
	print_r($_SESSION);
	$group = array();	
	$user_ip = array();
		for($i=0;$i<count($_SESSION['total-ip']);$i++){
			
			if(isset($_POST['input'][$i+1])){
				echo $_SESSION['total-ip'][$i]." = ".$_POST['input'][$i+1];
				echo "<br>";
				array_push($user_ip,$_POST['input'][$i+1]);
			}
			else{
				array_push($group,$_SESSION['total-ip'][$i]);
			}
	}
		//print_r($group);
	if(isset($_FILES)){
		array_push($user_ip,$_FILES['type']);
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
				print_r($user_ip);
				echo "<pre>";
				$fname = urldecode(basename($_SERVER['HTTP_REFERER']));
				$fname = substr($fname,0,strpos($fname,"."));
				$fname = $fname.".xlsx";
				print_r($_SERVER);
				
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
for($j=0;$j<count($user_ip);$j++){
	$char = chr(65+$j);
	$sheet->setCellValue($char.$last, $user_ip[$j]);
}
$writer->save($fname);
/*
$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');
$writer->save('hello world.xlsx');*/
?>