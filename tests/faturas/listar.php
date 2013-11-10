<?php
		
	require_once(dirname(__FILE__).'/../inc/moip.php');

	$codigo_fatura = 'codigo-fatura';

	$fatura = $moip->invoices->get($codigo_fatura);

	MoipHelper::trace($fatura);