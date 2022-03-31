<?php
    $n=$_GET["n"];

    for($i=0;$i<=$n;$i++)
    {
        if($i%2==0||$i%3==0)
        {
            echo "<br>";
            echo $i;
        }

    }
?>