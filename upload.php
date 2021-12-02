<?php
if(isset($_FILES["fileToUpload1"])){
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);

if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
  echo "The file has been uploaded.";
  }
}
if(isset($_FILES["fileToUpload2"])){
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);

if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
  echo "\nThe file has been uploaded.";
  }
}
?>

<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload: <br>
  <input type="file" name="fileToUpload1" id="fileToUpload"><br>
  <input type="file" name="fileToUpload2" id="fileToUpload"><br>
  <input type="submit" value="Upload Image" name="submit">
</form>
</body>