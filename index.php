<?php 

require_once __DIR__ . '/vendor/autoload.php';

// use Mailgun\Mailgun;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;


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

echo "<h3>Crear objeto</h3>";
$mail = new Message;

var_dump($mail);

echo "<h3>Asignar los correos</h3>";
$mail->setFrom('Inscripcion Ucil <inscripciones@ucil.sicii.com.mx>')
    ->addTo('Eddy Ramos <all.eddyramos@gmail.com>')
    ->addTo('lievanoabadiaj@gmail.com')
    ->setSubject('Probando salida')
    ->setBody("Hello, Your order has been accepted.");

var_dump($mail);

echo "<h3>Configurar SMTP</h3>";
$mailer = new SmtpMailer([
        'host' => 's55.grupocopydata.com',
        'username' => 'inscripciones@ucil.sicii.com.mx',
        'password' => 'sb$SC%10',
        'secure' => 'ssl'
]);
/*
,
        'context' =>  [
            'ssl' => [
                'capath' => '/path/to/my/trusted/ca/folder',
             ],
        ],
*/

var_dump($mailer);


echo "<h3>Enviar</h3>";
$result = $mailer->send($mail);

var_dump($result);

/*
echo "<h3>Crear objeto</h3>";
$mgClient = new Mailgun('key-6457d2a0621240856976be1a081ab670');
$domain = "sandboxd44d446510644d9ea0440e19424236f3.mailgun.org";
var_dump($mgClient);

echo "<h3>Probar envio</h3>";
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'Inscripcion Ucil <inscripción@ucil.sicii.com.mx>',
    'to'      => 'Eddy Ramos <all.eddyramos@gmail.com>',
    'subject' => 'Probando salida',
    'text'    => 'Tu correo acepto la salida.'
));

var_dump($result);
*/
