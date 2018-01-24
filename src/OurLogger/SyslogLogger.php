<?php

namespace OurLogger;

/**
 * Логгер, который записывает логи в системный журнал
 *
 * Class SyslogLogger
 * @package OurLogger
 */
class SyslogLogger extends AbstractLogger
{
    /**
     * Сопоставление констант уровней логирования из компонента с
     * константами c которыми работает syslog
     *
     * @var array
     */
    protected $priorityMap = [
        LogLevel::NOTICE => LOG_NOTICE,
        LogLevel::DEBUG => LOG_DEBUG,
        LogLevel::ERROR => LOG_ERR,
        LogLevel::INFO => LOG_INFO
    ];

    /**
     * Описание передаваемых опций
     * $definition
     *      ['levels']      array (optional) Массив с уровнями логов, которые должен
     *                      записывать логгер. Если уровни не перечислены, тогда будут
     *                      записываться все логи.
     *
     * FileLogger constructor.
     * @param array $definition
     */
    public function __construct(array $definition)
    {
        parent::__construct($definition);

        openlog('application', LOG_ODELAY, LOG_USER);
    }

    /**
     * Логирование сообщений с переданным уровнем
     *
     * @param mixed $level
     * @param string $message
     * @return void
     */
    public function log($level, $message)
    {
        syslog($this->priorityMap[$level], $this->messageToString($message));
    }
}