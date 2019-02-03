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
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                    <h2><?= $pessoa['nome']; ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4>
                        <span class="badge badge-warning form-control no-border">
                            <span class="left">Multado</span>
                            <span class="right">Prazo: Imediato</span>
                        </span>
                    </h4>
                </div>
            </div>
        </div>
    </body>
</html>
