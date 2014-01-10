<?php
$config = array (
  'debug' => 1,
  'App' => 
  array (
    'fullBaseUrl' => 'http://designanddollc.com',
    'imageBaseUrl' => 'img/',
    'cssBaseUrl' => 'css/',
    'jsBaseUrl' => 'js/',
    'base' => false,
    'baseUrl' => false,
    'dir' => 'app',
    'webroot' => 'webroot',
    'www_root' => '/home2/jjprogra/public_html/designanddollc/app/webroot/',
    'encoding' => 'UTF-8',
  ),
  'Error' => 
  array (
    'handler' => 'ErrorHandler::handleError',
    'level' => 24575,
    'trace' => true,
  ),
  'Exception' => 
  array (
    'handler' => 'ErrorHandler::handleException',
    'renderer' => 'ExceptionRenderer',
    'log' => true,
  ),
  'Session' => 
  array (
    'cookie' => 'CAKEPHP',
    'timeout' => 240,
    'ini' => 
    array (
      'session.use_trans_sid' => 0,
      'session.cookie_path' => '/',
      'session.cookie_lifetime' => 14400,
      'session.name' => 'CAKEPHP',
      'session.gc_maxlifetime' => 14400,
      'session.cookie_httponly' => 1,
    ),
    'defaults' => 'php',
    'cookieTimeout' => 240,
  ),
  'Security' => 
  array (
    'salt' => 'vFeT6nnOKJjqhdPMCvvBLV2xEmVNGudHqufXAztMbpmBmubnvHTtXpW2siI6bS3uRlnHF1BLLTz8PYubbQEqXYCInb8YwQKMTE4l02bhSL2n9pkpDdIonp77WZyajthg',
    'cipherSeed' => '47135367344545474569512402556285040834666378960090196570268554633197103182531795236040878422597103013069478217719947226765961420',
  ),
  'Acl' => 
  array (
    'classname' => 'DbAcl',
    'database' => 'default',
  ),
  'Dispatcher' => 
  array (
    'filters' => 
    array (
      0 => 'AssetDispatcher',
      1 => 'CacheDispatcher',
      2 => 'AssetDispatcher',
      3 => 'CacheDispatcher',
      4 => 'AssetDispatcher',
      5 => 'CacheDispatcher',
      6 => 'AssetDispatcher',
      7 => 'CacheDispatcher',
    ),
  ),
  'SiteEng' => 
  array (
    'Site' => 
    array (
      'Title' => 'Design and Do LLC',
      'URL' => 'http://www.designanddollc.com',
      'EditClass' => 'editable',
    ),
	'Business' =>
	array(
		'Schema' => "LocalBusiness",
		'Name' => "John Doe",
		'Phone' => "(xxx) - xxx - xxx",
		'Email' => "hepl@site.com",
		'Address' => "123 abc road",
		'City' => "wondervilee",
		'State' => "MAGIC",
		'Zip' => "12345",
	),
  ),
  'Config' => 
  array (
    'language' => 'en-us',
  ),
);