<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login administrador</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="uft-8">
	<meta nome="viewport" content="width=device-widh, initial-scale=1">

		<link rel="stylesheet" href=<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/ bootstrap.min.js"></script>

	<style class="text/css">
		body
		{
			height: 650px;
			background-image: url("imagens/logoo.png");
			background-repeat: no-repeat;
		}
		.wrapper
		{
			width: 400px;
			height: 400px;
			margin:100px auto;
			background-color: white;
			opacity: .8; 
			color: black;
			padding: 27px 15px;
		}
		.form-control
		{
			width: 300px;
		}
	</style>

</head>
<body>
	  <div class="wrapper">
		   	 <h1 style="text-align: center;font-size: 35px;">Biblioteca cidade dos livros</h1>
		     <h1 style="text-align: center;font-size: 25px;">Login de administrador</h1><br>
		  <form name="Login" action="" method="POST">
		  	
		  	<div class="Login">
		  		<input class="form-control" type="text" name="username" placeholder="username" required=""><br>
		  		<input class="form-control" type="password" name="password" placeholder="password" required=""><br>
		  		<input class="btn btn-default"type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px">
		  
		 	  <p style="color: white; padding-left: 20px;">
				    <br><br>
				    <a style="color:black;" href="update_password.php">Esqueceu a senha?</a>  
			   </p>
			   <p style="color: white; padding-left: 20px;">
				    <br><br>
				    <a style="color:black;" href="registration.php">Novo
				    ? Escreva-se aqui </a>  
			   </p>
			</div>
		   </form>
		</div>
    

	<?php

		if(isset($_POST['submit']))
		{
			$count=0;
			$res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");

			$row= mysqli_fetch_assoc($res);

			$count=mysqli_num_rows($res);

			if($count==0)
			{
				?>
						<!--
						<script type="text/javascript">
							alert("O nome do utilizador e a senha não correspondem.")
						</script>
						-->
					<div class="alert alert-danger" style="width: 700px; margin-left:  300px">
						<strong> O nome do administrador e a senha não correspondem.</strong>
					</div>
				<?php
			}
			else
			{
				$_SESSION['login_user'] = $_POST['username'];
				$_SESSION['pic'] = $row['pic'];

				?>
					<script type="text/javascript">
						window.location="index.php"
					</script>
				<?php
			}
		}
	?>
</body>
</html>