<?php
/**
 * Created by PhpStorm.
 * Author: manhphucofficial@yahoo.com
 * Date time: 4/17/17 1:38 PM
 */

/* @var \yivic\yivicCms\libs\override\web\NpUrlManager $configComponentUrlManager */


return yii\helpers\ArrayHelper::merge([
	// Put params below this line
	'vendorPath' => VENDOR_PATH,

	// Current language for application, can be overridden
	'language' => 'en',

	// Default language of application
	'sourceLanguage' => 'en',

	// Aliases used entired application
	'aliases' => [
		// Root path of the application
		'@root' => dirname(dirname(__DIR__)),
		'@common' => dirname(dirname(__DIR__)).'/common',
		'@backend' => dirname(dirname(__DIR__)).'/backend',
		'@frontend' => dirname(dirname(__DIR__)).'/frontend',
		'@api' => dirname(dirname(__DIR__)).'/api',
		'@console' => dirname(dirname(__DIR__)).'/console',
		'@uploads' => dirname(dirname(__DIR__)).'/uploads',
	],

	// For bootstraping process
	// http://www.yiiframework.com/doc-2.0/guide-structure-applications.html
	'bootstrap' => [
		// Specify the module instead of component or module ID to avoid duplicated name
		function () {
			return Yii::$app->getModule('yivicCms');
		}
	],

	// Specify modules for application
	'modules' => [

		// For using yivicCms and all it's features
		'yivicCms' => [
			'class' => 'yivic\yivicCms\Module',
		],

	],
	'components' => [

		// URL Manager for backend
		// We need to specify different ID for this component since we may want to use it from other endpoint
		// E.g. you may need to get frontend URL when in backend or in API...
		'urlManagerBackend' => [
			'class' => 'yivic\yivicCms\libs\override\web\NpUrlManager',
			// we don't need pretty url here
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'baseUrl' => APP_BASE_URL . "/admin",
			'languages' => ['en', 'vi'],
			// We don't want default language indicator in URL
			'enableDefaultLanguageUrlCode' => false,

			'enableLanguageDetection' => false,
			'enableLanguagePersistence' => false,
			'rules' => [

			]
		],

		// URL Manager for frontend
		'urlManagerFrontend' => [
			'class' => 'yivic\yivicCms\libs\override\web\NpUrlManager',
			// enable pretty URL here
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'baseUrl' => APP_BASE_URL . "",
			'languages' => ['en', 'vi'],
			'enableDefaultLanguageUrlCode' => false,
			'enableLanguageDetection' => false,
			'enableLanguagePersistence' => false,
			'rules' => [
				'/<locale:\w+>' => '',
			]
		],

		// URL Manager for webservice
		'urlManagerApi' => [
			'class' => 'yivic\yivicCms\libs\override\web\NpUrlManager',
			// we don't need pretty url here
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'baseUrl' => APP_BASE_URL . "/ws",

			// only english in API
			'languages' => ['en'],
			'enableDefaultLanguageUrlCode' => false,
			'enableLanguageDetection' => false,
			'enableLanguagePersistence' => false,
			'rules' => [

			]
		],

		// For js, css ... management
		'assetManager' => [
			// Use a custom asset manager class
			'class' => 'yivic\yivicCms\libs\override\web\NpAssetManager',
		],

		'i18n' => [
			'translations' => [
				'app*' => [
					'class' => 'yivic\yivicCms\libs\override\i18n\NpPhpMessageSource',
					'basePath' => '@root/languages',
					'fileMap' => [
						'app' => 'app.php',
					],
				],
				'yivic*' => [
					// Set translation using .php file
					'class' => 'yivic\yivicCms\libs\override\i18n\NpPhpMessageSource',
					'basePath' => '@yivic/yivicCms/languages',
					'fileMap' => [
						'yivic' => 'yivic.php',
					],
				]
			]
		],

		'image' => [
			'class' => 'yii\image\ImageDriver',
			'driver' => 'GD',  //GD or Imagick
		],

		// Caching system
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],

		// RBAC
		'authManager' => [
			'class' => 'yivic\yivicCms\libs\NpAuthDbManager',
		],

		// Some format
		'formatter' => [
			'class' => 'yii\i18n\Formatter',
			'dateFormat' => 'php:Y-m-d',
			'datetimeFormat' => 'php:Y-m-d H:i:s',
			'timeFormat' => 'php:H:i:s',
			'timeZone' => 'America/Toronto'
		],

		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			'useFileTransport' => false,
			'viewPath' => '@common/mail',
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'mail.smtp2go.com',
				'username' => 'manhphucofficial@yahoo.com',
				'password' => 'yIIvic@123',
				'port' => '587'
			],
		],
	],
], require('common-env.php'));