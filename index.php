<?php

require 'vendor/autoload.php';

use Epiphp\App;

$app = new App($_SERVER['REQUEST_URI'], __DIR__);

$app->run();