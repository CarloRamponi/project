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


    require('fpdf.php');
    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Logo
            //$this->Image('../img/logoHitPilati.png',10,6,60);
            // Arial bold 15
            $this->SetFont('Arial','B',18);
            // Move to the right
            $this->Cell(80);
            // Title
            $this->Cell(40,10,'Fattura',0,0,'C');
            // Line break
            $this->Ln(20);
        }
        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            $this->Cell(0,10,'DY',0,0,'C');
        }
    }
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->SetFont('Times','',12);
    $pdf->AddPage();
    $pdf->Multicell(0,10,$welcomeMess.="ti comunichiamo che sei stato inserito nel sistema informativo dell'Istituto.\nPuoi accedere al registro elettronico al seguente indirizzo: http://192.168.1.5/",0,1);
    $pdf->Multicell(0,10,"\nLe tue credenziali di accesso sono le seguenti:",0,1);
    $pdf->Multicell(0,10,"Indirizzo e-mail:    ".$row['email']."\nUsername:            ".$row['username']."\nPassword:             ".$row['temp_pwd'],1,1);
    $pdf->Multicell(0,10,"\nPer motivi di sicurezza al primo accesso ti verra' richiesto di cambiare la password.",0,1);


    $pdf->Output();


?>