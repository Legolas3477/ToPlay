<!DOCTYPE html>
<html>
<title>HTML Tutorial</title>
<body>

<?php

		$age=$_GET["age"];
        if($age<0)
        {
        	echo "ETA NON VALIDA";
            exit;
        }
        if($age>=18)
        {
        	echo"una persona di $age anni è maggiorenne";
		}
        else
        {
        	echo "una persona di $age anni è minorenne";
		}
        