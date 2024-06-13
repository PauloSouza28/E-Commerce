<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Verificar se as senhas coincidem
    if ($password !== $confirm_password) {
        echo "As senhas não coincidem. Tente novamente.";
        exit();
    }

    // Criptografar a senha
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Inserir os dados no banco de dados
    $stmt = $db->prepare('INSERT INTO agendatelefonica (nome, telefone, email, password) VALUES (:nome, :telefone, :email, :password)');
    $stmt->bindValue(':nome', $nome, SQLITE3_TEXT);
    $stmt->bindValue(':telefone', $telefone, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':password', $hashed_password, SQLITE3_TEXT);

    if ($stmt->execute()) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados.";
    }
} else {
    echo "Desculpe, não foi possível conectar ao banco de dados SQLite 'usuario_db'.";
}
?>

