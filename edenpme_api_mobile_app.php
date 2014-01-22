<?php

ini_set('display_errors', 1);

require("edenpme_api_client.php");
	
$edenpme_api = new edenpme_api('1bfc2af2159a8321da9c9aea0d7ad61b', 'a27bc735cfed0e533aa16f53089cbee2');

$param = array(
	'type_element' => 'personne_morale',
	'limit' => '10',
	'order' => 'denomination'
	);
	
$retour = $edenpme_api->getAll($param);

echo "<pre>".print_r(json_decode($retour), true)."</pre>";

/*
$donnees = array(
	'denomination' => "Test création API",
	'id_entite' => 5,
	'classification' => "Nouvelle valeur"
	);

// exemple avec UPDATE
$param = array(
	'donnees' => $donnees,
	'type_element' => 'personne_morale',
	'id_element' => 16165
	);
	
$retour = $edenpme_api->update($param);


// exemple avec GET
$param = array(
	'type_element' => 'personne_morale',
	'id_element' => 16165
	);
	
$retour = $edenpme_api->get($param);


// exemple avec GETALL
$filtres = array();

$filtres['createur_date'] 	= '17/07/2013';
$filtres['denomination'] 	= 'api';

$param = array(
	'type_element' => 'personne_morale',
	'limit' => '10',
	'order' => 'denomination',
	'filtres' => $filtres
	);
	
$retour = $edenpme_api->getAll($param);


// exemple avec GETALLCHILDREN
$param = array(
	'type_element_enfant' => 'tache',
	'type_element_parent' => 'personne_morale',
	'id_element_parent' => '58',
	'liens_indirects' => 0
	);
	
$retour = $edenpme_api->getAllChildren($param);

$tmp = json_decode($retour);

if($tmp == null)
	{
	echo "<pre>".print_r($retour, true)."</pre>";
	var_dump($retour);
	}
else
	echo "<pre>".print_r($tmp, true)."</pre>";
*/

?>