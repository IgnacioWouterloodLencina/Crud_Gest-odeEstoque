<?php

include "../infra/conexao.php";

$nome = trim($_POST["nome"]);
$categoria = trim($_POST["categoria"]);
$descricao = trim($_POST["descricao"]);
$preco = $_POST["preco"];
$quantidade = $_POST["quantidade"];
$validade = $_POST["validade"];

if (
    empty($nome) ||
    empty($categoria) ||
    empty($descricao) ||
    empty($preco) ||
    empty($quantidade) ||
    empty($validade)
) {
    die("Preencha todos os campos.");
}

if ($preco < 0 || $quantidade < 0) {
    die("Preço e quantidade não podem ser negativos.");
}

$sql = "INSERT INTO produtos 
        (nome, categoria, descricao, preco, quantidade, validade)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "sssdis",
    $nome,
    $categoria,
    $descricao,
    $preco,
    $quantidade,
    $validade
);

if (!$stmt->execute()) {
    die("Erro ao cadastrar produto.");
}

header("Location: ../index.php");
exit;
?>