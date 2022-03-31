<!DOCTYPE html>
<html>
<title>form</title>
<body>

<form method= "POST" action= "articoliDo">
  <label for="nome"> nome:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="prezzo">prezzo:</label><br>
  <input type="number" id="prezzo" name="prezzo"><br>
  <label for="quantity">quantità:</label><br>
  <input type="number" id="quantity" name="quantity"><br><br>
  <input type="checkbox" id="is_visible" name="is_visible" value="visibile">
  <label for="is_visible"> articolo</label><br><br>
  
  <?
session_start();
include "config.php";
$CN = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pswd"], $CONFIG["db-name"]);
if ($CN->connect_error)
    die("Connection failed: " . $CN->connect_error);
$sql = "
   SELECT * FROM tp_articoli";
   
$result = $CN->query($sql);

	if(!result)
?>
<html>
    <body>
        <table border="1">
            <tr>
                <th>Nome Prodotto</th>
                <th>Prezzo</th>
                <th>Sottocategoria</th>
                <th>Sottocategoria</th>
                
            </tr>
            <?
            while ($row = $result->fetch_assoc())
            {
                echo "<tr>";
                echo"<a href=selectArticoli.php?azione=elimina&pk=" .  $row["pk"] . "'>";
                echo "img src='img/cestino.png' class='cestino'>";
                echo "<td>".$row["Nome"]."</td>";
                echo "<td>".$row["Prezzo"]."</td>";
                echo "<td>".$row["Sottocategoria"]."</td>";
                echo "<td>".$row["Categoria"]."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>

  <input type="submit" value="invia i dati">
  <input type="reset" value="cancella dati">
  <select name = "categoria" id="categoria">
  </select>
</form>
  
</body>
</html>