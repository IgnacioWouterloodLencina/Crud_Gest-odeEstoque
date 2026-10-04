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
        
<div>

            <h2>Produtos cadastrados</h2>

            <table>

                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Validade</th>
                    <th>Ações</th>
                </tr>

                <?php while ($produto = mysqli_fetch_assoc($produtos)) { ?>

                    <tr>

                        <td>
                            <?php echo $produto["id"] ?>
                        </td>

                        <td>
                            <?php echo $produto["nome"] ?>
                        </td>

                        <td>
                            <?php echo $produto["categoria"] ?>
                        </td>

                        <td>
                            <?php echo $produto["descricao"] ?>
                        </td>

                        <td>
                            R$ <?php echo $produto["preco"] ?>
                        </td>

                        <td>
                            <?php echo $produto["quantidade"] ?>
                        </td>

                        <td>
                            <?php echo $produto["validade"] ?>
                        </td>

                        <td>

                            <a href="public/editar.php?id=<?php echo $produto["id"] ?>">
                                Editar
                            </a>

                            <a href="public/excluir.php?id=<?php echo $produto["id"] ?>">
                                Excluir
                            </a>

                        </td>

                    </tr>

                <?php } ?>

            </table>

        </div>

       

    </main>

    <footer>

    </footer>

</body>

</html>