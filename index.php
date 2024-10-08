<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "formularioteste";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


$stmt = $conn->prepare("INSERT INTO formularioprincipal (nome, sobrenome, idade, celular, principal, whatsapp, email, corporativo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssissssss", $nome, $sobrenome, $idade, $celular, $principal, $whatsapp, $email, $corporativo);

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$idade = $_POST['idade'];
$celular = $_POST['Celular'];
$principal = $_POST['Principal'];
$whatsapp = $_POST['WhatsApp'];
$email = $_POST['Email'];
$corporativo = $_POST['Corporativo'];

if ($stmt->execute()) {
    echo "Novo registro criado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
