<?php
	session_start();
	//echo "<pre>";
	//print_r($_SERVER);
	//echo "</pre>";
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
<body>
	<nav class="navbar navbar-expand-lg bg-light  navbar-dark text-center">
	  <a class="navbar-brand d-block w-100 text-primary text-center " id="logo" href="#">FORM-BUILDER</a>
	  
	  	
	</nav>
	<div class="container">
	<?php 
		
		$path = substr($_SERVER['SCRIPT_FILENAME'],0,strpos($_SERVER['SCRIPT_FILENAME'],"index"));
		//$path= $path."Forms/";
		if(isset($_GET['success'])){
			echo '<div class=" card   bg-light shadow mt-2 mb-3 bg-white rounded">';
			echo '<div class="card-header bg-success">';
				echo '<div class="font-weight-bold lead text-white "><h4>Request Accepted</h4></div>';
			echo '</div>';
			echo '<div class="card-body" >';
			echo "<div class='text-primary' style='font-size:20px;' class='font-weight-bold'>".$_GET['success']."<br/>";
			echo "Link of Execle File :<br/> <a class='font-weight-bold' href='".$path.$_SESSION['formname']."'>".$path.$_SESSION['formname']."</a><br/>";
			echo "Link of Execle File :<br/> <a class='font-weight-bold' href='".$path.$_SESSION['formname']."'>".$path.$_SESSION['filename']."</a><br/>";
			echo "<span class='font-weight-bolder'>Please Save these Name For Future refrences!!</span></div>";
			echo '</div>';
			echo '</div>';
		}
	?>
	<form method="post" action="Filemake.php">
	<div class=" card   bg-light shadow mt-2 mb-3 bg-white rounded">
		<div class="card-header bg-primary">
			<div class="font-weight-bold lead text-white "><h4>Form-Information</h4></div>
		</div>
			<div class="card-body" >
			<label for="field-text-1" class="font-weight-bold">Form Name: </label><br/>
			<input id="input1" class="values2" type="text" name="heading" required>
			<label for="field-text-1" class="font-weight-bold">Form Description: </label><br/>
			<input id="input1" class="values2" type="text" name="description" required><br/>
			<div class="mt-3">
			<label for="field-text-1" class="font-weight-bold adjust">Start-Date: </label>
			<input id="input12" class="values2" type="date" name="st-date" required>
			<input id="input12" class="values2" type="time" name="st-time" required><br/>
			</div >
			<div class="mt-3"> 
			<label for="field-text-1" class="font-weight-bold adjust">End-Date: </label>
			<input id="input12" class="values2" type="date" name="ed-date" required>
			<input id="input12" class="values2" type="time" name="ed-time" required><br/>
			</div>
			</div>
		</div>
		<div class="mt-4 mb-4">
		<button class="btn btn-primary mt-2 mb-2" type="button" onclick="add2('text')">Add Text</button>
		<button class="btn btn-primary mt-2 mb-2" type="button" onclick="add2('email')">Add Email</button>
		<button class="btn btn-primary mt-2 mb-2" type="button" onclick="add2('number')">Add Number</button>
		<button class="btn btn-primary mt-2 mb-2" type="button" onclick="add2('radio')">Add Radio Group</button>
		<button class="btn btn-primary mt-2 mb-2" type="button" onclick="add2('checkbox')">Add Checkbox Group</button>
		<button class="btn btn-primary mt-2 mb-2" type="button" onclick="add2('file')">Add Files</button>
		</div>
		
		<div id="form-structure">
			
				<div class="card bg-light shadow mt-2 mb-3 bg-white rounded"  id="elem-1">
				<div class="card-header">
					<div class="font-weight-bold lead"><h4>Text-Field</h4></div>
					<i class="fa fa-times closebtn" onclick = "close2(1)"></i>
				</div>	
					<div class="card-body" >
						<input type="text" name="elem[1]" value="<input class='input2' type='text' name='input[1]'" hidden >
						<label for="field-text-1" class="font-weight-bold">Field Name: </label><br/>
						<input id="input1" class="values2" type="text" name="name-1" required>
						<label class="mt-4 checkbox"><input type="checkbox" name="check-1" value="checked-1" checked><span class="ml-2 lead">Required</span></label>
					</div>
				</div>
				<div class="card bg-light shadow mt-2 mb-3 bg-white rounded"  id="elem-2">
				<div class="card-header">
					<div class="font-weight-bold lead"><h4>Email-Field</h4></div>
					<i class="fa fa-times closebtn" onclick = "close2(2)"></i>
				</div>	
					<div class="card-body" >
						<input type="text" name="elem[2]" value="<input class='input2' type='email' name='input[2]'" hidden >
						<label for="field-text-1" class="font-weight-bold">Field Name: </label><br/>
						<input id="input1" class="values2" type="text" name="name-2" required>
						<label class="mt-4 checkbox"><input type="checkbox" name="check-2" value="checked-1" checked><span class="ml-2 lead">Required</span></label>
					</div>
				</div>
				<div class="card bg-light shadow mt-2 mb-3 bg-white rounded"  id="elem-3">
				<div class="card-header">
					<div class="font-weight-bold lead"><h4>Radio-Field</h4></div>
					<i class="fa fa-times closebtn" onclick = "close2(3)"></i>
				</div>	
					<div class="card-body" >
						
						<label for="field-text-1" class="font-weight-bold">Group Name: </label><br/>
						
						<input id="input1" class="values2" type="text" name="name-3" required>
						<button type="button" class="btn btn-primary btn-sm mt-3" onclick="add_radio(event,'radio')">Add Radio</button><br/>
						<div id="radio-gp-3" class="mt-3 ml-3" style="width:80%">
							
							<div id="elem-radio-1" class="relative">
							<i class="fa fa-times closebtn" onclick = "close23(event)"></i>
								<label for="field-text-1" class="font-weight-light">Radio Name: 	</label><br/>
								<input type="text" name="radio-gp[3][1]" value="<input class='mr-2' type='radio' name='radio-gp-3'" hidden >
								<input id="input1" class="values2 values3" type="text" name="radio-gp-3-name[1]" required>
							</div>
						</div>
						<label class="mt-4 checkbox"><input type="checkbox" name="check-3" value="checked-1" checked><span class="ml-2 lead">Required</span></label>
					</div>
				</div>
    	</div>
			<button type="submit" class="btn btn-primary">Launch Form</button>
			</form>
	</div>
