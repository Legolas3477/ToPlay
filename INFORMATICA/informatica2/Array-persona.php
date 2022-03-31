<?php
//Giulio Carlo D'Antonio 
//Andrea Cocciasecca
//Daniel Margiovanni
//Francesco Ranalli
//Giovanni Petricone

//copia tutti i parametri da get
$persona = $_GET;


//"spacchetta" tutte le variabili da GET
$nome = $_GET["nome"];			//nome
$cognome = $_GET["cognome"];		//cognome
$giorno = $_GET["giorno"];		//1
$mese = $_GET["mese"];			//gennaio
$anno = $_GET["anno"];			//2003
$genere = $_GET["genere"];		//m o f

//lettera è una vocale?
function vocale($lettera)
{
	if($lettera == 'a') 	 return true;
	else if($lettera == 'e') return true;
	else if($lettera == 'i') return true;
	else if($lettera == 'o') return true;
	else if($lettera == 'u') return true;
	else 			 return false;
}

//ritorna il carattere del mese
function mese($mese)
{
	if($mese == 'gennaio') 	 	return 'A';
	else if($mese == 'febbraio') 	return 'B';
	else if($mese == 'marzo') 	return 'C';
	else if($mese == 'aprile') 	return 'D';
	else if($mese == 'maggio') 	return 'E';
	else if($mese == 'giugno') 	return 'H';
	else if($mese == 'luglio') 	return 'L';
	else if($mese == 'agosto') 	return 'M';
	else if($mese == 'settembre') 	return 'P';
	else if($mese == 'ottobre') 	return 'R';
	else if($mese == 'novembre') 	return 'S';
	else if($mese == 'dicembre') 	return 'T';
}

//ritorna le ultime due cifre dell'anno come stringa
function anno($anno)
{
	//substr prende anche indici negativi, -2 significa parti dalla penultima lettera
	return substr($anno, -2);
}

//calcola i due numeri del giorno e genere
function giorno_genere($giorno, $genere)
{
	$numero = $giorno;
	
	//se siamo femmine si aggiunge 40
	if($genere == 'f')
	{
		$numero = $numero + 40;
	}
	
	//se il risultato è < 10 dobbiamo aggiungere lo zero iniziale
	//es 7 diventa 07
	if($numero < 10)
	{
		return '0' . $numero;
	}
	else
	{
		return $numero;
	}
}

//calcola le tre lettere del cognome
function cognome($cognome)
{
	$lettere = 0;
	$risultato = "";

	//gira tutta la stringa: se trovi tre consontanti ritornale ed esci
	foreach(str_split($cognome) as $lettera)
	{
		//se la lettera corrente NON è una vocale
		if(vocale($lettera) == false)
		{
			//segna quante lettere abbiamo trovato
			$lettere = $lettere + 1;
			
			//aggiungi la lettera al risultato
			$risultato = $risultato . $lettera;
			
			//se siamo arrivati a 3 consonanti esci
			if($lettere == 3)
			{
				return $risultato;
			}
		}
	}
	
	//stessa cosa delle consonanti ma con le vocali
	foreach(str_split($cognome) as $lettera)
	{
		//se la lettera corrente È una vocale
		if(vocale($lettera) == true)
		{
			$lettere = $lettere + 1;
			$risultato = $risultato . $lettera;
			
			if($lettere == 3)
			{
				return $risultato;
			}
		}
	}
	
	//se non arriviamo a 3 lettere totali allora aggiungi le X
	for( ; $lettere < 3; $lettere++)
	{
		$risultato = $risultato . 'X';
	}
	
	return $risultato;
}


function nome($nome)
{
	$lettere = 0;
	$risultato = "";

	//Stessa cosa del cognome, però prendiamo 4 consonanti
	foreach(str_split($nome) as $lettera)
	{
		if(vocale($lettera) == false)
		{
			$lettere = $lettere + 1;
			$risultato = $risultato . $lettera;

			if($lettere == 4)
			{
				return $risultato;
			}
		}
	}
	
	//Se abbiamo trovato 4 consonanti ritorniamo la prima + la terza e la quarta
	if($lettere == 4)
	{
		return substr($risultato, 0, 1) . substr($risultato, 2, 2);
	}
	//Se ne abbiamo trovate 3, ritorniamo così
	else if($lettere == 3)
	{
		return $risultato;
	}
	
	//Altrimenti continuiamo l'algoritmo con le vocali e le X
	foreach(str_split($nome) as $lettera)
	{
		if(vocale($lettera) == true)
		{
			$lettere = $lettere + 1;
			$risultato = $risultato . $lettera;
			
			if($lettere == 3)
			{
				return $risultato;
			}
		}
	}
	
	for( ; $lettere < 3; $lettere++)
	{
		$risultato = $risultato . 'X';
	}
	
	return $risultato;
}

//calcola l'età
function eta($anno)
{
	//date("Y") ritorna l'anno corrente
	return date("Y") - $anno;
}

//calcola il codice fiscale e l'età e mettili nell'array della persona
//strtoupper mette tutta la stringa in maiuscolo
$persona["codfiscale"] = strtoupper(cognome($cognome) . nome($nome) . anno($anno) . mese($mese) . giorno_genere($giorno, $genere));
$persona["età"] = eta($anno);

foreach($persona as $chiave => $valore)
{
	echo "$chiave: $valore <br>";
}
?>