<!DOCTYPE HTML>
<p>prendo numeri da url e stampo la loro somma<p>

<?php

	$a=$_GET["a"];
    $b=$_GET["b"];
    $c=$_GET["c"];
     echo $a;
      echo"<br>";
      echo $b;
      echo"<br>";
      echo $c;
      
      echo"<hr>";
       
    $d=$a+$b+$c;
    echo $d;
?>