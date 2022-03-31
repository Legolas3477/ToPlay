<!DOCTYPE html>
<html>
<body>
<?php
        $a=$_GET["a"];

        function numero_primo($a)
        {
            for($i=2;$i<$a-1;$i++)
            {
                if($a % $i== 0)
                   return false;
            }
            return true;
        }

        echo numero_primo($a) ? "true" : "false";
?>
</body>
</html>