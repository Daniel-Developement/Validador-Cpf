<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Validation\CPF;

$resultado = CPF::validar("347.612.270-01");

var_dump($resultado);