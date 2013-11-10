<?php
	
	require_once(dirname(__FILE__).'/../inc/moip.php');

	$codigo_cliente = 'codigo-cliente';
	
	$novo_cofre     = true;

	$cliente = $moip->customers
		->setIdentification(
			array(
				'code'            => $codigo_cliente,
				'email'           => 'teste@teste.com',
				'fullname'        => 'Nome Completo',
				'cpf'             => '22222222222',
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
		->setBillingInfo(
			array(
				'holder_name'      => 'Nome Completo',
				'number'           => '4111111111111111',
				'expiration_month' => '04',
				'expiration_year'  => '15'
            )
		)
		->create($novo_cofre);

	echo utf8_decode($cliente->message);
	MoipHelper::trace($cliente);