<?php
require 'db.inc.php';
?>
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