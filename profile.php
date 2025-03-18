<?php
include "connection.php";
include "navbar.php"; // Se já contém session_start(), não precisa aqui.

if (!isset($_SESSION["login_user"])) {
    echo "<script>alert('Por favor, faça login primeiro!');</script>";
    echo "<script>window.location='login.php';</script>";
    exit;
}
?>

 <!DOCTYPE html>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Perfil</title>
 	<style type="text/css">
 		.wrapper
 		{
 			width: 400 px;
 			margin: 0 auto;
 			color: white;
 		}

 		.srch
		{
			padding-left: 1000px;
		}
		body {
      height: 650px;
      background-image: url("imagens/profile.png");
      background-repeat: no-repeat;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 150px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-cicle
{
	margin-left: 20px;
}
.h:hover
{
	color: white;
	width: 350px;
	height: 75px;
	background-color: #99bedf;
}
 	</style>
 </head>
 
 <body style= "background-color: #04206b;">
 	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  		<div style="color: white; margin-left: 60px; font-size: 20px;">
			<?php
				echo "<img class='img-cicle profile_img'
					height=100 width=100 src='imagens/".$_SESSION['pic']."'>";

				echo "</br></br>";

				echo "Bem-vindo/a   ".$_SESSION['login_user'];
			?>
		</div><br><br>

  <div class="h"> <a href="profile.php">Perfil</a></div>
  <div class="h"> <a href="books.php">Livros</a></div>
  <div class="h"> <a href="add.php">Adicionar livro</a></div>
  <div class="h"> <a href="delete.php">Eliminar livro</a></div>
  <div class="h"> <a href="request.php">Solicitações de Livros</a></div>
  <div class="h"> <a href="#">Informar sobre um problema</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#04206b";
}
</script>
 	<div class=container>
 		<form action="" method="post">
 			<button class="btn btn-defaul" style="float:right; width: 70px;" name="submit1">Editar</button>
 		</form>
 		<div class="wrapper">
 			<?php

 				$q=mysqli_query($db,"SELECT * FROM admin where username='$_SESSION[login_user]' ;");
 			?>
 			<h2 style="text-align: center;">Meu perfil</h2>

 			<?php
 				$row=mysqli_fetch_assoc($q);

 				echo "<div style='text-align: center'>
 					<img class='img-cicle profile-img' height=105 width=105 src='imagens/".$_SESSION['pic']."'>
 				</div>";
 			?>
 			<div style="text-align: center;"><b>Bem vindo/a, </b>
 				<h4>
 					<?php echo $_SESSION['login_user']; ?>
 				</h4> 				
 			</div>
 			<?php
 				echo "<b>";
 				echo "<table class='table table-bordered'";

 					echo "<tr>";
 						echo "<td>";
 							echo "<b> Primeiro Nome: </b>";
 						echo "</td>";
 						echo "<td>";
 							echo $row['first'];
 						echo "</td>";
 					echo "</tr>";

 					echo "<tr>";
 						echo "<td>";
 							echo "<b> Ultimo Nome: </b>";
 						echo "</td>";
 						echo "<td>";
 							echo $row['last'];
 						echo "</td>";
 					echo "</tr>";

 					echo "<tr>";
 						echo "<td>";
 							echo "<b> Nome de Utilizador: </b>";
 						echo "</td>";
 						echo "<td>";
 							echo $row['username'];
 						echo "</td>";
 					echo "</tr>";

 					echo "<tr>";
 						echo "<td>";
 							echo "<b> Palavra - passe: </b>";
 						echo "</td>";
 						echo "<td>";
 							echo $row['password'];
 						echo "</td>";
 					echo "</tr>";

 					echo "<tr>";
 						echo "<td>";
 							echo "<b> Email: </b>";
 						echo "</td>";
 						echo "<td>";
 							echo $row['email'];
 						echo "</td>";
 					echo "</tr>";

 					echo "<tr>";
 						echo "<td>";
 							echo "<b> Contacto: </b>";
 						echo "</td>";
 						echo "<td>";
 							echo $row['contacto'];
 						echo "</td>";
 					echo "</tr>";

 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>