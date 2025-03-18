<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="uft-8">
	<meta nome="viewport" content="width=device-widh, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
	<div  class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand active">Biblioteca Cidade dos Livros</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php">Pagina Inicial</a></li>
				<li><a href="student.php">Informação-Estudante</a></li>
				
			</ul>
			<?php
				if(isset($_SESSION['login_user']))
				{?>
						<ul class="nav navbar-nav">	
							<li><a href="feedback.php">Feedback</a></li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right">
							<li><a href="">
								<div class="color: white">
									<?php
										echo "<img class='img-cicle profile_img'
										height=45 width=45 src='imagens/".$_SESSION['pic']."'>";
										echo " ".$_SESSION['login_user'];
									?>
								</div>
							</a></li>
							<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
					  	</ul>
					<?php
				}
				else
				{		?>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>

						<li><a href="registration.php"><span class="glyphicon glyphicon-user">SIGN UP</span></a></li>
					</ul>
						<?php
				}
			?>

			

		</div>
	</nav>
</body>
</html>