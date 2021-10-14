<?php
    $szoveg="Belépés";
    $link ="belepes.php";
    if(!empty($_SESSION["id"])){
        $szoveg=$_SESSION["nev"].": Kilépés";
        $link="index.php?logout=1";
    }
    $menupontok= array('index.php' => "Főoldal",'ulesrend.php' => "Ülésrend", $link => $szoveg);
?>
<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
            <?php
            foreach($menupontok as $key => $value){
                $active='';
                if($_SERVER['REQUEST_URI'] == '/Ulesrend/'.$key) $active= ' active';
                ?>
                    <a class="navbar-brand" href="<?php echo $key;?>"><?php echo $value;?></a>
                <?php
            }
            ?>
    </nav>
</body>
<?php

?>