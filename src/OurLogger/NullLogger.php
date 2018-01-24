<?php

namespace OurLogger;

/**
 * Логгер, который ничего не делает
 *
 * Class NullLogger
 * @package OurLogger
 */
class NullLogger extends AbstractLogger
{
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
}