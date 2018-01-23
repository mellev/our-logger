<?php

namespace OurLogger;

interface LoggerInterface
{
    public function log($level, $message);

    public function error($message);

    public function info($message);

    public function debug($message);

    public function notice($message);
}