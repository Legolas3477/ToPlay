<html>

<head>
	<title>Select Articoli</title>
	<style>
		body,    
		table,
		th
        	{
        	 background-color: #363945;
    		  color: #ffffff;
        	}
		td {
			border-collapse: 1px collapse;
            text-align: center;
            font-size: bold;
          	font-family: sans-serif;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            
          
            
		}
		table{
          	width:100%;
            height:100%;
        }
		.cestino {
			height: 60px;
			width: 60px;
		}
	</style>
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
	<table>
		<tr>
			<th>Nome</th>
			<th>Codice</th>
			<th>Prezzo</th>
			<th>Quantità</th>
			<th>Categoria</th>
            <th>Visibile</th>
			<th>Sottocategoria</th>
            <th>immagine</th>
            <th>descrizione</th>
            <th>is_vetrina</th>
            <th>elimina</th>
            <th>modifica</th>

		</tr>
		<?php
        	$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);
        	
			if ($conn->connect_error)
				die("Connessione fallita: " . $conn->connect_error);

            if($_GET["azione"] == "elimina")
            {
				$query = "DELETE FROM tp_articoli WHERE pk=" . $_GET["pk"];

				$result = $conn->query($query);
    
				if(!$result)
					die("Query non valida: " . $conn->error);
            }
            
			
        	$query = 
        	"
        		SELECT 
                	tp_articoli.pk as pk,
        	    	tp_articoli.nome as nome,
        	        tp_articoli.codice as codice,
        	        REPLACE(tp_articoli.prezzo, '.',',') as prezzo,
        	        tp_articoli.qta_mag as qta_mag,
                    tp_articoli.descrizione as descrizione,
                    tp_articoli.is_visible as is_visible,
                    tp_articoli.is_vetrina as is_vetrina,
        	        tp_categorie.nome as categoria,
        	        tp_sottocategorie.nome as sottocategoria
        	   	FROM 	tp_articoli, tp_categorie, tp_sottocategorie
        	    WHERE 	tp_articoli.fk_sottocategorie=tp_sottocategorie.pk
        	    AND		tp_sottocategorie.fk_categorie=tp_categorie.pk
        	";
        	
			$result = $conn->query($query);
    
			if(!$result)
				die("Query non valida: " . $conn->error);

        	while(($row = $result->fetch_assoc()))
        	{
           		
				$pk = $row["pk"];
                $img = "/INFORMATICA/ToPlay/admin/upload/articoli/articoli_$pk.png";
				echo 
                	'<tr>', 										//Inizio riga
        	    	'<td>', $row["nome"],				'</td>',	//Nome
        	    	'<td>', $row["codice"],				'</td>',	//Codice
        	        '<td>', $row["prezzo"],				'</td>',	//Prezzo
        	        '<td>', $row["qta_mag"],			'</td>',	//Quantità
        	        '<td>', $row["categoria"],			'</td>',	//Categoria
                    '<td>', $row["is_visible"] ? "Sì" : "No",		'</td>',	//is_visible
        	        '<td>', $row["sottocategoria"],		'</td>',	//Sottocategoria
                    '<td>','<img src="',$img,'"width="100" height="80" <img ></td>',
                     '<td>', $row["descrizione"],		'</td>',	//descrzione
                     '<td>', $row["is_vetrina"] ? "Sì" : "No",		'</td>',
    				'<td>',                    
                    '<a href="selectArticoli.php?azione=elimina&pk=', $row["pk"],'">',
                    '<img class="cestino" src="img/cestino.png">',                    
                    '</a>',                   
                    '</td>',
                    '<td>',                    
                    '<a href="updateArticoli.php?pk=',$row["pk"],'">',
                    '<img class="cestino" src="img/penna.jpg">',                    
                    '</a>',                   
                    '</td>',
        	    	'</tr>', 										
                    PHP_EOL;										
        	}	
        	?>
            <a href="insertArticoli.php"><img src="img/aggiungi.png" width="25" height"30"></a>	

	</table>
    
    <br>
</body>

</html>