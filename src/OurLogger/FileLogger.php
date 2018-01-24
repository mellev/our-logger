<?php

namespace OurLogger;

/**
 * Логгер, записывающий логи в файл
 *
 * Class FileLogger
 * @package OurLogger
 */
class FileLogger extends AbstractLogger
{
    /**
     * Путь к файлу, в который будет идти запись логов
     *
     * @var string
     */
    protected $filename;

    /**
     * Описание передаваемых опций
     * $definition
     *      ['filename']    string Путь к файлу
     *      ['levels']      array (optional) Массив с уровнями логов, которые должен
     *                      записывать логгер. Если уровни не перечислены, тогда
     *                      будут записываться все логи.
     *
     * FileLogger constructor.
     * @param array $definition
     * @throws Exception
     */
    public function __construct(array $definition)
    {
        parent::__construct($definition);

        if (array_key_exists('filename', $definition)) {
            $filename = $definition['filename'];

            $writable = true;

            // Проверка на воможность записи файла
            if (file_exists($filename) && ! is_writable($filename)) {
               $writable = false;
            } else if (! file_exists($filename) && ! is_writable(dirname($filename))) {
                $writable = false;
            }

            if (! $writable) {
                throw new Exception('"' . $filename . '" write permission denied');
            }

            $this->filename = $definition['filename'];
        }
    }

    /**
     * Логирование сообщений с переданным уровнем
     *
     * @param mixed $level
     * @param mixed $message
     * @return void
     */
    public function log($level, $message)
    {
        if (! in_array($level, $this->levels) && count($this->levels)) {
            return;
        }

        file_put_contents($this->filename, $this->formatMessage($level, $message), FILE_APPEND);
    }

    /**
     * Создание строки в формате: TIME LEVEL MESSAGE
     * Где:
     *      TIME - Дата в формате стандарта ISO 8601
     *      LEVEL - уровень логирования (LOG_LEVEL_ERROR, LOG_LEVEL_INFO, LOG_LEVEL_DEBUG, LOG_LEVEL_NOTICE)
     *      MESSAGE - сообщение
     *
     * @param mixed $level
     * @param mixed $message
     * @return string
     */
    private function formatMessage($level, $message)
    {
        return date('c') . ' ' . $level . ' ' . $this->messageToString($message) . "\n";
    }
}