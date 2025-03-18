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
      height: 650px;
      background-image: url("imagens/add.png");
      background-repeat: no-repeat;
  background-color: white;
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

.book
{
  width: 400px;
  margin: 0px auto;
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

  <div class="h"> <a href="profile.php">Perfil</a></div>
  <div class="h"> <a href="books.php">Livros</a></div>
  <div class="h"> <a href="add.php">Adicionar livro</a></div>
  <div class="h"> <a href="delete.php">Eliminar livro</a></div>
  <div class="h"> <a href="#">Solicitações de Livros</a></div>
  <div class="h"> <a href="#">Informar sobre um problema</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

  <div class="container">
    <h2 style="color: black; font-family: Lucida Console; text-align: center;"><b>Adicionar livro novo<b></h2>

    <form class="book" action="" method="post">
      <input type="text" name="id" class="form-control" placeholder="ID de livro"><br>
      <input type="text" name="name" class="form-control" placeholder="Nome do livro"><br>
      <input type="text" name="authors" class="form-control" placeholder="Nome de autor"><br>
      <input type="text" name="edition" class="form-control" placeholder="Edição"><br>
      <input type="text" name="status" class="form-control" placeholder="status"><br>
      <input type="text" name="quantity" class="form-control" placeholder="Quantidade"><br>
      <input type="text" name="department" class="form-control" placeholder="Departamento"><br>

      <button class="btn btn-defaul" type="submit" name="submit">Adicionar</button>
    </form>
  </div>

<?php
  if(isset($_POST['submit']))
  {
    if(isset($_SESSION['login_user']))
    {
      mysqli_query($db,"INSERT INTO books VALUES ('$_POST[id]', '$_POST[name]', '$_POST[authors]', '$_POST[edition]', '$_POST[status]','$_POST[quantity]', '$_POST[department]');");
      ?>
        <script type="text/javascript">
          alert("Livro adicionado com sucesso.")
        </script>
      <?php
    }
    else
    {
      ?>
        <script type="text/javascript">
          alert("Você precisa de fazer o login!")
        </script>
      <?php
    }    
  }
?>

</div>

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
</body>