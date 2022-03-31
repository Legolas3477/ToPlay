<!DOCTYPE html>
<?php

session_start();

$auth=$_SESSION["UID"];
        if(!$auth){
           header("location:loginErrato.php");
        }

	include "../../../config.php";
	$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);
	if ($conn->connect_error)
    	die("Connection failed: " . $conn->connect_error);
	$sql="SELECT 
    	cat.nome AS nome,
        cat.pk AS pk
        FROM tp_categorie AS cat
		ORDER BY cat.nome";
        
	$result = $conn->query($sql);
    
    $pk = $_GET["pk"];
    $oggetto = $conn->query("SELECT * FROM tp_sottocategorie WHERE pk=$pk")->fetch_assoc();
?>
<html>
	<head>
    	<script type="text/javascript">
        	function validazione(){
            	var nome= document.getElementById("nome").value;
                var lunghezzaNome= nome.length;
            	if(nome==null||nome==""||lunghezzaNome<3){
                	alert("Inserire il nome");
                    return false;
                    }
                 var cod= document.getElementById("cod").value;
            	if(cod==null||cod==""||cod==0){
                	alert("inserire il codice");
                    return false;
                    }
                var prezzo= document.getElementById("prezzo").value;
            	if(prezzo==null|prezzo==""||prezzo==0){
                	alert("il prezzo deve essere maggiore di zero");
                    return false;
                    }    
                var quantita= document.getElementById("quantita").value;
            	if(quantita==null||quantita==""||quantita==0){
                	alert("la quantita deve essere maggiore di zero");
                    return false;
                    }
                var link= document.getElementById("link").value;
            	if(link==null||link==""||link==0){
                	alert("inserire un link valido");
                    return false;
                    }
                }
        </script>
    </head>
    <body>
    	<form method="POST" action="updateSottocategorieDo.php" onsubmit="return validazione()" id="form">
        <input type="hidden" name="pk" id="pk" value="<?php echo $oggetto["pk"];?> "/>
        <label for="nome">Nome:</label><br>
        <form>
		<input type="text" name="nome" size="20" id="nome" value="<?php echo $oggetto["nome"];?> "/>
        <br>
        <label for="descrizione">Descrizione:</label><br>
        <textarea id="descrizione" name="descrizione" rows="4" cols="50"><?php echo $oggetto["descrizione"];?></textarea>
        <br><br>
		Seleziona la categoria:<br> <select name="categoria" >
        <?php
            while ($row = $result->fetch_assoc()) 
            {
            	$pk = $row["pk"];
                $nome = $row["nome"];
                $selected = $pk == $_GET["pk"] ? "selected" : "";
                
            	echo "<option value=$pk $selected>$nome</option>", PHP_EOL;
            }
           
           
           
            ?> </select> <br><br>
        Deve essere visibile: <input type="checkbox" name="is_visibile" id="is_visibile" value="1" checked/><br>
        <input type="submit">
        </form>
        <a href='selectSottocategorie.php'>Annulla</a><br>
    
    
    </body>
</html>
