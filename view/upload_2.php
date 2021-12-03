<?php

$i = 0;
$errors = array();

if(isset($_FILES["fileToUpload"])){
  $target_dir = "uploads/";
  
  $allowed_filetypes=array('image/png', 'image/jpg', 'image/jpeg');

  foreach($_FILES["fileToUpload"]["name"] as $key => $name){
    $target_file = $target_dir . basename($name);

    if ($_FILES["fileToUpload"]["size"][$key] > 102400) {
      $errors[$key][]="<br>A $name túl nagy, 100KB-nál nem lehet nagyobb.";
    }
    if ($_FILES["fileToUpload"]["size"][$key] < 1024) {
      $errors[$key][]="<br>A $name túl kicsi, 1KB-nál nem lehet kisebb.";
    }
    if (!in_array($_FILES["fileToUpload"]["type"][$key], $allowed_filetypes)) {
      $errors[$key][]="<br>A $name nem jpg vagy png.";
    }
    if (!isset($errors[$key])){
      if (@move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $target_file)) {
        $i++;
      }else{
        $errors[$key][]="Hiba történt a <b>$name</b> file mentésekor.";
      }
    }
  }
}
?>
<body>
<?php
if($i > 0)echo "$i fájl feltöltve";
if($errors){
  foreach($errors as $error){
    foreach($error as $errorMsg){
      echo "$errorMsg";
    }
  }
}
?>
<form action="upload_2.php" method="post" enctype="multipart/form-data">
<br>Select image to upload:<br><br>
  <input type="file" name="fileToUpload[]" id="fileToUpload"><br><br>
  <input type="submit" value="Upload" name="submit">
</form>

</body>