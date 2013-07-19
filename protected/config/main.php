<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'ArmoryRaider',
	'theme'=>'armoryRaider2013',
	'sourceLanguage'=>'en_gb',
	'language'=>'en_gb',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.wowarmoryapi.*',
		'application.modules.rights.*', 
		'application.modules.rights.components.*', 	
//		'application.modules.wowarmoryapi.*',		// Blizzard armory A.P.I.
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'password',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'rights'=>array(
			'superuserName'=>'admin',
			'authenticatedName'=>'Guest', // Name of the authenticated user role.
//			'userClass'=>'User',
//			'userIdColum'=>'id',
//			'userNameColum'=>'username',
			'install'=>false,
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl' => array('/site/login'),
			'class' => 'RaiderUser',   // classe specifica per il raider
//			'class'=>'RWebUser', // Allows super users access implicitly.
		),
		'authManager'=>array( 
			'class'=>'RDbAuthManager', // Provides support authorization item sorting. ......
		    'assignmentTable' => 'authassignment',
    		'itemTable' => 'authitem',
    		'itemChildTable' => 'authitemchild',
    		'rightsTable' => 'rights',
		),
		'thumbnailer'=>array(
			'class'=>'application.extensions.thumbnailer.Thumbnailer'
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
			'connectionString' => 'mysql:host=127.0.0.1;dbname=armoryraider',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'password',
			'charset' => 'utf8',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'		=>'CFileLogRoute',
					'levels'	=>'error, warning, trace, info',
				),
//                array(
//                    'class'=>'CEmailLogRoute',
//                    'levels'=>'error, warning',
//                    'emails'=>'admin@example.com',
//                ),				
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);