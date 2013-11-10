<?php
		
	require_once(dirname(__FILE__).'/../inc/moip.php');

	$codigo_fatura = 'codigo-fatura';

	$retentativa = $moip->invoices->retry($codigo_fatura);

	MoipHelper::trace($retentativa);