<?php

namespace OurLogger;

/**
 * Логгер, который ничего не делает
 *
 * Class NullLogger
 * @package OurLogger
 */
class NullLogger implements LoggerInterface
{

    /**
     * Передача опций не требуется
     *
     * NullLogger constructor.
     * @param mixed $definition (optional)
     */
    public function __construct(array $definition = [])
    {
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
    }

    /**
     * Логирование условий ошибки
     *
     * @param string $message
     * @return void
     */
    public function error($message)
    {
    }

    /**
     * Логирование информационных сообщений
     *
     * @param string $message
     * @return void
     */
    public function info($message)
    {
    }

    /**
     * Логирование сообщений отладки
     *
     * @param string $message
     * @return void
     */
    public function debug($message)
    {
    }

    /**
     * Логирование нормальных условий
     *
     * @param string $message
     * @return void
     */
    public function notice($message)
    {
    }
}