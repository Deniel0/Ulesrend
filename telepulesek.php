<?php
set_time_limit(500);
// Create connection
$conn = new mysqli('localhost','root','','teszt');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$myfile=fopen("telepulesek.txt","r") or die("Unable to open file!");
while (!feof($myfile)) 
{
 $getTextLine = fgets($myfile);
 $explodeLine = explode("\t",$getTextLine);
 
 list($postcode,$town) = $explodeLine;
 
$sql = "INSERT INTO település(iranyitoszam, telepules) VALUES (".$postcode.",'".$town."')";

$conn->query($sql);
}

$conn->close();

echo fread($myfile,filesize("telepulesek.txt"));
fclose($myfile);
?>