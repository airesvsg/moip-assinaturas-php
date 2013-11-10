<?php

	require_once(dirname(__FILE__).'/../inc/moip.php');
	
	$codigo_assinatura = 'codigo-assinatura';
	$codigo_plano      = 'codigo-plano';
	$codigo_cliente    = 'codigo-cliente-existente';

	$cliente = $moip->customers
		->setIdentification(
			array(
				'code'            => $codigo_cliente,
				'email'           => 'teste@teste.com',
				'fullname'        => 'Nome Completo',
				'cpf'             => '22222222221',
				'phone_number'    => 99999999,
				'phone_area_code' => 21,
				'birthdate_day'   => 05,
				'birthdate_month' => 04,
				'birthdate_year'  => 1990,
			)
		)
		->setAddress(
			array(
				'street'     => 'Av. Beira Mar',
				'number'     => 123,
				'complement' => '',
				'district'   => 'centro',
				'city'       => 'Rio de Janeiro',
				'state'      => 'RJ',
				'country'    => 'BRA',
				'zipcode'    => '20021060',
			)
		)
		->setBillingInfo(
			array(
				'holder_name'      => 'Nome Completo',
				'number'           => '4111111111111111',
				'expiration_month' => '04',
				'expiration_year'  => '15'
			)
		);
	
	$assinatura = $moip->subscriptions
						->setCode($codigo_assinatura)
						->setAmount("4400")
						->setPlan($codigo_plano)
						->setCustomer($cliente)
						->create();

	MoipHelper::trace($assinatura);