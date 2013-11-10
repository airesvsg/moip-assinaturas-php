<?php

	require_once(dirname(__FILE__).'/../inc/moip.php');

	$notificacao = $moip->preferences
		->setNotification(
			array(
				'webhook' => array(
					'url' => 'http://exemploldeurl.com.br/assinaturas'
				),
				'email'   => array(
					'merchant' => array('enabled' => true),
					'customer' => array('enabled' => true),
				)
			)
		)
		->update();

	MoipHelper::trace($notificacao);