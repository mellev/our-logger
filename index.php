<?php
use Psr\Log;
 
//создаем компонент для логирования
$logger = new LoggerComponent();
 
//добавляем обработчик, который все логи будет писать в файл application.log
$logger->addLogger(new FileLogger([
   'filename' => __DIR__ . '/result/application.log',
]));
 
//добавляем обработчик, который все ошибки будет писать в файл application.error.log
$logger->addLogger(new FileLogger([
   'filename'  => __DIR__ . '/result/application.error.log',
   'levels'    => [
      Log\LogLevel::ERROR,
   ],
]));
 
//добавляем обработчик, который все информационные логи будет писать в файл application.info.log
$logger->addLogger(new FileLogger([
   'filename'  => __DIR__ . '/result/application.info.log',
   'levels'    => [
      Log\LogLevel::INFO,
   ],
]));
 
 
$logger->log(Log\LogLevel::ERROR, 'Error message');
$logger->error('Error message');
 
$logger->log(Log\LogLevel::INFO, 'Info message');
$logger->info('Info message');