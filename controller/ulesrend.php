<?php
require 'model/hianyzo.php';
require 'model/admin.php';
$hianyzo = new hianyzo();

if(!empty($_POST["hianyzo_id"])) {
	$hianyzo->set_id($_POST["hianyzo_id"], $conn);
}
elseif(!empty($_GET['nem_hianyzo'])) {
	$hianyzo->remove_id($_GET['nem_hianyzo'],$conn);
}
if(isset($_POST["profilkepid"])) {
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$target_file = $target_dir . basename($_POST["profilkepid"].".".$imageFileType);
	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
	  } else {
		echo "Sorry, there was an error uploading your file.";
	  }
  }
$hianyzok = $hianyzo->lista($conn);

$admin = new Admin();

$adminok = $admin->lista($conn);

$en = 0;
if(!empty($_SESSION["id"])) $en = $_SESSION["id"];

$tanar = 17;

$tanuloIdk = $tanulo->tanulokListaja($conn);

include 'view/ulesrend.php';