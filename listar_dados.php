<?php
include 'conexao.php';

// Consultar a tabela agendatelefonica
$query = "SELECT * FROM agendatelefonica";
$results = $db->query($query);

// Exibir os dados
echo "<h1>Lista de Contatos</h1>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Password</th>
        </tr>";

while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['telefone']}</td>
            <td>{$row['email']}</td>
            <td>{$row['password']}</td>
          </tr>";
}

echo "</table>";
?>
