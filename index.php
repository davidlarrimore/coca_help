<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require __DIR__ . '/vendor/autoload.php';
require 'vendor/autoload.php';

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
$config_array = parse_ini_file("config/config.ini", true);

/****************
* SLIM APP FILE *
****************/
$app = new \Slim\App(array(
    'mode' => $config_array['app']['mode'],
    'settings' => $config_array
));


// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('templates/');
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new Monolog\Logger($settings['app']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler("./logs/".$settings['app']['name'].".log", Monolog\Logger::DEBUG));
    $logger->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG)); // <<< uses a stream

    return $logger;
};

/*****************
*     ROUTES     *
*****************/
$app->get('/', function ($request, $response, $args) {

  $campaignStartDateString = strtotime($this->get('settings')['campaign']['campaign_start_date']);
  $campaignStartDate = date('Y-m-d',$campaignStartDateString);

  $campaignEndDateString = strtotime($this->get('settings')['campaign']['campaign_end_date']);
  $campaignEndDate = date('Y-m-d',$campaignEndDateString);

  $todaysDate = date('Y-m-d');

  $this->logger->addInfo("Start Date: ".$campaignStartDate);
  $this->logger->addInfo("End Date: ".$campaignEndDate);
  $this->logger->addInfo("Todays Date: ".$todaysDate);
  //echo($todaysDate);

  //$newformat = date('Y-m-d',$time);

  $data = [
            'todays_date' => $todaysDate,
            'campaign_start_date' => $campaignStartDate,
            'campaign_end_date' => $campaignEndDate
          ];

  if ($todaysDate > $campaignEndDate){
    $theView = "closeout.php";
  }elseif ($todaysDate > $campaignStartDate) {
    $theView = "track.php";
  }else {
    $theView = "prepare.php";
  }

  $this->logger->addInfo("View: ".$theView);
  return $this->view->render($response, $theView, $data);

});


/***********************
* ADDED FOR FB SUPPORT *
***********************/
$app->post('/', function ($request, $response, $args) {
  return $this->response->withRedirect('/');
});


$app->run();
