<?php

	require_once(dirname(__FILE__).'/../inc/moip.php');

	$retentativas = $moip->preferences
		->setRetry(
			array(
				'first_try'  =>  1,
				'second_try' =>  3,
				'third_try'  =>  5,
				'finally'    =>  'cancel'
			)
		)
		->update();

	MoipHelper::trace($retentativas);