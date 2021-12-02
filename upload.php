<?php
if(isset($_FILES["fileToUpload"])){
  print_r($_FILES["fileToUpload"]);
  $target_dir = "uploads/";
  $i = 0;
  $errors = array();

  foreach($_FILES["fileToUpload"]["name"] as $key => $name){
    $target_file = $target_dir . basename($name);

    if ($_FILES["fileToUpload"]["size"][$key] > 1024000) {
      $errors[0][]="A $name túl nagy, 100KB-nál nem lehet nagyobb.";
    }
    if ($_FILES["fileToUpload"]["size"][$key] > 1024) {
      $errors[0][]="A $name túl kicsi, 1KB-nál nem lehet kisebb.";
    }
    if (!in_array($_FILES["fileToUpload"]["type"][$key], $allowed_filetypes)) {
      $errors[$key][]="A $name nem jpg vagy png.";
    }
    if (!$errors[$key]){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $target_file)) {
      $i++;
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
<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload" multiple>
  <input type="submit" value="Upload" name="submit">
</form>

</body>