<?php
	include "../../../config.php";
	$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);
	if ($conn->connect_error)
    	die("Connection failed: " . $conn->connect_error);
    if($_POST["is_visibile"]=="")
    	$isv="0";
    else
    	$isv="1";
	$sql="INSERT INTO tp_sottocategorie
    	(nome,
        fk_categorie,
        is_visibile,
        descrizione)
    	  VALUES ( 
          '".$_POST["nome"]."', 
          '".$_POST["categoria"]."', 
          ".$isv.",
          '".$_POST["descrizione"]."'
          )";
    $conn->query($sql);
	echo "inserimento avvenuto<br>";
    echo "<a href='insertSottocategorie.php'>Torna alla pagina precedente</a><br>";
    echo "<a href='selectSottocategorie.php'>Visualizza le SottoCategorie</a>";
?>