<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Genera fattura</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
        <link rel="stylesheet" href="style.css" type="text/css" />

    </head>
    <body>

        <?php
            $page=3;
            include 'header.php';
        ?>


        <!-- Inserimento dati database in variabili javascript -->
        <script>
        <?php
            $res=mysql_query("SELECT * from clienti");
            $numeroClienti = mysql_num_rows($res);

            echo "var clienti = new Array(".$n.");\n";
            for($i = 0; $i< $numeroClienti; $i++) {
                 $cliente=mysql_fetch_array($res);
                 $clienti[$i]=$cliente;
                 echo 'clienti['.$i.'] = { codice:'.$cliente['codice'].', banca:"'.$cliente['banca'].'", nome:"'.$cliente['nome'].'", pi:"'.$cliente['pi'].'", via:"'.$cliente['via'].'", cap:'.$cliente['cap'].', citta:"'.$cliente['citta'].'", mail:"'.$cliente['mail'].'", scadenza:"'.$cliente['scadenza'].'", pagamento:"'.$cliente['pagamento'].'", iban:"'.$cliente['iban'].'" };';
                 echo "\n";
            }

            $res=mysql_query("SELECT * from prodotti");
            $numeroProdotti=mysql_num_rows($res);;

            echo "var prodotti = new Array(".$n.");\n";

            for($i = 0; $i< $numeroProdotti; $i++) {
                $prodotto=mysql_fetch_array($res);
                $prodotti[$i]=$prodotto;
                echo 'prodotti['.$i.'] = { codice:'.$prodotto['codice'].', descrizione:"'.$prodotto['descrizione'].'", prezzo:'.$prodotto['prezzo'].', iva:'.$prodotto['iva'].'};';
                echo "\n";
            }
        ?>
        </script>

        <div id="wrapper">

            <div class="container">

                <div class="page-header">
                <h3>Genera Fattura</h3>
                </div>

                <form method="post" action="generaFatturaScript.php" autocomplete="off">

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
                                <select class="form-control" name="codiceCliente" onchange="updateCliente()" id="codice">
                                    <option>Seleziona</option>
                                    <?php
                                        for($i = 0; $i< $numeroClienti; $i++) {
                                            echo "<option>".$clienti[$i]['codice']."</option>\n";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <br class="hidden-lg">

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Banca d'appoggio:</span>
                                <input class="form-control" type="text" disabled  id="banca"/>
                            </div>
                        </div>

                        <br class="hidden-lg">

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Scadenza:</span>
                                <input class="form-control" type="text" disabled id="scadenza"/>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Nome:</span>
                                <input class="form-control" type="text" disabled id="nome"/>
                            </div>
                        </div>

                        <br class="hidden-lg">

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Via:</span>
                                <input class="form-control" type="text" disabled id="via"/>
                            </div>
                        </div>

                        <br class="hidden-lg">

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Città:</span>
                                <input class="form-control" type="text" disabled id="città"/>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">CAP:</span>
                                <input class="form-control" type="text" disabled id="cap"/>
                            </div>
                        </div>

                        <br class="hidden-lg">

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">E-mail:</span>
                                <input class="form-control" type="text" disabled id="mail"/>
                            </div>
                        </div>

                        <br class="hidden-lg">

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">PI/CF:</span>
                                <input class="form-control" type="text" disabled id="pi"/>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon">Modalità di pagamento:</span>
                                <input class="form-control" type="text" disabled id="pagamento"/>
                            </div>
                        </div>

                        <br class="hidden-lg">

                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon">IBAN:</span>
                                <input class="form-control" type="text" disabled id="iban"/>
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
                                    <select class='form-control' name='codiceProdotto<?php echo $i; ?>' id='codicep<?php echo $i; ?>' onchange="updateRow(<?php echo $i; ?>)">
                                        <option>Seleziona</option>
                                        <?php
                                            for($i = 0; $i< $numeroProdotti; $i++) {
                                                echo "<option>".$prodotti[$i]['codice']."</option>\n";
                                            }
                                        ?>
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
                                    <input class='form-control' name='um<?php echo $i; ?>' id='um<?php echo $i; ?>'type='text' />
                                </div>
                            </div>

                            <br class='hidden-lg'>

                            <div class='col-md-2'>
                                <div class='input-group'>
                                    <span class='input-group-addon'>Quantità:</span>
                                    <input class='form-control' name='quantita<?php echo $i; ?>' id='quantita<?php echo $i; ?>'type='number' onchange="aggiornaImporto(<?php echo $i; ?>)"/>
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
                                    <input class='form-control' type='number' name='sconto<?php echo $i; ?>' id='sconto<?php echo $i; ?>' onchange="aggiornaImporto(<?php echo $i; ?>)"/>
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
            function aggiornaImporto(i){
              var a=document.getElementById("quantita"+i).value;
              a=a*document.getElementById("prezzo"+i).value;
              var b=a*document.getElementById("sconto"+i).value;
              b=b/100;
              var c=a-b;
              document.getElementById("netto"+i).setAttribute("value",c);
            }

            function updateRow(i) {
              var x=document.getElementById("codicep"+i).selectedIndex;
              document.getElementById("descrizione"+i).setAttribute("value",prodotti[x].descrizione);
              document.getElementById("iva"+i).setAttribute("value",prodotti[x].iva);
              document.getElementById("prezzo"+i).setAttribute("value",prodotti[x].prezzo);

              console.log("Aggiornato:  "+i);
            }

            function updateCliente() {
              if (document.getElementById("codice").selectedIndex==0){
                document.getElementById("banca").setAttribute("value","");
                document.getElementById("scadenza").setAttribute("value","");
                document.getElementById("nome").setAttribute("value","");
                document.getElementById("via").setAttribute("value","");
                document.getElementById("città").setAttribute("value","");
                document.getElementById("cap").setAttribute("value","");
                document.getElementById("mail").setAttribute("value","");
                document.getElementById("pi").setAttribute("value","");
                document.getElementById("pagamento").setAttribute("value","");
                document.getElementById("iban").setAttribute("value","");
              }

              else {
                var i=document.getElementById("codice").selectedIndex-1;
                  document.getElementById("banca").setAttribute("value",clienti[i].banca);
                  document.getElementById("scadenza").setAttribute("value",clienti[i].scadenza);
                  document.getElementById("nome").setAttribute("value",clienti[i].nome);
                  document.getElementById("via").setAttribute("value",clienti[i].via);
                  document.getElementById("città").setAttribute("value",clienti[i].citta);
                  document.getElementById("cap").setAttribute("value",clienti[i].cap);
                  document.getElementById("mail").setAttribute("value",clienti[i].mail);
                  document.getElementById("pi").setAttribute("value",clienti[i].pi);
                  document.getElementById("pagamento").setAttribute("value",clienti[i].pagamento);
                  document.getElementById("iban").setAttribute("value",clienti[i].iban);
              }
                console.log("Aggiornato cliente");
            }
        </script>

        <script src="assets/jquery-1.11.3-jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    </body>
</html>

<!-- c.setAttribute("value", "cosa vuoi metterci dentro") -->
