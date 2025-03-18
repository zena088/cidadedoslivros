<?php
	include "connection.php"; // Certifique-se de que este arquivo conecta corretamente ao banco de dados.
	include "navbar.php";
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

	<style type="text/css">
		body {
			background-image: url("imagens/feed.jpg");
		}
		.wrapper {
			padding: 10px;
			margin: 20px auto;
			width: 900px;
			height: 600px;
			background-color: white;
			opacity: .8;
			color: black;
		} 
		.form-control {
			height: 70px;
			width: 60%;
		}
	</style>
</head>  

<body>
	<div class="wrapper">
		<h4>Se tiver alguma sugestão ou questão, por favor, comente abaixo.</h4>
		
		<form action="" method="post">
			<input class="form-control" type="text" name="comments" placeholder="Ajude-nos a melhorar, por favor..." required><br>
			<input class="btn btn-default" type="submit" name="submit" value="Submeter" style="width: 100px; height: 40px;">
		</form>
	</div>
	<div>
		<?php
			if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `comments` VALUES('$_POST[comments]')";
				if(mysqli_query($db,$sql))
				{
				}
				// não queria a tebela que aparecia as mensagens enviadas 
			}
		?>
	</div>
</body>
</html>