<?php
		
	require_once(dirname(__FILE__).'/../inc/moip.php');

	$codigo_pagamento = 'codigo-pagamento';

	$pagamento = $moip->payments->get($codigo_pagamento);

	MoipHelper::trace($pagamento);