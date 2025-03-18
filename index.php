<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Sistema de Biblioteca</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
nav {
    float: right;
    word-spacing: 30px;
    padding: 20px;
   }

nav li {
    display: inline-block;
    line-height: 130px;
}
</style>
</head>
<body>
    <div class="wrapper">
        <header>
        <div class="logo">
            <img src="imagens/BO.png" alt="Logo da Biblioteca">
            <h1 style="color:white">Biblioteca Cidade dos Livros</h1>
        </div>

        <?php
        if(isset($_SESSION['login_user'])) 
        {  // Garante que a variável de sessão existe
            ?>
                <nav>
                    <ul>
                        <li><a href="books.php">Livros</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                    </ul>
                </nav>
            <?php 
        } else 
        { // Caso o usuário não esteja logado, mostrar outro menu
             ?>
                        <nav>
                            <ul>
                                <li><a href="admin_login.php">Login</a></li>
                                <li><a href="feedback.php">Feedback</a></li>
                            </ul>
                        </nav>
        <?php
        }
        ?>

        </header>
        
        <section>
            <div class="sec_img">
               
            </div>
        </section>
        
        <footer>
            <p style="color:white; text-align:center;">
                <br>
                Email:&nbsp; biblioteca_cidadedoslivros@gmail.com<br><br>
                Telemovel:&nbsp; +351 987345***
            </p>
        </footer>
    </div>
</body>
</html>
