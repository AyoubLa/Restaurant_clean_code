<?php

namespace Restaurant\Formatters;


final class ComaStringFormatter implements Formatter
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function formatter($tableEntry)
    {
        return \implode(', ', $tableEntry);
    }
}