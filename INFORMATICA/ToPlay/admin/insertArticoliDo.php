<html>

<head>
	<?php
		include "../../../config.php";
	?>
</head>

<body>
	<?php
    	
		$nome 			=  	'"' . $_POST["nome"]	. '"';
		$codice 		= 	'"' . $_POST["codice"]	. '"';
		$prezzo 		= 	'"' . $_POST["prezzo"]	. '"';
		$qta 			= 	'"' . $_POST["qta_mag"]	. '"';
		$cat 			= 	'"' . $_POST["cat"]		. '"';
        $descrizione 	= 	'"' . $_POST["descrizione"]. '"';


        //$immagine 		= 	'"' . $_POST["img_url"]. '"';

		if($_POST["is_visible"])
			$is_visible	= 1;
		else
			$is_visible = 0;
		
        if($_POST["is_vetrina"])
			$is_vetrina	= 1;
		else
			$is_vetrina = 0;
        
        
		$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);

		if ($conn->connect_error)
    		die("Connessione fallita: " . $conn->connect_error);
		
		$query = 
		"
			INSERT INTO tp_articoli	(nome, 	codice,  prezzo,  qta_mag,  is_visible,  fk_sottocategorie, descrizione, is_vetrina)
			VALUES 					($nome, $codice, $prezzo, $qta, $is_visible, $cat, $descrizione,$is_vetrina)
		";
		
		$result = $conn->query($query);

		$img=$_FILES["img"];
        $file="upload/articoli/articoli_" . $conn->insert_id . ".png";
       	move_uploaded_file($img["tmp_name"], $file);
        
        

		if($result)
        {
			echo "Articolo inserito";
		}
        else
        {
        	echo "Articolo non inserito: " . $conn->error;
        }
			
		?>
	<br />
	<a href="insertArticoli.php">Torna indietro</a>
    <a href="selectArticoli.php">Articolo aggiornato</a>
</body>

</html>
