<?php

include "../infra/conexao.php";

$id = $_GET["id"];

$sql = "SELECT * FROM produtos WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();

$produto = $resultado->fetch_assoc();

if (!$produto) {
    die("Produto não encontrado.");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestão de Estoque</title>

    <link rel="stylesheet" href="../style/styles.css">
</head>

<body>

    <header>
        <h1>Gestão de Estoque</h1>
    </header>

    <main>

        <h2>Editando produto</h2>

        <form action="atualizar.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $produto["id"]; ?>">

            <label>Nome:</label>
            <input
                type="text"
                name="nome"
                value="<?php echo htmlspecialchars($produto["nome"]); ?>"
                required
            >

            <br>

            <label>Categoria:</label>
            <input
                type="text"
                name="categoria"
                value="<?php echo htmlspecialchars($produto["categoria"]); ?>"
                required
            >

            <br>

            <label>Descrição:</label>
            <textarea name="descricao" required><?php echo htmlspecialchars($produto["descricao"]); ?></textarea>

            <br>

            <label>Preço:</label>
            <input
                type="number"
                name="preco"
                step="0.01"
                min="0"
                value="<?php echo $produto["preco"]; ?>"
                required
            >

            <br>

            <label>Quantidade:</label>
            <input
                type="number"
                name="quantidade"
                min="0"
                value="<?php echo $produto["quantidade"]; ?>"
                required
            >

            <br>

            <label>Validade:</label>
            <input
                type="date"
                name="validade"
                value="<?php echo $produto["validade"]; ?>"
                required
            >

            <br>

            <button type="submit">Atualizar</button>

        </form>

    </main>

</body>

</html>