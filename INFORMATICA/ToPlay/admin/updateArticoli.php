<html>

<head>
	<title>update Articoli</title>
	<?php
    
  include "../../../config.php";
  
session_start();

$auth=$_SESSION["UID"];
        if(!$auth){
            header("location:loginErrato.php");
        }

  ?>

</head>

<body>
	<form action="updateArticoliDo.php" method="post" onsubmit="return validazione();" enctype="multipart/form-data">
   <?php
        	$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);

        	if ($conn->connect_error)
        		die("Connessione fallita: " . $conn->connect_error);

        	$query = 
        	"
        	SELECT *
            FROM tp_articoli
            WHERE pk=$_GET[pk]
            ";

        	$result = $conn->query($query);

        	if (!$result)
        		die("Query non valida: " . $conn->error);

			$art=$result->fetch_assoc();
   		    
		echo '<label for="nome">Nome:</label>';
		echo '<input type="text" id="nome" name="nome" value="',$art[nome],'"><br><br>';
		
		echo '<label for="codice">Codice:</label>';
		echo '<input type="text" id="codice" name="codice" value="',$art[codice],'"><br><br>';

		echo '<label for="prezzo">Prezzo:</label>';
		echo '<input type="number-decimal" id="prezzo" name="prezzo" value="',$art[prezzo],'"><br><br>';

		echo '<label for="qta_mag">Quantità:</label>';
		echo '<input type="number" id="qta_mag" name="qta_mag" value="',$art[qta_mag],'"><br><br>';
        
        echo '<label for="img_url">immagine:</label>';
        echo '<input type="file" id="img" name="img" ><br><br>';
        
		?>
		<label for="categoria">Categoria/Sottocategoria:</label>
		<select name="categoria" id="categoria">
        
			<?php
        	$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);

        	if ($conn->connect_error)
        		die("Connessione fallita: " . $conn->connect_error);


        	$query = 
        	"
        		SELECT 
        					tp_categorie.nome as categoria,
        					tp_sottocategorie.nome as sottocategoria,
        					tp_sottocategorie.pk as pk_sottocat
        		FROM 		tp_categorie, tp_sottocategorie
        		WHERE 		tp_categorie.pk = tp_sottocategorie.fk_categorie
        		ORDER BY 	categoria, sottocategoria
        	";

        	$result = $conn->query($query);

        	if (!$result)
        		die("Query non valida: " . $conn->error);

        	while(($row = $result->fetch_assoc()))
            {
        		echo '<option value="' . $row["pk_sottocat"] . '"';
                
                if($row["pk_sottocat"] == $art["fk_sottocategorie"])
                	echo " selected";
                
                echo '>' . $row["categoria"] . "/" . $row["sottocategoria"] . " </option>\n";
      		}
      	?>
		</select>
		<br />
		<br />
		<input type="checkbox" id="is_visible" name="is_visible" value="1" checked>
		<label for="is_visible">Visibile</label><br>
        <input type="checkbox" id="is_vetrina" name="is_vetrina" value="1" checked>
		<label for="is_vetrina">Vetrina</label><br>
        <?php
        	
		echo '<button type="submit" name="pk" value="',$_GET[pk],'">invia</button>';
        ?>
        
	</form>
</body>

</html>