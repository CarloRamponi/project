<?php

    $codiceCliente = $_POST['codiceCliente'];
    $codiceProdotto = [];

    $numeroFattura = $_POST['numeroFattura'];
    $data = $_POST['data'];


    $MAX_N=10;
    for($i=0; $i < $MAX_N; $i++){
        $codiceProdotto[$i]=$_POST['codiceProdotto'.$i];
    }

    require_once 'dbconnect.php';

    $res=mysql_query("SELECT * from clienti");
    $n=mysql_num_rows($res);

    for($i = 0; $i< $n; $i++) {
        $cliente=mysql_fetch_array($res);
        if($cliente['codice']==$codiceCliente)
            break;
    }

    $prodotti2 = [];

    $res=mysql_query("SELECT * from prodotti");
    $n=mysql_num_rows($res);

    for($i = 0; $i< $n; $i++) {
        $prodotto=mysql_fetch_array($res);
        for($j=0; $j<$MAX_N; $j++) {
            if ($prodotto['codice'] == $codiceProdotto[$j]) {
                $prodotti[$i]=$prodotto;
                break;
            }
            $prodotti2[$i]['quantita']=$_POST['quantita'.$i];
            $prodotti2[$i]['um']=$_POST['um'.$i];
            $prodotti2[$i]['sconto']=$_POST['sconto'.$i];
        }
    }

    echo $prodotti[0]['codice']."\n";
    echo $prodotti2[0]['quantita']."\n";
    echo $prodotti2[0]['um']."\n";
    echo $prodotti2[0]['sconto']."\n";


?>