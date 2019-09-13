<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carros Eloquent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
    /** @var Collection $marcas */

    $marcas;

    use App\Marca;
    use Illuminate\Support\Collection;

?>
<nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">Carros Eloquent</span>
</nav>

<div class="container">
    <h1>Selecione a marca</h1>
    <h3>Filtros</h3>
    <form action="/" class="row">
        <div class="col-5">
            <div class="form-group">
                <label for="txNome">Nome</label>
                <input id="txNome" type="text" name="nome" class="form-control">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="txPrecoDe">Preco De</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">R$</div>
                    </div>
                    <input id="txPrecoDe" name="preco_de" type="number" class="form-control" step="0.01">
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="txPrecoAte">Preco Até</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">R$</div>
                    </div>
                    <input id="txPrecoAte" name="preco_ate" type="number" class="form-control" step="0.01">
                </div>
            </div>
        </div>
        <div class="col-2" style="margin-top: 2rem;">
            <button class="btn btn-primary btn-block">Filtrar</button>
        </div>
    </form>

    <div class="row mt-5">
        <?php
            /**
             * @var Marca $marca
             */
            foreach ($marcas as $marca) {
                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <a href="/catalogo/<?= $marca->id_marca ?>"><?= $marca->nome ?></a>
                        </div>
                        <div class="card-body">
                            <img src="<?= $marca->url_logo ?>"
                                 alt="<?= $marca->nome ?> Logo" class="img-fluid">
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
