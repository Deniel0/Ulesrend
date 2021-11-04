<?php
    
?>
<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <?php
            foreach($menupontok as $key => $value){
            $active='';
            if($_SERVER['REQUEST_URI'] == '/Ulesrend/'.$key) $active= ' active';
        ?>
            <a class="navbar-brand" href="index.php?page=<?php echo $key;?>"><?php echo $value;?></a>
        <?php
            }
        ?>
    </nav>
</body>

<?php

?>