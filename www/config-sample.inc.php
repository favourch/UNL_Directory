<?php
ini_set('display_errors', true);
error_reporting(E_ALL|E_STRICT);

require_once __DIR__ . '/../vendor/autoload.php';

// Set the main URL for the site
UNL_Peoplefinder::$url = '/';

//Set the annotation service's URL
UNL_Peoplefinder::$annotateUrl = 'http://annotate.unl.edu/';

// If you have LDAP access credentials, best to use this driver, using your credentials
UNL_Peoplefinder_Driver_LDAP::$bindDN = 'uid=giggidy,ou=service,dc=unl,dc=edu';
UNL_Peoplefinder_Driver_LDAP::$bindPW = 'flibbertygibberty';
$driver = new UNL_Peoplefinder_Driver_LDAP();

// Otherwise, use the webservice driver
$driver = new UNL_Peoplefinder_Driver_WebService();

// Database connection info for officefinder portions
UNL_Officefinder::$db_user = 'officefinder';
UNL_Officefinder::$db_pass = 'officefinder';

// Officefinder editing admins
UNL_Officefinder::$admins = array();

UNL_Knowledge_Driver_REST::$service_user = 'unl/web_service_unlwebcv';
UNL_Knowledge_Driver_REST::$service_pass = 'examplepassword';

# set the memcache host and port
UNL_Knowledge_Driver_REST::$memcache_host = 'localhost';
UNL_Knowledge_Driver_REST::$memcache_port = 11211;
