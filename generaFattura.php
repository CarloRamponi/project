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
    <body onload="aggiungiProdotto()">

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
                                <select class="form-control" name="codiceCliente">
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
                    <div id="prodotti">
                        <h4>Prodotti</h4>

                        <br>

                        <div id="prodotto0"></div>

                    </div>

                    <br><br><br><br>

                    <div class="col-md-2">
                        <button class="btn btn-primary">Aggiungi prodotto</button>
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
            function aggiungiProdotto() {
                document.getElementById("prodotto"+numeroProdotti).innerHTML = document.getElementById("prodotto"+numeroProdotti).innerHTML + '\
                    <div class="col-md-4">\
                        <div class="input-group">\
                            <span class="input-group-addon">Codice prodotto:</span>\
                            <select class="form-control" name="codiceProdotto'+numeroProdotti+'">\
                                <option>Pavel</option>\
                                <option>Ilie</option>\
                                <option>Rebenciuc</option>\
                            </select>\
                        </div>\
                    </div>\
        \
                    <br class="hidden-lg">\
        \
                    <div class="col-md-8">\
                        <div class="input-group">\
                            <span class="input-group-addon">Descrizione:</span>\
                            <input class="form-control" type="text" disabled />\
                        </div>\
                    </div>\
        \
                    <br><br>\
        \
                    <div class="col-md-2">\
                        <div class="input-group">\
                            <span class="input-group-addon">U.M.:</span>\
                            <input class="form-control" name="um'+numeroProdotti+'" type="text" />\
                        </div>\
                    </div>\
        \
                    <br class="hidden-lg">\
        \
                    <div class="col-md-2">\
                        <div class="input-group">\
                            <span class="input-group-addon">Quantità:</span>\
                            <input class="form-control" name="quantita'+numeroProdotti+'" type="number" />\
                        </div>\
                    </div>\
        \
                    <br class="hidden-lg">\
        \
                    <div class="col-md-2">\
                        <div class="input-group">\
                            <span class="input-group-addon">Prezzo Un.:</span>\
                            <input class="form-control" type="number" disabled />\
                        </div>\
                    </div>\
        \
                    <br class="hidden-lg">\
        \
                    <div class="col-md-2">\
                        <div class="input-group">\
                            <span class="input-group-addon">Sconto %:</span>\
                            <input class="form-control" type="number" name="sconto'+numeroProdotti+'" />\
                        </div>\
                    </div>\
        \
                    <br class="hidden-lg">\
        \
                    <div class="col-md-2">\
                        <div class="input-group">\
                            <span class="input-group-addon">Importo netto:</span>\
                            <input class="form-control" type="number" disabled />\
                        </div>\
                    </div>\
        \
                    <br class="hidden-lg">\
        \
                    <div class="col-md-2">\
                        <div class="input-group">\
                            <span class="input-group-addon">Iva %:</span>\
                            <input class="form-control" type="number" disabled />\
                        </div>\
                    </div>';

                numeroProdotti++;

                document.getElementById("prodotti").innerHTML = document.getElementById("prodotti")+'<span id=prodotto'+numeroProdotti+'></span>'


            }
        </script>

        <script src="assets/jquery-1.11.3-jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    </body>
</html>