</body>
<script>
	function change(){
		var icon = document.getElementsByClassName('icon');
		icon[0].classList.toggle('change1');
		icon[1].classList.toggle('change2');
		icon[2].classList.toggle('change3');
	}
	var i =3;
	var j = 2; 
	function add_radio(event,box){
		var tags = document.getElementsByClassName('values3');
		var values= new Array();
		for(var k=0;k<tags.length;k++){
			values.push(tags[k].value);
		}
		 var addr = event.target.nextElementSibling.nextElementSibling;
		 //console.log(addr);
		 var id = addr.id;
		 var num2 = id.match(/\d+/ig);
		 num2 = num2[0];
		 var num = addr.lastElementChild.id.match(/\d+/ig);
		 num = Number(num[0])+1;
		 j= num;
		 var hidden = `<input type="text" name="radio-gp[${num2}][${j}]" value="<input class='mr-2'  type='radio' name='${id}'" hidden >`;
		 if(box == "checkbox"){
			 hidden = `<input type="text" name="radio-gp[${num2}][${j}]" value="<input class='mr-2'  type='checkbox' name='${id}[${j}]'" hidden >`;
		 }
		 var head = box.charAt(0).toUpperCase()+box.slice(1);
			addr.innerHTML +=`<div id="elem-radio-${j}" class="relative">
							<i class="fa fa-times closebtn" onclick = "close23(event)"></i>
							${hidden}
							<label for="field-text-${j}" class="font-weight-light">${head} Name: 					</label><br/>
							<input id="input1" class="values2 values3" type="text" name="${id}-name[${j}]" required>
							</div>`;
							j++;
							for(var k=0;k<values.length;k++){
								tags[k].value = values[k];
							}
	}
	function add2(type){
		var tags = document.getElementsByClassName('values2');
		var values= new Array();
		for(var k=0;k<tags.length;k++){
			values.push(tags[k].value);
		}
		//console.log(values);
		//var value1 = document.getElementById('input1').value;
		var head = type.charAt(0).toUpperCase()+type.slice(1);
		var add = document.getElementById('form-structure');
		//console.log(add.innerHTML);
		var addition = `<input type="text" name="elem[${i}]" value="<input class='input2' type='${type}' name='${type}[${i}]'" hidden >`;
		var addition = `<input type="text" name="elem[${i}]" value="<input class='input2' type='${type}' name='input[${i}]'" hidden >`;
		var required = `<label class="mt-4 checkbox"><input type="checkbox" name="check-${i}" value="checked" checked><span class="ml-2 lead">Required</span></label>`;
		if(type=="radio" || type=="checkbox" ){
			var hidden = `<input type="text" name="radio-gp[${i}][1]" value="<input class='mr-2' type='radio' name='radio-gp-${i}'" hidden >`;
		 if(type == "checkbox"){
			 hidden = `<input type="text" name="radio-gp[${i}][1]" value="<input class='mr-2' type='checkbox' name='radio-gp-${i}[1]'" hidden >`;
			 required = "";
		 }
		 var head2 = type.charAt(0).toUpperCase()+type.slice(1);
			addition = `<button type="button" class="btn btn-primary btn-sm mt-3" onclick="add_radio(event,'${type}')">Add ${head2}</button><br/>
						<div id="radio-gp-${i}" class="mt-3 ml-3" style="width:80%">
							
							<div id="elem-radio-1" class="relative">
							<i class="fa fa-times closebtn" onclick = "close23(event)"></i>
								<label for="field-text-1" class="font-weight-light">${head2} Name: 	</label><br/>
								${hidden}
								<input id="input1" class="values2 values3" type="text" name="radio-gp-${i}-name[1]" required>
							</div>
						</div>`;
		}
		add.innerHTML += `<div class="card bg-light shadow mt-2 mb-3 bg-white rounded"  id="elem-${i}">
				<div class="card-header">
					<div class="font-weight-bold lead"><h4>${head}-Field</h4></div>
					<i class="fa fa-times closebtn" onclick = "close2(${i})"></i>
				</div>	
					<div class="card-body" >
						<label for="field-text-${i}" class="font-weight-bold">Field Name: </label><br/>
						<input id="input1" class="values2" type="text" name="name-${i}" required>
						${addition}
						${required}
					</div>
				</div>`;
				i++;
				for(var k=0;k<values.length;k++){
					tags[k].value = values[k];
				}
				//document.getElementById('input1').value = value1;
	}
	function close2(id){
		var drop = document.getElementById('elem-'+id);
		drop.remove();
	}
	function close23(event){
		var drop = event.target.parentElement;
		//console.log(drop);
		drop.remove();
	}
</script>
</html>