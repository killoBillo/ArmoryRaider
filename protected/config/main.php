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
		'application.components.wowarmoryapi.*',    // World of Warcraft Armory API
		'application.components.d3armoryapi.*',     // Diablo3 Armory API
		'application.modules.rights.*', 
		'application.modules.rights.components.*',
//		'application.modules.wowarmoryapi.*',		// Blizzard armory A.P.I.
	),
	
	// gestisce il login utilizzando il file RequireLogin.php in /components
	// risorsa web: 
	// http://www.larryullman.com/2010/07/20/forcing-login-for-all-pages-in-yii/
//	'behaviors' => array(
//	    'onBeginRequest' => array(
//	        'class' => 'application.components.RequireLogin'
//	    )
//	),	

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
			'authenticatedName'=>'Authenticated', // Name of the authenticated user role.
//			'userIdColumn'=>'id', // Name of the user id column in the database.
//			'userNameColumn'=>'username',  // Name of the user name column in the database. 
			'install'=>false,
//			'debug'=>false,
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
		'urlManager'=>array(
		    'urlFormat'=>'path',
            'showScriptName'=>false,
            'caseSensitive'=>false,
		    'rules'=>array(
		        // REST patterns
		        array('api/ping', 'pattern'=>'api/ping', 'verb'=>'GET'),
		        array('api/login', 'pattern'=>'api/<model:\w+>/<username:\w+>/<password:\w+>', 'verb'=>'GET'),
		        array('api/list', 'pattern'=>'api/<model:\w+>', 'verb'=>'GET'),
		        array('api/view', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'GET'),
		        array('api/update', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'PUT'),
		        array('api/delete', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'DELETE'),
		        array('api/create', 'pattern'=>'api/<model:\w+>', 'verb'=>'POST'),
		        // Other controllers
		        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
		    ),
		),
		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
			'connectionString' => 'mysql:host=localhost;dbname=armoryraider',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
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
		'version'=>'1.1.4'
	),
);