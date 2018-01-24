<?php

namespace OurLogger;

/**
 * Абстрактный логгер
 *
 * Class AbstractLogger
 * @package OurLogger
 */
abstract class AbstractLogger implements LoggerInterface
{
    use LoggerTrait;

    /**
     * Перечисление уровней логгирования, которые должен
     * обрабатывать логгер. Если массив пуст, то будут
     * обрабатываться все уровни.
     *
     * @var array
     */
    protected $levels = [];

    /**
     * Описание передаваемых опций
     * $definition
     *      ['levels']      array (optional) Массив с уровнями логов, которые
     *                      должен записывать логгер. Если уровни не перечислены,
     *                      тогда будут записываться все логи.
     *
     * FileLogger constructor.
     * @param array $definition
     */
    public function __construct($definition)
    {
        if (array_key_exists('levels', $definition)) {
            $this->levels = is_array($definition['levels']) ? $definition['levels'] : [];
        }
    }

    /**
     * Преобразует не строковые сообщения в строковый вид
     *
     * @param $message
     * @return mixed
     */
    protected function messageToString($message)
    {
        return str_replace("\n", '', print_r($message, true));
    }
}