<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Solicitações de Livros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
        body {
            font-family: "Lato", sans-serif;
            transition: background-color .5s;
        }

        /* Barra lateral */
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

        .img-cicle {
            margin-left: 20px;
        }

        .h:hover {
            color: white;
            width: 350px;
            height: 75px;
            background-color: #99bedf;
        }

        /* Estilo da tabela */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        .table th {
            background-color: #86b6df;
            color: white;
        }
    </style>
</head>
<body>

<!-- Barra lateral -->
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div style="color: white; margin-left: 60px; font-size: 20px;">
        <?php
            if(isset($_SESSION['login_user'])) {
                echo "<img class='img-cicle profile_img' height=100 width=100 src='imagens/".$_SESSION['pic']."'>";
                echo "<br><br>";
                echo "Bem-vindo/a ".$_SESSION['login_user'];
            }
        ?>
    </div><br><br>
    <div class="h"> <a href="profile.php">Perfil</a></div>
    <div class="h"> <a href="books.php">Livros</a></div>
    <div class="h"> <a href="request.php">Solicitações</a></div>
    <div class="h"> <a href="issue_info.php">Informar Problema</a></div>
</div>

<div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
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

<h2>Solicitações de Livros</h2>

<?php
    // Consulta SQL para buscar todas as solicitações
    $query = "SELECT * FROM issue_book";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table'>";
        echo "<tr>";
        echo "<th>Usuário</th><th>ID do Livro</th><th>Nome do Livro</th><th>Data de Empréstimo</th><th>Data de Retorno</th><th>Status</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . (isset($row['username']) ? $row['username'] : 'N/A') . "</td>";
            echo "<td>" . (isset($row['id']) ? $row['id'] : 'N/A') . "</td>";
            echo "<td>" . (isset($row['book_name']) ? $row['book_name'] : 'N/A') . "</td>";
            echo "<td>" . (isset($row['issue_date']) ? $row['issue_date'] : 'N/A') . "</td>";
            echo "<td>" . (isset($row['return_date']) ? $row['return_date'] : 'N/A') . "</td>";
            echo "<td>" . (isset($row['approve']) ? $row['approve'] : 'Em análise') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color:red;'>Nenhuma solicitação encontrada.</p>";
    }
?>

</body>
</html>
