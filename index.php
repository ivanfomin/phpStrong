<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once __DIR__ . '/autoload.php';

try {
    $dbh = new \PDO('mysql:dbname=test;host=127.0.0.1', 'root', '321', [
        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',]);
} catch (\PDOException $exception) {
    echo $exception->getMessage();
}

$serviceLocator = new \Core\ServiceLocator();
$serviceLocator->addInstance('PDO', new \PDO('mysql:dbname=test;host=127.0.0.1', 'root', '321', [
    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',]));


$db = new \Model\DbSave($serviceLocator->get('PDO'));
$file = new \Model\FileSave();

//классы DbSave, FileSave extends EventManager
$db->subscribe('successWriting', function () {

    include(__DIR__ . '/View/showDb.html');
});

$file->subscribe('successWriting', function () {
    include(__DIR__ . '/View/showFile.html');

});

//простой выбор
if (mt_rand(0, 1)) {
    $worker = new Worker($db);
} else {
    $worker = new Worker($file);
}

$worker->work("This is the test!");
