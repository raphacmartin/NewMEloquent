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
    <?php
    /** @var Collection $carros */

        use App\Carro;
        use Illuminate\Support\Collection;

    ?>
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Carros Eloquent</span>
    </nav>

    <div class="container">
        <div>
            <a href="/cadastro" class="btn btn-success float-right">Novo +</a>
            <h1>Catalogo</h1>
        </div>
        <h3>Filtros</h3>
        <form action="/" class="row">
            <div class="col-5">
                <div class="form-group">
                    <label for="txNome">Nome</label>
                    <input id="txNome" type="text" name="nome" class="form-control">
                </div>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <label for="txPreco">Preco</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">R$</div>
                        </div>
                        <input id="txPreco" name="preco" type="number" class="form-control" id="txPreco">
                    </div>
                </div>
            </div>
            <div class="col-2" style="margin-top: 2rem;">
                <button class="btn btn-primary btn-block">Filtrar</button>
            </div>
        </form>

        <div class="row mt-5">
            <?
                /** @var Carro $carro */
                foreach ($carros as $carro) {?>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <img src="<?= $carro->url_foto ?>" alt="<?= $carro->nome ?> Logo" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <h3><?= $carro->nome ?></h3>
                            <p><?= $carro->motor ?></p>
                            <p><?= $carro->preco ?></p>
                            <a href="/editar/<?= $carro->id_carro ?>" class="btn btn-block btn-primary">Editar</a>
                        </div>
                    </div>

                </div>
                <?}
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
