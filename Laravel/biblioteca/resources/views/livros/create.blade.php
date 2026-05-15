<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Cadastro de Livros</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container mt-5">

    <div class="card shadow-lg p-4">

        <h1 class="text-center mb-4">
            Cadastro de Livros
        </h1>

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        @if($errors->any())

            <div class="alert alert-danger">

                <ul>

                    @foreach($errors->all() as $erro)

                        <li>{{ $erro }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="/livros/store" method="POST">

            @csrf

            <div class="mb-3">

                <label>Título</label>

                <input
                    type="text"
                    name="titulo"
                    class="form-control"
                    required
                >

            </div>

            <div class="mb-3">

                <label>Autor</label>

                <input
                    type="text"
                    name="autor"
                    class="form-control"
                    required
                >

            </div>

            <div class="mb-3">

                <label>Ano</label>

                <input
                    type="number"
                    name="ano"
                    class="form-control"
                    required
                >

            </div>

            <div class="mb-3">

                <label>Categoria</label>

                <select
                    name="categoria_id"
                    class="form-select"
                    required
                >

                    <option value="">
                        Selecione
                    </option>

                    @foreach($categorias as $categoria)

                        <option value="{{ $categoria->id }}">

                            {{ $categoria->nome }}

                        </option>

                    @endforeach

                </select>

            </div>

            <button class="btn btn-primary w-100">

                Cadastrar Livro

            </button>

        </form>

    </div>

</div>
<hr class="my-5">

<h2 class="mb-4">
    Livros Cadastrados
</h2>

<table class="table table-dark table-striped">

    <thead>

        <tr>

            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
            <th>Categoria</th>

        </tr>

    </thead>

    <tbody>

        @foreach($livros as $livro)

            <tr>

                <td>{{ $livro->id }}</td>

                <td>{{ $livro->titulo }}</td>

                <td>{{ $livro->autor }}</td>

                <td>{{ $livro->ano }}</td>

                <td>{{ $livro->categoria->nome }}</td>

            </tr>

        @endforeach

    </tbody>

</table>
</body>
</html>