<html>
<head>
<link href="rainbow.css" type="text/css" rel="stylesheet">
</head>
<body>
<table border=1 style="font-size: 24px">
<?php
$r = $_GET["r"];
$c = $_GET["c"];

check($r, $c);

echo '<tr style="font-weight: bold">';
for($i=0; $i<=$c; $i++)
{
	echo "<td>" . ($i == 0 ? "x" : $i) . "</td>";
}
echo "</tr>";

for($i=1; $i<=$r; $i++)
{
	echo '<tr><td style="font-weight: bold">' . $i . "</td>";
	for($j=1; $j<=$c; $j++)
    {
    	echo "<td>" . $i * $j . "</td>" ;
    }
    echo "</tr>";
}

function check($r, $c)
{
	if($r < 1 || $r > 12 || $c < 1 || $c > 12)
	{
		die("Invalid r or c value");
	}
}
?>
</table>
</body>
</html>