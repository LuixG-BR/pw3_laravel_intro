<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros Laravel</title>
</head>
<body>
    <h1>Cadastro de Livros</h1>
    
    <form action="/livros" method="post">
        @csrf

        <label for="titulo">Titulo:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required><br><br>

        <label for="ano_publicacao">Ano de Publicação:</label>
        <input type="number" id="ano_publicao" name="ano_publicacao" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <h2>Lista de Livros</h2>

    @if($livros->isEmpty())
        <p>Nenhum Livro Cadastrado</p>
    @else
        <ul>
            @foreach($livros as $livro)
                <li>
                    {{ $livro->titulo }} - {{ $livro->autor }} - {{ $livro->ano_publicacao }}
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>