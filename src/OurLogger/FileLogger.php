<?php

namespace OurLogger;

/**
 * Логгер, записывающий логи в файл
 *
 * Class FileLogger
 * @package OurLogger
 */
class FileLogger implements LoggerInterface
{
    /**
     * Описание передаваемых опций
     * $definition
     *      ['filename']    string Путь к файлу
     *      ['levels']      array (optional) Массив с уровнями логов, которые должен записывать логгер. Если уровни не перечислены, тогда будут записываться все логи.
     *
     * FileLogger constructor.
     * @param array $definition
     */
    public function __construct(array $definition)
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