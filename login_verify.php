<?php
	session_start();
	include('pdo.php');
	if(isset($_POST['submit'])){
		$email = (!empty($_POST['email'])) ? htmlentities($_POST['email']) : "";
		$pwd = (!empty($_POST['pwd'])) ? htmlentities($_POST['pwd']) : "";
		
		if($email!="" && $pwd!=""){
			$sql = "SELECT * FROM user_master WHERE user_email = :email AND user_pwd = :pwd";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(
				":email" => $email,
				":pwd" => $pwd
			));
			$rows = $stmt->fetch(PDO::FETCH_ASSOC);
			if($rows){
				$msg = "";
				$_SESSION['id'] = $rows['user_id'];
				header('Location: admin.php?key='.$rows['user_id']);
			}
			else{
				$msg = "INAVLID USERNAME OR PASSWORD";
				header('Location: login.php?error='.$msg);
			}
		}
	}
?>