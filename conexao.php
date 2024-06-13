<?php
$db = new SQLite3('agenda.db');

if ($db) {
    $query = "CREATE TABLE IF NOT EXISTS agendatelefonica (
                id INTEGER PRIMARY KEY, 
                nome TEXT, 
                telefone TEXT,
                email TEXT,
                password TEXT
              )";
    $db->exec($query);
    echo "Tabela criada com sucesso.";
} else {
    echo "Desculpe, não foi possível conectar ao banco de dados SQLite 'agenda'.";
}
?>
