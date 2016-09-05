<?php


if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__.$url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__.'/vendor/autoload.php';

session_start();

date_default_timezone_set('America/New_York');

/*******************
* PHP Mailer Setup *
*******************/
/*
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username   = $config_array[$mode]['google_username']; // SMTP account username example
$mail->Password   = $config_array[$mode]['google_password'];        // SMTP account password example
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to


$mail->isHTML(true);                                  // Set email format to HTML
*/

/**************
* CONFIG FILE *
**************/
$settings = require __DIR__.'/config/settings.php';

/****************
* SLIM APP FILE *
****************/
$app = new \Slim\App(array(
    'mode' => $config_array['app']['mode'],
    'settings' => $settings['settings'],
));

// Set up dependencies
require __DIR__.'/src/dependencies.php';

// Register middleware
require __DIR__.'/src/middleware.php';

// Register routes
require __DIR__.'/src/routes.php';

$app->run();
