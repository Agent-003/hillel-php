<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Framework\Application;

$app=new Application([
	'config'=>__DIR__.'/../config/app.ini'
]);

$app=run();