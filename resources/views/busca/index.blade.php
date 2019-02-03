<?php
// $buscaEfetuada = isset($lista) && count($lista) > 0;
$filtro = Request::input('filtro');
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            .sem-destaque {
                color: #888;
            }
            .badge-primary-light {
                color: #fff;
                background-color: #91c6ff;
            }
            .filtro {
                margin-bottom: 10px;
                cursor: pointer;
            }
            .center {
                text-align: center;
            }
            .destaque {
                color: #447CFF;
                font-weight: bold;
                font-size: 120%;
            }
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
        function aplicaFiltro(tipo) {
            jQuery('#inputfiltro').val(tipo);
            jQuery('#formbusca').submit();
        }
        </script>
    </head>
    <body>
        <!-- menu -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Ocorrências Online</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link active" href="<?= route('busca') ?>">Consulta de Histórico <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Registro de ocorrência</a>
                </div>
            </div>
        </nav>
        <!-- menu fim -->
        <div class="container-fluid">
            <br />
            <div class="row">
                <div class="col center">
                    <h2>Consulta de Histórico</h2>
                </div>
            </div>
            <?php if ($buscaEfetuada): ?>
            <br />
            <div class="row espaco">
                <div class="col">
                    <span class="sem-destaque">Filtrar por</span> <span onClick="aplicaFiltro('responsavel');" class="badge badge-primary<?=($filtro!='responsavel') ? '-light' : '';?> filtro">responsável</span> <span onClick="aplicaFiltro('enderecos');" class="badge badge-primary<?= ($filtro != 'enderecos') ? '-light' : ''; ?> filtro">endereços</span>
                </div>
            </div>
            <?php endif; ?>
            <br />
            <form id="formbusca" name="teste" action="">
                <div class="row">
                    <div class="col">
                        <input id="inputfiltro" type="hidden" name="filtro" value="<?= Request::input('filtro') ?>" />
                        <input name="busca" value="<?= Request::input('busca') ?>" type="text" class="form-control form-control-lg" placeholder="Endereços ou responsáveis...">
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col center">
                        <button type="submit" class="btn btn-primary btn-lg">Buscar</button>
                    </div>
                </div>
            </form>
            <?php if ($buscaEfetuada): ?>
                <?php if(count($lista) > 0): ?>
                    <br />
                    <div class="row">
                        <div class="col">
                            <span class="sem-destaque">Mostrando resultados para</span> <span class="bold"><?= Request::input('busca') ?></span>
                            <?php if (Request::input('filtro')): ?>
                            <span class="sem-destaque">com o filtro</span> <span class="bold"><?= Request::input('filtro') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <br /><br />
                    <table class="table">
                        <tbody>
                            <?php foreach($lista as $item): ?>
                            <tr>
                                <td>
                                    <a href="<?= $item['url'] ?>">
                                        <span class="destaque"><?= $item['label'] ?></span><br />
                                        <span class="sem-destaque"><?= $item['tipo'] ?></span>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <br />
                    <div class="row">
                        <div class="col">
                            <span class="sem-destaque">Nenhum resultado para</span> <span class="bold"><?= Request::input('busca') ?></span>
                            <?php if (Request::input('filtro')): ?>
                            <span class="sem-destaque">com o filtro</span> <span class="bold"><?= Request::input('filtro') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </body>
</html>
