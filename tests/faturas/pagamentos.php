<?php
		
	require_once(dirname(__FILE__).'/../inc/moip.php');

	$codigo_fatura = 'codigo-fatura';

	$pagamentos = $moip->invoices->payments($codigo_fatura);

	MoipHelper::trace($pagamentos);