<?php
require 'db.inc.php';
require 'functions.inc.php';
session_start();
$loggedUser= NULL;
//form feldolgozása
if(!empty($_POST["hianyzo_id"])){
  $sql="INSERT INTO hianyzok VALUES(".$_POST["hianyzo_id"].")";
  $result=$conn->query($sql);
}
elseif(!empty($_GET['nem_hianyzo'])){
  $sql="DELETE FROM hianyzok WHERE id=".$_GET['nem_hianyzo'];
  $result=$conn->query($sql);
}
$title ="Ülésrend";
?>
<?php
include 'htmlheader.inc.php';

?>
<?php
$hianyzok=array();
$sql = "SELECT id FROM hianyzok";
if(!$result = $conn->query($sql)) echo $conn->error;
if ($result->num_rows > 0) {
  $sor=0;
  while($row = $result->fetch_assoc()) {
    $hianyzok[] = $row['id'];
  }
}
$adminok=array();
$sql = "SELECT id FROM adminok";
if(!$result = $conn->query($sql)) echo $conn->error;
if ($result->num_rows > 0) {
  $sor=0;
  while($row = $result->fetch_assoc()) {
    $adminok[] = $row['id'];
  }
}
$en=0;
$tanar=15;
if(!empty($_SESSION["id"]))$en=$_SESSION["id"];
?>
<body>
<?php

include 'menu.inc.php';

?>
  <table>
  <tr> 
    <th colspan="3">
       <?php
         echo $title;
        ?>
    </th>                       
      <th colspan="2">   
        <?php    
           if(!empty($_SESSION['id'])){
              if(in_array($_SESSION['id'],$adminok)){
         ?>
            <form action="ulesrend.php" method="post">
                <select name="hianyzo_id">
          <?php
              $result=tanlista($conn);
            if($result->num_rows >0){
              while($row=$result->fetch_assoc()){
                if($row['nev'] and !in_array($row['id'],$hianyzok))echo '<option value="'.$row['id'].'">'.$row['nev'].'</option>';
              }
            }
          ?>
                </select><br>
            <input type="submit">
          <?php
            }
            }
          ?>
            </form>
       </th>
        </tr>
        <tr>
    <?php
    $sql = "SELECT id, nev, sor, oszlop FROM ulesrend";
    $result = tanlista($conn);
    if ($result->num_rows > 0) {
      $sor = 0;
      while($row = $result->fetch_assoc()) {
        if($row["sor"] != $sor){
          if($sor != 0) echo '</tr>';
          echo '<tr>';
          $sor = $row["sor"];
        }
        if(!$row["nev"]) echo '<td class="empty"></td>';
        else{
          $plusz = '';
          if(in_array($row["id"], $hianyzok)) $plusz.= ' class="missing"';
          if($row["id"] == $en) $plusz.= ' id="me"';
          if($row["id"] == $tanar) $plusz.= ' class="tanar" colspan="2"';
          echo "<td".$plusz.">" . $row["nev"];
          if(!empty($_SESSION['id'])){
            if(in_array($_SESSION['id'],$adminok)){
              if(in_array($row["id"], $hianyzok)) echo '<br><a href="ulesrend.php?nem_hianyzo='.$row["id"].'">Nem hiányzó</a>';
            }
          }
          echo "</td>";
        }
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
    </table>
    
      <?php
?>
</body>
<html>