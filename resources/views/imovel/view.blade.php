<html>
    <head>
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
            }
            .center {
                text-align: center;
            }
            .destaque {
                color: #447CFF;
                font-weight: bold;
                font-size: 120%;
            }
            .bold {
                font-weight: bold;
            }
            .header-destaque {
                color: #447CFF;
            }
            .no-border {
                border: 0!important;
            }
            .left {
                float: left;
            }
            .right {
                float: right;
            }
            .retornar {
                color: #447CFF;
                font-size: 110%;
            }
            .destaque-observacao {
                color: red;
            }
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
        function collapse(id) {
            $('#' + id).collapse();
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
            <div class="row">
                <div class="col">
                    <h2><?= $imovel['logradouro']; ?></h2>
                </div>
            </div>
            <hr>
            <?php if ($ocorrencias && count($ocorrencias) > 0): ?>
                <div id="accordion">
                    <?php foreach($ocorrencias as $ocorrencia): ?>
                    <div class="card">
                        <div class="card-header" id="heading<?= $ocorrencia['id']; ?>">
                        <h5 class="mb-0">
                            <button onClick="javascript:collapse('collapse<?= $ocorrencia['id']; ?>');" class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $ocorrencia['id']; ?>" aria-expanded="true" aria-controls="collapse<?= $ocorrencia['id']; ?>">
                                <?= $ocorrencia['duf']; ?> -
                                <?= $ocorrencia['data']; ?>
                                <?php if ($ocorrencia['observacao']): ?>
                                    <span class="badge badge-danger">Obs</span>
                                <?php endif; ?>
                            </button>
                        </h5>
                        </div>

                        <div id="#collapse<?= $ocorrencia['id']; ?>" class="collapse show" aria-labelledby="heading<?= $ocorrencia['id']; ?>" data-parent="#accordion">
                        <div class="card-body">
                            <?php if( $ocorrencia['vencimentoPrazo'] ): ?>
                            <div class="row">
                                <div class="col">
                                    <h4>
                                        <span class="badge badge-warning form-control no-border">
                                            <span>Prazo: <?= $ocorrencia['vencimentoPrazo']; ?></span>
                                        </span>
                                    </h4>
                                </div>
                            </div>
                            <?php endif; ?>
                            <table class="table">
                                <?php if($ocorrencia['observacao']): ?>
                                <tr>
                                    <th>Observação</th>
                                    <td class="destaque-observacao"><?= $ocorrencia['observacao']; ?></td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th>Assunto</th>
                                    <td><?= $ocorrencia['assunto']; ?></td>
                                </tr>
                                <tr>
                                    <th>Responsável</th>
                                    <td><a href="<?=route('pessoa', $ocorrencia['responsavelId'])?>"><?= $ocorrencia['responsavel']; ?> (abrir)</a></td>
                                </tr>
                                <tr>
                                    <th>Tipo</th>
                                    <td><?= $ocorrencia['tipo']; ?></td>
                                </tr>
                            </table>
                        </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <br /><br />
        <div class="fixed-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <a href="javascript:history.back()"><span class="retornar"><- Retornar</span></a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
