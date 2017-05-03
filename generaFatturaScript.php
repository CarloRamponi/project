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

    $prodotti = [];

    for($i=0; $i<$MAX_N; $i++) {
        if($codiceProdotto=="Seleziona")
            continue;
        for($j = 0; $j< $n; $j++) {
            $res=mysql_query("SELECT * from prodotti");
            $n=mysql_num_rows($res);
            $prodotto = mysql_fetch_array($res);
            if ($prodotto['codice'] == $codiceProdotto[$i]) {
                $prodotti[$i]['codice'] = $prodotto['codice'];
                $prodotti[$i]['descrizione'] = $prodotto['descrizione'];
                $prodotti[$i]['iva'] = $prodotto['iva'];
                $prodotti[$i]['prezzo'] = $prodotto['prezzo'];
                $prodotti[$i]['quantita'] = $_POST['quantita' . $i];
                $prodotti[$i]['um'] = $_POST['um' . $i];
                $prodotti[$i]['sconto'] = $_POST['sconto' . $i];

                echo "Codice:  ".$prodotti[$i]['codice']."<br>";
                echo "Desc:  ".$prodotti[$i]['descrizione']."<br>";
                echo "Iva:  ".$prodotti[$i]['iva']."<br>";
                echo "Prezzo:  ".$prodotti[$i]['prezzo']."<br>";
                echo "Quantità:  ".$prodotti[$i]['quantita']."<br>";
                echo "Um:  ".$prodotti[$i]['um']."<br>";
                echo "Sconto:  ".$prodotti[$i]['sconto']."<br>";

                echo "<br><br>";

                break;
            }
        }
    }


?>