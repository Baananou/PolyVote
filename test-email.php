<?php
	/*********************************/
	/* Test d'une adresse email      */
	/* Valeurs de retour :           */
	/* 0 : Email valide              */
	/* 4 : Email déjà présent en BDD */
	/*********************************/
	
	// on récupère l'email en minuscule
	$email=strtolower($_POST['email']);
	
	
	// test email déjà présnete en BDD
	$idc=mysqli_connect("localhost","root","","polytechnique");
	$r=mysqli_query($idc,"select * from utilisateurs where email = '$email'");
	if (mysqli_num_rows($r)>0) {
		die("4");
	
	}


$domain = explode('@', $email)[1];
if ($domain != 'polytechnicien.tn') {
	die("2");
}

	die("0");
