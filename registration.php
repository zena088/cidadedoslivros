<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registo do administrador</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style class="text/css">
        body
        {
            height: 650px;
            background-image:  url("imagens/vase.png");
            background-repeat: no-repeat;
        }
        .wrapper
        {
            height: 605px;
            width: 400px;
            background-color: #050a30;
            margin: 0px auto;
            opacity: .9;
            color: white;
            padding: 20px;
        }
        .form-control
        {
            width: 300px;
        }
    </style>

</head>
<body>
        <div class="wrapper">
             <h1 style="text-align: center;font-size: 35px;">Biblioteca cidade dos livros</h1><br>
             <h1 style="text-align: center;font-size: 25px;">Registo do utilizador</h1><br>
           <form name="Registo" action="" method="post">
          
            <div class="Login">
                <input class="form-control" type="text" name="first" placeholder="Primeiro nome" required=""><br>
                <input class="form-control" type="text" name="last" placeholder="Último nome" required=""><br>
                <input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
                <input class="form-control" type="password" name="password" placeholder="Senha" required=""><br>
                <input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
                <input class="form-control" type="text" name="contacto" placeholder="Contato" required=""><br>
                <input class="btn btn-default" type="submit" name="submit" value="Inscreva-se" style="color: black; width: 90px; height: 30px">
            </div>
            </form>
        </div>
<?php
include "connection.php"; // Conectar ao banco de dados

if (isset($_POST['submit'])) {
    // Capturar os dados do formulário
    $first = $_POST['first'];
    $last = $_POST['last'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $contacto = $_POST['contacto']; // Altere para 'contacto'
    $pic = 'image.jpg';

    // Verificar se o nome de usuário já existe na tabela ADMIN
    $stmt_check = $db->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt_check->bind_param("s", $username);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        // Se o nome de usuário já existe
        echo "<script>alert('Este nome de utilizador já está em uso. Escolha outro.');</script>";
    } else {
        // Preparar a consulta para inserir os dados no banco de dados ADMIN
        $stmt = $db->prepare("INSERT INTO admin (first, last, username, password, email, contacto, pic) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $first, $last, $username, $password, $email, $contacto, $pic);


        // Executar a consulta para inserir os dados
        if ($stmt->execute()) {
            echo "<script>alert('Administrador registrado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao registrar administrador: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }

    // Fechar a conexão do statement de verificação
    $stmt_check->close();
}
?>


</body>
</html>
