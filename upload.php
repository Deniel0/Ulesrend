<?php
if(isset($_FILES["fileToUpload"])){
  print_r($_FILES["fileToUpload"]);
  $target_dir = "uploads/";
  $i = 0;
  $errors = array();

  foreach($_FILES["fileToUpload"]["name"] as $key => $name){
    $target_file = $target_dir . basename($name);

    if ($_FILES["fileToUpload"]["size"][$key] > 1002400) {
      $errors[0][]="$name file is too large.";
      $uploadOk = 0;
    }
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $target_file)) {
      $i++;
    }
  }
}
?>

<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload" multiple>
  <input type="submit" value="Upload" name="submit">
</form>

</body>