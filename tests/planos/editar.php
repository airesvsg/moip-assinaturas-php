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
		->setSetupFee(1000)
		//->setValues(8000, 1000) //o mesmo que setAmount e setSetupFee
		->setInterval('day', 2)
		->setBillingCycles(10)
		->setTrial(10, false)
		->setStatus('active')
		->setMaxSignatures(100)
		//->setConfigurations('active', 100) //o mesmo que setStatus e setMaxSignatures
		->update();

	echo utf8_decode($plano->message);
	MoipHelper::trace($plano);