<?php
/**
 * Задача: реализовать необходимы классы и методы для запуска данного файла
 *
 * Основные требования:
 * - модифицировать файл нельзя
 * - аккуратность, чистота кода
 * - документация (для каждого метода, поля, класса есть DocBlock)
 * - комментарии в коде для непонятных участков
 *
 * Результатом выполнение программы должны быть 3 файла:
 *
 * application.log
 * *****************
 * 2016-05-30T09:50:57+00:00  LOG_LEVEL_ERROR  Error message
 * 2016-05-30T09:50:57+00:00  LOG_LEVEL_ERROR  Error message
 * 2016-05-30T09:50:57+00:00  LOG_LEVEL_INFO  Info message
 * 2016-05-30T09:50:57+00:00  LOG_LEVEL_INFO  Info message
 * 2016-05-30T09:50:57+00:00  LOG_LEVEL_DEBUG  Debug message
 * 2016-05-30T09:50:57+00:00  LOG_LEVEL_DEBUG  Debug message
 * 2016-05-30T09:50:57+00:00  LOG_LEVEL_NOTICE  Notice message
 * 2016-05-30T09:50:57+00:00  LOG_LEVEL_NOTICE  Notice message
 * 2016-05-30T09:50:57+00:00  LOG_LEVEL_INFO  Info message from FileLogger
 * 2016-05-30T09:50:57+00:00  LOG_LEVEL_INFO  Info message from FileLogger
 * *****************
 *
 * application.error.log
 * *****************
 * 2016-05-30T09:50:57+00:00  LOG_LEVEL_ERROR  Error message
 * 2016-05-30T09:50:57+00:00  LOG_LEVEL_ERROR  Error message
 * *****************
 *
 * application.info.log
 * *****************
 * 2016-05-30T09:50:57+00:00  LOG_LEVEL_INFO  Info message
 * 2016-05-30T09:50:57+00:00  LOG_LEVEL_INFO  Info message
 * *****************
 */

require_once(__DIR__ . '/vendor/autoload.php');

/**
 * Компонент для логирования
 *
 * Доступные уровни логирования:
 * - EMERGENCY
 * - ALERT
 * - CRITICAL
 * - ERROR
 * - WARNING
 * - NOTICE
 * - INFO
 * - DEBUG
 */
$logger = new OurLogger\Component();
 
/**
 * Логгер который все логи будет писать в файл application.log
 */
$fileLogger = new OurLogger\FileLogger([
   'filename' => __DIR__ . '/application.log',
]);

$logger->addLogger($fileLogger);
 
/**
 * Логгер который все ошибки будет писать в файл application.error.log
 */
$logger->addLogger(new OurLogger\FileLogger([
   'filename'  => __DIR__ . '/application.error.log',
   'levels'    => [
      OurLogger\LogLevel::ERROR,
   ],
]));
 
/**
 * Логгер который все информационные логи будет писать в файл application.info.log
 */
$logger->addLogger(new OurLogger\FileLogger([
   'filename'  => __DIR__ . '/application.info.log',
   'levels'    => [
      OurLogger\LogLevel::INFO,
   ],
]));
 
/**
 * Логгер который все debug логи записывает в syslog
 *
 * @see http://php.net/manual/ru/function.syslog.php
 */
$logger->addLogger(new OurLogger\SyslogLogger([
   'levels'    => [
     OurLogger\LogLevel::DEBUG,
   ],
]));
 
/**
 * Логгер который ничего не делает
 */
$logger->addLogger(new OurLogger\NullLogger([
 
]));
 
$logger->log(OurLogger\LogLevel::ERROR, 'Error message');
$logger->error('Error message');
 
$logger->log(OurLogger\LogLevel::INFO, 'Info message');
$logger->info('Info message');

$logger->log(OurLogger\LogLevel::DEBUG, 'Debug message');
$logger->debug('Debug message');

$logger->log(OurLogger\LogLevel::NOTICE, 'Notice message');
$logger->notice('Notice message');

$fileLogger->log(OurLogger\LogLevel::INFO, 'Info message from FileLogger');
$fileLogger->info('Info message from FileLogger');