
<?php
    var_dump($_POST);
    die();
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $data_nasc = $_POST['data_nasc'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];


    try {
        include_once('conexao.php');
        // A variável $pdo, usada a seguir, está vindo do conexao.php

        $consulta = $pdo->prepare("INSERT INTO pessoas
        (nome, sobrenome, cpf, rg, data_de_nascimento, telefone, email)
        VALUES
        (:nome, :sobrenome,:cpf, :rg, :data_de_nascimento, :telefone, :email)");
        
        $consulta->bindValue(":nome", $nome); 
        $consulta->bindValue(":sobrenome", $sobrenome);
        $consulta->bindValue(":cpf", $cpf);
        $consulta->bindValue(":rg", $rg);
        $consulta->bindValue(":data_de_nascimento", $data_nasc);
        $consulta->bindValue(":telefone", $telefone);
        $consulta->bindValue(":email", $email);
        

        $consulta->execute();

    } catch(Exception $e) {
        die("Erro de banco de dados: " . $e->getMessage());
    }

    header('location: index.php');
?>

 