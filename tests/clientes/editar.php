<?php

	require_once(dirname(__FILE__).'/../inc/moip.php');

	$codigo_cliente = 'codigo-cliente';
	
	$cliente = $moip->customers
		->setIdentification(
			array(
				'code'            => $codigo_cliente,
				'email'           => 'email@email.com',
				'fullname'        => 'Nome Completo',
				'cpf'             => '11111111111',
				'birthdate_day'   => 05,
				'birthdate_month' => 04,
				'birthdate_year'  => 1990,
				'phone_area_code' => 21,
				'phone_number'    => 99999999,
			)
		)
		->setAddress(
			array(
				'street'   => 'Av. Beira Mar',
				'number'   => 123,
				'district' => 'centro',
				'city'     => 'Rio de Janeiro',
				'state'    => 'Rio de Janeiro',
				'country'  => 'bra',
				'zipcode'  => '20021-060'
			)
		)
		->update();

	echo utf8_decode($cliente->message);
	MoipHelper::trace($cliente);