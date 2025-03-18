<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Livros</title>
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
<body>
	<!--_____________________________sidenav_____________________________________-->

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

  <div class="h"><a href="profile.php">Perfil</a></div>
  <div class="h"><a href="books.php">Livros</a></div>
  <div class="h"><a href="add.php">Adicionar livro</a></div>
  <div class="h"><a href="request.php">Solicitações de Livros</a></div>
  <div class="h"><a href="#">Informar sobre um problema</a></div>
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
  document.body.style.backgroundColor = "white";
}
</script>
	<!--________________________procurar letra________________________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="Procurar" required="">
				<button style="background-color: #86b6df" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>	
		</form>

		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="id" placeholder="Insirir id do livro" required="">
				<button style="background-color: #86b6df" type="submit" name="submit1" class="btn btn-default">Eliminar</button>	
		</form>
	</div>
	<h2>Lista de livros</h2>
	
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' ");
			if(mysqli_num_rows($q)==0)
			{
				echo "Desculpa! Não encotramos o livro. Tente procurar de novo.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";	
			echo "<tr style='background-color: #86b6df;'>";

				echo "<th>"; echo "ID"; echo "</th>";
				echo "<th>"; echo "Livros-Nome"; echo "</th>";
				echo "<th>"; echo "Autores Nomes"; echo "</th>";
				echo "<th>"; echo "Edição"; echo "</th>";
				echo "<th>"; echo "Status"; echo "</th>";
				echo "<th>"; echo "Quantidade"; echo "</th>";
				echo "<th>"; echo "Departamento"; echo "</th>";
			echo "</tr>";

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['id']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
			}
		}

		/* se o butao não funcionar .*/
		else
		{
				$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC ;");

		echo "<table class='table table-bordered table-hover' >";	
			echo "<tr style='background-color: #86b6df;'>";

				echo "<th>"; echo "ID"; echo "</th>";
				echo "<th>"; echo "Livros-Nome"; echo "</th>";
				echo "<th>"; echo "Autores Nomes"; echo "</th>";
				echo "<th>"; echo "Edição"; echo "</th>";
				echo "<th>"; echo "Status"; echo "</th>";
				echo "<th>"; echo "Quantidade"; echo "</th>";
				echo "<th>"; echo "Departamento"; echo "</th>";
			echo "</tr>";

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['id']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
		}
		if(isset($_POST['submit1']))
		{
		    if(isset($_SESSION['login_user']))
		    {
		        mysqli_query($db,"DELETE from books where id='$_POST[id]';");
		        ?>
		            <script type="text/javascript">
		                alert("Eliminado com sucesso.");
		            </script>
		        <?php
		    }
		    else
		    {
		        ?>
		            <script type="text/javascript">
		                alert("Primeiro fazer o login.");
		            </script>
		        <?php
		    }
		}

		
	?>


</div>
</body>
</html>