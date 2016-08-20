<?php 

require_once __DIR__ . '/vendor/autoload.php';

// use Mailgun\Mailgun;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;
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

$data['name'] = $_POST['FNAME'];
$data['email'] = $_POST['EMAIL'];
$data['phone'] = $_POST['PHONE'];
$data['from'] = 'Inscripcion Ucil <inscripciones@ucil.sicii.com.mx>';
$data['to'] = (string) $_POST['FNAME'].' <'.$data['email'].'>';

var_dump($data);

$mail = new Message;
$mail->setFrom($data['from'])
        ->addTo($data['to'])
        ->setSubject('Probando salida con Nette')
        ->setBody("Tu correo acepto la salida.");
$mailer = new SmtpMailer([
                'host' => 's55.grupocopydata.com',
                'username' => 'inscripciones@ucil.sicii.com.mx',
                'password' => 'sb$SC%10',
                'secure' => 'ssl'
]);
$result = $mailer->send($mail);


$mail2me = new Message;
$mail2me->setFrom($data['from'])
        ->addTo('desarrollo@sicii.com.mx')
        ->addTo('webmaster.eddyramos@gmail.com')
        ->addTo('lievanoabadiaj@gmail.com')
        ->setSubject('Inscripción MGN16')
        ->setBody("
            De: $data['name'] $data['email'] <br>
            Mando petición de inscripción a Maestria de Gestion de Negocios, se enviara un correo automatico.<br>
            <br>
            <br>-- 
            Este mensaje se ha enviado desde un formulario de <a href='http://ucil.mx.57aa4811dee41.635775913472199676-1325727676.mini1.studiobuque.com/landing/57aa4811dee41/gracias.php'>ucil.mx.57aa4811dee41</a>
        ");
$mailer2me = new SmtpMailer([
                'host' => 's55.grupocopydata.com',
                'username' => 'inscripciones@ucil.sicii.com.mx',
                'password' => 'sb$SC%10',
                'secure' => 'ssl'
]);
$result = $mailer2me->send($mail);

var_dump($mail, $mailer2me, $result);

echo "Redireccionar a: http://ucil.mx.57aa4811dee41.635775913472199676-1325727676.mini1.studiobuque.com/landing/57aa4811dee41/gracias.php";

