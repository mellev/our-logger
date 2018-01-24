<?php

namespace OurLogger;

/**
 * Компонент логирования
 *
 * Class Component
 * @package OurLogger
 */
class Component
{
    use LoggerTrait;

    /**
     * Массив зарегистрированных логгеров
     *
     * @var LoggerInterface[]
     */
    protected $loggers = [];

    /**
     * Добавление логгера в обработчики логирования
     *
     * @param LoggerInterface $logger
     */
    public function addLogger(LoggerInterface $logger)
    {
        $this->loggers[] = $logger;
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
        foreach ($this->loggers as $logger) {
            $logger->log($level, $message);
        }
    }
}