<?php
session_start();
require 'db.inc.php';

//form feldolgozás
if(!empty($_GET['logout'])){
  session_unset();
}
if(isset($_POST['user']) and isset($_POST['pw'])){
  $loginError='';
  if(strlen($_POST['user']) == 0)$loginError .="Nem írtál be felhsználónevet<br>";
  if(strlen($_POST['pw']) == 0)$loginError .="Nem írtál be jelszót";
  if($loginError == ''){
    $sql="SELECT id,nev,jelszo FROM ulesrend WHERE felhasznalo='".$_POST['user']."'";
    if(!$result = $conn->query($sql)) echo $conn->error;
if ($result->num_rows > 0) {
  if($row = $result->fetch_assoc()) {
   if(md5($_POST['pw'])== $row['jelszo']){
     $_SESSION['id']=$row['id'];
     $_SESSION['nev']=$row['nev'];
     header('Location:ulesrend.php');
    exit();
    }
   else $loginError.='Érvényetelen jelszó';
  }
}
else $loginError.='Érvénytelen felhasználónév';
  }
}
elseif(isset($_POST['kilep'])){
  session_unset();
}
$title ="Belépés";
if(!empty($_SESSION["id"])) $title="Kilépés";
?>

<?php
include 'htmlheader.inc.php';

?>
<body>
    <?php
    include 'menu.inc.php';
    ?>
  <table>
  <tr>
   <th colspan="3"> 
      <?php
      if(!empty($_SESSION['id'])){
        echo "Üdvözöljük ".$_SESSION['nev']."!";
        echo '<form action="belepes.php" method="post">
       <input type="submit" name="kilep" value="Kilépés">
       </form>';
      }
      else {
        if(isset($_POST['user'])){
        echo $loginError;
      }
      ?>
      <form action="belepes.php" method="post">
        Felhasználónév: <input type="text" name="user">
        <br>
        Jelszó: <input type="password" name="pw">
        <br>
        <input type="submit">
      </form>
<?php
      }
?>

    </th>
  </tr>
    </table>
</body>
<html>