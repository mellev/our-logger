<?php

namespace OurLogger;

/**
 * Интерфейс абстрактного логгера
 *
 * Interface LoggerInterface
 * @package OurLogger
 */
interface LoggerInterface
{
    /**
     * Логирование сообщений с переданным уровнем
     *
     * @param mixed $level
     * @param string $message
     * @return void
     */
    public function log($level, $message);

    /**
     * Логирование условий ошибки
     *
     * @param string $message
     * @return void
     */
    public function error($message);

    /**
     * Логирование информационных сообщений
     *
     * @param string $message
     * @return void
     */
    public function info($message);

    /**
     * Логирование сообщений отладки
     *
     * @param string $message
     * @return void
     */
    public function debug($message);

    /**
     * Логирование нормальных условий
     *
     * @param string $message
     * @return void
     */
    public function notice($message);
}