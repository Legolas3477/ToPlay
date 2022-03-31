<html>
<head>
	<?php
        include "../../../config.php";
	?>
</head>

<body>
	<?php
        $pk             =      $_POST["pk"];
        $nome           =      $_POST["nome"];
        $codice         =     $_POST["codice"];
        $prezzo         =     $_POST["prezzo"];
        $qta_mag        =     $_POST["qta_mag"];
        $categoria      =     $_POST["categoria"];
        $descrizione      =     $_POST["descrizione"];
        $img=$_FILES["img"];
        $file="upload/articoli/articoli_" . $pk . ".png";
        $img_url="/INFORMATICA/ToPlay/admin/" . $file;
       	move_uploaded_file($img["tmp_name"], $file);

        $prezzo = str_replace(',', '.' , $prezzo);
        
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
        	UPDATE tp_articoli
            SET nome=\"$nome\",codice=\"$codice\",prezzo=\"$prezzo\",qta_mag=\"$qta_mag\",is_visible=\"$is_visible\",fk_sottocategorie=\"$categoria\",descrizione=\"$descrizione\",is_vetrina=\"$is_vetrina\"
            
			WHERE pk=\"$pk\"
        ";

		$result = $conn->query($query);
        
		if($result)
			echo "Articolo aggiornato";
		else
			{
            	echo "Articolo non aggiornato";
                var_dump($conn);
            }
		?>
	<br>
    <a href="selectArticoli.php?">Lista articoli</a><br>
    <?php
		echo "<a href=\"updateArticoli.php?pk=$pk\">Torna indietro</a><br>";
    ?>
</body>

</html>