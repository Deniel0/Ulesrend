<?php

class Ulesrend{

  private $id;
  private $nev;
  private $sor;
  private $oszlop;
  private $jelszo;
  private $felhasznalo;

  public function set_user($id, $conn){
      //lekérdezés az adatbázisból (tesz\ulesrend)-->visszaadjuk
    $sql = "SELECT id, nev, sor, oszlop, jelszo, felhasznalo FROM ulesrend";
    $sql .= " WHERE id = $id ";
    $result = $conn->query($sql);
    //return $result;
    if ($conn->query($sql)){
    if ($result->num_rows > 0){
        $row=$result->fetch_assoc();
        $this->id = $row['id'];
        $this->nev = $row['nev'];
        $this->sor = $row['sor'];
        $this->oszlop = $row['oszlop'];
        $this->jelszo = $row['jelszo'];
        $this->felhasznalo = $row['felhasznalo'];
    }
}else{
    echo "Error: " .$sql . "<br>" . $conn->error;
}
  }
  
  //Össze get metódus felépítése
  public function get_nev(){
      return $this->nev;
    }
    public function get_sor(){
        return $this->sor;
      }
      public function get_oszlop(){
        return $this->oszlop;
      }
      public function get_jelszo(){
        return $this->jelszo;
      }
      public function get_felhasznalo(){
        return $this->felhasznalo;
      }
      //tanulók id listáját adja vissza
      public function taunlokListaja($conn){
        $lista=array();
        $sql = "SELECT id FROM ulesrend";
        if($result=$conn->query($sql)){
          if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
              $lista[] = $row['id'];
            }
          }
        }
      }
}
    $tanulo = new Ulesrend;
    //$tanulo->set_user($row['id'], $conn);
    //$tanulo->set_user(10, $conn);
/*
    echo $tanulo->get_nev()." sora: ".$tanulo->get_sor();
    echo ", oszlopa: ".$tanulo->get_oszlop();
    echo ", felhasznaloja: ".$tanulo->get_felhasznalo();
    echo ", jelszava: ".$tanulo->get_jelszo();
*/
?>