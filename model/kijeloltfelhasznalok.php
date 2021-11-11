<?php

class kijeloltfelhasznalok{
  private $id;
  protected $tablaNev;

  protected function set_user($id, $conn){

    $sql = "SELECT id FROM $this->tablaNev WHERE id=$id";
    $result = $conn->query($sql);
        if ($conn->query($sql)){
        if ($result->num_rows > 0){
            $row=$result->fetch_assoc();
            $this->id = $row['id'];
        }else{
            $sql = "INSERT INTO $this->tablaNev ($id)";
            if($result = $conn->query($sql)){
                $this->id = $id;
            }
        }
    }else{
        echo "Error: " .$sql . "<br>" . $conn->error;
    }
  }
  protected function get_id(){
      return $this->id;
    }
      protected function lista($conn){
        $lista = array();
        $sql = "SELECT id FROM $this->tablaNev";
        if($result=$conn->query($sql)){
          if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
              $lista[] = $row['id'];
            }
          }
        }return $lista;
      }
}
    $tanulo = new Ulesrend;
?>