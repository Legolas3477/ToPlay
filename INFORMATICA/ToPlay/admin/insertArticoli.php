<html>

<head>
	<title>Insert Articoli</title>
	<?php
  include "../../../config.php";
  
  ?>

    
        	
      
</head>

<?php
	session_start();

$auth=$_SESSION["UID"];
        if(!$auth){
            header("location:loginErrato.php");
        }
        ?>
<body>
	<form action="insertArticoliDo.php" method="post" onsubmit="return validazione();" enctype="multipart/form-data"
>
    
		<label for="nome">Nome:</label>
		<input type="text" id="nome" name="nome" value="articolo"><br><br>
		
		<label for="nome">Codice:</label>
		<input type="text" id="codice" name="codice" value="A001"><br><br>

		<label for="prezzo">Prezzo:</label>
		<input type="number" id="prezzo" name="prezzo" value="20" step="0.01"><br><br>

		<label for="qta_mag">Quantità:</label>
		<input type="number" id="qta_mag" name="qta_mag" value="1"><br><br>
        
        <label for="img">immagine:</label>
		<input type="file" id="img" name="img"><br><br>

		<label for="cat">Categoria/Sottocategoria:</label>
		<select name="cat" id="cat">
        
      	
        
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
        		echo '<option value="' . $row["pk_sottocat"] . '">' . $row["categoria"] . "/" . $row["sottocategoria"] . "</option>\n";
      	?>
		</select>
		<br />
		<br />
		<input type="checkbox" id="is_visible" name="is_visible" value="1" checked>
		<label for="is_visible">Visibile</label><br>
		<input type="checkbox" id="is_vetrina" name="is_vetrina" value="1" checked>
		<label for="is_vetrina">Vetrina</label><br>
		<input type="submit">
	</form>
</body>

</html>