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
$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);
if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
    
    if($_GET["azione"]=="elimina"){
            	$sqldel="DELETE FROM tp_categorie WHERE pk="."'".$_GET["pk"]."'";
                $conn->query($sqldel);
            }

$sql = "
 	SELECT tp_categorie.nome AS nome,
    tp_categorie.pk AS pk,
    tp_categorie.descrizione AS des
	FROM tp_categorie 
	ORDER BY nome";
    
$result = $conn->query($sql);
?>
<html>
	<head>        
    	<style>
        table{
        	width:100%;
            height:100%;
        }
        td{
            background-color:#0000;
            opacity 0.2;
            text-align: center;
            font-size: 30;
        }
        body {
            padding:10px;
            }
            #img {
            width:100px;
                height:100px;
                border:2px;
            }
        </style>
	</head>
    <body>
        <a href="insertCategorie.php"><img src="img/aggiungi.png" width="20" height="25"></a>
        <a href="index.php"><img src="img/home.jpg" width="20" height="25"></a>
        <br>
        <br>
        <table border="1">
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                
            </tr>
            <?php         
				while(($row = $result->fetch_assoc()))            
                {	
            	echo "<tr>";
                echo "<td>".$row["nome"]."</td>";
                echo "<td>".$row["des"]."</td>";
                 echo "<td>".'<a href="updateCategorie.php?pk='.$row["pk"].'&nome='.$row["nome"].'&descrizione='.$row["des"].'">
                	<img src="img/penna.jpg" width="20" height="25"></a>'."</td>";
                echo "<td>".'<a href="selectCategorie.php?azione=elimina&pk='.$row["pk"].'">
                	<img src="img/cestino.png" width="20" height="25"></a>'."</td>";
                echo "</tr>";
            }
            ?>
        </table>
        
    </body>
</html>
