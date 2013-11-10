<?php
	
	//http://moiplabs.github.io/assinaturas-docs/webhooks.html

	require_once(dirname(__FILE__).'/../inc/moip.php');

	if(!$moip->webhooks->get()){
		exit;
	}else{
		//$moip->webhooks->date;
		//$moip->webhooks->env;
		//$moip->webhooks->resource;
		switch($moip->webhooks->property){
			case 'plans':
				switch($moip->webhooks->event){
					case 'created':
						//Manipular os dados...
						break;
					case 'updated':
						//Manipular os dados...
						break;
					case 'activated':
						//Manipular os dados...
						break;						
					case 'inactivated':
						//Manipular os dados...
						break;
				}
				break;
			case 'customer':
				switch($moip->webhooks->event){
					case 'created':
						//Manipular os dados...
						break;
					case 'updated':
						//Manipular os dados...
						break;
				}
				break;
			case 'subscription':
				switch($moip->webhooks->event){
					case 'created':
						//Manipular os dados...
						break;
					case 'updated':
						//Manipular os dados...
						break;
					case 'suspended':
						//Manipular os dados...
						break;
					case 'activated':
						//Manipular os dados...
						break;
					case 'canceled':
						//Manipular os dados...
						break;
				}
				break;
			case 'invoice':
				switch($moip->webhooks->event){
					case 'created':
						//Manipular os dados...
						break;
					case 'status_updated':
						//Manipular os dados...
						break;
				}
				break;
			case 'payment':
				switch($moip->webhooks->event){
					case 'created':
						//Manipular os dados...
						break;
					case 'status_updated':
						//Manipular os dados...
						break;
				}
				break;
		}
	}