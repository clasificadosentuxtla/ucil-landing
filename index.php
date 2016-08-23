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

$file = "view/inscription.latte";
$handle = file_get_contents("$file");
$html = $handle;

$mail_smtp = new SmtpMailer([
                'host' => 's55.grupocopydata.com',
                'username' => 'inscripciones@ucil.sicii.com.mx',
                'password' => 'sb$SC%10',
                'secure' => 'ssl'
]);

$mail = new Message;
$mail->setFrom($data['from'])
        ->addTo($data['to'])
        ->setSubject('Solicitud de Inscripción Recibida.')
        ->setHTMLBody("Tu correo acepto la salida. ".date('d-M-Y h:ia'));
$result = $mail_smtp->send($mail);

$html = "";
$html .= "De: ".$data['name']." &lt;". $data['email']."&gt; <br>";
$html .= "Mando petición de inscripción a Maestria de Gestion de Negocios, se enviara un correo automatico.<br>";
$html .= "<br>";
$html .= "-- <br>";
$html .= "Este mensaje se ha enviado desde un formulario de <a href='http://ucil.mx.57aa4811dee41.635775913472199676-1325727676.mini1.studiobuque.com/landing/57aa4811dee41/gracias.php'>ucil.mx.57aa4811dee41</a>";
$html .= "";

$mail2meadds = [
    'desarrollo@sicii.com.mx',
    'webmaster.eddyramos@gmail.com',
    'lievanoabadiaj@gmail.com'
];
foreach ($mail2meadds as $mail2meaddto) {
    echo $mail2meaddto.'<br>';
    $mail2me = new Message;
    $mail2me->setFrom($data['from'])
            ->addTo($mail2meaddto)
            ->setSubject('Inscripción MGN16')
            ->setHTMLBody($html);

    $result2me = $mail_smtp->send($mail2me);
}

$redirect_url = "http://ucil.mx.57aa4811dee41.635775913472199676-1325727676.mini1.studiobuque.com/landing/57aa4811dee41/gracias.php";
header("Location: ".$redirect_url);

?>


<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://ucil.mx.57aa4811dee41.635775913472199676-1325727676.mini1.studiobuque.com/landing/css/creative.css">

</head>
<body>

    <section class="" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h1>Esta siendo redireccionado...</h1>
                    <p>Usted esta siendo redireccionado al sitio web de <a href="<?php echo $redirect_url; ?>">ucil.mx/gracias.html</a>, si no cambia en los siguientes 5 segundos por favor haga click <a href="<?php echo $redirect_url; ?>">AQUI</a></p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>