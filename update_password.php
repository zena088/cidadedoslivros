<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Alterar a palavra-passe</title>

	<style type="text/css">
		body
		{
			height: 650px;
			background-image: url("imagens/Segurança4.png");
			background-repeat: no-repeat;
		}
		.wrapper
		{
			width: 400px;
			height: 350px;
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
		<div style="text-align: center;">
			<h1 style="text-align: center;font-size: 30px;">Alterar a sua palavra-passe</h1>
		</div>
		<div style="padding-left: 30px">
		<form action="" method="post">
			<input type="text" name="username" class="form-control"
			placeholder="username" required=""><br>
			<input type="text" name="email" class="form-control"
			placeholder="Email" required=""><br>
			<input type="text" name="password" class="form-control"
			placeholder="Nova palavra-passe" required=""><br>
			<button class="btn btn-defaul" type="submit" name="submit" >Atualizar</button>
			
		</form>
	</div>
	<?php
		if(isset($_POST['submit']))
		{
			if($sql=mysqli_query($db,"UPDATE admin SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]' ;"))
			{
				?>
					<script type="text/javascript">alert("palavra-passe alterada com sucesso.");</script>
				<?php
			}
		}
	?>
	</div>
</body>
</html>