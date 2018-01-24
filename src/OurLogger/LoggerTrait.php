<?php

namespace OurLogger;

/**
 * Трейт, который предоставляет методы с конкретным уровнем логирования,
 * перенаправляющие запросы в метод log, который должен быть реализован
 * в классах, использующие этот трейт.
 *
 * Trait LoggerTrait
 * @package OurLogger
 */
trait LoggerTrait
{
    /**
     * Логирование условий ошибки
     *
     * @param string $message
     * @return void
     */
    public function error($message)
    {
        $this->log(LogLevel::ERROR, $message);
    }

    /**
     * Логирование информационных сообщений
     *
     * @param string $message
     * @return void
     */
    public function info($message)
    {
        $this->log(LogLevel::INFO, $message);
    }

    /**
     * Логирование сообщений отладки
     *
     * @param string $message
     * @return void
     */
    public function debug($message)
    {
        $this->log(LogLevel::DEBUG, $message);
    }

    /**
     * Логирование нормальных условий
     *
     * @param string $message
     * @return void
     */
    public function notice($message)
    {
        $this->log(LogLevel::NOTICE, $message);
    }

    /**
     * Логирование сообщений с переданным уровнем
     *
     * @param mixed $level
     * @param string $message
     * @return void
     */
    public abstract function log($level, $message);
}