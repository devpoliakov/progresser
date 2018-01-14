<?php
	include('config.php');
    
    mysql_query("
    UPDATE round 
    SET weight = weight + 1
    WHERE id = 2
");
    
    // objects time counter

mysql_query("
    UPDATE objects 
    SET objectWeight = objectWeight + 1 WHERE objectWeight > 0

");

    ?>