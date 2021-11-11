<?php

  require_once 'kijeloltfelhasznalok.php';
  
class Admin extends kijeloltfelhasznalok{

  function __construct() {
    $this->tablaNev = 'adminok';
  }
}

?>