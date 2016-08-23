<?php 

require_once __DIR__ . '/vendor/autoload.php';


$parameters['items'] = ['one', 'two', 'three'];
$latte = new Latte\Engine;
$latte->setTempDirectory("/storage/view");
$latte->render('/view/inscription.latte', $parameters);



