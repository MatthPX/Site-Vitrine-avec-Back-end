	<?php 
	include "bdd.php";

	session_start();

if(isset($_POST['login'])){
		$mail_login = $_POST['login'];
	$login = htmlspecialchars($_POST['login']); // htmlspecialchars à mettre sur tous les inputs pour contrer la faille de sécurité XSS
	$mdp = htmlspecialchars($_POST['mdp']);

	$query= $bdd -> prepare("SELECT Id, Password FROM user WHERE Mail LIKE ?"); 
	$query -> execute(array($mail_login));
	$pw = $query ->fetch();

	

	if(password_verify($mdp, $pw[1])){

		$_SESSION['connected']= true;
		$_SESSION['Log'] = $_POST['login'];
		$_SESSION['Id'] = $pw['Id'];
		
	}
}

if (isset($_SESSION['connected'])){

$id = $_SESSION['Id'];

$query= $bdd -> prepare("SELECT c.ID AS Id_commande, c.Date, c.prix_total, c.ID_client, u.Nom, u.Prenom, u.Adresse, u.CP,u.Ville, u.ID, u.Mail FROM Commande AS c LEFT JOIN user AS u ON c.ID_client = u.ID WHERE c.ID_client = ?"); 
	$query ->execute(array($id));
	$user_command = $query ->fetchAll(); 
}


include 'templates/login.phtml';