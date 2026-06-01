<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos Laravel</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>

    <form action="/produtos" method="post">
        @csrf

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" required><br><br>

        <label for="estoque">Estoque:</label>
        <input type="number" id="estoque" name="estoque" required><br><br>

        <button type="submit">Salvar</button>
    </form>

    <h2>Lista de Produtos</h2>

    @if($produtos->isEmpty())
        <p>Nenhum Produto Cadastrado</p>
    @else
        <ul>
            @foreach($produtos as $produto)
                <li>
                    {{ $produto->nome }} - R$ {{ number_format($produto->preco,2 , ',', '.') }} - Estoque: {{ $produto->estoque }}
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>