<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],
	'github' => [
		'client_id' => '1098ecb9a6c3d166e134',
		'client_secret' => '053b4def4160d477505f8903abace6e71514582f',
		'redirect' => 'http://task.ru/socialite/socialite/callback', //Ссылка на перенаправление при удачной авторизации (3)
	],
	'facebook' => [
	    'client_id' => '161943684207569',
	    'client_secret' => 'a138c7e8b25fa2ba360aa5f713c0e0cf',
	    'redirect' => 'http://task.ru/socialite/facebook/callback',
	],

];
