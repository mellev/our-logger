<?php

namespace OurLogger;

class NullLogger implements LoggerInterface
{
    public function __construct(array $definition)
    {
    }

    public function log($level, $message)
    {
    }

    public function error($message)
    {
    }

    public function info($message)
    {
    }

    public function debug($message)
    {
    }

    public function notice($message)
    {
    }
}