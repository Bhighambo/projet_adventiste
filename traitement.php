<?php require_once("connexion.php"); ?>
<?php 
if (isset($_POST["nom"])) {
	if (!empty($_POST["nom"]) and !empty($_POST["motdepasse"])) {
		$nom = htmlspecialchars($_POST["nom"]);
		$motdepasse = htmlspecialchars($_POST["motdepasse"]);

		$recupAdmin = $bdd->prepare("SELECT * FROM admin where nomutilisateur=? and motdepasse=?");
	    $recupAdmin->execute([$nom, $motdepasse]);

	    if ($info_donnees = $recupAdmin->fetch()) {
	    	$_SESSION["admin"] = $info_donnees->idadmin;
	    	header("location:categorie.php");
	    }else{
			header("location:index.php?message=1");
		}
	}else{
		header("location:login.php?messages=1");
	}
	
}

 ?>