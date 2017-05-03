<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Genera fattura</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
        <link rel="stylesheet" href="style.css" type="text/css" />

        <script>
            var numeroProdotti=0;
        </script>

    </head>
    <body>

        <?php
            $page=3;
            include 'header.php';
        ?>

        <div id="wrapper">

            <div class="container">

                <div class="page-header">
                <h3>Genera Fattura</h3>
                </div>

                <form method="post" action="generaFattura.php" autocomplete="off">

                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">Numero fattura: </span>
                            <input class="form-control" name="numeroFattura" type="number" />
                        </div>
                    </div>

                    <br class="hidden-lg">

                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">Data:</span>
                            <input class="form-control" name="data" type="date" />
                        </div>
                    </div>

                    <br><br><hr>

                    <!-- DATI CLIENTE -->
                    <div>

                        <h4>Dati cliente</h4>

                        <br>

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Codice cliente</span>
                                <select class="form-control" name="codiceCliente" onchange="updateCliente()">
                                    <option>Pavel</option>
                                    <option>Ilie</option>
                                    <option>Rebenciuc</option>
                                </select>
                            </div>
                        </div>

                        <br class="hidden-lg">

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Banca d'appoggio:</span>
                                <input class="form-control" type="text" disabled />
                            </div>
                        </div>

                        <br class="hidden-lg">

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Scadenza:</span>
                                <input class="form-control" type="text" disabled />
                            </div>
                        </div>

                        <br><br>

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Nome:</span>
                                <input class="form-control" type="text" disabled />
                            </div>
                        </div>

                        <br class="hidden-lg">

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Via:</span>
                                <input class="form-control" type="text" disabled />
                            </div>
                        </div>

                        <br class="hidden-lg">

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Città:</span>
                                <input class="form-control" type="text" disabled />
                            </div>
                        </div>

                        <br><br>

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">CAP:</span>
                                <input class="form-control" type="text" disabled />
                            </div>
                        </div>

                        <br class="hidden-lg">

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">E-mail:</span>
                                <input class="form-control" type="text" disabled />
                            </div>
                        </div>

                        <br class="hidden-lg">

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">PI/CF:</span>
                                <input class="form-control" type="text" disabled />
                            </div>
                        </div>

                        <br><br>

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon">Modalità di pagamento:</span>
                                <input class="form-control" type="text" disabled />
                            </div>
                        </div>

                        <br class="hidden-lg">

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon">IBAN:</span>
                                <input class="form-control" type="text" disabled />
                            </div>
                        </div>

                        <br><br>
                    </div>

                    <hr>

                    <!-- PRODOTTI -->
                    <h4>Prodotti</h4>
                    <div>
                        <?php
                            $MAX_N=10;
                            for($i=0; $i<$MAX_N; $i++){
                        ?>
                            <br>
                            <div class='col-md-4'>
                                <div class='input-group'>
                                    <span class='input-group-addon'>Codice prodotto:</span>
                                    <select class='form-control' name='codiceProdotto<?php echo $i; ?>' onchange="updateRow(<?php echo $i; ?>)">
                                    <option>Pavel</option>
                                    <option>Ilie</option>
                                    <option>Rebenciuc</option>
                                    </select>
                                </div>
                            </div>

                            <br class='hidden-lg'>

                            <div class='col-md-8'>
                                <div class='input-group'>
                                    <span class='input-group-addon'>Descrizione:</span>
                                    <input class='form-control' type='text' disabled id="descrizione<?php echo $i; ?>" />
                                </div>
                            </div>

                            <br><br>

                            <div class='col-md-2'>
                                <div class='input-group'>
                                    <span class='input-group-addon'>U.M.:</span>
                                    <input class='form-control' name='um<?php echo $i; ?>' type='text' />
                                </div>
                            </div>

                            <br class='hidden-lg'>

                            <div class='col-md-2'>
                                <div class='input-group'>
                                    <span class='input-group-addon'>Quantità:</span>
                                    <input class='form-control' name='quantita<?php echo $i; ?>' type='number' />
                                </div>
                            </div>

                            <br class='hidden-lg'>

                            <div class='col-md-2'>
                                <div class='input-group'>
                                    <span class='input-group-addon'>Prezzo Un.:</span>
                                    <input class='form-control' type='number' id="prezzo<?php echo $i; ?>" disabled />
                                </div>
                            </div>

                            <br class='hidden-lg'>

                            <div class='col-md-2'>
                                <div class='input-group'>
                                    <span class='input-group-addon'>Sconto %:</span>
                                    <input class='form-control' type='number' name='sconto<?php echo $i; ?>' />
                                </div>
                            </div>

                            <br class='hidden-lg'>

                            <div class='col-md-2'>
                                <div class='input-group'>
                                    <span class='input-group-addon'>Importo netto:</span>
                                    <input class='form-control' type='number' id="netto<?php echo $i; ?>" disabled />
                                </div>
                            </div>

                            <br class='hidden-lg'>

                            <div class='col-md-2'>
                                <div class='input-group'>
                                    <span class='input-group-addon'>Iva %:</span>
                                    <input class='form-control' type='number' id="iva<?php echo $i; ?>" disabled />
                                </div>
                            </div>

                            <br><br><hr>
                        <?php } ?>
                    </div>

                    <br>

                    <br><hr><br>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-block btn-primary" name="btn-login">Genera</button>
                    </div>

                </form>

            </div>

        </div>

        <script>
            function updateRow(i) {
                console.log("Aggiornato:  "+i);
            }

            function updateCliente() {
                console.log("Aggiornato cliente");
            }
        </script>

        <script src="assets/jquery-1.11.3-jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    </body>
</html>
