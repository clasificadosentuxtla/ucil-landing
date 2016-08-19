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
