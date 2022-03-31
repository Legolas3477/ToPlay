<!DOCTYPE html>
<html>
	<?php
    	function prime($x)
        {
        	if($x == 1)
            	return false;
        
        	for($i=2;$i<$x;$i++)
            {
            	if(($x%$i)==0) 
                	return false;
            }
            
            return true;
        }
        
        function fattori($n)
        {
        	$stringa = "1";
        	$i = 2;
        	while($n > 1)
            {
            	if(!prime($i))
                {
                	$i++;
                	continue;
             	}
                
                
                while(($n % $i) == 0)
                {
                	$stringa = $stringa . "x" . $i;
                    $n = $n / $i;
                }
                
                $i++;
            }
            
            return $stringa;
        }
        

$n = $_GET["n"];
$primi = array();

for($i=0;$i<$n;$i++)
{
	if(!prime($i))
    	$primi[$i] = fattori($i);
}

foreach($primi as $key => $value)
{
	echo "[$key] => $value <hr><br>";
}

echo "ez"
        
    ?>
</html>
