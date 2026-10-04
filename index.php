<?php

include "infra/conexao.php";

$produtos = mysqli_query($conexao, "SELECT * FROM produtos");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>estoque do ingacio</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>

    <header>
        <h1>estoque do ingacio</h1>
    </header>

    <main>

        <h2>botar um novo produto</h2>

        <form action="public/cadastrar.php" method="POST">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>

            <br>

            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" required>

            <br>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" required></textarea>

            <br>

            <label for="preco">Preço:</label>
            <input type="number" name="preco" step="0.01" min="0" required>

            <br>

            <label for="quantidade">Quantidade em estoque:</label>
            <input type="number" name="quantidade" min="0" required>

            <br>

            <label for="validade">Data de validade:</label>
            <input type="date" name="validade" required>

            <br>

            <button type="submit">Cadastrar</button>

        </form>


       

    </main>

    <footer>

    </footer>

</body>

</html>