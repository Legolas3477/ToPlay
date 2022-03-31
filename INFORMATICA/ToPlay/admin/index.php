<?php
session_start();
include '../../../config.php';
$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
    }
if($_POST["azione"] == "login"){
	$email = $conn->real_escape_string($_POST["email"]);
    $password = $conn->real_escape_string($_POST["password"]);
					$sql = 
                    "SELECT pk
                    FROM tp_admin 
                    WHERE is_enabled=1
                    AND email='$email'
                    AND password= '$password'";
                    
    				$result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    if($row["pk"]!="")
                    {
                    	$_SESSION["UID"] = $row["pk"];
                    }
                    else 
                    	$failed = true;
    			}
	$auth = ($_SESSION["UID"] != "");                
?>
<html>
	<head>
  		<title>TO PLAY 2022</title>
	</head>
	<body>
    <?php
		if($auth)
        	include "navbar.php";
        else
        	include "login.php";
        ?>
	</body>
</html>