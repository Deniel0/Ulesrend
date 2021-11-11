<?php

session_start();

require 'includes/db.inc.php';
require 'model/Ulesrend.php';
$tanulo = new Ulesrend;

$page = 'index';

if(!empty($_REQUEST['action'])) {
	if($_REQUEST['action'] == 'kilepes') session_unset();
}

if(!empty($_SESSION["id"])) {
  $szoveg = $_SESSION["nev"].": Kilépés";
  $action = "kilepes";
}
else {
  $szoveg = "Belépés";
  $action = "belepes";        
} 

if(isset($_REQUEST['page'])) {
  if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
  $page = $_REQUEST['page']; 
  }
}

$menupontok = array('index' => "Főoldal", 'ulesrend' => "Ülésrend",'felhasznalo' => $szoveg);

$title = $menupontok[$page];

include 'includes/htmlheader.inc.php';
?>

<body>
<?php

include 'includes/menu.inc.php';

include 'controller/'.$page.'.php';

?>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</body>