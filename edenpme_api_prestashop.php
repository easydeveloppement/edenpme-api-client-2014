<?php

ini_set('display_errors', 1);

require("edenpme_api_client.php");
	
$edenpme_api = new edenpme_api('6c8a4cf9044e48e4383b9f6a8f400055', '94a337a9dd6fb58f5004f244187d5d39');

/*
$donnees = array(
	'denomination' => "Test création API",
	'id_entite' => 5,
	'classification' => 1118
	);

// exemple avec UPDATE
$param = array(
	'donnees' => $donnees,
	'type_element' => 'personne_morale'
	);
	
$retour = $edenpme_api->update($param);
*/

// récupération des valeurs possibles
$param = array(
	'nom_champ' => 'classification',
	'type_element' => 'personne_morale'
	);
	
$retour = $edenpme_api->getListValues($param);
echo "<pre>".print_r(json_decode($retour), true)."</pre>";



?>