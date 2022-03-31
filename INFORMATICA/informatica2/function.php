<!DOCTYPE html>
<html>

    <?php
        function il_maggiore($a,$b)
        {
            if($a>$b)
                return $a;
            else
                return $b;
        }

        $a=$_GET["a"];
        $b=$_GET["b"];
         echo "il maggiore vale" . il_maggiore($a,$b);
    ?>
</html>


