<?php
/** 
nginx.conf
location /agent
{
    if (!-e $request_filename) {
      rewrite ^/agent/(.*)$ /agent/index.php?$1 last;
    }
}
*/
use aku\core\log\Log;
use aku\core\log\Logfile;
use aku\core\Application;
use aku\core\Config;
use aku\core\Bootstrap;

define('ROOT_PATH', dirname(__DIR__));

define('APP_PATH', dirname(__DIR__));

require_once('../vendor/autoload.php');

require_once('../library/autoload.php');


$app = new Application('../config/app.ini');

$app->bootstart(new Bootstrap())->run();


var_dump(getmypid ());

// 含有带花括号占位符的记录信息。
$message = "User {username} created";

// 带有替换信息的上下文数组，键名为占位符名称，键值为替换值。
$context = array('username' => 'boliv123213ar');


$datetime = date_create();
$premsg = '[{pid}][{datetime}][{route}]';
$precontext = [
    'pid' => getmypid(),
    'datetime' => date_format($datetime, 'Y-m-d H:i:s.u'),
    'route' => null,
];

// $premsg = self::interpolate();


echo Log::interpolate($premsg, $precontext);




//var_dump($app);
//
//$config = Application::app()->getConfig(); //$app->getConfig();
//
//var_dump($config->toArray());


//$a = parse_ini_file('../config/app.ini', true);

//$app::app()->getConfig()

// $a = "123";


// echo $_GET['213'];

