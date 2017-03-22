<table>
  <tr>
    <td width=100px><b>Codice cliente</b>
    <td width=100px><b>Nome azienda</b>
    <td width=100px><b>PI/CF </b>
    <td width=100px><b>Indirizzo </b>
    <td width=100px><b>CAP</b>
    <td width=100px><b>Città</b>
    <td width=100px><b>Telefono </b>
    <td width=100px><b>FAX</b>
    <td width=100px><b>E-mail</b>
    <td width=100px><b>Iban</b>
    <td width=100px><b>Banca D'appogio</b>
    <td width=100px><b>Modalità di pagamento</b>
    <td width=100px><b>Scadenza</b>
    <td width=100px><b>Annotazioni</b>
    <td width=100px><b>Giorni di attività</b>
    <td width=100px><b>Sito</b>
  </tr>
  <?php
    $res=mysql_query("SELECT * from clienti");
    $n=mysql_num_rows($res);
    if($n!=0){
      for($i = 0; $i< $n; $i++){
        $utenti[$i]=mysql_fetch_array($res);

  ?>
        <tr>
          <td><?php echo $utenti[$i]['codice']; ?></td>
          <td><?php echo $utenti[$i]['nome']; ?></td>
          <td><?php echo $utenti[$i]['pi']; ?></td>
          <td><?php echo $utenti[$i]['via']; ?></td>
          <td><?php echo $utenti[$i]['cap']; ?></td>
          <td><?php echo $utenti[$i]['città']; ?></td>
          <td><?php echo $utenti[$i]['telefono']; ?></td>
          <td><?php echo $utenti[$i]['fax']; ?></td>
          <td><?php echo $utenti[$i]['mail']; ?></td>
          <td><?php echo $utenti[$i]['iban']; ?></td>
          <td><?php echo $utenti[$i]['banca']; ?></td>
          <td><?php echo $utenti[$i]['pagamento']; ?></td>
          <td><?php echo $utenti[$i]['scadenza']; ?></td>
          <td><?php echo $utenti[$i]['annotazioni']; ?></td>
          <td><?php echo $utenti[$i]['orari']; ?></td>
          <td><?php echo $utenti[$i]['sito']; ?></td>
          <?php
            echo "<td style='background-color:#FFFFFF' id='delll".$utenti[$i]['id']."'></td>";
            echo "<td style='background-color:#FFFFFF' id='editl".$utenti[$i]['id']."'></td>";
          ?>
        </tr>
  <?php
        $num=$utenti[$i]['id'];
      }
      echo "<script>var numeroProdotti=".$num.";</script>";
    } else {
  ?>
      <tr><td colspan="4">Nessun cliente nel database!</td></tr>
  <?php } ?>
</table>
