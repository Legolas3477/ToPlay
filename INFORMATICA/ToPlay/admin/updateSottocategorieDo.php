<!DOCTYPE html>
<?php
//---Connessione al database
	include "../../../config.php";
	$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);
	if ($conn->connect_error)
    	die("Connection failed: " . $conn->connect_error);
?>
<html>
	<head>
    </head>
    <body>
    
    
    </body>
</html>
<?php
//---Verifica se il campo visibile sia stato spuntato
    if($_POST["is_visibile"]=="")
    	$isv="0";
    else
    	$isv="1";
//---La query viene scritta
	$sql="UPDATE `tp_sottocategorie` SET nome='".$_POST["nome"]."', descrizione='".$_POST["descrizione"]."', fk_categorie=".$_POST["categoria"]."
    WHERE
    pk=".$_POST["pk"];
//---Esegui query
    $conn->query($sql);
//---Link vari
	echo "Aggiornato<br>";
    echo "<a href='updateSottocategorie.php'>Torna alla pagina precedente</a><br>";
    echo "<a href='selectSottocategorie.php'>Visualizza le sottocategorie</a>";
?> 