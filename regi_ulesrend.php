<?php
require 'db.inc.php';
?>
<head>
  <meta charset="utf-8">
  <title>Ülésrend</title>
  <link rel="stylesheet" href="valami.css">
</head>
<?php
$osztaly=array(
  array("Kulhanek László"),
  array("Molnár Gergő Máté","Bakcsányi Dominik","Füstös Lóránt","Orosz Zsolt","Harsányi László"),
  array("Kereszturi Kevin","Juhász Levente","Szabó László","Sütő Dániel","Détári Klaudia"),
  array("Fazekas Miklós Adrián",NULL,"Gombos János","Tanár")
);
foreach($osztaly as $sor => $tomb){
  foreach($tomb as $oszlop =>$tanulo){
  $sql = "INSERT INTO `ulesrend` (`nev`, `sor`, `oszlop`) VALUES ('$tanulo', $sor + 1, $oszlop + 1);";
if ($conn->query($sql) === TRUE) {
  echo "$tanulo beszúrása sikeres volt. ";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  }
}


$conn->close();

$hianyzok=array(
  array(0),
  array(3),
  array(1),
  array(),
);
$en=array(
  array(),
  array(),
  array(3),
  array(),
);
$tanar=array(
  array(),
  array(),
  array(),
  array(3),
);
?>
<body>
<table>
  <tr>
    <th colspan="5">Ülésrend</th>
  </tr>
    <?php
    foreach($osztaly as $sor => $tomb){
      echo'<tr>';
    foreach($tomb as $oszlop => $tanulo){
      if($tanulo === NULL) echo '<td class="empty"></td>';
      else{
        $plusz = '';
        if(in_array($oszlop,$hianyzok[$sor])) $plusz.=' class="missing"';
        if(in_array($oszlop,$en[$sor])) $plusz.=' id="me" ';
        if(in_array($oszlop,$tanar[$sor]))  $plusz.= ' colspan="2"';
        echo '<td'.$plusz.'>' .$tanulo. '</td>';
    }
    }
    echo'</tr>';
  }
    ?>
</table>
</body>
<html>