<html>

<head>
	<title>Select SottoCategorie</title>
	<style>
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
    
session_start();

$auth=$_SESSION["UID"];
        if(!$auth){
            header("location:loginErrato.php");
        }

		include "../../../config.php";
        ?>
</head>


 <body>
 
 		<table>
            <tr>
                <th>Sottocategoria</th>
                <th></th>
                <th>Categoria</th>
                
</tr>                    
<?php
$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);
if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
    
    if($_GET["azione"]=="elimina"){
            	$sqldel="DELETE FROM tp_sottocategorie WHERE pk="."'".$_GET["pk"]."'";
                $conn->query($sqldel);
            }

$query = "
SELECT
    	tp_sottocategorie.pk AS pk,
        tp_sottocategorie.descrizione AS des,
    	tp_categorie.nome AS Categoria,
    	tp_sottocategorie.nome AS Sottocategoria,
        tp_categorie.pk AS id
	FROM tp_categorie JOIN tp_sottocategorie  
	ON tp_sottocategorie.fk_categorie = tp_categorie.pk
    AND tp_sottocategorie.is_visibile = 1
	ORDER BY sottocategoriA";
    
$result = $conn->query($query);

		if(!$result)
			die("Query non valida: " . $conn->error);

        while(($row = $result->fetch_assoc()))
        	{	
                
               echo
              		'<tr>',
                 	'<td>',	$row["Sottocategoria"],		'<td>',
                 	'<td>',	$row["Categoria"],			'<td>',
					
    				'<td>',                    
                    '<a href="selectSottocategorie.php?azione=elimina&pk=', $row["pk"],'">',
                    '<img class="cestino" src="img/cestino.png">',                    
                    '</a>',                   
                    '</td>',
                    '<td>',                    
                    '<a href="updateSottocategorie.php?pk=',$row["pk"],'">',
                    '<img class="cestino" src="img/penna.jpg">',                    
                    '</a>',                   
                    '</td>',
        	    	'</tr>', 										
                   PHP_EOL;
                 
            }
            ?>
            <a href="insertSottocategorie.php"><img src="img/aggiungi.png" width="25" height"30"></a>	
        </table>
        <br>
    </body>
</html>
