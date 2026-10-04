<?php

include "../infra/conexao.php";

$id = $_POST["id"];
$nome = trim($_POST["nome"]);
$categoria = trim($_POST["categoria"]);
$descricao = trim($_POST["descricao"]);
$preco = $_POST["preco"];
$quantidade = $_POST["quantidade"];
$validade = $_POST["validade"];

if (
    empty($id) ||
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

$sql = "UPDATE produtos SET
        nome = ?,
        categoria = ?,
        descricao = ?,
        preco = ?,
        quantidade = ?,
        validade = ?
        WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "sssdisi",
    $nome,
    $categoria,
    $descricao,
    $preco,
    $quantidade,
    $validade,
    $id
);

if (!$stmt->execute()) {
    die("Erro ao atualizar produto.");
}

header("Location: ../index.php");
exit;
?>