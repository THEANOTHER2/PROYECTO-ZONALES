<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.3.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
  <link rel="icon" href="img/logo.png" type="image/x-icon"/>
  <?php


$con = new PDO('mysql:host=localhost;dbname=zonales1;charset=utf8','root','');

if(isset($_POST['login'])){
  
$id = $_POST['ND'];

$query = $con->query("SELECT * FROM jurado WHERE n°_documento=$id");

if($row = $query->fetchObject()){
      $resultSet[]=$row;
}

//var_dump($resultSet);
if(isset($resultSet)){
  
if($resultSet[0]->contraseña==$_POST['pass']){
//  echo "paso";
  $_SESSION['login']=true;
  $_SESSION['user']=$_POST['ND'];
  //header("Location: form.php");
  echo '<script>window.location="form.php";</script>';
}else{
//  header("Location: index.html");
  echo "<script>alert('Usuario o contraseña incorrectos'</script>";
//  echo "nell";
}
}else{
  echo "<script>alert('Usuario o contraseña incorrectos')</script>";
}
//  unset($_POST['login']);
//  echo $_POST['ND'];
}
?>
</head>
<body>

	<div class="modal-dialog text-center">
		<div class="col-sm-8 main-section">
			<div class="modal-content">

  			 <div class="col-12 user-img">
  			 	<img src="img/icons8_Manager_104px.png" alt="">
  			 </div>

  			 <form class="col-12" action="index.php" method="post">
  			 	<div class="form-group">
  			 		<input type="text" class="form-control" placeholder="Número de documento" name="ND" required pattern="[0-9]{3,12}">	
  			 	</div>
  			 	<div class="form-group">
  			 		<input type="password" class="form-control" placeholder="Contraseña" name="pass" required>	
  			 	</div>
  			 	<button type="submit" class="btn" name="login"><i class="fas fa-sign-in-alt"></i>Ingresar</button>
  			 </form>
  			</div>
  		</div>
  	</div>
    
</body>
</html>