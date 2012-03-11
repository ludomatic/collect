<?php

/**
  *  PAGE DU SERVEUR RÉPONDANT AUX REQUÊTES AJAX DU CLIENT
  *  Dated: 2012-03-08 10:02 (NCT)
  *  User: ludomatic
  *  Note: Le serveur web exécutant cette page doit avoir accès en écriture au fichier d'export "stock.dat"
  */

//---- Variables
$CONF = array(); // Configuration générale
$CONF["path_dbf"] = "./dbf/"; // Chemin vers les fichiers DBase
$CONF["path_dat"] = "/tmp/stock.dat"; // Fichier d'inventaire

//---- Initialisation
//ini_set("memory_limit","4000M");
//set_time_limit(6000);

//---- On sort si la page n'est pas appelée depuis une requête AJAX
if ( @$_SERVER["HTTP_X_REQUESTED_WITH"]!="XMLHttpRequest" ) {
  header("HTTP/1.0 404 Not Found");
  die( "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\"><html><head><title>404 Not Found</title></head><body><h1 style=\"color:#ddd;font-size:30em;display:block;text-align:center;\"><abbr title=\"Nothing here... Please don't let me alone!\">404</abbr></h1></body></html>" );
  exit;
}

/* TODO: FCT DE LECTURE DES DBFs */

//---- Gestion de l'encodage
//header("Content-Type: text/html; charset=UTF-8");
//header("Content-Type: text/html; charset=CP437");

//---- REQUETE CLIENT: demande du fichier local DBF à transmettre au format JSON
if ( ($_POST["action"]=="inventaire2device") && isset($_POST["user"]) ) {
  die(json_encode( array("erreur"=>"Commande inventaire2device OK") ));
}

//---- REQUETE CLIENT: réception de l'inventaire au format JSON à enregistrer au format CSV
elseif ( ($_POST["action"]=="inventaire2server") && isset($_POST["user"]) && isset($_POST["stockdat"]) ) {
  die(json_encode( array("erreur"=>"Commande inventaire2server OK") ));
}

else {
  die(json_encode( array("erreur"=>"Commande inconnue") ));
}

?>
