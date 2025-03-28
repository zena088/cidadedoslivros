<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Informações do estudante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch
		{
			padding-left: 1000px;
		}

		body {
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

@media screen and (max-height: 300px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
{
	margin-left: 60px;
}
	</style>
</head>
<body>

	<!--_____________________________sidenav_____________________________________-->

	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  		<div style="color: white; margin-left: 20px; font-size: 20px;">
			<?php
				echo "<img class='img-cicle profile_img'
					height=100 width=100 src='imagens/".$_SESSION['pic']."'>";

				echo "</br></br>";

				echo "Bem-vindo/a".$_SESSION['login_user'];
			?>
		</div>
  <a href="profile.php">Perfis</a>
  <a href="books.php">Livros</a>
  <a href="#">Solicitações de Livros</a>
  <a href="#">Informações sobre o problema</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>

	<!--________________________procurar letra________________________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="Procurar estudante" required="">
				<button style="background-color: #86b6df" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			
		</form>
	</div>
	<h2>Lista de estudantes</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT first,last,username,email,contacto FROM `student` where username like '%$_POST[search]%' ");
			if(mysqli_num_rows($q)==0)
			{
				echo "Desculpa! Não encotramos o estudante com este nome de utilizador. Tente procurar de novo.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";	
			echo "<tr style='background-color: #86b6df;'>";

				echo "<th>"; echo "Primeiro nome"; echo "</th>";
				echo "<th>"; echo "Ultimo nome"; echo "</th>";
				echo "<th>"; echo "Username"; echo "</th>";
				echo "<th>"; echo "Email"; echo "</th>";
				echo "<th>"; echo "Contacto"; echo "</th>";

			echo "</tr>";

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['contacto']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
			}
		}

		/* se o butao não funcionar .*/
		else
		{
				$res=mysqli_query($db,"SELECT first,last,username,email,contacto FROM `student`;");

		echo "<table class='table table-bordered table-hover' >";	
			echo "<tr style='background-color: #86b6df;'>";

				echo "<th>"; echo "Primeiro nome"; echo "</th>";
				echo "<th>"; echo "Ultimo nome"; echo "</th>";
				echo "<th>"; echo "Username"; echo "</th>";
				echo "<th>"; echo "Email"; echo "</th>";
				echo "<th>"; echo "Contacto"; echo "</th>";

			echo "</tr>";

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['contacto']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
		}
;	?>

</body>
</html>