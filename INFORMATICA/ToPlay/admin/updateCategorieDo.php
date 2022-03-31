<?php
	include "../../../config.php";
	$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);
	if ($conn->connect_error)
    	die("Connection failed: " . $conn->connect_error);
    if($_POST["is_visibile"]=="")
    	$isv="0";
    else
    	$isv="1";
	$sql="UPDATE `tp_categorie` SET nome='".$_POST["nome"]."', descrizione='".$_POST["descrizione"]."'
        WHERE
    	pk=".$_POST["pk"];
    $conn->query($sql);
	echo "inserimento avvenuto<br>";
    echo "<a href='updateCategorie.php'>Torna alla pagina precedente</a><br>";
    echo "<a href='selectCategorie.php'>Visualizza le Categorie</a>";
?>
