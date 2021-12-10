<head>
    <title>Települések</title>
</head>
<body>
    <table class="table table-dark">
        <tr>
            <td>Irányítószám</td>
            <td>Település</td>
        </tr>
        <?php
    require 'includes/db.inc.php';
    require 'includes/htmlheader.inc.php';
    
    $sql = "SELECT iranyitoszam, telepules FROM település ORDER BY telepules ASC";
    $result = $conn-> query($sql);

    if($result-> num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>". $row["iranyitoszam"] ."</td><td>". $row["telepules"] ."</td><td>";
        } echo "</table>";
    }else{
        echo "0 result";
    }
    $conn-> close();
?>
    </table>
</body>