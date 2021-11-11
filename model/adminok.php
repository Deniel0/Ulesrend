<?php
  require '../includes/db.inc.php';
  require 'kijeloltfelhasznalok.php';
class admin extends kijeloltfelhasznalok{

  function __construct() {
    $this->tablaNev = 'adminok';
  }
}
//Teszt:
$admin = new admin();

$admin->set_id(1, $conn);
echo $admin->get_id();

?>