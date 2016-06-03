<?php
//подключаем composer
require_once(__DIR__ . '/vendor/autoload.php');
 
//за основу берем компонент Psr/Log https://github.com/php-fig/log/tree/master/Psr/Log
use Psr\Log;
use Logger;
 
//компонент для логирования
$logger = new Logger\Component();
 
//добавляем обработчик, который все логи будет писать в файл application.log
$logger->addLogger(new Logger\FileLogger([
   'filename' => __DIR__ . '/result/application.log',
]));
 
//добавляем обработчик, который все ошибки будет писать в файл application.error.log
$logger->addLogger(new Logger\FileLogger([
   'filename'  => __DIR__ . '/result/application.error.log',
   'levels'    => [
      Log\LogLevel::ERROR,
   ],
]));
 
//добавляем обработчик, который все информационные логи будет писать в файл application.info.log
$logger->addLogger(new Logger\FileLogger([
   'filename'  => __DIR__ . '/result/application.info.log',
   'levels'    => [
      Log\LogLevel::INFO,
   ],
]));
 
//обработчик который ничего не делает
$logger->addLogger(new Logger\NullLogger([

]));

$logger->log(Log\LogLevel::ERROR, 'Error message');
$logger->error('Error message');
 
$logger->log(Log\LogLevel::INFO, 'Info message');
$logger->info('Info message');
 
?>