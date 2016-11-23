<?php

require_once __DIR__ . '/autoload.php';

$service = new \Core\ServiceLocator();

$service->addClass('TestClass', ['Hello', 21]);

$testClass = $service->get('TestClass');

var_dump($testClass);