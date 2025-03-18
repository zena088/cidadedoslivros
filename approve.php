<?php
    include "connection.php";

    if (isset($_GET['request_id']) && isset($_GET['action'])) {
        $request_id = $_GET['request_id'];
        $action = $_GET['action'];

        if ($action == 'approve') {
            // Atualizar o status da solicitação
            $query = "UPDATE book_requests SET status = 'Aprovado' WHERE id = '$request_id'";
            if (mysqli_query($db, $query)) {
                // Se aprovado, mova para a tabela de livros emprestados
                $fetch_query = "SELECT * FROM book_requests WHERE id = '$request_id'";
                $fetch_result = mysqli_query($db, $fetch_query);
                $row = mysqli_fetch_assoc($fetch_result);

                $username = $row['username'];
                $book_id = $row['book_id'];
                $book_name = $row['book_name'];
                $return_date = date('Y-m-d', strtotime('+14 days')); // 2 semanas

                // Inserir na tabela de livros emprestados
                $insert_query = "INSERT INTO issued_books (username, book_id, book_name, return_date) 
                                 VALUES ('$username', '$book_id', '$book_name', '$return_date')";
                mysqli_query($db, $insert_query);

                // Atualizar o status do livro
                $update_book_query = "UPDATE books SET status = 'Emprestado' WHERE id = '$book_id'";
                mysqli_query($db, $update_book_query);
            }

        } elseif ($action == 'reject') {
            // Atualizar o status da solicitação
            $query = "UPDATE book_requests SET status = 'Rejeitado' WHERE id = '$request_id'";
            mysqli_query($db, $query);
        }

        // Redirecionar de volta para a página de solicitações
        header("Location: request.php");
        exit();
    } else {
        // Se os parâmetros não estiverem definidos
        header("Location: request.php");
        exit();
    }
?>
