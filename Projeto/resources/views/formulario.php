<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carros Eloquent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">Carros Eloquent</span>
</nav>

<div class="container">
    <h1>Formulário</h1>
    <form action="/editar/<?= $carro->id_carro ?>" method="post">
        <div class="form-group">
            <label for="txNome">Nome</label>
            <input id="txNome" type="text" name="nome" class="form-control" value="<?= $carro->nome ?>">
        </div>
        <div class="form-group">
            <label for="txMotor">Motor</label>
            <input id="txMotor" type="text" name="motor" class="form-control" value="<?= $carro->motor ?>">
        </div>
        <div class="form-group">
            <label for="txPreco">Preco</label>
            <input id="txPreco" type="number" step="0.01" name="preco" class="form-control" value="<?= $carro->preco ?>">
        </div>
        <div class="form-group">
            <label for="txUrlFoto">Url da Foto</label>
            <input id="txUrlFoto" type="text" name="url_foto" class="form-control" value="<?= $carro->url_foto ?>">
        </div>
        <div class="form-group">
            <label for="txMarca">Marca</label>
            <select name="id_marca" id="txMarca" class="form-control">
                <?php
                    /** @var Collection $marcas */

                    use Illuminate\Support\Collection;

                    foreach ($marcas as $marca) {
                ?>
                    <option <?= $carro->id_marca == $marca->id_marca ? 'selected' : '' ?> value="<?= $marca->id_marca ?>"><?= $marca->nome ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <button class="btn btn-primary btn-block">Salvar</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

