<?php

  require_once 'kijeloltfelhasznalok.php';

class hianyzo extends kijeloltfelhasznalok{

  function __construct() {
    $this->tablaNev = 'hianyzok';
  }
  public function remove_id($id, $conn){
    $sql = "DELETE FROM hianyzok WHERE id = $id";
	$result = $conn->query($sql);
  }
}
?>