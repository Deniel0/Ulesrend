<?php

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

$txt = "John Doe\n";
fwrite($myfile, $txt);

$txt = "Jane Doe\n";
fwrite($myfile, $txt);

fclose($myfile);

$myfile = fopen("newfile.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("newfile.txt"));
fclose($myfile);

rename("newfile.txt","oldfile.txt");

echo copy("oldfile.txt","copyfile.txt");

$myfile = fopen("copyfile.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("copyfile.txt"));
fclose($myfile);

unlink("oldfile.txt");

//$sql = "LOAD DATA LOCAL INFILE 'telepulesek.txt'";
//$sql = "INTO TABLE foo COLUMNS TERMINATED BY '\t'";


?>