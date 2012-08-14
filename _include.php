<?php
session_start();

    $siteUrl = 'http://localhost/FeeltestGit';

	// Affichage des erreurs
	//error_reporting(E_ALL);
	//ini_set('display_errors', true);
	
	// Inclusion des éléments nécessaires
	require_once(dirname(__FILE__).'../Classes/Manager/PdoManager.class.php');
	require_once(dirname(__FILE__).'../Classes/Model/Test.class.php');
	require_once(dirname(__FILE__).'../Classes/Model/Activite.class.php');
	require_once(dirname(__FILE__).'../Classes/Model/Testeur.class.php');
        require_once(dirname(__FILE__).'../Classes/Model/Session.class.php');
	
	require_once(dirname(__FILE__).'/Classes/Manager/TestManager.class.php');
	require_once(dirname(__FILE__).'/Classes/Manager/ActiviteManager.class.php');
        require_once(dirname(__FILE__).'/Classes/Manager/SessionManager.class.php');

	//require_once(dirname(__FILE__).'/Classes/Manager/TesteurManager.class.php');
	
//	$script = $_SERVER["SCRIPT_NAME"];
//	if(strpos($script, '/Admin/') !== false){
//		session_start();
//		if(!isset($_SESSION['user'])){
//			if(strcasecmp($_SERVER["SCRIPT_NAME"], '/Admin/index.php') != 0){
//				header('Location: http://locahost/Feeltest/Admin/');
//			}
//		}
//	}
?>