<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consultar o banco de dados para verificar se o email existe
    $stmt = $db->prepare("SELECT * FROM agendatelefonica WHERE email = :email");
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $result = $stmt->execute();
    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user) {
        // Verificar se a senha está correta
        if (password_verify($password, $user['password'])) {
            echo "Login bem-sucedido! Bem-vindo, " . $user['nome'] . ".";
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Email não encontrado.";
    }
}
?>
