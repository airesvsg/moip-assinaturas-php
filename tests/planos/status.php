<?php

	require_once(dirname(__FILE__).'/../inc/moip.php');

	$codigo_plano = 'codigo-plano';

	//Formas para ativar os inativar o plano
	//----------------------------------------

	//Ativar
	$plano = $moip->plans->activate($codigo_plano);

	MoipHelper::trace($plano);
	
	//Outras formas para ativar
	//----------------------------------------	
	/*$moip->plans->setCode($codigo_plano)->activate();
	$moip->plans->setStatus('active')->update($codigo_plano);
	$moip->plans->setCode($codigo_plano)->setStatus('active')->update();*/

	//Inativar
	$plano = $moip->plans->inactivate($codigo_plano);

	MoipHelper::trace($plano);

	//Outras formas para inativar
	//----------------------------------------
	/*$moip->plans->setCode($codigo_plano)->inactivate();
	$moip->plans->setStatus('inactive')->update($codigo_plano);
	$moip->plans->setCode($codigo_plano)->setStatus('inactive')->update();*/
