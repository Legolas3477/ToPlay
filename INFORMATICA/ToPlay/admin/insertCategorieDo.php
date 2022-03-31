<?php
	include "../../../config.php";
	$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);
	if ($conn->connect_error)
    	die("Connection failed: " . $conn->connect_error);
    if($_POST["is_visible"])
			$is_visible	= 1;
		else
			$is_visible = 0;
 	$nome = $_POST["nome"];
    $descrizione = $_POST["descrizione"];
 	$isv = $_POST["is_visibile"] ? 1 : 0;
    
	$sql="INSERT INTO tp_categorie
    	(nome, 
        is_visibile,
        descrizione)
    	  VALUES ( 
          \"$nome\", 
          \"$isv\",
          \"$descrizione\")";
    $conn->query($sql);
    
    if($conn->error)
    	echo "Errore: " . $conn->error;
   	else
		echo "inserimento avvenuto<br>";
    echo "<a href='insertCategorie.php'>Torna alla pagina precedente</a><br>";
    echo "<a href='selectCategorie.php'>Visualizza le Categorie</a>";
?>