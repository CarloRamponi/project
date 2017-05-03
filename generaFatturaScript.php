<?php

    $codiceCliente = $_POST['codiceCliente'];
    echo "Codice cliente: $codiceCliente\n";
    $codiceProdotto = [];

    $numeroFattura = $_POST['numeroFattura'];
    echo "Numero fattura: $numeroFattura\n";
    $data = $_POST['data'];
    echo "Data: $data\n";


    $MAX_N=10;
    for($i=0; $i < $MAX_N; $i++){
        $codiceProdotto[$i]=$_POST['codiceProdotto'.$i];
        echo "Codice Prodotto $i:  $codiceProdotto[$i]";
    }

?>