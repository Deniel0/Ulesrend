<?php
function tanlista($conn){
    $sql = "SELECT id, nev, sor, oszlop, jelszo, felhasznalo FROM ulesrend";
    $result = $conn->query($sql);
    return $result;
  }
?>