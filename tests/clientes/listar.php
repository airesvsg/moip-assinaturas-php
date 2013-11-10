<?php
	
	require_once(dirname(__FILE__).'/../inc/moip.php');
	
	//Listar todos os clientes
	//----------------------------------------
	$clientes = $moip->customers->get();

	MoipHelper::trace($clientes);

	//Listar clientes com paginação
	//----------------------------------------
	$clientes = $moip->customers
		->setPagination(4, 2)
		->get();

	MoipHelper::trace($clientes);
	
	//Formas para listar detalhe do cliente
	//----------------------------------------
	$codigo_cliente = 'codigo-cliente';

	//Passando o código do cliente no método get
	$cliente = $moip->customers->get($codigo_cliente);

	MoipHelper::trace($cliente);
	
	//Passando o código do cliente pelo setCode
	$cliente = $moip->customers->setCode($codigo_cliente)->get();

	MoipHelper::trace($cliente);