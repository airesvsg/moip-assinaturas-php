<?php
	
	require_once(dirname(__FILE__).'/../inc/moip.php');

	$codigo_plano = 'codigo-plano';

	$plano = $moip->plans
		->setIdentification(
			array(
				'code'        => $codigo_plano,
				'name'        => 'nome do plano',
				'description' => 'descricao do plano'
			)
		)
		->setAmount(8000)
		->setSetupFee(400)
		//->setValues(8000, 400) //o mesmo que setAmount e setSetupFee
		->setInterval('day', 2)
		->setBillingCycles(10)
		->setTrial(10, false)
		->setStatus('inactive')
		->setMaxSignatures(100)
		//->setConfigurations('inactive', 100) //o mesmo que setStatus e setMaxSignatures
		->create();

	echo utf8_decode($plano->message);
	MoipHelper::trace($plano);