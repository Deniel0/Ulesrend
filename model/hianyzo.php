<?php

  require_once 'kijeloltfelhasznalok.php';

class hianyzo extends kijeloltfelhasznalok{

  function __construct() {
    $this->tablaNev = 'hianyzok';
  }
  //remove_id elkészítése
  public function remove_id($id){
    $sql = "DELETE FROM hianyzok WHERE id =".$_GET['nem_hianyzo'];
	$result = $conn->query($sql);	
  }
}

?>