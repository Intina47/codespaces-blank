<?php
include "db.php";
$sql = "SHOW TABLES IN '22ac3u10'";
$result = $mysql->query($sql);
if($result !== false){
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            echo '<br />'.$row['Tables_in_22ac3u10'];
        }
    }
    else{
        echo 'no tables';
    }
}
echo 'ERROR';
?>