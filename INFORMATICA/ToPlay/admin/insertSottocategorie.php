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
	$sql="SELECT * FROM tp_categorie";
	$result = $conn->query($sql);
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
    	<form method="POST" action="insertSottocategorieDo.php" onsubmit="return validazione()" id="form">
        <label for="nome">Nome:</label><br>
		<input type="text" name="nome" size="20" id="nome"> 
        <br>
        <label for="descrizione">Descrizione:</label><br>
        <textarea id="descrizione" name="descrizione" rows="4" cols="50"></textarea>
        <br><br>
		Seleziona la categoria:<br> <select name="categoria">
        <?php
            while ($row = $result->fetch_assoc()) 
            {
                
                echo "<option value=".$row["pk"].">".$row["nome"]."</option>";
                
            }
            ?></select> <br><br>
        Deve essere visibile: <input type="checkbox" name="is_visibile" id="is_visibile" value="1" checked/><br>
        <input type="submit">
        </form>
    	<a href='selectSottocategorie.php'>Annulla</a><br>
    
    </body>
</html>