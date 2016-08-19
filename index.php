<?php 

require_once __DIR__ . '/vendor/autoload.php';

use Mailgun\Mailgun;


// Check for empty fields
if(empty($_POST['FNAME'])      ||
   empty($_POST['EMAIL'])     ||
   empty($_POST['PHONE'])     ||
   !filter_var($_POST['EMAIL'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

var_dump($_POST);

$mgClient = new Mailgun('key-6457d2a0621240856976be1a081ab670');
$domain = "sandboxd44d446510644d9ea0440e19424236f3.mailgun.org";

$result = $mgClient->sendMessage($domain, array(
    'from'    => 'Inscripcion Ucil <inscripción@ucil.sicii.com.mx>',
    'to'      => 'Eddy Ramos <all.eddyramos@gmail.com>',
    'subject' => 'Probando salida',
    'text'    => 'Tu correo hacepto la salida.'
));

var_dump($result);
