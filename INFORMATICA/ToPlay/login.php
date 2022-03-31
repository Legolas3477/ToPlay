<?php
	session_start();
	include '../../config.php';
	$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);
	if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
    }

	if($_POST)
    {
    	
        $email = str_replace($_POST["email"], "'", "''");
    	$password = str_replace($_POST["password"], "'", "''");
			$sql = 
                    "SELECT pk
                    FROM tp_utenti 
                    WHERE is_enabled=1
                    AND email='$email'
                    AND password= '$password'";
                    
    				$result = $conn->query($sql);
                        
                    $row = $result->fetch_assoc();
                    
                    if($row["pk"]!="")
                    {
                    	
                    	$_SESSION["FUID"] = $row["pk"];
                        header("Location: index.php");
                    }
                    else 
                    	$failed = true;
    			}
	                

    
?>
<!DOCTYPE html>
<html lang="it">
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>

<body>
<form method="POST">
	<div class="form-floating mb-3">
	  <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
	  <label for="email">Email address</label>
	</div>
	<div class="form-floating">
	  <input type="password" class="form-control" id="password" placeholder="Password" name="password">
	  <label for="password">Password</label>
     
	</div>
    <input type="submit">
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>	
</body>
</html>