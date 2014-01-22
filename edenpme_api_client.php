<?php

class edenpme_api
	{
	function __construct($api_user, $api_pwd)
		{
		$this->api_user 	= $api_user;
		$this->api_pwd 		= $api_pwd;
		$this->debugTiming 	= 1;
		}
		
	// mise à jour d'un élément
	function update($parametres)
		{
		$parametres['methode'] = 'maj';
		
		return $this->call($parametres);
		}
	
	// récupération d'un élément
	function get($parametres)
		{
		$parametres['methode'] = 'getOne';
		
		return $this->call($parametres);
		}
		
	// récupération d'une liste d'éléments
	function getAll($parametres)
		{
		$parametres['methode'] 		= 'getAll';
		
		return $this->call($parametres);
		}	
		
	// récupération d'une liste d'éléments enfants d'un autre élément
	function getAllChildren($parametres)
		{
		$parametres['methode'] 		= 'getAllChildren';
		
		return $this->call($parametres);
		}
		
	// récupération d'une liste de valeurs possibles pour un champ libre
	function getListValues($parametres)
		{
		$parametres['methode'] 		= 'getListValues';
		
		return $this->call($parametres);
		}
		
	
	
	function call($parametres)
		{
		// paramètres additionnels
		$parametres['debugTiming'] 	= $this->debugTiming;
		
		$parametres['PHP_AUTH_USER'] = $this->api_user;
		$parametres['PHP_AUTH_PW'] = $this->api_pwd;
		
		var_dump($parametres);
		
		// Création d'une nouvelle ressource cURL
		$ch = curl_init();

		// Configuration de l'URL et d'autres options
		// curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1/edensoft/edenfiles/edensoft2014/api.php');
		curl_setopt($ch, CURLOPT_URL, 'https://www.eden-pme.com/edensoft/edenfiles/edensoft2014/api.php');
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('param' => json_encode($parametres))));
		curl_setopt($ch, CURLOPT_HTTPAUTH, 'CURLAUTH_NTLM'); 
		curl_setopt($ch, CURLOPT_USERPWD, $this->api_user.':'.$this->api_pwd); 
		
		// var_dump($this->api_user.':'.$this->api_pwd);

		// Récupération de l'URL et affichage sur le naviguateur
		$return = curl_exec($ch);
		
		// Fermeture de la session cURL
		curl_close($ch);
		
		return $return;
		}
	}

?>