<?php
  require '../includes/db.inc.php';
  require 'kijeloltfelhasznalok.php';
class hianyzo extends kijeloltfelhasznalok{

  function __construct() {
    $this->tablaNev = 'hianyzok';
  }
}
//Teszt:
$hianyzo = new hianyzo();

$hianyzo->set_id(1, $conn);
echo $hianyzo->get_id();

?>