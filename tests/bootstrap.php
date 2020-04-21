<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Log\Log;
use Cake\Routing\DispatcherFactory;

require_once 'vendor/autoload.php';

define('ROOT', dirname(__DIR__));
define('CAKE_CORE_INCLUDE_PATH', ROOT . DS . 'vendor' . DS . 'cakephp' . DS . 'cakephp');
define('CORE_PATH', ROOT . DS . 'vendor' . DS . 'cakephp' . DS . 'cakephp' . DS);
define('CAKE', CORE_PATH . 'src' . DS);
define('SWAGGER_BAKE_TEST_ROOT', ROOT);
define('SWAGGER_BAKE_TEST_APP', SWAGGER_BAKE_TEST_ROOT . DS . 'tests' . DS . 'test_app');
define('APP_DIR', 'test_app');
define('APP', SWAGGER_BAKE_TEST_APP . DS);
define('WEBROOT_DIR', 'webroot');
define('WWW_ROOT', APP . 'webroot' . DS);
define('TMP', sys_get_temp_dir() . DS);
define('CONFIG', APP . 'config' . DS);
define('CACHE', TMP);
define('LOGS', TMP);

/**
 * Define fallback values for required constants and configuration.
 * To customize constants and configuration remove this require
 * and define the data required by your plugin here.
 */
require_once CORE_PATH . 'config/bootstrap.php';

// Ensure default test connection is defined
if (!getenv('db_dsn')) {
    putenv('db_dsn=sqlite://127.0.0.1/' . TMP . 'debug_kit_test.sqlite');
}

$config = [
    'url' => getenv('db_dsn'),
    'timezone' => 'UTC',
];

// Use the test connection for 'debug_kit' as well.
ConnectionManager::setConfig('test', $config);
ConnectionManager::setConfig('test_debug_kit', $config);
