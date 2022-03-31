<html>
    <head>
        <style>
            th, tr, td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>qte</th>
                <th>nome</th>
                <th>psq </th>
                 <th>subtotale</th>
                 
                 
            </tr>
            <?php
                include "../../config.php";
                $conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pswd"], $CONFIG["db-name"]);
                
                $sql = "
                select 
                    nn.qte as qte, 
                    p.nome as nome,
                    p.psq as psq,
                    psq*qte as subtotale
                    
                from oa_prodotti p
                join oa_operazioni_prodotti nn
                on p.pk = nn.fk_prodotti
                where nn.fk_operazioni=" . $_GET["pk"];
                
                $result = $conn->query($sql);
    			$totale=0;
                while ($row = $result->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>" . $row["qte"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["psq"] . "</td>";
                    echo "<td>" . $row["subtotale"] . "</td>";
                    echo "</tr>";
                	$totale+=$row["subtotale"];
                }   
                echo "<tr><td colspan=3><strong>totale</strong></td><td>$totale</td></tr>";
                ?>
        </table>
        <br>
        <br>
    </body>
</html>